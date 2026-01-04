"""
Photo Gallery Page Object - Foto
"""
import time
import os
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from pages.base_page import BasePage
from config import Config


class PhotoGalleryPage(BasePage):
    """Photo Gallery management page object"""

    # URLs
    GALLERY_URL = f"{Config.BASE_URL}/admin/photo-galleries"
    CREATE_URL = f"{Config.BASE_URL}/admin/photo-galleries/create"

    def get_edit_url(self, gallery_id):
        """Get edit URL"""
        return f"{Config.BASE_URL}/admin/photo-galleries/{gallery_id}/edit"

    # Locators - List View
    CREATE_LINK = (By.XPATH, "//a[contains(@href, '/photo-galleries/create')]")
    TABLE = (By.CSS_SELECTOR, "table.fi-ta-table")
    TABLE_ROWS = (By.CSS_SELECTOR, "tbody tr.fi-ta-row")
    SEARCH_INPUT = (By.CSS_SELECTOR, "input[type='search']")

    # Form Fields (Based on PhotoGalleryResource.php)
    TITLE_INPUT = (By.CSS_SELECTOR, "input[id*='title']")
    CATEGORY_SELECT = (By.CSS_SELECTOR, "button[id*='category']")
    DESCRIPTION_EDITOR = (By.CSS_SELECTOR, "trix-editor[id*='description']")
    IMAGE_INPUT = (By.CSS_SELECTOR, "input[type='file']")

    # Buttons
    SAVE_BUTTON = (By.XPATH, "//button[@type='submit' and contains(@class, 'fi-btn')]")
    DELETE_BUTTON = (By.XPATH, "//button[contains(@wire:click, \"mountAction('delete')\")]")
    CONFIRM_DELETE_BUTTON = (By.XPATH, "//button[@type='submit' and contains(@class, 'fi-color-danger')]")

    # Notifications
    SUCCESS_NOTIFICATION = (By.CSS_SELECTOR, ".fi-no-notification-success")

    def __init__(self, driver):
        super().__init__(driver)

    def navigate(self):
        """Navigate to photo gallery page"""
        print(f"Opening photo gallery page: {self.GALLERY_URL}")
        self.open(self.GALLERY_URL)
        time.sleep(2)
        self.wait_for_page_load()

    def is_on_gallery_page(self):
        """Check if on gallery page"""
        return '/admin/photo-galleries' in self.get_current_url()

    def click_create_button(self):
        """Click create button"""
        print("Opening create photo gallery page...")
        if self.is_element_visible(*self.CREATE_LINK, timeout=2):
            self.click(*self.CREATE_LINK)
            time.sleep(1.5)
            return True
        self.open(self.CREATE_URL)
        time.sleep(2)
        return True

    def fill_gallery_form(self, title, category=None, description=None, image_path=None):
        """
        Fill photo gallery form

        Args:
            title (str): Photo title (required)
            category (str): Kegiatan, Infrastruktur, Alam, Budaya
            description (str): Description
            image_path (str): Path to image file (required)

        Returns:
            bool: Success status
        """
        print(f"Filling photo gallery form: {title}")

        try:
            time.sleep(1.5)

            # 1. Fill title
            if self.is_element_visible(*self.TITLE_INPUT, timeout=5):
                element = self.find_element(*self.TITLE_INPUT)
                element.clear()
                element.send_keys(title)
                print(f"✓ Filled title: {title}")
            else:
                print("✗ Title input not found")
                return False

            # 2. Select category
            if category:
                try:
                    button = self.driver.find_element(By.CSS_SELECTOR, "button[id*='category']")
                    button.click()
                    time.sleep(0.5)
                    option = self.driver.find_element(By.XPATH, f"//li[contains(., '{category}')]")
                    option.click()
                    time.sleep(0.3)
                    print(f"✓ Selected category: {category}")
                except:
                    print(f"⚠ Could not select category")

            # 3. Fill description
            if description and self.is_element_visible(*self.DESCRIPTION_EDITOR, timeout=2):
                element = self.find_element(*self.DESCRIPTION_EDITOR)
                element.click()
                time.sleep(0.3)
                element.send_keys(description)
                print("✓ Filled description")

            # 4. Upload image
            if image_path:
                file_input = self.find_element(*self.IMAGE_INPUT)
                file_input.send_keys(image_path)
                time.sleep(3)
                print(f"✓ Uploaded image: {os.path.basename(image_path)}")

            return True

        except Exception as e:
            print(f"Error filling form: {str(e)}")
            return False

    def click_save(self):
        """Click save button"""
        if self.is_element_visible(*self.SAVE_BUTTON, timeout=3):
            self.click(*self.SAVE_BUTTON)
            time.sleep(3)
            print("✓ Clicked save")
            return True
        return False

    def get_table_rows(self):
        """Get table rows"""
        try:
            return self.find_elements(*self.TABLE_ROWS)
        except:
            return []

    def find_photo_in_table(self, title):
        """Find photo by title"""
        rows = self.get_table_rows()
        for row in rows:
            if title.lower() in row.text.lower():
                return row
        return None

    def click_edit_for_photo(self, title):
        """Click edit for photo"""
        row = self.find_photo_in_table(title)
        if row:
            try:
                edit_link = row.find_element(By.CSS_SELECTOR, "a[href*='/edit']")
                edit_link.click()
                time.sleep(2)
                return True
            except:
                pass
        return False

    def click_delete_in_edit(self):
        """Click delete in edit page"""
        try:
            if self.is_element_visible(*self.DELETE_BUTTON, timeout=3):
                self.click(*self.DELETE_BUTTON)
                time.sleep(1)
                return True
        except:
            pass
        return False

    def confirm_delete(self):
        """Confirm delete"""
        try:
            if self.is_element_visible(*self.CONFIRM_DELETE_BUTTON, timeout=3):
                self.click(*self.CONFIRM_DELETE_BUTTON)
                time.sleep(2)
                return True
        except:
            pass
        return False

    def wait_for_page_load(self):
        """Wait for page load"""
        time.sleep(1.5)
        self.is_element_visible(*self.TABLE, timeout=10)
