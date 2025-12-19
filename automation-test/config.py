"""
Configuration module for test automation
"""
import os
from pathlib import Path
from dotenv import load_dotenv

# Load environment variables
BASE_DIR = Path(__file__).resolve().parent
load_dotenv(dotenv_path=BASE_DIR / '.env')


class Config:
    """Configuration class for test settings"""

    # Application URLs
    BASE_URL = os.getenv('BASE_URL', 'https://3dc4a0cbc7cc.ngrok-free.app')
    LOGIN_URL = f"{BASE_URL}/admin/login"
    LOGOUT_URL = f"{BASE_URL}/admin/logout"
    NGROK_URL = os.getenv('NGROK_URL', '')

    # Determine which URL to use
    USE_NGROK = os.getenv('USE_NGROK', 'false').lower() == 'true'
    APP_URL = NGROK_URL if USE_NGROK and NGROK_URL else BASE_URL

    # Credentials
    ADMIN_EMAIL = os.getenv('ADMIN_EMAIL', 'admin@gmail.com')
    ADMIN_PASSWORD = os.getenv('ADMIN_PASSWORD', 'password')

    # Browser settings
    BROWSER = os.getenv('BROWSER', 'chrome')
    HEADLESS = os.getenv('HEADLESS', 'false').lower() == 'true'
    IMPLICIT_WAIT = int(os.getenv('IMPLICIT_WAIT', '10'))
    EXPLICIT_WAIT = int(os.getenv('EXPLICIT_WAIT', '20'))
    PAGE_LOAD_TIMEOUT = int(os.getenv('PAGE_LOAD_TIMEOUT', '30'))

    # Screenshot settings
    SCREENSHOT_ON_FAILURE = os.getenv('SCREENSHOT_ON_FAILURE', 'true').lower() == 'true'
    SCREENSHOT_DIR = BASE_DIR / os.getenv('SCREENSHOT_DIR', 'screenshots')

    # Report settings
    REPORT_DIR = BASE_DIR / os.getenv('REPORT_DIR', 'reports')

    # Create directories if they don't exist
    SCREENSHOT_DIR.mkdir(exist_ok=True)
    REPORT_DIR.mkdir(exist_ok=True)
