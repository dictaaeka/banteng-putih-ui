"""
Test Suite for Authentication (Login & Logout)
"""
import pytest
import time
from config import Config


@pytest.mark.authentication
@pytest.mark.smoke
class TestAuthentication:
    """Test cases for authentication functionality"""

    def test_successful_login(self, login_page, dashboard_page):
        """Test successful login with valid credentials"""
        # Navigate to login page
        login_page.navigate()
        assert login_page.is_on_login_page(), "Not on login page"

        # Perform login
        success = login_page.login(Config.ADMIN_EMAIL, Config.ADMIN_PASSWORD)
        assert success, "Login failed"

        # Verify redirected to dashboard
        assert dashboard_page.is_on_dashboard(), "Not redirected to dashboard"

        print("✓ Login successful")

    def test_login_with_invalid_email(self, login_page):
        """Test login with invalid email"""
        login_page.navigate()

        # Try login with invalid email
        login_page.enter_email("invalid@email.com")
        login_page.enter_password("wrongpassword")
        login_page.click_login()
        time.sleep(2)

        # Should still be on login page
        assert login_page.is_on_login_page(), "Unexpectedly logged in"

        print("✓ Invalid email rejected as expected")

    def test_login_with_empty_credentials(self, login_page):
        """Test login with empty credentials"""
        login_page.navigate()

        # Try login without credentials
        login_page.click_login()
        time.sleep(1)

        # Should still be on login page
        assert login_page.is_on_login_page(), "Unexpectedly logged in"

        print("✓ Empty credentials rejected")

    def test_successful_logout(self, logged_in_driver, dashboard_page):
        """Test successful logout"""
        # Verify logged in
        assert dashboard_page.is_on_dashboard(), "Not on dashboard"

        # Perform logout
        success = dashboard_page.logout()
        assert success, "Logout failed"

        # Verify redirected to login or home page
        current_url = dashboard_page.get_current_url()
        assert '/login' in current_url or current_url == f"{Config.APP_URL}/", \
            f"Not redirected after logout: {current_url}"

        print("✓ Logout successful")
