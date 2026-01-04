"""
Helper utilities for test automation
"""
import time
from datetime import datetime
from pathlib import Path
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
from selenium.common.exceptions import TimeoutException, NoSuchElementException
from config import Config


class Helpers:
    """Helper methods for Selenium tests"""

    @staticmethod
    def take_screenshot(driver, name):
        """
        Take screenshot and save to file

        Args:
            driver: WebDriver instance
            name (str): Screenshot name
        """
        timestamp = datetime.now().strftime('%Y%m%d_%H%M%S')
        filename = f"{name}_{timestamp}.png"
        filepath = Config.SCREENSHOT_DIR / filename
        driver.save_screenshot(str(filepath))
        print(f"Screenshot saved: {filepath}")
        return str(filepath)

    @staticmethod
    def wait_for_element(driver, by, value, timeout=None):
        """
        Wait for element to be visible

        Args:
            driver: WebDriver instance
            by: Selenium By locator
            value: Locator value
            timeout: Wait timeout (default from config)

        Returns:
            WebElement or None
        """
        timeout = timeout or Config.EXPLICIT_WAIT
        try:
            element = WebDriverWait(driver, timeout).until(
                EC.presence_of_element_located((by, value))
            )
            return element
        except TimeoutException:
            print(f"Element not found: {by}={value}")
            return None

    @staticmethod
    def wait_for_clickable(driver, by, value, timeout=None):
        """
        Wait for element to be clickable

        Args:
            driver: WebDriver instance
            by: Selenium By locator
            value: Locator value
            timeout: Wait timeout

        Returns:
            WebElement or None
        """
        timeout = timeout or Config.EXPLICIT_WAIT
        try:
            element = WebDriverWait(driver, timeout).until(
                EC.element_to_be_clickable((by, value))
            )
            return element
        except TimeoutException:
            print(f"Element not clickable: {by}={value}")
            return None

    @staticmethod
    def wait_for_url_contains(driver, text, timeout=None):
        """Wait for URL to contain specific text"""
        timeout = timeout or Config.EXPLICIT_WAIT
        try:
            WebDriverWait(driver, timeout).until(
                EC.url_contains(text)
            )
            return True
        except TimeoutException:
            print(f"URL does not contain: {text}")
            return False

    @staticmethod
    def scroll_to_element(driver, element):
        """Scroll to element"""
        driver.execute_script("arguments[0].scrollIntoView(true);", element)
        time.sleep(0.5)

    @staticmethod
    def safe_click(driver, element):
        """Safely click element with retry"""
        try:
            element.click()
        except Exception as e:
            print(f"Normal click failed, trying JavaScript click: {e}")
            driver.execute_script("arguments[0].click();", element)

    @staticmethod
    def wait_for_page_load(driver, timeout=None):
        """Wait for page to fully load"""
        timeout = timeout or Config.PAGE_LOAD_TIMEOUT
        WebDriverWait(driver, timeout).until(
            lambda d: d.execute_script('return document.readyState') == 'complete'
        )
