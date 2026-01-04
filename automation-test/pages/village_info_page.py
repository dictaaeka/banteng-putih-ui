"""
Village Info Page Object - Informasi Desa
"""
import time
import os
from selenium.webdriver.common.by import By
from pages.base_page import BasePage
from config import Config


class VillageInfoPage(BasePage):
    """Village Information page object (Single Record)"""

    # URLs
    VILLAGE_URL = f"{Config.BASE_URL}/admin/villages"

    # Locators - List/Manage View
    TABLE = (By.CSS_SELECTOR, "table.fi-ta-table")
    TABLE_ROWS = (By.CSS_SELECTOR, "tbody tr.fi-ta-row")
    EDIT_BUTTON = (By.CSS_SELECTOR, "a[href*='/edit'], button.fi-ta-action")
    CREATE_BUTTON = (By.CSS_SELECTOR, "a[href*='/create']")

    # Form Fields (Based on VillageResource.php)
    NAME_INPUT = (By.CSS_SELECTOR, "input[id*='name']")
    DESCRIPTION_INPUT = (By.CSS_SELECTOR, "textarea[id*='description']")
    LOGO_INPUT = (By.CSS_SELECTOR, "input[type='file']")
    ADDRESS_INPUT = (By.CSS_SELECTOR, "textarea[id*='address']")
    PHONE_INPUT = (By.CSS_SELECTOR, "input[id*='phone']")
    EMAIL_INPUT = (By.CSS_SELECTOR, "input[id*='email']")
    WEBSITE_INPUT = (By.CSS_SELECTOR, "input[id*='website']")

    # Filament Buttons
    SAVE_BUTTON = (By.XPATH, "//button[@type='submit' and contains(@class, 'fi-btn')]")
    SAVE_BUTTON_ALT = (By.CSS_SELECTOR, "button[type='submit']")

    # Notifications
    SUCCESS_NOTIFICATION = (By.CSS_SELECTOR, ".fi-no-notification-success")

    def __init__(self, driver):
        super().__init__(driver)

    def navigate(self):
        """Navigate to village info page"""
        print(f"Opening village info page: {self.VILLAGE_URL}")
        self.open(self.VILLAGE_URL)
        time.sleep(2)
        self.wait_for_page_load()

    def is_on_village_page(self):
        """Check if on village page"""
        return '/admin/villages' in self.get_current_url()

    def has_village_data(self):
        """Check if village data exists"""
        try:
            rows = self.find_elements(*self.TABLE_ROWS)
            return len(rows) > 0
        except:
            return False

    def click_edit_village(self):
        """Click edit button for village (assuming single record)"""
        print("Opening village edit page...")
        try:
            row = self.find_elements(*self.TABLE_ROWS)[0] if self.has_village_data() else None
            if row:
                edit_btn = row.find_element(By.CSS_SELECTOR, "a[href*='/edit'], button")
                edit_btn.click()
                time.sleep(2)
                return True
        except Exception as e:
            print(f"⚠ Could not click edit: {str(e)}")
        return False

    def click_create_village(self):
        """Click create button (only if no village exists)"""
        if self.is_element_visible(*self.CREATE_BUTTON, timeout=2):
            self.click(*self.CREATE_BUTTON)
            time.sleep(2)
            return True
        return False

    def fill_village_form(self, name, description=None, logo_path=None, address=None,
                          phone=None, email=None, website=None):
        """
        Fill village information form

        Args:
            name (str): Village name (required)
            description (str): Description
            logo_path (str): Path to logo image
            address (str): Full address (required)
            phone (str): Phone number
            email (str): Email
            website (str): Website URL

        Returns:
            bool: Success status
        """
        print(f"Filling village form: {name}")

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

            # 2. Fill description
            if description and self.is_element_visible(*self.DESCRIPTION_INPUT, timeout=2):
                element = self.find_element(*self.DESCRIPTION_INPUT)
                element.clear()
                element.send_keys(description)
                print("✓ Filled description")

            # 3. Upload logo
            if logo_path and self.is_element_visible(*self.LOGO_INPUT, timeout=2):
                element = self.find_element(*self.LOGO_INPUT)
                element.send_keys(logo_path)
                time.sleep(2)
                print(f"✓ Uploaded logo: {os.path.basename(logo_path)}")

            # 4. Fill address - REQUIRED
            if address and self.is_element_visible(*self.ADDRESS_INPUT, timeout=2):
                element = self.find_element(*self.ADDRESS_INPUT)
                element.clear()
                element.send_keys(address)
                print("✓ Filled address")

            # 5. Fill phone
            if phone and self.is_element_visible(*self.PHONE_INPUT, timeout=2):
                element = self.find_element(*self.PHONE_INPUT)
                element.clear()
                element.send_keys(phone)
                print("✓ Filled phone")

            # 6. Fill email
            if email and self.is_element_visible(*self.EMAIL_INPUT, timeout=2):
                element = self.find_element(*self.EMAIL_INPUT)
                element.clear()
                element.send_keys(email)
                print("✓ Filled email")

            # 7. Fill website
            if website and self.is_element_visible(*self.WEBSITE_INPUT, timeout=2):
                element = self.find_element(*self.WEBSITE_INPUT)
                element.clear()
                element.send_keys(website)
                print("✓ Filled website")

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

    def get_current_village_name(self):
        """Get current village name from table"""
        try:
            row = self.find_elements(*self.TABLE_ROWS)[0]
            return row.text.split('\n')[0]  # First line is usually name
        except:
            return ""

    def wait_for_page_load(self):
        """Wait for page to load"""
        time.sleep(1.5)
        self.is_element_visible(*self.TABLE, timeout=10) or \
        self.is_element_visible(*self.CREATE_BUTTON, timeout=10)
