"""
Pytest configuration and fixtures
"""
import pytest
from utils.driver_manager import DriverManager
from pages.login_page import LoginPage
from pages.dashboard_page import DashboardPage
from config import Config


@pytest.fixture(scope="function")
def driver():
    """WebDriver fixture"""
    driver = DriverManager.get_driver()
    driver.maximize_window()
    yield driver
    driver.quit()


@pytest.fixture(scope="function")
def logged_in_driver(driver):
    """WebDriver fixture with logged in session"""
    login_page = LoginPage(driver)
    success = login_page.login(Config.ADMIN_EMAIL, Config.ADMIN_PASSWORD)

    if not success:
        pytest.fail("Login failed in fixture")

    yield driver

    # Logout after test
    dashboard_page = DashboardPage(driver)
    dashboard_page.logout()


@pytest.fixture(scope="function")
def login_page(driver):
    """Login page fixture"""
    return LoginPage(driver)


@pytest.fixture(scope="function")
def dashboard_page(driver):
    """Dashboard page fixture"""
    return DashboardPage(driver)


def pytest_configure(config):
    """Configure pytest"""
    config.addinivalue_line(
        "markers", "smoke: Mark test as smoke test"
    )
    config.addinivalue_line(
        "markers", "regression: Mark test as regression test"
    )
    config.addinivalue_line(
        "markers", "authentication: Authentication related tests"
    )
    config.addinivalue_line(
        "markers", "crud: CRUD operation tests"
    )
    config.addinivalue_line(
        "markers", "admin: Admin functionality tests"
    )
    config.addinivalue_line(
        "markers", "guest: Guest user tests"
    )


def pytest_runtest_makereport(item, call):
    """Hook to take screenshot on test failure"""
    if call.when == "call" and call.excinfo is not None:
        driver = item.funcargs.get("driver")
        if driver and Config.SCREENSHOT_ON_FAILURE:
            from utils.helpers import Helpers
            test_name = item.nodeid.replace("/", "_").replace("::", "_")
            Helpers.take_screenshot(driver, f"FAILED_{test_name}")
