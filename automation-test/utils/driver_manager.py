"""
WebDriver manager for Selenium tests
"""
from selenium import webdriver
from selenium.webdriver.chrome.service import Service as ChromeService
from selenium.webdriver.firefox.service import Service as FirefoxService
from selenium.webdriver.chrome.options import Options as ChromeOptions
from selenium.webdriver.firefox.options import Options as FirefoxOptions
from webdriver_manager.chrome import ChromeDriverManager
from webdriver_manager.firefox import GeckoDriverManager
from config import Config


class DriverManager:
    """Manager class for WebDriver instances"""

    @staticmethod
    def get_driver(browser=None, headless=None):
        """
        Create and return WebDriver instance

        Args:
            browser (str): Browser name ('chrome' or 'firefox')
            headless (bool): Run browser in headless mode

        Returns:
            WebDriver: Selenium WebDriver instance
        """
        browser = browser or Config.BROWSER
        headless = headless if headless is not None else Config.HEADLESS

        if browser.lower() == 'chrome':
            return DriverManager._get_chrome_driver(headless)
        elif browser.lower() == 'firefox':
            return DriverManager._get_firefox_driver(headless)
        else:
            raise ValueError(f"Unsupported browser: {browser}")

    @staticmethod
    def _get_chrome_driver(headless=False):
        """Get Chrome WebDriver"""
        import os
        import glob

        options = ChromeOptions()

        if headless:
            options.add_argument('--headless=new')

        # Common options
        options.add_argument('--no-sandbox')
        options.add_argument('--disable-dev-shm-usage')
        options.add_argument('--disable-gpu')
        options.add_argument('--window-size=1920,1080')
        options.add_argument('--disable-blink-features=AutomationControlled')
        options.add_argument('--ignore-certificate-errors')
        options.add_argument('--ignore-ssl-errors')
        options.add_experimental_option('excludeSwitches', ['enable-logging'])
        options.add_experimental_option('useAutomationExtension', False)

        # Get chromedriver path
        driver_path = ChromeDriverManager().install()

        # Fix for webdriver-manager bug: ensure we get the actual chromedriver binary
        # Check if path contains wrong file (THIRD_PARTY_NOTICES, LICENSE) or doesn't end with 'chromedriver'
        is_wrong_file = 'THIRD_PARTY_NOTICES' in driver_path or 'LICENSE' in driver_path or not driver_path.endswith('chromedriver')

        if is_wrong_file:
            # Get the base directory (up 2 levels from the incorrect path)
            base_dir = os.path.dirname(os.path.dirname(driver_path))

            # Search for chromedriver executable
            found = False
            for root, dirs, files in os.walk(base_dir):
                for file in files:
                    if file == 'chromedriver' and not any(x in file for x in ['THIRD_PARTY', 'LICENSE']):
                        full_path = os.path.join(root, file)
                        if os.access(full_path, os.X_OK):
                            driver_path = full_path
                            found = True
                            break
                if found:
                    break

            if not found:
                raise FileNotFoundError(f"Could not find chromedriver executable in {base_dir}")

        service = ChromeService(driver_path)
        driver = webdriver.Chrome(service=service, options=options)

        # Set timeouts
        driver.implicitly_wait(Config.IMPLICIT_WAIT)
        driver.set_page_load_timeout(Config.PAGE_LOAD_TIMEOUT)

        return driver

    @staticmethod
    def _get_firefox_driver(headless=False):
        """Get Firefox WebDriver"""
        options = FirefoxOptions()

        if headless:
            options.add_argument('--headless')

        # Common options
        options.add_argument('--width=1920')
        options.add_argument('--height=1080')

        service = FirefoxService(GeckoDriverManager().install())
        driver = webdriver.Firefox(service=service, options=options)

        # Set timeouts
        driver.implicitly_wait(Config.IMPLICIT_WAIT)
        driver.set_page_load_timeout(Config.PAGE_LOAD_TIMEOUT)

        return driver
