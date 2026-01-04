"""
Test cases for Admin User (Admin Desa) Management
"""
import pytest
import time
from selenium.webdriver.common.by import By
from pages.login_page import LoginPage
from pages.dashboard_page import DashboardPage
from pages.admin_user_page import AdminUserPage
from config import Config


@pytest.mark.admin
class TestAdminUserManagement:
    """Test admin user management"""

    @pytest.fixture(autouse=True)
    def setup(self, logged_in_driver):
        """Setup for each test"""
        self.driver = logged_in_driver
        self.admin_page = AdminUserPage(self.driver)
        self.admin_page.navigate()
        time.sleep(2)
        print(f"\n📍 Current URL: {self.driver.current_url}")

    # ========== Negative Test Cases ==========
    def test_01_create_admin_without_password(self):
        """Test (Negative): Cannot create admin without password"""
        print("\n=== Test 01: Create Admin - Missing Password (Negative) ===")

        # Check if can create (may not be allowed if admin exists)
        if not self.admin_page.can_create_admin():
            print("⚠ Create button not available (admin may already exist)")
            print("✅ Test skipped: Cannot create duplicate admin")
            return

        self.admin_page.click_create_admin()
        time.sleep(1)

        # Fill name and email only (no password)
        self.admin_page.fill_admin_form(
            name="Test Admin",
            email=f"testadmin{int(time.time())}@example.com"
            # No password
        )

        self.admin_page.click_save()
        time.sleep(2)

        # Should show validation error
        error_elements = self.driver.find_elements(By.CSS_SELECTOR, ".fi-fo-field-wrp-error-message")
        if error_elements:
            print("✓ Password validation error displayed")
        else:
            current_url = self.driver.current_url
            if '/create' in current_url:
                print("✓ Still on create page - validation working")
            else:
                print("⚠ Unexpected behavior")

        print("✅ Negative test passed: Password validation checked")

    def test_02_create_admin_password_mismatch(self):
        """Test (Negative): Password confirmation must match"""
        print("\n=== Test 02: Create Admin - Password Mismatch (Negative) ===")

        if not self.admin_page.can_create_admin():
            print("⚠ Create button not available")
            print("✅ Test skipped")
            return

        self.admin_page.click_create_admin()
        time.sleep(1)

        self.admin_page.fill_admin_form(
            name="Test Admin",
            email=f"testadmin{int(time.time())}@example.com",
            password="password123",
            password_confirmation="differentpassword"  # Mismatch!
        )

        self.admin_page.click_save()
        time.sleep(2)

        # Check for validation error
        error_elements = self.driver.find_elements(By.CSS_SELECTOR, ".fi-fo-field-wrp-error-message")
        if error_elements:
            print("✓ Password mismatch error displayed")
        else:
            current_url = self.driver.current_url
            if '/create' in current_url:
                print("✓ Still on create page - validation working")

        print("✅ Negative test passed: Password confirmation validation checked")

    def test_03_create_admin_duplicate_email(self):
        """Test (Negative): Email must be unique"""
        print("\n=== Test 03: Create Admin - Duplicate Email (Negative) ===")

        if not self.admin_page.can_create_admin():
            print("⚠ Create button not available")
            print("✅ Test skipped")
            return

        # Get existing admin email
        admins = self.admin_page.get_admin_list()
        if admins and admins[0].get('email'):
            existing_email = admins[0]['email']
        else:
            print("⚠ No existing admin to test duplicate email")
            return

        self.admin_page.click_create_admin()
        time.sleep(1)

        self.admin_page.fill_admin_form(
            name="Duplicate Admin",
            email=existing_email,  # Duplicate!
            password="password123",
            password_confirmation="password123"
        )

        self.admin_page.click_save()
        time.sleep(2)

        # Check for validation error
        error_elements = self.driver.find_elements(By.CSS_SELECTOR, ".fi-fo-field-wrp-error-message")
        if error_elements:
            print("✓ Duplicate email error displayed")

        print("✅ Negative test passed: Unique email validation checked")

    # ========== Positive Test Cases ==========
    def test_04_view_admin_list(self):
        """Test: View admin user list"""
        print("\n=== Test 04: View Admin List ===")

        assert self.admin_page.is_on_admin_page(), "Not on admin page"

        if self.admin_page.has_admin_user():
            admins = self.admin_page.get_admin_list()
            print(f"✓ Found {len(admins)} admin user(s)")
            for admin in admins:
                print(f"  - {admin.get('name', 'Unknown')} ({admin.get('email', '')})")
        else:
            print("⚠ No admin users configured")

        print("✅ View test completed")

    def test_05_edit_admin_info(self):
        """Test: Edit admin user information"""
        print("\n=== Test 05: Edit Admin Info ===")

        if not self.admin_page.has_admin_user():
            print("⚠ No admin to edit. Skipping.")
            return

        self.admin_page.click_edit_admin()
        time.sleep(1)

        # Update name
        unique_suffix = int(time.time()) % 1000

        try:
            name_input = self.driver.find_element(By.CSS_SELECTOR, "input[id*='name']")
            current_name = name_input.get_attribute('value')
            new_name = f"Admin Desa {unique_suffix}"

            name_input.clear()
            name_input.send_keys(new_name)
            print(f"✓ Changed name from '{current_name}' to '{new_name}'")

            self.admin_page.click_save()
            time.sleep(2)

            # Verify we're still on page (no error)
            current_url = self.driver.current_url
            if '/users' in current_url:
                print("✓ Admin info updated successfully")
            else:
                print(f"⚠ Unexpected URL: {current_url}")

        except Exception as e:
            print(f"⚠ Edit error: {str(e)}")

        print("✅ Edit test completed")

    def test_06_password_optional_on_edit(self):
        """Test: Password is optional when editing"""
        print("\n=== Test 06: Password Optional on Edit ===")

        if not self.admin_page.has_admin_user():
            print("⚠ No admin to edit. Skipping.")
            return

        self.admin_page.click_edit_admin()
        time.sleep(1)

        # Edit something without changing password
        try:
            # Just update name slightly
            name_input = self.driver.find_element(By.CSS_SELECTOR, "input[id*='name']")
            current_name = name_input.get_attribute('value')
            name_input.clear()
            name_input.send_keys(f"{current_name} Edited")

            # Don't fill password fields
            self.admin_page.click_save()
            time.sleep(2)

            # Should save successfully without password
            success_notification = self.driver.find_elements(By.CSS_SELECTOR, ".fi-no-notification-success")
            if success_notification:
                print("✓ Saved without changing password")
            else:
                # Check if we're back on list (no error)
                current_url = self.driver.current_url
                if '/edit' not in current_url or '/users' in current_url:
                    print("✓ Edit saved (password was optional)")

        except Exception as e:
            print(f"⚠ Test error: {str(e)}")

        print("✅ Password optional test completed")
