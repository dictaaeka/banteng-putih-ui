# 🌾 Website Desa Banteng Putih

Website dinamis untuk Desa Banteng Putih menggunakan **Laravel 11**, **Filament v3**, **Livewire v3**, dan integrasi **Spatie Media Library**. Mendukung panel admin, form interaktif, pengelolaan konten dinamis (produk, berita, layanan, dll), dan siap untuk deployment.

---

## 🚀 Fitur Utama

- Panel admin dengan Filament
- Komponen frontend Livewire (tanpa JavaScript manual)
- Manajemen file & gambar dengan Spatie Media Library
- Form kontak, galeri, testimoni, berita, layanan, dsb.
- Statistik penduduk dan dokumen publik
- Dukungan slug otomatis, ekspor Excel, dan validasi

---

## 🛠️ Instalasi Lokal

### 1. Clone & Install

```bash
git clone https://github.com/AnandaBintang/desa-banteng-putih.git
cd desa-banteng-putih

composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
````

### 2. Konfigurasi `.env`

```env
DB_DATABASE=desa
DB_USERNAME=root
DB_PASSWORD=

APP_URL=http://localhost:8000

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=desa@example.com
MAIL_FROM_NAME="Website Desa"
```

### 3. Migrasi & Seeder

```bash
php artisan migrate --seed
php artisan storage:link
```

### 4. Jalankan Aplikasi

```bash
php artisan serve
```

Akses:

* Website: `http://localhost:8000`
* Panel Admin: `http://localhost:8000/admin`

---

## 🔐 Akun Admin Default

```txt
Email   : admin@desa.test
Password: password
```

---

## 📦 Dependensi Utama

| Package                                        | Fungsi                   |
| ---------------------------------------------- | ------------------------ |
| `filament/filament`                            | Panel Admin              |
| `livewire/livewire`                            | Komponen Interaktif      |
| `spatie/laravel-medialibrary`                  | Upload Media             |
| `filament/spatie-laravel-media-library-plugin` | Integrasi media di admin |
| `cviebrock/eloquent-sluggable`                 | Slug otomatis            |
| `maatwebsite/excel`                            | Impor/Ekspor Excel       |
| `barryvdh/laravel-debugbar`                    | Debugging (dev only)     |

---

## 📎 Lisensi

Proyek ini dikembangkan untuk keperluan publikasi desa secara terbuka dan transparan.
Lisensi: MIT.

---
