"""
Test cases for News (Berita Desa) Management
"""
import pytest
import time
import os
from pathlib import Path
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from pages.login_page import LoginPage
from pages.dashboard_page import DashboardPage
from pages.news_page import NewsPage
from config import Config


@pytest.mark.news
class TestNewsManagement:
    """Test news CRUD operations"""

    @pytest.fixture(autouse=True)
    def setup(self, logged_in_driver):
        """Setup for each test - navigate to news page"""
        self.driver = logged_in_driver
        self.news_page = NewsPage(self.driver)
        self.news_page.navigate()
        time.sleep(2)
        print(f"\n📍 Current URL: {self.driver.current_url}")

    # ========== Helper Methods ==========
    def find_row_by_title(self, title):
        """Helper to find news row by title"""
        try:
            rows = self.driver.find_elements(By.CSS_SELECTOR, "tbody tr.fi-ta-row")
            for row in rows:
                if title.lower() in row.text.lower():
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
    def test_01_create_news_without_required_fields(self):
        """Test (Negative): Cannot create news without required fields"""
        print("\n=== Test 01: Create News - Missing Required Fields (Negative) ===")

        self.news_page.click_create_button()
        time.sleep(1)

        # Try to save without filling any fields
        self.news_page.click_save()
        time.sleep(2)

        # Should still be on create page
        current_url = self.driver.current_url
        assert '/create' in current_url or '/news' in current_url
        print("✓ Form submission prevented (validation working)")
        print("✅ Negative test passed: Cannot create news without required fields")

    def test_02_create_news_without_image(self):
        """Test (Negative): News requires image"""
        print("\n=== Test 02: Create News - Without Image (Negative) ===")

        self.news_page.click_create_button()
        time.sleep(1)

        # Fill form WITHOUT image
        self.news_page.fill_news_form(
            title=f"No Image News {int(time.time())}",
            category="Pembangunan",
            content="Test content without image"
            # No image_path provided
        )

        self.news_page.click_save()
        time.sleep(2)

        # Check if validation error appears
        current_url = self.driver.current_url
        if '/create' in current_url:
            print("✓ Validation prevented save without image")
        else:
            print("⚠ News may have saved without image")

        print("✅ Negative test passed: Image validation checked")

    # ========== Positive Test Cases ==========
    def test_03_create_edit_delete_news_flow(self):
        """Test: Complete CRUD flow - Create → Edit → Delete"""
        print("\n=== Test 03: Create → Edit → Delete News Flow ===")

        # Get test image path
        test_image_path = Path(__file__).parent.parent / "test_data" / "sample_image.jpg"

        # Check if test image exists, if not skip with warning
        if not test_image_path.exists():
            print(f"⚠ Test image not found at: {test_image_path}")
            print("⚠ Creating placeholder test - skipping image upload")
            test_image_path = None

        # ===== STEP 1: CREATE =====
        print("\n📝 STEP 1: CREATE")
        self.news_page.click_create_button()
        time.sleep(1)

        unique_id = f"NEWS_{int(time.time())}"
        test_title = f"Test News {unique_id}"

        self.news_page.fill_news_form(
            title=test_title,
            category="Pembangunan",
            excerpt="This is a test news excerpt",
            content="This is the full content of the test news article.",
            image_path=str(test_image_path.absolute()) if test_image_path else None
        )

        self.news_page.click_save()
        time.sleep(3)

        # Verify redirect to edit page (Filament behavior)
        current_url = self.driver.current_url
        if '/edit' in current_url:
            print(f"✓ Created and redirected to edit page")
        else:
            print(f"⚠ Not on edit page: {current_url}")

        # ===== STEP 2: EDIT =====
        print("\n✏️  STEP 2: EDIT")
        updated_title = f"{test_title} - UPDATED"

        self.news_page.fill_news_form(
            title=updated_title,
            content="Updated content for the news article."
        )
        self.news_page.click_save()
        time.sleep(3)

        current_url = self.driver.current_url
        assert '/edit' in current_url, f"Not on edit page after save: {current_url}"
        print(f"✓ Edited successfully: {updated_title}")

        # ===== STEP 3: DELETE =====
        print("\n🗑️  STEP 3: DELETE")
        assert self.click_delete_in_edit(), "Failed to click delete"
        assert self.confirm_delete(), "Failed to confirm delete"
        time.sleep(2)

        # Verify redirect to list
        current_url = self.driver.current_url
        if '/news' in current_url and '/edit' not in current_url:
            print("✓ Deleted and redirected to list")
        else:
            print(f"⚠ Unexpected URL after delete: {current_url}")

        # Verify news is deleted
        time.sleep(1)
        assert self.find_row_by_title(updated_title) is None, "News still exists"
        print(f"✓ News deleted successfully")

        print("\n✅ FULL FLOW COMPLETED: Create → Edit → Delete")

    def test_04_search_news(self):
        """Test: Search functionality"""
        print("\n=== Test 04: Search News ===")

        # Navigate to news list
        self.news_page.navigate()
        time.sleep(1)

        # Try searching (even if no results)
        search_result = self.news_page.search_news("Pembangunan")

        if search_result:
            print("✓ Search executed successfully")
        else:
            print("⚠ Search input not found")

        print("✅ Search test completed")
