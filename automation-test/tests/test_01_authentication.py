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

    def test_login_with_remember_me(self, login_page, dashboard_page):
        """Test login with remember me option"""
        login_page.navigate()

        # Login with remember me
        success = login_page.login(
            Config.ADMIN_EMAIL,
            Config.ADMIN_PASSWORD,
            remember=True
        )
        assert success, "Login with remember me failed"
        assert dashboard_page.is_on_dashboard(), "Not on dashboard"

        print("✓ Login with remember me successful")

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

    def test_full_authentication_flow(self, login_page, dashboard_page):
        """Test complete login and logout flow"""
        # Step 1: Login
        login_page.navigate()
        login_success = login_page.login(Config.ADMIN_EMAIL, Config.ADMIN_PASSWORD)
        assert login_success, "Login failed"
        assert dashboard_page.is_on_dashboard(), "Not on dashboard after login"

        print("✓ Step 1: Login successful")

        # Step 2: Wait a bit (simulate user activity)
        time.sleep(2)

        # Step 3: Logout
        logout_success = dashboard_page.logout()
        assert logout_success, "Logout failed"

        print("✓ Step 2: Logout successful")

        # Step 4: Verify cannot access dashboard without login
        dashboard_page.open("/admin")
        time.sleep(2)

        # Should be redirected to login
        assert '/login' in dashboard_page.get_current_url(), \
            "Can access dashboard without authentication"

        print("✓ Step 3: Dashboard protected when logged out")
        print("✓ Full authentication flow completed successfully")
