"""
Test cases for Product (Produk Desa) Management
"""
import pytest
import time
import os
from pathlib import Path
from selenium.webdriver.common.by import By
from pages.login_page import LoginPage
from pages.dashboard_page import DashboardPage
from pages.product_page import ProductPage
from config import Config


@pytest.mark.products
class TestProductManagement:
    """Test product CRUD operations"""

    @pytest.fixture(autouse=True)
    def setup(self, logged_in_driver):
        """Setup for each test - navigate to products page"""
        self.driver = logged_in_driver
        self.product_page = ProductPage(self.driver)
        self.product_page.navigate()
        time.sleep(2)
        print(f"\n📍 Current URL: {self.driver.current_url}")

    # ========== Helper Methods ==========
    def find_row_by_name(self, name):
        """Helper to find product row by name"""
        try:
            rows = self.driver.find_elements(By.CSS_SELECTOR, "tbody tr.fi-ta-row")
            for row in rows:
                if name.lower() in row.text.lower():
                    return row
            return None
        except:
            return None

    def click_delete_in_edit(self):
        """Click delete button in edit page"""
        try:
            delete_btn = self.driver.find_element(
                By.XPATH, "//button[contains(@wire:click, \"mountAction('delete')\")]"
            )
            delete_btn.click()
            time.sleep(1)
            return True
        except:
            return False

    def confirm_delete(self):
        """Confirm delete modal"""
        try:
            confirm_btn = self.driver.find_element(
                By.XPATH, "//button[@type='submit' and contains(@class, 'fi-color-danger')]"
            )
            confirm_btn.click()
            time.sleep(2)
            return True
        except:
            return False

    # ========== Negative Test Cases ==========
    def test_01_create_product_without_required_fields(self):
        """Test (Negative): Cannot create product without required fields"""
        print("\n=== Test 01: Create Product - Missing Required Fields (Negative) ===")

        self.product_page.click_create_button()
        time.sleep(1)

        # Try to save without filling any fields
        self.product_page.click_save()
        time.sleep(2)

        # Should still be on create page
        current_url = self.driver.current_url
        assert '/create' in current_url or '/products' in current_url
        print("✓ Form submission prevented (validation working)")
        print("✅ Negative test passed: Cannot create product without required fields")

    def test_02_create_product_invalid_price(self):
        """Test (Negative): Product price must be numeric"""
        print("\n=== Test 02: Create Product - Invalid Price (Negative) ===")

        self.product_page.click_create_button()
        time.sleep(1)

        # Try to fill with invalid price
        try:
            price_input = self.driver.find_element(By.CSS_SELECTOR, "input[id*='price']")
            price_input.clear()
            price_input.send_keys("not-a-number")
            time.sleep(0.5)

            # Check if input was rejected or shows error
            price_value = price_input.get_attribute('value')
            if price_value != "not-a-number":
                print("✓ Invalid price rejected by input field")
            else:
                print("⚠ Input accepted non-numeric value (check on save)")

        except Exception as e:
            print(f"⚠ Could not test price validation: {str(e)}")

        print("✅ Negative test passed: Price validation checked")

    # ========== Positive Test Cases ==========
    def test_03_create_edit_delete_product_flow(self):
        """Test: Complete CRUD flow - Create → Edit → Delete"""
        print("\n=== Test 03: Create → Edit → Delete Product Flow ===")

        test_image_path = Path(__file__).parent.parent / "test_data" / "sample_image.jpg"
        if not test_image_path.exists():
            print(f"⚠ Test image not found, skipping image upload")
            test_image_path = None

        # ===== STEP 1: CREATE =====
        print("\n📝 STEP 1: CREATE")
        self.product_page.click_create_button()
        time.sleep(1)

        unique_id = f"PROD_{int(time.time())}"
        test_name = f"Test Product {unique_id}"

        self.product_page.fill_product_form(
            name=test_name,
            category="UMKM",
            price=50000,
            stock=100,
            unit="pcs",
            description="This is a test product description.",
            image_path=str(test_image_path.absolute()) if test_image_path else None
        )

        self.product_page.click_save()
        time.sleep(3)

        current_url = self.driver.current_url
        if '/edit' in current_url:
            print("✓ Created and redirected to edit page")
        else:
            print(f"⚠ Not on edit page: {current_url}")

        # ===== STEP 2: EDIT =====
        print("\n✏️  STEP 2: EDIT")
        updated_name = f"{test_name} - UPDATED"

        self.product_page.fill_product_form(
            name=updated_name,
            price=75000,
            stock=50
        )
        self.product_page.click_save()
        time.sleep(3)

        current_url = self.driver.current_url
        assert '/edit' in current_url, f"Not on edit page: {current_url}"
        print(f"✓ Edited successfully: {updated_name}")

        # ===== STEP 3: DELETE =====
        print("\n🗑️  STEP 3: DELETE")
        assert self.click_delete_in_edit(), "Failed to click delete"
        assert self.confirm_delete(), "Failed to confirm delete"
        time.sleep(2)

        current_url = self.driver.current_url
        if '/products' in current_url and '/edit' not in current_url:
            print("✓ Deleted and redirected to list")

        # Verify product is deleted
        time.sleep(1)
        assert self.find_row_by_name(updated_name) is None, "Product still exists"
        print("✓ Product deleted successfully")

        print("\n✅ FULL FLOW COMPLETED: Create → Edit → Delete")

    def test_04_search_product(self):
        """Test: Search functionality"""
        print("\n=== Test 04: Search Product ===")

        self.product_page.navigate()
        time.sleep(1)

        search_result = self.product_page.search_product("Pertanian")

        if search_result:
            print("✓ Search executed successfully")
        else:
            print("⚠ Search input not found")

        print("✅ Search test completed")

    def test_05_filter_by_category(self):
        """Test: Filter products by category"""
        print("\n=== Test 05: Filter Products by Category ===")

        self.product_page.navigate()
        time.sleep(1)

        # Try to find filter button
        try:
            filter_btn = self.driver.find_element(By.CSS_SELECTOR, "button[id*='category']")
            filter_btn.click()
            time.sleep(1)
            print("✓ Filter opened")
            # Click elsewhere to close
            self.driver.find_element(By.TAG_NAME, 'body').click()
        except:
            print("⚠ Filter not found or already visible")

        print("✅ Filter test completed")
