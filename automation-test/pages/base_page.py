"""
Base Page Object class
"""
import time
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from utils.helpers import Helpers
from config import Config


class BasePage:
    """Base class for all page objects"""

    def __init__(self, driver):
        self.driver = driver
        self.config = Config
        self.helpers = Helpers

    def open(self, url):
        """Open URL"""
        # Check if url is already a full URL (starts with http:// or https://)
        if url.startswith('http://') or url.startswith('https://'):
            full_url = url
        else:
            full_url = f"{self.config.APP_URL}{url}"
        print(f"Opening URL: {full_url}")
        self.driver.get(full_url)
        self.helpers.wait_for_page_load(self.driver)

    def find_element(self, by, value):
        """Find element"""
        return self.driver.find_element(by, value)

    def find_elements(self, by, value):
        """Find multiple elements"""
        return self.driver.find_elements(by, value)

    def click(self, by, value):
        """Click element"""
        element = self.helpers.wait_for_clickable(self.driver, by, value)
        if element:
            self.helpers.safe_click(self.driver, element)
            return True
        return False

    def type_text(self, by, value, text):
        """Type text into input field"""
        element = self.helpers.wait_for_element(self.driver, by, value)
        if element:
            element.clear()
            element.send_keys(text)
            return True
        return False

    def get_text(self, by, value):
        """Get element text"""
        element = self.helpers.wait_for_element(self.driver, by, value)
        return element.text if element else ""

    def is_element_visible(self, by, value, timeout=5):
        """Check if element is visible"""
        try:
            WebDriverWait(self.driver, timeout).until(
                EC.visibility_of_element_located((by, value))
            )
            return True
        except:
            return False

    def wait_for_url(self, url_part, timeout=None):
        """Wait for URL to contain specific text"""
        return self.helpers.wait_for_url_contains(self.driver, url_part, timeout)

    def take_screenshot(self, name):
        """Take screenshot"""
        return self.helpers.take_screenshot(self.driver, name)

    def get_current_url(self):
        """Get current URL"""
        return self.driver.current_url

    def get_page_title(self):
        """Get page title"""
        return self.driver.title
