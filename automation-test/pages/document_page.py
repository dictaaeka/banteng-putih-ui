"""
Document Page Object
"""
import time
import os
import requests
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from pages.base_page import BasePage
from config import Config


class DocumentPage(BasePage):
    """Document management page object"""

    # URLs
    DOCUMENTS_URL = f"{Config.BASE_URL}/admin/documents"
    CREATE_URL = f"{Config.BASE_URL}/admin/documents/create"

    def get_edit_url(self, document_id):
        """Get edit URL for document"""
        return f"{Config.BASE_URL}/admin/documents/{document_id}/edit"

    def get_preview_url(self, document_id):
        """Get preview URL for document"""
        return f"{Config.BASE_URL}/documents/{document_id}/preview"

    def get_download_url(self, document_id):
        """Get download URL for document"""
        return f"{Config.BASE_URL}/documents/{document_id}/download"

    def get_delete_url(self, document_id):
        """Get delete URL for document"""
        return f"{Config.BASE_URL}/documents/{document_id}/delete"

    # Locators - List View (Filament Table)
    CREATE_BUTTON = (By.CSS_SELECTOR, "a[href*='/documents/create'], button.fi-btn:has-text('New')")
    CREATE_LINK = (By.XPATH, "//a[contains(@href, '/documents/create')]")
    TABLE = (By.CSS_SELECTOR, "table.fi-ta-table, .fi-ta-content table")
    TABLE_ROWS = (By.CSS_SELECTOR, "tbody tr.fi-ta-row, tr[wire\\:key*='table.records']")
    SEARCH_INPUT = (By.CSS_SELECTOR, "input[type='search'][wire\\:model*='tableSearch'], input[placeholder*='Search'].fi-input")

    # Locators - Form (Filament Form Fields based on DocumentResource.php)
    # Filament uses data.fieldname format for IDs
    TITLE_INPUT = (By.CSS_SELECTOR, "input[id*='title'], input[wire\\:model*='title']")
    CATEGORY_SELECT = (By.CSS_SELECTOR, "select[id*='category'], select[wire\\:model*='category']")
    TYPE_SELECT = (By.CSS_SELECTOR, "select[id*='type'], select[wire\\:model*='type']")
    # RichEditor - Filament uses Trix Editor
    DESCRIPTION_EDITOR = (By.CSS_SELECTOR, "trix-editor[id*='description']")
    DESCRIPTION_EDITOR_ALT = (By.CSS_SELECTOR, "trix-editor.fi-fo-rich-editor-editor")
    DESCRIPTION_EDITOR_ALT2 = (By.XPATH, "//trix-editor[@contenteditable='true']")
    FILE_INPUT = (By.CSS_SELECTOR, "input[type='file'][id*='file'], input[type='file'][wire\\:model*='file']")
    UPLOADED_AT_INPUT = (By.CSS_SELECTOR, "input[id*='uploaded_at'], input[wire\\:model*='uploaded_at']")

    # Filament Buttons - More flexible locators
    SAVE_BUTTON = (By.XPATH, "//button[@type='submit' and contains(@class, 'fi-btn')]")
    SAVE_BUTTON_ALT = (By.CSS_SELECTOR, "button[type='submit']")
    SAVE_BUTTON_ALT2 = (By.XPATH, "//button[contains(text(), 'Create') or contains(text(), 'Save') or contains(text(), 'Buat') or contains(text(), 'Simpan')]")
    CANCEL_BUTTON = (By.CSS_SELECTOR, "a[href*='/documents'].fi-btn, button.fi-btn:has-text('Cancel')")

    # Filament Table Actions
    ACTIONS_BUTTON = (By.CSS_SELECTOR, "button.fi-ta-actions-trigger, button[aria-label*='Actions']")
    EDIT_LINK = (By.CSS_SELECTOR, "a[href*='/edit'].fi-link, a.fi-ta-action:has-text('Edit')")
    VIEW_LINK = (By.CSS_SELECTOR, "a[href*='/preview'].fi-link")
    DOWNLOAD_LINK = (By.CSS_SELECTOR, "a[href*='/download'].fi-link")
    DELETE_BUTTON = (By.CSS_SELECTOR, "button.fi-link.fi-ac-link-action[wire\\:click*=\"mountTableAction('delete'\"]")
    CONFIRM_DELETE_BUTTON = (By.CSS_SELECTOR, "button[type='submit'].fi-btn-color-danger, button.fi-btn.fi-color-danger:has-text('Confirm')")

    # Filament Notifications
    SUCCESS_NOTIFICATION = (By.CSS_SELECTOR, ".fi-no-notification-success, [role='alert'].fi-no")
    ERROR_NOTIFICATION = (By.CSS_SELECTOR, ".fi-no-notification-danger, [role='alert'].fi-no-danger")

    def __init__(self, driver):
        super().__init__(driver)

    def upload_file_to_curator(self, file_path):
        """
        Upload file using Filament file upload

        Args:
            file_path (str): Absolute path to file

        Returns:
            bool: Success status
        """
        print(f"Uploading file: {os.path.basename(file_path)}")

        try:
            # Step 1: Find the file input - try multiple locators
            file_input_locators = [
                (By.CSS_SELECTOR, "input[type='file']"),  # Most generic
                (By.CSS_SELECTOR, "input[wire\\:model*='file']"),
                (By.CSS_SELECTOR, "input[id*='file']"),
                (By.XPATH, "//input[@type='file']"),
            ]

            file_input = None
            for locator in file_input_locators:
                try:
                    elements = self.find_elements(*locator)
                    for elem in elements:
                        # Check if element is interactable (even if hidden)
                        try:
                            file_input = elem
                            break
                        except:
                            continue
                    if file_input:
                        break
                except:
                    continue

            if not file_input:
                print("✗ File input not found")
                return False

            # Step 2: Upload the file directly (works even for hidden inputs)
            file_input.send_keys(file_path)
            print(f"✓ File sent to input: {os.path.basename(file_path)}")

            # Step 3: Wait for upload to process
            time.sleep(4)  # Give Livewire/Filament time to upload

            print("✓ File upload completed")
            return True

        except Exception as e:
            print(f"✗ Error uploading file: {str(e)}")
            return False

    def navigate(self):
        """Navigate to documents page"""
        print(f"Opening documents page: {self.DOCUMENTS_URL}")
        self.open(self.DOCUMENTS_URL)
        time.sleep(2)
        self.wait_for_page_load()

    def is_on_documents_page(self):
        """Check if on documents page"""
        return '/admin/documents' in self.get_current_url()

    def click_create_button(self):
        """Click create new document button or navigate to create URL"""
        print("Opening create document page...")

        # Try clicking button first
        locators = [self.CREATE_LINK, self.CREATE_BUTTON]
        for locator in locators:
            if self.is_element_visible(*locator, timeout=2):
                self.click(*locator)
                time.sleep(1.5)
                return True

        # Fallback: navigate directly to create URL
        print(f"Navigating directly to: {self.CREATE_URL}")
        self.open(self.CREATE_URL)
        time.sleep(2)
        return True

    def fill_document_form(self, title, category=None, doc_type=None, description=None, file_path=None, uploaded_at=None):
        """
        Fill document form based on DocumentResource.php

        Args:
            title (str): Document title (required, max 255)
            category (str): Document category (required) - "Produk Hukum" atau "Layanan Informasi"
            doc_type (str): Document type (required) - "Peraturan Desa", "Keputusan Kepala Desa", "Program & Kegiatan", "Laporan"
            description (str): Document description (RichEditor)
            file_path (str): Path to file to upload (required) - PDF, DOC, DOCX, XLS, XLSX, max 10MB
            uploaded_at (str): Upload date (default: today)

        Returns:
            bool: Success status
        """
        print(f"Filling document form: {title}")

        try:
            # Wait for form to load
            time.sleep(1.5)

            # 1. Fill title - REQUIRED
            if self.is_element_visible(*self.TITLE_INPUT, timeout=5):
                element = self.find_element(*self.TITLE_INPUT)
                element.clear()
                element.send_keys(title)
                print(f"✓ Filled title: {title}")
            else:
                print("✗ Title input not found")
                return False

            # 2. Select category - REQUIRED
            if category:
                if self.is_element_visible(*self.CATEGORY_SELECT, timeout=3):
                    element = self.find_element(*self.CATEGORY_SELECT)
                    element.send_keys(category)
                    time.sleep(0.5)
                    print(f"✓ Selected category: {category}")
                else:
                    print("⚠ Category select not found")

            # 3. Select type - REQUIRED
            if doc_type:
                if self.is_element_visible(*self.TYPE_SELECT, timeout=3):
                    element = self.find_element(*self.TYPE_SELECT)
                    element.send_keys(doc_type)
                    time.sleep(0.5)
                    print(f"✓ Selected type: {doc_type}")
                else:
                    print("⚠ Type select not found")

            # 4. Fill description - RichEditor (optional)
            if description:
                # Try multiple locators for RichEditor
                description_locators = [
                    self.DESCRIPTION_EDITOR,
                    self.DESCRIPTION_EDITOR_ALT,
                    self.DESCRIPTION_EDITOR_ALT2
                ]

                description_filled = False
                for locator in description_locators:
                    if self.is_element_visible(*locator, timeout=2):
                        element = self.find_element(*locator)
                        element.click()
                        time.sleep(0.3)
                        element.send_keys(description)
                        print(f"✓ Filled description")
                        description_filled = True
                        break

                if not description_filled:
                    print("⚠ Description editor not found (all locators failed)")

            # 5. Upload file - REQUIRED
            if file_path:
                print(f"Uploading file: {file_path}")
                # Use Filament file upload
                if self.upload_file_to_curator(file_path):
                    print("✓ File uploaded")
                else:
                    print("⚠ File upload may have issues")

            # 6. Set uploaded_at date (optional, has default)
            if uploaded_at:
                if self.is_element_visible(*self.UPLOADED_AT_INPUT, timeout=3):
                    element = self.find_element(*self.UPLOADED_AT_INPUT)
                    element.clear()
                    element.send_keys(uploaded_at)
                    time.sleep(0.3)
                    print(f"✓ Set upload date: {uploaded_at}")

            return True

        except Exception as e:
            print(f"Error filling form: {str(e)}")
            return False

    def click_save(self):
        """Click save button"""
        print("Clicking save button...")

        # Try Filament save button locators
        save_locators = [self.SAVE_BUTTON, self.SAVE_BUTTON_ALT, self.SAVE_BUTTON_ALT2]
        for locator in save_locators:
            if self.is_element_visible(*locator, timeout=3):
                self.click(*locator)
                time.sleep(3)
                print("✓ Clicked save")
                return True

        print("✗ Save button not found")
        return False

    def search_document(self, search_term):
        """Search for document"""
        print(f"Searching for: {search_term}")
        if self.is_element_visible(*self.SEARCH_INPUT, timeout=3):
            element = self.find_element(*self.SEARCH_INPUT)
            element.clear()
            element.send_keys(search_term)
            element.send_keys(Keys.RETURN)
            time.sleep(2)
            return True
        return False

    def get_table_rows(self):
        """Get all table rows"""
        try:
            rows = self.find_elements(*self.TABLE_ROWS)
            return rows
        except:
            return []

    def find_document_in_table(self, title):
        """
        Find document by title in table

        Args:
            title (str): Document title to find

        Returns:
            WebElement or None: Table row element
        """
        print(f"Looking for document: {title}")
        rows = self.get_table_rows()

        for row in rows:
            if title.lower() in row.text.lower():
                print(f"Found document: {title}")
                return row

        print(f"Document not found: {title}")
        return None

    def click_edit_for_document(self, title):
        """Click edit button/link for specific document"""
        print(f"Editing document: {title}")
        row = self.find_document_in_table(title)

        if row:
            try:
                # Try to find Filament edit link within the row
                edit_link = row.find_element(By.CSS_SELECTOR, "a[href*='/edit']")
                edit_link.click()
                time.sleep(2)
                print("✓ Clicked edit link")
                return True
            except:
                try:
                    # Fallback: try button
                    edit_button = row.find_element(By.XPATH, ".//button[contains(., 'Edit')]")
                    edit_button.click()
                    time.sleep(2)
                    print("✓ Clicked edit button")
                    return True
                except Exception as e:
                    print(f"✗ Edit action not found: {str(e)}")

        return False

    def click_delete_for_document(self, title):
        """Click delete button for specific document"""
        print(f"Deleting document: {title}")
        row = self.find_document_in_table(title)

        if row:
            try:
                # Find Filament delete button (usually with wire:click)
                delete_button = row.find_element(By.CSS_SELECTOR, "button[wire\\:click*=\"mountTableAction('delete'\"]")
                delete_button.click()
                time.sleep(1.5)
                print("✓ Clicked delete button")

                # Confirm deletion in modal
                if self.is_element_visible(*self.CONFIRM_DELETE_BUTTON, timeout=3):
                    self.click(*self.CONFIRM_DELETE_BUTTON)
                    time.sleep(2)
                    print("✓ Confirmed deletion")
                    return True
            except Exception as e:
                print(f"✗ Error deleting: {str(e)}")

        return False

    def click_view_for_document(self, title):
        """Click view/preview link for specific document"""
        print(f"Viewing document: {title}")
        row = self.find_document_in_table(title)

        if row:
            try:
                # Find preview link
                view_link = row.find_element(By.CSS_SELECTOR, "a[href*='/preview']")
                view_link.click()
                time.sleep(2)
                print("✓ Opened preview")
                return True
            except Exception as e:
                print(f"✗ View link not found: {str(e)}")

        return False

    def click_download_for_document(self, title):
        """Click download link for specific document"""
        print(f"Downloading document: {title}")
        row = self.find_document_in_table(title)

        if row:
            try:
                download_link = row.find_element(By.CSS_SELECTOR, "a[href*='/download']")
                download_link.click()
                time.sleep(2)
                print("✓ Download initiated")
                return True
            except Exception as e:
                print(f"✗ Download link not found: {str(e)}")

        return False

    def get_success_message(self):
        """Get Filament success notification message"""
        if self.is_element_visible(*self.SUCCESS_NOTIFICATION, timeout=3):
            return self.get_text(*self.SUCCESS_NOTIFICATION)
        return ""

    def get_error_message(self):
        """Get Filament error notification message"""
        if self.is_element_visible(*self.ERROR_NOTIFICATION, timeout=3):
            return self.get_text(*self.ERROR_NOTIFICATION)
        return ""

    def wait_for_page_load(self):
        """Wait for Filament page to load completely"""
        time.sleep(1.5)
        # Wait for Filament table or create button to be visible
        self.is_element_visible(*self.TABLE, timeout=10) or \
        self.is_element_visible(*self.CREATE_LINK, timeout=10)
