@echo off
chcp 65001 >nul
echo.
echo ╔══════════════════════════════════════════════════════╗
echo ║       SETUP - Sistem Pendataan UMKM (Laravel 12)     ║
echo ╚══════════════════════════════════════════════════════╝
echo.

:: Pastikan PHP tersedia
where php >nul 2>&1
IF %ERRORLEVEL% NEQ 0 (
    echo [ERROR] PHP tidak ditemukan di PATH.
    echo         Pastikan XAMPP sudah berjalan dan PHP ada di PATH.
    echo         Contoh tambahkan: C:\xampp\php ke System PATH
    pause
    exit /b 1
)

echo [1/5] Membuat database MySQL...
"C:\xampp\mysql\bin\mysql.exe" -u root -e "CREATE DATABASE IF NOT EXISTS sistem_umkm CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;" 2>&1
IF %ERRORLEVEL% NEQ 0 (
    echo [WARN] Gagal membuat database otomatis. Buat manual di phpMyAdmin.
    echo        Nama database: sistem_umkm
) ELSE (
    echo [OK]  Database sistem_umkm berhasil dibuat.
)

echo.
echo [2/5] Membersihkan config cache...
php artisan config:clear
php artisan cache:clear

echo.
echo [3/5] Menjalankan migrasi database...
php artisan migrate --force
IF %ERRORLEVEL% NEQ 0 (
    echo [ERROR] Migrasi gagal. Periksa koneksi database di .env
    pause
    exit /b 1
)
echo [OK]  Migrasi berhasil.

echo.
echo [4/5] Menjalankan seeder (data dummy)...
php artisan db:seed --force
IF %ERRORLEVEL% NEQ 0 (
    echo [WARN] Seeder gagal, tapi aplikasi tetap bisa digunakan.
) ELSE (
    echo [OK]  12 data UMKM dummy berhasil ditambahkan.
)

echo.
echo [5/5] Membuat symlink storage...
php artisan storage:link 2>nul
echo [OK]  Setup selesai.

echo.
echo ╔══════════════════════════════════════════════════════╗
echo ║  SELESAI! Buka browser:                              ║
echo ║  http://localhost/sistem-umkm/public                 ║
echo ╚══════════════════════════════════════════════════════╝
echo.
pause
