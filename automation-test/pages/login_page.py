"""
Login Page Object
"""
from selenium.webdriver.common.by import By
from pages.base_page import BasePage
from config import Config
import time


class LoginPage(BasePage):
    """Login page object"""

    # Locators
    EMAIL_INPUT = (By.ID, "data.email")
    PASSWORD_INPUT = (By.ID, "data.password")
    REMEMBER_CHECKBOX = (By.ID, "data.remember")
    LOGIN_BUTTON = (By.CSS_SELECTOR, "button[type='submit']")
    ERROR_MESSAGE = (By.CSS_SELECTOR, ".text-red-600, .alert-danger")
    FORGOT_PASSWORD_LINK = (By.LINK_TEXT, "Lupa Password?")

    def __init__(self, driver):
        super().__init__(driver)

    def navigate(self):
        """Navigate to login page"""
        self.open(Config.LOGIN_URL)
        time.sleep(1)

    def enter_email(self, email):
        """Enter email"""
        return self.type_text(*self.EMAIL_INPUT, email)

    def enter_password(self, password):
        """Enter password"""
        return self.type_text(*self.PASSWORD_INPUT, password)

    def check_remember_me(self):
        """Check remember me checkbox"""
        return self.click(*self.REMEMBER_CHECKBOX)

    def click_login(self):
        """Click login button"""
        return self.click(*self.LOGIN_BUTTON)

    def login(self, email, password, remember=False):
        """
        Perform login

        Args:
            email (str): Email address
            password (str): Password
            remember (bool): Check remember me

        Returns:
            bool: Success status
        """
        print(f"Logging in as: {email}")
        self.navigate()

        if not self.enter_email(email):
            return False

        if not self.enter_password(password):
            return False

        if remember:
            self.check_remember_me()

        self.click_login()
        time.sleep(2)

        # Check if login successful by checking URL
        return not self.get_current_url().endswith('/admin/login')

    def get_error_message(self):
        """Get login error message"""
        return self.get_text(*self.ERROR_MESSAGE)

    def is_on_login_page(self):
        """Check if on login page"""
        return '/admin/login' in self.get_current_url()
