# Desa Bantengputih - Test Automation

Automated testing suite menggunakan Selenium WebDriver dan Python untuk aplikasi Desa Bantengputih.

## 📋 Test Coverage

1. ✅ **Authentication** - Login & Logout (Full Authentication)
2. 🔄 **Guest Submissions** - Review Kiriman (Guest)
3. 🔄 **Documents CRUD** - CRUD, Preview, Download Dokumen
4. 🔄 **News CRUD** - CRUD News (Berita)
5. 🔄 **Products CRUD** - CRUD Produk
6. 🔄 **Gallery CRUD** - CRUD Galeri (Foto & Video)
7. 🔄 **Submissions Management** - Review Kiriman (Admin) - Approval, Reject, Delete
8. 🔄 **Village Info** - Edit Informasi Desa
9. 🔄 **Admin Management** - Edit Admin Desa

## 🛠️ Prerequisites

- Python 3.8 atau lebih tinggi
- Google Chrome atau Firefox browser
- Laravel application running di `http://127.0.0.1:8000` atau ngrok URL

## 📦 Installation

### 1. Setup Python Virtual Environment

```bash
cd automation-test

# Create virtual environment
python3 -m venv venv

# Activate virtual environment
# Linux/Mac:
source venv/bin/activate
# Windows:
venv\Scripts\activate
```

### 2. Install Dependencies

```bash
pip install -r requirements.txt
```

### 3. Configure Environment

Edit file `.env` sesuai kebutuhan:

```env
# Application Configuration
BASE_URL=http://127.0.0.1:8000
NGROK_URL=https://your-ngrok-url.ngrok-free.app
USE_NGROK=false

# Admin Credentials
ADMIN_EMAIL=admin@bantengputih.com
ADMIN_PASSWORD=password

# Browser Configuration
BROWSER=chrome
HEADLESS=false
```

## 🚀 Running Tests

### Run All Tests

```bash
pytest
```

### Run Specific Test File

```bash
pytest tests/test_01_authentication.py
```

### Run Tests with Markers

```bash
# Run only smoke tests
pytest -m smoke

# Run only authentication tests
pytest -m authentication

# Run only CRUD tests
pytest -m crud
```

### Run Tests in Headless Mode

Edit `.env`:
```env
HEADLESS=true
```

Atau override via command line:
```bash
HEADLESS=true pytest
```

### Run Tests in Parallel

```bash
pytest -n 4  # Run 4 tests in parallel
```

## 📊 Test Reports

### HTML Report

Setelah menjalankan test, buka HTML report:

```bash
# Report akan tersimpan di:
reports/report.html
```

### Screenshots

Screenshot otomatis diambil saat test gagal dan disimpan di folder `screenshots/`

## 🏗️ Project Structure

```
automation-test/
├── config.py                 # Configuration settings
├── conftest.py              # Pytest fixtures
├── requirements.txt         # Python dependencies
├── pytest.ini              # Pytest configuration
├── .env                    # Environment variables
├── pages/                  # Page Object Models
│   ├── base_page.py       # Base page class
│   ├── login_page.py      # Login page object
│   └── dashboard_page.py  # Dashboard page object
├── tests/                 # Test cases
│   ├── test_01_authentication.py
│   ├── test_02_guest_submission.py
│   ├── test_03_documents.py
│   ├── test_04_news.py
│   ├── test_05_products.py
│   ├── test_06_gallery.py
│   ├── test_07_admin_submissions.py
│   ├── test_08_village_info.py
│   └── test_09_admin_management.py
├── utils/                 # Utility modules
│   ├── driver_manager.py # WebDriver management
│   └── helpers.py        # Helper functions
├── reports/              # Test reports
└── screenshots/          # Test screenshots
```

## 🔍 Debugging

### View Test Output

```bash
pytest -v -s
```

### Run Single Test

```bash
pytest tests/test_01_authentication.py::TestAuthentication::test_successful_login
```

### Keep Browser Open on Failure

Tambahkan `import pdb; pdb.set_trace()` di test:

```python
def test_something(driver):
    # ... test code ...
    import pdb; pdb.set_trace()  # Debugger breakpoint
```

## 📝 Writing New Tests

### 1. Create Page Object

```python
# pages/my_page.py
from selenium.webdriver.common.by import By
from pages.base_page import BasePage

class MyPage(BasePage):
    ELEMENT = (By.ID, "my-element")
    
    def do_something(self):
        return self.click(*self.ELEMENT)
```

### 2. Create Test

```python
# tests/test_my_feature.py
import pytest

@pytest.mark.smoke
class TestMyFeature:
    def test_something(self, driver):
        # Test implementation
        pass
```

## 🐛 Troubleshooting

### ChromeDriver Issues

```bash
# Update webdriver
pip install --upgrade webdriver-manager
```

### Permission Issues

```bash
chmod +x venv/bin/activate
```

### Port Already in Use

Pastikan Laravel dev server running di port yang benar (8000)

## 📄 License

Project ini adalah bagian dari sistem Desa Bantengputih.

## 👥 Contributors

- Your Name - Initial work

## 📞 Support

Untuk bantuan, silakan hubungi tim development.
