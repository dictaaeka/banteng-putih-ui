"""
News Page Object - Berita Desa
"""
import time
import os
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from pages.base_page import BasePage
from config import Config


class NewsPage(BasePage):
    """News management page object"""

    # URLs
    NEWS_URL = f"{Config.BASE_URL}/admin/news"
    CREATE_URL = f"{Config.BASE_URL}/admin/news/create"

    # Locators - List View
    CREATE_LINK = (By.XPATH, "//a[contains(@href, '/news/create')]")
    TABLE = (By.CSS_SELECTOR, "table.fi-ta-table")
    TABLE_ROWS = (By.CSS_SELECTOR, "tbody tr.fi-ta-row")
    SEARCH_INPUT = (By.CSS_SELECTOR, "input[type='search']")

    # Form Fields
    TITLE_INPUT = (By.CSS_SELECTOR, "input[id*='title']")
    
    # Filament Select - Updated Strategy
    # We look for the select trigger button or the wrapper
    CATEGORY_SELECT_TRIGGER = (By.XPATH, "//label[contains(text(), 'Kategori')]/ancestor::div[contains(@class, 'fi-fo-field-wrp')]//button")
    
    # CORRECTED: excerpt is TextInput, not textarea
    EXCERPT_INPUT = (By.CSS_SELECTOR, "input[id*='excerpt']")
    CONTENT_EDITOR = (By.CSS_SELECTOR, "div.trix-content")
    IMAGE_INPUT = (By.CSS_SELECTOR, "input[type='file']")

    # Buttons
    SAVE_BUTTON = (By.XPATH, "//button[@type='submit' and contains(@class, 'fi-btn')]")
    DELETE_BUTTON = (By.XPATH, "//button[contains(@wire:click, \"mountAction('delete')\")]")

    # Notifications
    SUCCESS_NOTIFICATION = (By.CSS_SELECTOR, ".fi-no-notification-success")

    def __init__(self, driver):
        super().__init__(driver)

    def navigate(self):
        """Navigate to news page"""
        print(f"Opening news page: {self.NEWS_URL}")
        self.open(self.NEWS_URL)
        time.sleep(2)
        self.wait_for_page_load()

    def click_create_button(self):
        """Click create button"""
        print("Opening create news page...")
        if self.is_element_visible(*self.CREATE_LINK, timeout=2):
            self.click(*self.CREATE_LINK)
            time.sleep(1.5)
            return True
        self.open(self.CREATE_URL)
        time.sleep(2)
        return True

    def fill_news_form(self, title, category=None, excerpt=None, content=None, image_path=None):
        """Fill news form"""
        print(f"Filling news form: {title}")

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

            # 2. Select category (Filament Select) - Try multiple approaches
            if category:
                try:
                    # Try multiple locators for category
                    category_locators = [
                        (By.CSS_SELECTOR, "select[id*='category']"),
                        (By.CSS_SELECTOR, "select[wire\\:model*='category']"),
                        (By.XPATH, "//label[contains(text(), 'Kategori')]/following-sibling::div//select"),
                        (By.XPATH, "//label[contains(text(), 'Kategori')]/ancestor::div[contains(@class, 'fi-fo-field-wrp')]//button"),
                    ]
                    
                    category_set = False
                    for locator in category_locators:
                        try:
                            element = self.driver.find_element(*locator)
                            
                            # If it's a select element
                            if element.tag_name == 'select':
                                from selenium.webdriver.support.ui import Select
                                select = Select(element)
                                select.select_by_visible_text(category)
                                category_set = True
                                print(f"✓ Selected category: {category}")
                                break
                            # If it's a Filament button trigger
                            elif element.tag_name == 'button':
                                element.click()
                                time.sleep(0.5)
                                option_xpath = f"//div[contains(@class, 'fi-dropdown-panel')]//span[contains(text(), '{category}')]"
                                option = self.driver.find_element(By.XPATH, option_xpath)
                                option.click()
                                time.sleep(0.5)
                                category_set = True
                                print(f"✓ Selected category: {category}")
                                break
                        except:
                            continue
                    
                    if not category_set:
                        print(f"⚠ Category field not found, continuing without it")
                        
                except Exception as e:
                    print(f"⚠ Could not select category: {str(e)}")

            # 3. Fill excerpt (IMPORTANT: Usually required!)
            if excerpt:
                if self.is_element_visible(*self.EXCERPT_INPUT, timeout=2):
                    element = self.find_element(*self.EXCERPT_INPUT)
                    element.clear()
                    element.send_keys(excerpt)
                    print("✓ Filled excerpt")
                else:
                    print("⚠ Excerpt field not found")
            else:
                print("⚠ No excerpt provided (may be required)")

            # 4. Fill content (Trix Editor)
            if content:
                try:
                    # Trix editor usually has a contenteditable div
                    editor = self.driver.find_element(By.TAG_NAME, "trix-editor")
                    editor.click()
                    time.sleep(0.3)
                    editor.send_keys(content)
                    print("✓ Filled content")
                except Exception as e:
                    print(f"⚠ Could not fill content: {str(e)}")

            # 5. Upload image
            if image_path:
                try:
                    file_input = self.find_element(*self.IMAGE_INPUT)
                    file_input.send_keys(image_path)
                    # Wait for Filament upload (loading indicator)
                    time.sleep(1)
                    self.wait_for_element_to_disappear((By.CSS_SELECTOR, ".filepond--file-status-main"), timeout=10)
                    time.sleep(2)
                    print(f"✓ Uploaded image: {os.path.basename(image_path)}")
                except:
                    print("⚠ Could not upload image or wait failed")

            return True

        except Exception as e:
            print(f"Error filling form: {str(e)}")
            return False

    def click_save(self):
        """Click save button with improved error detection"""
        print("Clicking save button...")
        
        current_url = self.driver.current_url
        
        # Try to find and click save button
        save_button = None
        if self.is_element_visible(*self.SAVE_BUTTON, timeout=3):
            save_button = self.find_element(*self.SAVE_BUTTON)
        else:
            # Fallback: try alternative selectors
            try:
                save_button = self.driver.find_element(By.XPATH, "//button[@type='submit' and contains(., 'Buat')]")
            except:
                try:
                    save_button = self.driver.find_element(By.XPATH, "//button[@type='submit']")
                except:
                    print("⚠ Save button not found")
                    return False
        
        if save_button:
            # Scroll into view
            self.driver.execute_script("arguments[0].scrollIntoView({block: 'center'});", save_button)
            time.sleep(0.5)
            save_button.click()
            time.sleep(4)  # Wait longer for form submission
            
            # Check if URL changed (successful submission)
            new_url = self.driver.current_url
            if new_url != current_url:
                print("✓ Clicked save (URL changed - success)")
                return True
            
            # Check for validation errors (still on same page)
            errors = self.get_validation_errors()
            if errors:
                print(f"⚠ Validation Errors found: {errors}")
                return False
            
            # Still on create page but no explicit errors
            print(f"⚠ Save clicked but still on create page: {current_url}")
            return False
        return False

    def get_validation_errors(self):
        """Get all validation error messages"""
        try:
            error_elements = self.driver.find_elements(By.CSS_SELECTOR, ".fi-fo-field-wrp-error-message")
            return [el.text for el in error_elements if el.is_displayed()]
        except:
            return []

    def search_news(self, search_term):
        """Search news"""
        if self.is_element_visible(*self.SEARCH_INPUT, timeout=3):
            element = self.find_element(*self.SEARCH_INPUT)
            element.clear()
            element.send_keys(search_term)
            element.send_keys(Keys.RETURN)
            time.sleep(2)
            return True
        return False

    def wait_for_page_load(self):
        """Wait for page load"""
        time.sleep(1.5)
        self.is_element_visible(*self.TABLE, timeout=10)
