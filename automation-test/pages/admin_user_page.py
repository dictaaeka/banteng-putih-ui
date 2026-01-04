"""
Admin User Page Object - Admin Desa
"""
import time
from selenium.webdriver.common.by import By
from pages.base_page import BasePage
from config import Config


class AdminUserPage(BasePage):
    """Admin User management page object"""

    # URLs
    ADMIN_URL = f"{Config.BASE_URL}/admin/users"

    # Locators - List View
    TABLE = (By.CSS_SELECTOR, "table.fi-ta-table")
    TABLE_ROWS = (By.CSS_SELECTOR, "tbody tr.fi-ta-row")
    CREATE_BUTTON = (By.CSS_SELECTOR, "a[href*='/create']")
    EDIT_BUTTON = (By.CSS_SELECTOR, "a[href*='/edit']")

    # Form Fields (Based on UserResource.php)
    NAME_INPUT = (By.CSS_SELECTOR, "input[id*='name']")
    EMAIL_INPUT = (By.CSS_SELECTOR, "input[id*='email']")
    PASSWORD_INPUT = (By.CSS_SELECTOR, "input[id*='password']:not([id*='confirmation'])")
    PASSWORD_CONFIRMATION_INPUT = (By.CSS_SELECTOR, "input[id*='password_confirmation']")

    # Filament Buttons
    SAVE_BUTTON = (By.XPATH, "//button[@type='submit' and contains(@class, 'fi-btn')]")
    SAVE_BUTTON_ALT = (By.CSS_SELECTOR, "button[type='submit']")

    # Notifications
    SUCCESS_NOTIFICATION = (By.CSS_SELECTOR, ".fi-no-notification-success")
    ERROR_NOTIFICATION = (By.CSS_SELECTOR, ".fi-no-notification-danger")

    def __init__(self, driver):
        super().__init__(driver)

    def navigate(self):
        """Navigate to admin users page"""
        print(f"Opening admin users page: {self.ADMIN_URL}")
        self.open(self.ADMIN_URL)
        time.sleep(2)
        self.wait_for_page_load()

    def is_on_admin_page(self):
        """Check if on admin page"""
        return '/admin/users' in self.get_current_url()

    def has_admin_user(self):
        """Check if admin user exists"""
        try:
            rows = self.find_elements(*self.TABLE_ROWS)
            return len(rows) > 0
        except:
            return False

    def can_create_admin(self):
        """Check if create button is available"""
        return self.is_element_visible(*self.CREATE_BUTTON, timeout=2)

    def click_create_admin(self):
        """Click create admin button"""
        if self.is_element_visible(*self.CREATE_BUTTON, timeout=2):
            self.click(*self.CREATE_BUTTON)
            time.sleep(2)
            return True
        print("⚠ Create button not available (admin may already exist)")
        return False

    def click_edit_admin(self):
        """Click edit button for admin (assuming single admin)"""
        print("Opening admin edit page...")
        try:
            row = self.find_elements(*self.TABLE_ROWS)[0] if self.has_admin_user() else None
            if row:
                edit_btn = row.find_element(By.CSS_SELECTOR, "a[href*='/edit']")
                edit_btn.click()
                time.sleep(2)
                return True
        except Exception as e:
            print(f"⚠ Could not click edit: {str(e)}")
        return False

    def fill_admin_form(self, name, email, password=None, password_confirmation=None):
        """
        Fill admin user form

        Args:
            name (str): Full name (required)
            email (str): Email (required, unique)
            password (str): Password (required on create, optional on edit)
            password_confirmation (str): Password confirmation

        Returns:
            bool: Success status
        """
        print(f"Filling admin form: {name}")

        try:
            time.sleep(1.5)

            # 1. Fill name - REQUIRED
            if self.is_element_visible(*self.NAME_INPUT, timeout=5):
                element = self.find_element(*self.NAME_INPUT)
                element.clear()
                element.send_keys(name)
                print(f"✓ Filled name: {name}")
            else:
                print("✗ Name input not found")
                return False

            # 2. Fill email - REQUIRED
            if self.is_element_visible(*self.EMAIL_INPUT, timeout=2):
                element = self.find_element(*self.EMAIL_INPUT)
                element.clear()
                element.send_keys(email)
                print(f"✓ Filled email: {email}")

            # 3. Fill password (required on create)
            if password and self.is_element_visible(*self.PASSWORD_INPUT, timeout=2):
                element = self.find_element(*self.PASSWORD_INPUT)
                element.clear()
                element.send_keys(password)
                print("✓ Filled password")

            # 4. Fill password confirmation
            if password_confirmation and self.is_element_visible(*self.PASSWORD_CONFIRMATION_INPUT, timeout=2):
                element = self.find_element(*self.PASSWORD_CONFIRMATION_INPUT)
                element.clear()
                element.send_keys(password_confirmation)
                print("✓ Filled password confirmation")

            return True

        except Exception as e:
            print(f"Error filling form: {str(e)}")
            return False

    def click_save(self):
        """Click save button"""
        print("Clicking save button...")
        save_locators = [self.SAVE_BUTTON, self.SAVE_BUTTON_ALT]
        for locator in save_locators:
            if self.is_element_visible(*locator, timeout=3):
                self.click(*locator)
                time.sleep(3)
                print("✓ Clicked save")
                return True
        print("✗ Save button not found")
        return False

    def get_admin_list(self):
        """Get list of admin users from table"""
        admins = []
        try:
            rows = self.find_elements(*self.TABLE_ROWS)
            for row in rows:
                text_parts = row.text.split('\n')
                if len(text_parts) >= 2:
                    admins.append({
                        'name': text_parts[0],
                        'email': text_parts[1] if '@' in text_parts[1] else ''
                    })
        except:
            pass
        return admins

    def wait_for_page_load(self):
        """Wait for page to load"""
        time.sleep(1.5)
        self.is_element_visible(*self.TABLE, timeout=10) or \
        self.is_element_visible(*self.CREATE_BUTTON, timeout=10)
