# 🏪 Sistem Pendataan UMKM

Aplikasi web berbasis **Laravel 12** untuk pendataan Usaha Mikro, Kecil, dan Menengah (UMKM) dengan fitur CRUD lengkap, pencarian, pagination, dan siap di-deploy ke **Vercel**.

---

## ✨ Fitur Utama

| Fitur | Keterangan |
|---|---|
| 📊 Dashboard | Statistik total UMKM, distribusi jenis usaha, data terbaru |
| 📋 Daftar UMKM | Tabel paginasi 10 data/halaman |
| ➕ Tambah UMKM | Form dengan validasi lengkap |
| ✏️ Edit UMKM | Edit data dengan pre-filled form |
| 👁️ Detail UMKM | Tampilan info lengkap + quick stats skala usaha |
| 🗑️ Hapus UMKM | Konfirmasi modal sebelum hapus |
| 🔍 Pencarian | Cari berdasarkan nama usaha, pemilik, atau jenis usaha |
| 💬 Flash Message | Notifikasi sukses/gagal setiap operasi CRUD |

---

## 🛠️ Tech Stack

- **Framework**: Laravel 12
- **PHP**: 8.2+
- **Database**: MySQL (lokal) / PlanetScale / Neon (cloud)
- **Frontend**: Bootstrap 5 + Blade Template
- **Deployment**: Vercel (serverless PHP)

---

## 🚀 Instalasi Lokal (XAMPP)

### Prasyarat
- XAMPP dengan MySQL aktif
- PHP 8.2+ (sudah termasuk di XAMPP)
- Composer

### Langkah 1 — Clone / Letakkan di XAMPP

```
Salin folder proyek ke: C:\xampp\htdocs\sistem-umkm\
```

### Langkah 2 — Install Dependencies

```bash
composer install
```

### Langkah 3 — Setup Otomatis (Recommended)

Jalankan file `setup.bat` dengan **double-click** atau via CMD:

```bat
setup.bat
```

Script ini akan:
1. Membuat database `sistem_umkm` di MySQL
2. Menjalankan migrasi
3. Meng-import 12 data UMKM dummy

### Langkah 3 — Setup Manual (Alternatif)

```bash
# 1. Buat database di phpMyAdmin dengan nama: sistem_umkm

# 2. Clear config cache
php artisan config:clear

# 3. Jalankan migrasi
php artisan migrate

# 4. Jalankan seeder (opsional — data dummy)
php artisan db:seed

# 5. Storage link
php artisan storage:link
```

### Langkah 4 — Buka Browser

```
http://localhost/sistem-umkm/public
```

---

## ⚙️ Konfigurasi .env

Edit file `.env` sesuai kebutuhan:

```env
APP_NAME="Sistem Pendataan UMKM"
APP_URL=http://localhost/sistem-umkm/public

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_umkm
DB_USERNAME=root
DB_PASSWORD=          # kosong jika XAMPP default
```

---

## 🌐 Deploy ke Vercel

### Prasyarat Vercel
- Akun [Vercel](https://vercel.com)
- Vercel CLI (`npm i -g vercel`)
- Database cloud MySQL/PostgreSQL:
  - [PlanetScale](https://planetscale.com) (MySQL)
  - [Neon](https://neon.tech) (PostgreSQL)
  - [Railway](https://railway.app) (MySQL/PostgreSQL)

### Langkah Deploy

#### 1. Generate APP_KEY
```bash
php artisan key:generate --show
# Salin outputnya, contoh: base64:xxxx...
```

#### 2. Set Environment Variables di Vercel Dashboard

Masuk ke **Vercel → Project → Settings → Environment Variables**, lalu tambahkan:

| Key | Value |
|---|---|
| `APP_NAME` | `Sistem Pendataan UMKM` |
| `APP_ENV` | `production` |
| `APP_KEY` | `base64:xxxx...` (hasil key:generate) |
| `APP_DEBUG` | `false` |
| `APP_URL` | `https://your-project.vercel.app` |
| `DB_CONNECTION` | `mysql` |
| `DB_HOST` | Host dari provider database cloud |
| `DB_PORT` | `3306` |
| `DB_DATABASE` | Nama database cloud |
| `DB_USERNAME` | Username database |
| `DB_PASSWORD` | Password database |
| `SESSION_DRIVER` | `cookie` |
| `CACHE_STORE` | `array` |
| `LOG_CHANNEL` | `stderr` |

#### 3. Deploy via Vercel CLI

```bash
# Login ke Vercel
vercel login

# Deploy (dari direktori proyek)
vercel --prod
```

#### 4. Jalankan Migrasi di Database Cloud

Setelah deploy, jalankan migrasi dari lokal menggunakan koneksi database cloud:

```bash
# Sementara ubah .env ke database cloud, lalu:
php artisan migrate --force

# Kemudian restore .env ke lokal
```

### Struktur File Vercel

```
sistem-umkm/
├── api/
│   └── index.php          ← Entry point serverless Vercel
├── vercel.json            ← Konfigurasi routes & runtime
└── ...
```

---

## 📁 Struktur Direktori Proyek

```
sistem-umkm/
├── app/
│   ├── Http/Controllers/
│   │   ├── DashboardController.php
│   │   └── UmkmController.php
│   ├── Models/
│   │   └── Umkm.php
│   └── Providers/
│       └── AppServiceProvider.php   ← Bootstrap 5 pagination
├── database/
│   ├── migrations/
│   │   └── ..._create_umkm_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── UmkmSeeder.php           ← 12 data dummy
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php            ← Layout utama (dark mode)
│   ├── dashboard.blade.php
│   └── umkm/
│       ├── index.blade.php
│       ├── create.blade.php
│       ├── edit.blade.php
│       └── show.blade.php
├── routes/
│   └── web.php                      ← Resource route
├── api/
│   └── index.php                    ← Vercel entry point
├── vercel.json                      ← Konfigurasi Vercel
├── setup.bat                        ← Script setup Windows
└── .env                             ← Konfigurasi environment
```

---

## 🗄️ Struktur Tabel `umkm`

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | BIGINT (PK) | Auto increment |
| `nama_usaha` | VARCHAR(255) | Nama usaha |
| `nama_pemilik` | VARCHAR(255) | Nama pemilik |
| `jenis_usaha` | VARCHAR(255) | Kategori usaha |
| `alamat` | TEXT | Alamat lengkap |
| `nomor_telepon` | VARCHAR(15) | Angka saja |
| `email` | VARCHAR(255) | Unique |
| `tahun_berdiri` | YEAR | Min 1900 |
| `jumlah_karyawan` | INTEGER | Min 1 |
| `deskripsi_usaha` | TEXT | Nullable |
| `created_at` | TIMESTAMP | — |
| `updated_at` | TIMESTAMP | — |

---

## 🛣️ Routes

```php
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('umkm', UmkmController::class);
```

| Method | URI | Action |
|---|---|---|
| GET | `/` | Dashboard |
| GET | `/umkm` | index — Daftar UMKM |
| GET | `/umkm/create` | create — Form tambah |
| POST | `/umkm` | store — Simpan data |
| GET | `/umkm/{id}` | show — Detail |
| GET | `/umkm/{id}/edit` | edit — Form edit |
| PUT | `/umkm/{id}` | update — Perbarui |
| DELETE | `/umkm/{id}` | destroy — Hapus |

---

## 📝 Validasi Form

| Field | Aturan |
|---|---|
| Nama Usaha | Required, max 255 |
| Nama Pemilik | Required, max 255 |
| Jenis Usaha | Required |
| Alamat | Required |
| Nomor Telepon | Required, angka saja, 8–15 digit |
| Email | Required, format email valid, unique |
| Tahun Berdiri | Required, integer, 1900–sekarang |
| Jumlah Karyawan | Required, integer, min 1 |
| Deskripsi Usaha | Opsional |

---

## 🤝 Kontribusi

Pull request selalu diterima. Untuk perubahan besar, buka issue terlebih dahulu.

---

**© 2024 Sistem Pendataan UMKM — Laravel 12**
