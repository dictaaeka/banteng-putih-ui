"""
Guest Submission Page Object - Review Kiriman
"""
import time
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from pages.base_page import BasePage
from config import Config


class GuestSubmissionPage(BasePage):
    """Guest Submission review page object"""

    # URLs
    SUBMISSIONS_URL = f"{Config.BASE_URL}/admin/guest-submissions"

    # Locators - List View
    TABLE = (By.CSS_SELECTOR, "table.fi-ta-table")
    TABLE_ROWS = (By.CSS_SELECTOR, "tbody tr.fi-ta-row")
    SEARCH_INPUT = (By.CSS_SELECTOR, "input[type='search']")

    # Status Filter
    STATUS_FILTER = (By.CSS_SELECTOR, "button[id*='status']")

    # Action Buttons
    APPROVE_BUTTON = (By.XPATH, "//button[contains(., 'Setujui')]")
    REJECT_BUTTON = (By.XPATH, "//button[contains(., 'Tolak')]")
    VIEW_BUTTON = (By.CSS_SELECTOR, "a[href*='/view'], button[wire\\:click*='view']")
    EDIT_BUTTON = (By.CSS_SELECTOR, "a[href*='/edit']")
    DELETE_BUTTON = (By.CSS_SELECTOR, "button[wire\\:click*='delete']")

    # Modal Elements
    ADMIN_NOTES_INPUT = (By.CSS_SELECTOR, "textarea[id*='admin_notes']")
    SUBMIT_MODAL_BUTTON = (By.XPATH, "//button[@type='submit' and contains(@class, 'fi-btn')]")
    CANCEL_MODAL_BUTTON = (By.XPATH, "//button[contains(., 'Cancel') or contains(., 'Batal')]")

    # Form Fields (View/Edit)
    NAME_INPUT = (By.CSS_SELECTOR, "input[id*='name']")
    EMAIL_INPUT = (By.CSS_SELECTOR, "input[id*='email']")
    TITLE_INPUT = (By.CSS_SELECTOR, "input[id*='title']")
    STATUS_SELECT = (By.CSS_SELECTOR, "select[id*='status'], button[id*='status']")

    # Notifications
    SUCCESS_NOTIFICATION = (By.CSS_SELECTOR, ".fi-no-notification-success")
    WARNING_NOTIFICATION = (By.CSS_SELECTOR, ".fi-no-notification-warning")

    def __init__(self, driver):
        super().__init__(driver)

    def navigate(self):
        """Navigate to guest submissions page"""
        print(f"Opening guest submissions page: {self.SUBMISSIONS_URL}")
        self.open(self.SUBMISSIONS_URL)
        time.sleep(2)
        self.wait_for_page_load()

    def is_on_submissions_page(self):
        """Check if on submissions page"""
        return '/admin/guest-submissions' in self.get_current_url()

    def get_table_rows(self):
        """Get all table rows"""
        try:
            return self.find_elements(*self.TABLE_ROWS)
        except:
            return []

    def find_submission_in_table(self, title_or_name):
        """Find submission by title or sender name in table"""
        print(f"Looking for submission: {title_or_name}")
        rows = self.get_table_rows()
        for row in rows:
            if title_or_name.lower() in row.text.lower():
                print(f"Found submission: {title_or_name}")
                return row
        print(f"Submission not found: {title_or_name}")
        return None

    def filter_by_status(self, status):
        """
        Filter submissions by status

        Args:
            status (str): pending, approved, rejected
        """
        try:
            if self.is_element_visible(*self.STATUS_FILTER, timeout=3):
                self.click(*self.STATUS_FILTER)
                time.sleep(0.5)
                option = self.driver.find_element(By.XPATH, f"//li[contains(., '{status}')]")
                option.click()
                time.sleep(2)
                print(f"✓ Filtered by status: {status}")
                return True
        except Exception as e:
            print(f"⚠ Could not filter by status: {str(e)}")
        return False

    def approve_submission(self, title_or_name, admin_notes=None):
        """
        Approve a submission

        Args:
            title_or_name (str): Submission title or sender name
            admin_notes (str): Optional notes

        Returns:
            bool: Success status
        """
        print(f"Approving submission: {title_or_name}")
        row = self.find_submission_in_table(title_or_name)

        if row:
            try:
                # Find and click approve button in row
                approve_btn = row.find_element(By.XPATH, ".//button[contains(., 'Setujui')]")
                approve_btn.click()
                time.sleep(1)

                # Fill admin notes if provided
                if admin_notes and self.is_element_visible(*self.ADMIN_NOTES_INPUT, timeout=2):
                    notes_input = self.find_element(*self.ADMIN_NOTES_INPUT)
                    notes_input.send_keys(admin_notes)

                # Submit modal
                if self.is_element_visible(*self.SUBMIT_MODAL_BUTTON, timeout=2):
                    self.click(*self.SUBMIT_MODAL_BUTTON)
                    time.sleep(2)
                    print("✓ Submission approved")
                    return True

            except Exception as e:
                print(f"✗ Error approving submission: {str(e)}")

        return False

    def reject_submission(self, title_or_name, reason):
        """
        Reject a submission

        Args:
            title_or_name (str): Submission title or sender name
            reason (str): Rejection reason (required)

        Returns:
            bool: Success status
        """
        print(f"Rejecting submission: {title_or_name}")
        row = self.find_submission_in_table(title_or_name)

        if row:
            try:
                # Find and click reject button in row
                reject_btn = row.find_element(By.XPATH, ".//button[contains(., 'Tolak')]")
                reject_btn.click()
                time.sleep(1)

                # Fill rejection reason (required)
                if self.is_element_visible(*self.ADMIN_NOTES_INPUT, timeout=2):
                    notes_input = self.find_element(*self.ADMIN_NOTES_INPUT)
                    notes_input.send_keys(reason)

                # Submit modal
                if self.is_element_visible(*self.SUBMIT_MODAL_BUTTON, timeout=2):
                    self.click(*self.SUBMIT_MODAL_BUTTON)
                    time.sleep(2)
                    print("✓ Submission rejected")
                    return True

            except Exception as e:
                print(f"✗ Error rejecting submission: {str(e)}")

        return False

    def view_submission(self, title_or_name):
        """View submission details"""
        row = self.find_submission_in_table(title_or_name)
        if row:
            try:
                view_link = row.find_element(By.CSS_SELECTOR, "a[href*='/view'], a.fi-ta-action")
                view_link.click()
                time.sleep(2)
                return True
            except:
                pass
        return False

    def search_submission(self, search_term):
        """Search for submission"""
        if self.is_element_visible(*self.SEARCH_INPUT, timeout=3):
            element = self.find_element(*self.SEARCH_INPUT)
            element.clear()
            element.send_keys(search_term)
            element.send_keys(Keys.RETURN)
            time.sleep(2)
            return True
        return False

    def get_pending_count(self):
        """Get count of pending submissions (from nav badge)"""
        try:
            badge = self.driver.find_element(By.CSS_SELECTOR, ".fi-sidebar-item-badge")
            return int(badge.text)
        except:
            return 0

    def wait_for_page_load(self):
        """Wait for page to load"""
        time.sleep(1.5)
        self.is_element_visible(*self.TABLE, timeout=10)
