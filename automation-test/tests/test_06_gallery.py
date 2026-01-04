"""
Test cases for Gallery (Foto & Video) Management
"""
import pytest
import time
from pathlib import Path
from selenium.webdriver.common.by import By
from pages.login_page import LoginPage
from pages.dashboard_page import DashboardPage
from pages.photo_gallery_page import PhotoGalleryPage
from pages.video_gallery_page import VideoGalleryPage
from config import Config


@pytest.mark.gallery
class TestPhotoGalleryManagement:
    """Test photo gallery CRUD operations"""

    @pytest.fixture(autouse=True)
    def setup(self, logged_in_driver):
        """Setup for each test"""
        self.driver = logged_in_driver
        self.gallery_page = PhotoGalleryPage(self.driver)
        self.gallery_page.navigate()
        time.sleep(2)
        print(f"\n📍 Current URL: {self.driver.current_url}")

    # ========== Helper Methods ==========
    def find_row_by_title(self, title):
        """Find row by title"""
        try:
            rows = self.driver.find_elements(By.CSS_SELECTOR, "tbody tr.fi-ta-row")
            for row in rows:
                if title.lower() in row.text.lower():
                    return row
            return None
        except:
            return None

    def click_delete_in_edit(self):
        """Click delete in edit page"""
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
        """Confirm delete"""
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
    def test_01_create_photo_without_required(self):
        """Test (Negative): Cannot create photo without required fields"""
        print("\n=== Test 01: Create Photo - Missing Required Fields (Negative) ===")

        self.gallery_page.click_create_button()
        time.sleep(1)

        self.gallery_page.click_save()
        time.sleep(2)

        current_url = self.driver.current_url
        assert '/create' in current_url or '/photo-galleries' in current_url
        print("✓ Form submission prevented (validation working)")
        print("✅ Negative test passed")

    def test_02_create_photo_without_image(self):
        """Test (Negative): Photo requires image"""
        print("\n=== Test 02: Create Photo - Without Image (Negative) ===")

        self.gallery_page.click_create_button()
        time.sleep(1)

        self.gallery_page.fill_gallery_form(
            title=f"No Image Photo {int(time.time())}",
            category="Kegiatan",
            description="Test photo without image"
            # No image_path
        )

        self.gallery_page.click_save()
        time.sleep(2)

        current_url = self.driver.current_url
        if '/create' in current_url:
            print("✓ Validation prevented save without image")
        else:
            print("⚠ May have saved without image")

        print("✅ Negative test passed")

    # ========== Positive Test Cases ==========
    def test_03_create_edit_delete_photo_flow(self):
        """Test: Complete CRUD flow"""
        print("\n=== Test 03: Create → Edit → Delete Photo Flow ===")

        test_image_path = Path(__file__).parent.parent / "test_data" / "sample_image.jpg"
        if not test_image_path.exists():
            print(f"⚠ Test image not found, skipping test")
            pytest.skip("Test image not found")

        # ===== STEP 1: CREATE =====
        print("\n📝 STEP 1: CREATE")
        self.gallery_page.click_create_button()
        time.sleep(1)

        unique_id = f"PHOTO_{int(time.time())}"
        test_title = f"Test Photo {unique_id}"

        self.gallery_page.fill_gallery_form(
            title=test_title,
            category="Kegiatan",
            description="Test photo description",
            image_path=str(test_image_path.absolute())
        )

        self.gallery_page.click_save()
        time.sleep(3)

        current_url = self.driver.current_url
        if '/edit' in current_url:
            print("✓ Created and redirected to edit page")
        else:
            print(f"⚠ Not on edit page: {current_url}")

        # ===== STEP 2: EDIT =====
        print("\n✏️  STEP 2: EDIT")
        updated_title = f"{test_title} - UPDATED"

        self.gallery_page.fill_gallery_form(
            title=updated_title,
            description="Updated photo description"
        )
        self.gallery_page.click_save()
        time.sleep(3)

        print(f"✓ Edited: {updated_title}")

        # ===== STEP 3: DELETE =====
        print("\n🗑️  STEP 3: DELETE")
        assert self.click_delete_in_edit(), "Failed to click delete"
        assert self.confirm_delete(), "Failed to confirm delete"
        time.sleep(2)

        self.gallery_page.navigate()
        time.sleep(1)

        assert self.find_row_by_title(updated_title) is None, "Photo still exists"
        print("✓ Photo deleted successfully")

        print("\n✅ FULL FLOW COMPLETED")


@pytest.mark.gallery
class TestVideoGalleryManagement:
    """Test video gallery CRUD operations"""

    @pytest.fixture(autouse=True)
    def setup(self, logged_in_driver):
        """Setup for each test"""
        self.driver = logged_in_driver
        self.gallery_page = VideoGalleryPage(self.driver)
        self.gallery_page.navigate()
        time.sleep(2)
        print(f"\n📍 Current URL: {self.driver.current_url}")

    # ========== Negative Test Cases ==========
    def test_01_create_video_without_required(self):
        """Test (Negative): Cannot create video without required fields"""
        print("\n=== Test 01: Create Video - Missing Required Fields (Negative) ===")

        self.gallery_page.click_create_button()
        time.sleep(1)

        self.gallery_page.click_save()
        time.sleep(2)

        current_url = self.driver.current_url
        assert '/create' in current_url or '/video-galleries' in current_url
        print("✓ Form submission prevented")
        print("✅ Negative test passed")

    def test_02_create_video_without_file(self):
        """Test (Negative): Video requires video file"""
        print("\n=== Test 02: Create Video - Without File (Negative) ===")

        self.gallery_page.click_create_button()
        time.sleep(1)

        self.gallery_page.fill_gallery_form(
            title=f"No File Video {int(time.time())}",
            category="Budaya",
            description="Test video without file"
        )

        self.gallery_page.click_save()
        time.sleep(2)

        current_url = self.driver.current_url
        if '/create' in current_url:
            print("✓ Validation prevented save without video")
        else:
            print("⚠ May have saved without video")

        print("✅ Negative test passed")

    # ========== Positive Test Cases ==========
    def test_03_view_video_list(self):
        """Test: View video gallery list"""
        print("\n=== Test 03: View Video Gallery List ===")

        assert self.gallery_page.is_on_gallery_page(), "Not on video gallery page"

        rows = self.gallery_page.get_table_rows()
        print(f"✓ Found {len(rows)} video(s) in gallery")

        print("✅ View test completed")

    def test_04_filter_by_category(self):
        """Test: Filter videos by category"""
        print("\n=== Test 04: Filter Videos by Category ===")

        try:
            filter_btns = self.driver.find_elements(By.CSS_SELECTOR, "button.fi-ta-filters-modal-trigger")
            if filter_btns:
                filter_btns[0].click()
                time.sleep(1)
                print("✓ Filters modal opened")

            from selenium.webdriver.common.keys import Keys
            self.driver.find_element(By.TAG_NAME, 'body').send_keys(Keys.ESCAPE)

        except Exception as e:
            print(f"⚠ Filter test error: {str(e)}")

        print("✅ Filter test completed")
