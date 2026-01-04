# Quick Start Guide - Test Automation

## 🚀 Quick Setup (5 menit)

### 1. Run Setup Script

```bash
cd automation-test
bash ./setup.sh
```

### 2. Activate Virtual Environment

```bash
source venv/bin/activate
```

### 3. Configure Credentials

Edit `.env` file dan sesuaikan:
- `ADMIN_EMAIL` - Email admin untuk login
- `ADMIN_PASSWORD` - Password admin

### 4. Start Laravel Application

Di terminal baru:
```bash
cd ..
php artisan serve
```

### 5. Run Tests!

```bash
# Run semua tests
pytest

# Atau run specific test
pytest tests/test_01_authentication.py -v
```

## 📊 View Results

- HTML Report: `reports/report.html`
- Screenshots (jika ada failure): `screenshots/`

## 🎯 Next Steps

Setelah test pertama (Authentication) berhasil, kita akan menambahkan test untuk:
- Guest submissions
- Documents CRUD
- News CRUD
- Products CRUD
- Gallery CRUD
- Admin submissions management
- Village information
- Admin management

Setiap test akan menggunakan Page Object Model pattern yang sama seperti authentication test.

## 💡 Tips

1. **Gunakan headless mode** untuk testing yang lebih cepat:
   ```bash
   HEADLESS=true pytest
   ```

2. **Run only smoke tests**:
   ```bash
   pytest -m smoke
   ```

3. **Keep browser open** untuk debugging:
   - Set `HEADLESS=false` di .env
   - Tambahkan `time.sleep(10)` di test yang ingin di-debug

4. **Parallel execution**:
   ```bash
   pytest -n 4
   ```
