"""
Product Page Object - Produk Desa
"""
import time
import os
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from pages.base_page import BasePage
from config import Config


class ProductPage(BasePage):
    """Product management page object"""

    # URLs
    PRODUCT_URL = f"{Config.BASE_URL}/admin/products"
    CREATE_URL = f"{Config.BASE_URL}/admin/products/create"

    # Locators - List View
    CREATE_LINK = (By.XPATH, "//a[contains(@href, '/products/create')]")
    TABLE = (By.CSS_SELECTOR, "table.fi-ta-table")
    TABLE_ROWS = (By.CSS_SELECTOR, "tbody tr.fi-ta-row")
    SEARCH_INPUT = (By.CSS_SELECTOR, "input[type='search']")

    # Form Fields
    NAME_INPUT = (By.CSS_SELECTOR, "input[id*='name']")
    
    # Filament Selects
    CATEGORY_SELECT_TRIGGER = (By.XPATH, "//label[contains(text(), 'Kategori')]/ancestor::div[contains(@class, 'fi-fo-field-wrp')]//button")
    UNIT_SELECT_TRIGGER = (By.XPATH, "//label[contains(text(), 'Satuan')]/ancestor::div[contains(@class, 'fi-fo-field-wrp')]//button")
    
    PRICE_INPUT = (By.CSS_SELECTOR, "input[id*='price']")
    STOCK_INPUT = (By.CSS_SELECTOR, "input[id*='stock']")
    DESCRIPTION_EDITOR = (By.TAG_NAME, "trix-editor")
    IMAGE_INPUT = (By.CSS_SELECTOR, "input[type='file']")

    # Buttons
    SAVE_BUTTON = (By.XPATH, "//button[@type='submit' and contains(@class, 'fi-btn')]")
    DELETE_BUTTON = (By.XPATH, "//button[contains(@wire:click, \"mountAction('delete')\")]")

    def __init__(self, driver):
        super().__init__(driver)

    def navigate(self):
        """Navigate to products page"""
        print(f"Opening products page: {self.PRODUCT_URL}")
        self.open(self.PRODUCT_URL)
        time.sleep(2)
        self.wait_for_page_load()

    def click_create_button(self):
        """Click create button"""
        print("Opening create product page...")
        if self.is_element_visible(*self.CREATE_LINK, timeout=2):
            self.click(*self.CREATE_LINK)
            time.sleep(1.5)
            return True
        self.open(self.CREATE_URL)
        time.sleep(2)
        return True

    def fill_product_form(self, name, category=None, price=None, stock=None, 
                          unit=None, description=None, image_path=None):
        """Fill product form"""
        print(f"Filling product form: {name}")

        try:
            time.sleep(1.5)

            # 1. Name
            if self.is_element_visible(*self.NAME_INPUT, timeout=5):
                element = self.find_element(*self.NAME_INPUT)
                element.clear()
                element.send_keys(name)
                print(f"✓ Filled name: {name}")
            else:
                print("✗ Name input not found")
                return False

            # 2. Category
            if category:
                try:
                    # Try multiple locators for Filament select
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
                        print(f"⚠ Category field not found, trying to continue without it")
                        
                except Exception as e:
                    print(f"⚠ Could not select category: {str(e)}")

            # 3. Price
            if price:
                self.find_element(*self.PRICE_INPUT).send_keys(str(price))
                print(f"✓ Filled price: {price}")

            # 4. Stock
            if stock:
                self.find_element(*self.STOCK_INPUT).send_keys(str(stock))
                print(f"✓ Filled stock: {stock}")

            # 5. Unit
            if unit:
                try:
                    # Try multiple locators for unit select
                    unit_locators = [
                        (By.CSS_SELECTOR, "select[id*='unit']"),
                        (By.CSS_SELECTOR, "select[wire\\:model*='unit']"),
                        (By.CSS_SELECTOR, "input[id*='unit']"),  # Might be text input
                        (By.XPATH, "//label[contains(text(), 'Satuan')]/following-sibling::div//select"),
                        (By.XPATH, "//label[contains(text(), 'Satuan')]/following-sibling::div//input"),
                        (By.XPATH, "//label[contains(text(), 'Satuan')]/ancestor::div[contains(@class, 'fi-fo-field-wrp')]//button"),
                    ]
                    
                    unit_set = False
                    for locator in unit_locators:
                        try:
                            element = self.driver.find_element(*locator)
                            
                            # If it's a select element
                            if element.tag_name == 'select':
                                from selenium.webdriver.support.ui import Select
                                select = Select(element)
                                select.select_by_visible_text(unit)
                                unit_set = True
                                print(f"✓ Selected unit: {unit}")
                                break
                            # If it's a text input
                            elif element.tag_name == 'input' and element.get_attribute('type') == 'text':
                                element.clear()
                                element.send_keys(unit)
                                unit_set = True
                                print(f"✓ Filled unit: {unit}")
                                break
                            # If it's a Filament button trigger
                            elif element.tag_name == 'button':
                                element.click()
                                time.sleep(0.5)
                                option_xpath = f"//div[contains(@class, 'fi-dropdown-panel')]//span[contains(text(), '{unit}')]"
                                option = self.driver.find_element(By.XPATH, option_xpath)
                                option.click()
                                time.sleep(0.5)
                                unit_set = True
                                print(f"✓ Selected unit: {unit}")
                                break
                        except:
                            continue
                    
                    if not unit_set:
                        print(f"⚠ Unit field not found, trying to continue without it")
                        
                except Exception as e:
                    print(f"⚠ Could not set unit: {str(e)}")

            # 6. Description
            if description:
                try:
                    editor = self.find_element(*self.DESCRIPTION_EDITOR)
                    editor.click()
                    editor.send_keys(description)
                    print("✓ Filled description")
                except:
                    pass

            # 7. Image
            if image_path:
                try:
                    file_input = self.find_element(*self.IMAGE_INPUT)
                    file_input.send_keys(image_path)
                    # Wait for Filament upload
                    time.sleep(1)
                    self.wait_for_element_to_disappear((By.CSS_SELECTOR, ".filepond--file-status-main"), timeout=10)
                    time.sleep(2)
                    print(f"✓ Uploaded image")
                except:
                    pass

            return True

        except Exception as e:
            print(f"Error filling form: {str(e)}")
            return False

    def click_save(self):
        """Click save button"""
        print("Clicking save button...")
        if self.is_element_visible(*self.SAVE_BUTTON, timeout=3):
            self.click(*self.SAVE_BUTTON)
            time.sleep(3)
            
            # Check for validation errors
            errors = self.get_validation_errors()
            if errors:
                print(f"⚠ Validation Errors found: {errors}")
                return False
                
            print("✓ Clicked save")
            return True
        return False

    def get_validation_errors(self):
        """Get all validation error messages"""
        try:
            error_elements = self.driver.find_elements(By.CSS_SELECTOR, ".fi-fo-field-wrp-error-message")
            return [el.text for el in error_elements if el.is_displayed()]
        except:
            return []

    def search_product(self, search_term):
        """Search product"""
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
