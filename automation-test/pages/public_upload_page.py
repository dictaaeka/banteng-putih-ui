"""
Public Upload Page Object - For creating test submissions
"""
import time
import os
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
from pages.base_page import BasePage
from config import Config


class PublicUploadPage(BasePage):
    """Public upload page object"""

    # URLs
    UPLOAD_URL = f"{Config.BASE_URL}/upload"

    # Form Fields
    NAME_INPUT = (By.ID, "name")
    EMAIL_INPUT = (By.ID, "email")
    PHONE_INPUT = (By.ID, "phone")
    TYPE_SELECT = (By.ID, "type")
    CATEGORY_SELECT = (By.ID, "category")
    TITLE_INPUT = (By.ID, "title")
    DESCRIPTION_INPUT = (By.ID, "description")
    FILE_INPUT = (By.ID, "file")
    TERMS_CHECKBOX = (By.ID, "terms")
    SUBMIT_BUTTON = (By.ID, "submitBtn")

    # Success Message
    SUCCESS_MESSAGE = (By.CSS_SELECTOR, ".bg-green-100")

    def __init__(self, driver):
        super().__init__(driver)

    def navigate(self, type_param=None):
        """Navigate to upload page, optionally with type param"""
        url = self.UPLOAD_URL
        if type_param:
            url += f"?type={type_param}"
        print(f"Opening public upload page: {url}")
        self.open(url)
        time.sleep(2)

    def fill_upload_form(self, name, email, title, file_path, 
                         type_val="photo", category="Kegiatan", 
                         phone=None, description=None):
        """
        Fill public upload form
        """
        print(f"Filling public upload form: {title}")

        try:
            # 1. Personal Info
            self.find_element(*self.NAME_INPUT).send_keys(name)
            self.find_element(*self.EMAIL_INPUT).send_keys(email)
            if phone:
                self.find_element(*self.PHONE_INPUT).send_keys(phone)

            # 2. Content Info
            # Select Type
            type_select = Select(self.find_element(*self.TYPE_SELECT))
            type_select.select_by_value(type_val)
            time.sleep(0.5)

            # Select Category
            cat_select = Select(self.find_element(*self.CATEGORY_SELECT))
            cat_select.select_by_value(category)

            self.find_element(*self.TITLE_INPUT).send_keys(title)
            if description:
                self.find_element(*self.DESCRIPTION_INPUT).send_keys(description)

            # 3. File Upload
            # Use the hidden file input directly
            self.driver.execute_script(
                "document.getElementById('file').classList.remove('hidden');"
            )
            self.find_element(*self.FILE_INPUT).send_keys(file_path)
            time.sleep(1)

            # 4. Terms
            self.find_element(*self.TERMS_CHECKBOX).click()

            return True

        except Exception as e:
            print(f"Error filling upload form: {str(e)}")
            return False

    def submit(self):
        """Submit form"""
        self.click(*self.SUBMIT_BUTTON)
        time.sleep(3)

    def is_success_message_visible(self):
        """Check if success message is shown"""
        return self.is_element_visible(*self.SUCCESS_MESSAGE, timeout=10)
