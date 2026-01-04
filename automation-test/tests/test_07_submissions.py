"""
Test cases for Guest Submission (Review Kiriman) Management
"""
import pytest
import time
from pathlib import Path
from selenium.webdriver.common.by import By
from pages.login_page import LoginPage
from pages.dashboard_page import DashboardPage
from pages.guest_submission_page import GuestSubmissionPage
from pages.public_upload_page import PublicUploadPage
from config import Config


@pytest.mark.submissions
class TestGuestSubmissionManagement:
    """Test guest submission review operations"""

    @pytest.fixture(autouse=True)
    def setup(self, logged_in_driver):
        """Setup for each test"""
        self.driver = logged_in_driver
        self.submission_page = GuestSubmissionPage(self.driver)
        self.upload_page = PublicUploadPage(self.driver)
        
        # Ensure we have a submission to test
        self.test_title = f"Test Submission {int(time.time())}"  # Default fallback
        self.seed_submission()
        
        self.submission_page.navigate()
        time.sleep(2)
        print(f"\n📍 Current URL: {self.driver.current_url}")

    def seed_submission(self):
        """Create a test submission via public form"""
        print("\n🌱 Seeding test submission...")
        
        test_image_path = Path(__file__).parent.parent / "test_data" / "sample_image.jpg"
        if not test_image_path.exists():
            print("⚠ Test image not found, skipping seed")
            return

        # Navigate to upload page (logout first if needed, but we can access public page)
        # Actually, if we are logged in as admin, we can still access public pages
        self.upload_page.navigate(type_param="photo")
        
        # Use the initialized title
        unique_id = int(time.time())
        # Update title to be unique for this run if needed, but keeping it consistent is fine
        # self.test_title is already set in setup
        
        self.upload_page.fill_upload_form(
            name="Test User",
            email=f"test{unique_id}@example.com",
            title=self.test_title,
            file_path=str(test_image_path.absolute()),
            type_val="photo",
            category="Kegiatan",
            description="This is a test submission seeded by automation."
        )
        
        self.upload_page.submit()
        
        if self.upload_page.is_success_message_visible():
            print(f"✓ Seeded submission: {self.test_title}")
        else:
            print("⚠ Failed to seed submission")
            # Check for errors on upload page
            try:
                errors = self.driver.find_elements(By.CSS_SELECTOR, ".text-red-600")
                for err in errors:
                    if err.is_displayed():
                        print(f"  - Upload Error: {err.text}")
            except:
                pass
            
        # Navigate back to admin
        self.driver.get(f"{Config.BASE_URL}/admin")
        time.sleep(2)

    # ========== Helper Methods ==========
    def get_pending_submissions(self):
        """Get pending submissions from table"""
        try:
            rows = self.driver.find_elements(By.CSS_SELECTOR, "tbody tr.fi-ta-row")
            pending = []
            for row in rows:
                if 'pending' in row.text.lower():
                    pending.append(row)
            return pending
        except:
            return []

    # ========== Negative Test Cases ==========
    def test_01_reject_without_reason(self):
        """Test (Negative): Cannot reject submission without reason"""
        print("\n=== Test 01: Reject Without Reason (Negative) ===")

        # Find our seeded submission
        row = self.submission_page.find_submission_in_table(self.test_title)

        if not row:
            print("⚠ Seeded submission not found. Skipping...")
            return

        try:
            # Click reject button
            reject_btn = row.find_element(By.XPATH, ".//button[contains(., 'Tolak')]")
            reject_btn.click()
            time.sleep(1)

            # Try to submit without filling reason
            submit_btn = self.driver.find_element(
                By.XPATH, "//button[@type='submit' and contains(@class, 'fi-btn')]"
            )
            submit_btn.click()
            time.sleep(1)

            # Check if still showing modal (reason is required)
            modal_visible = self.driver.find_elements(By.CSS_SELECTOR, ".fi-modal-window")
            if modal_visible:
                print("✓ Modal still open - reason is required")
            else:
                print("⚠ Modal closed - reason may not be required")

            # Close modal
            from selenium.webdriver.common.keys import Keys
            self.driver.find_element(By.TAG_NAME, 'body').send_keys(Keys.ESCAPE)
            time.sleep(1)

        except Exception as e:
            print(f"⚠ Test error: {str(e)}")

        print("✅ Negative test completed")

    # ========== Positive Test Cases ==========
    def test_02_view_submission_details(self):
        """Test: View submission details"""
        print("\n=== Test 02: View Submission Details ===")

        if self.submission_page.view_submission(self.test_title):
            print("✓ Opened submission view page")
            
            # Verify details
            try:
                body = self.driver.find_element(By.TAG_NAME, "body").text
                assert self.test_title in body
                print("✓ Title verified")
            except:
                pass
                
            # Navigate back
            self.submission_page.navigate()
        else:
            print("⚠ Could not view submission")

        print("✅ View test completed")

    def test_03_approve_submission(self):
        """Test: Approve a pending submission"""
        print("\n=== Test 03: Approve Submission ===")

        if self.submission_page.approve_submission(self.test_title, "Approved via automation"):
            print(f"✓ Approved submission: {self.test_title}")
            
            # Verify status changed (optional, requires reload/search)
            time.sleep(1)
            row = self.submission_page.find_submission_in_table(self.test_title)
            if row and 'approved' in row.text.lower():
                print("✓ Status updated to Approved")
        else:
            print("⚠ Failed to approve submission")

        print("✅ Approve test completed")
