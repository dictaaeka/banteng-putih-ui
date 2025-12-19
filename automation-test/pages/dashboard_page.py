"""
Dashboard Page Object
"""
from selenium.webdriver.common.by import By
from pages.base_page import BasePage
from config import Config
import time


class DashboardPage(BasePage):
    """Dashboard/Admin page object"""

    # Locators
    USER_MENU = (By.CSS_SELECTOR, "button[data-dropdown-toggle], .user-menu, button[aria-label*='user' i], button[aria-label*='profile' i]")
    LOGOUT_FORM = (By.CSS_SELECTOR, "form[action*='/admin/logout']")
    LOGOUT_BUTTON = (By.CSS_SELECTOR, "form[action*='/admin/logout'] button[type='submit'], button:has-text('Sign out'), button:has-text('Keluar')")
    LOGOUT_BUTTON_ALT = (By.XPATH, "//form[contains(@action, '/admin/logout')]//button[@type='submit']")
    DASHBOARD_TITLE = (By.CSS_SELECTOR, "h1, h2.text-2xl")
    SIDEBAR_MENU = (By.CSS_SELECTOR, ".sidebar, nav")

    # Menu items
    MENU_DASHBOARD = (By.LINK_TEXT, "Dashboard")
    MENU_NEWS = (By.LINK_TEXT, "Berita")
    MENU_GALLERY = (By.LINK_TEXT, "Galeri")
    MENU_PRODUCTS = (By.LINK_TEXT, "Produk")
    MENU_DOCUMENTS = (By.LINK_TEXT, "Dokumen")
    MENU_SUBMISSIONS = (By.LINK_TEXT, "Kiriman")
    MENU_VILLAGE_INFO = (By.LINK_TEXT, "Informasi Desa")
    MENU_ADMINS = (By.LINK_TEXT, "Admin")

    def __init__(self, driver):
        super().__init__(driver)

    def is_on_dashboard(self):
        """Check if on dashboard page"""
        return '/admin' in self.get_current_url() or '/dashboard' in self.get_current_url()

    def get_dashboard_title(self):
        """Get dashboard title"""
        return self.get_text(*self.DASHBOARD_TITLE)

    def logout(self):
        """
        Perform logout

        Returns:
            bool: Success status
        """
        print("Logging out...")

        try:
            # First, try to find the user menu button and click it to show dropdown
            print("Looking for user menu...")
            user_menu_locators = [
                (By.CSS_SELECTOR, "button[aria-label*='user' i]"),
                (By.CSS_SELECTOR, "button[aria-label*='profile' i]"),
                (By.CSS_SELECTOR, "button[data-dropdown-toggle]"),
                (By.XPATH, "//button[contains(@class, 'fi-user-menu-trigger')]"),
            ]

            menu_clicked = False
            for locator in user_menu_locators:
                if self.is_element_visible(*locator, timeout=2):
                    print(f"Found user menu with locator: {locator}")
                    self.click(*locator)
                    menu_clicked = True
                    time.sleep(1.5)  # Wait for dropdown to appear
                    break

            if not menu_clicked:
                print("User menu not found, trying direct logout button...")

            # Now find and click the logout button in the form
            print("Looking for logout button...")
            logout_locators = [
                (By.XPATH, "//form[contains(@action, '/admin/logout')]//button[@type='submit']"),
                (By.CSS_SELECTOR, "form[action*='/admin/logout'] button[type='submit']"),
                (By.XPATH, "//button[contains(., 'Sign out')]"),
                (By.XPATH, "//button[contains(., 'Keluar')]"),
            ]

            logout_clicked = False
            for locator in logout_locators:
                if self.is_element_visible(*locator, timeout=3):
                    print(f"Found logout button with locator: {locator}")
                    # Scroll to element before clicking
                    element = self.find_element(*locator)
                    self.driver.execute_script("arguments[0].scrollIntoView(true);", element)
                    time.sleep(0.5)
                    self.click(*locator)
                    logout_clicked = True
                    time.sleep(2)  # Wait for logout to complete
                    break

            if not logout_clicked:
                print("Logout button not found, trying direct URL...")
                # Fallback: navigate to logout URL directly (though this may not work with POST)
                self.open(Config.LOGOUT_URL)
                time.sleep(2)

            # Check if redirected to login page
            current_url = self.get_current_url()
            is_logged_out = '/admin/login' in current_url or '/login' in current_url

            if is_logged_out:
                print("✓ Logout successful")
            else:
                print(f"✗ Logout may have failed. Current URL: {current_url}")

            return is_logged_out

        except Exception as e:
            print(f"Error during logout: {str(e)}")
            return False

    def navigate_to_news(self):
        """Navigate to news management"""
        return self.click(*self.MENU_NEWS)

    def navigate_to_gallery(self):
        """Navigate to gallery management"""
        return self.click(*self.MENU_GALLERY)

    def navigate_to_products(self):
        """Navigate to products management"""
        return self.click(*self.MENU_PRODUCTS)

    def navigate_to_documents(self):
        """Navigate to documents management"""
        return self.click(*self.MENU_DOCUMENTS)

    def navigate_to_submissions(self):
        """Navigate to submissions management"""
        return self.click(*self.MENU_SUBMISSIONS)

    def navigate_to_village_info(self):
        """Navigate to village information"""
        return self.click(*self.MENU_VILLAGE_INFO)

    def navigate_to_admins(self):
        """Navigate to admin management"""
        return self.click(*self.MENU_ADMINS)
