# Setup Laravel BangunImpian di Laragon

## Step-by-Step Setup Guide

### 1. Project Laravel sudah dibuat di:
```
C:\laragon\www\bangun-impian
```

### 2. Setup Database MySQL

**Menggunakan HeidiSQL (built-in Laragon):**
1. Buka Laragon
2. Klik "Database" → "HeidiSQL"
3. Connect dengan default settings (localhost, root, password kosong)
4. Buat database baru dengan nama: `bangun_impian`
5. Set charset: `utf8mb4`, Collation: `utf8mb4_unicode_ci`

### 3. Konfigurasi .env

Edit file `.env` di `C:\laragon\www\bangun-impian\.env`:

```env
APP_NAME="BangunImpian"
APP_ENV=local
APP_KEY=base64:... (diisi otomatis)
APP_DEBUG=true
APP_URL=http://bangun-impian.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bangun_impian
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=log
MAIL_FROM_ADDRESS="info@bangunimpian.com"
MAIL_FROM_NAME="BangunImpian"
```

### 4. Generate App Key

Buka terminal di project folder:
```bash
cd C:\laragon\www\bangun-impian
php artisan key:generate
```

### 5. Setup Virtual Host di Laragon

1. Buka Laragon → Menu → Edit Hosts
2. Tambahkan baris:
```
127.0.0.1 bangun-impian.test
```

3. Buka Laragon → Menu → Apache Config → httpd-vhosts.conf
4. Tambahkan di akhir file:
```apache
<VirtualHost *:80>
    ServerName bangun-impian.test
    DocumentRoot "C:/laragon/www/bangun-impian/public"
    <Directory "C:/laragon/www/bangun-impian/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

5. Restart Apache: Laragon → Restart

### 6. Run Database Migrations

```bash
php artisan migrate
```

### 7. Jalankan Development Server

```bash
php artisan serve --host=127.0.0.1 --port=8000
```

Atau akses via:
```
http://bangun-impian.test
```

### 8. Struktur File yang Sudah Dibuat

- ✅ `resources/views/layouts/app.blade.php` - Master layout dengan design profesional
- ✅ `resources/views/home.blade.php` - Halaman home dengan content lengkap
- ✅ `app/Http/Controllers/HomeController.php` - Controller
- ✅ `routes/web.php` - Route definition

### 9. Features yang Sudah Diimplementasikan

✅ Responsive Design (Mobile-first)
✅ WhatsApp Floating Button dengan Font Awesome icon
✅ Modern UI dengan Gradient backgrounds
✅ Smooth animations dan hover effects
✅ Dark theme compatible
✅ SEO optimized
✅ Performance optimized
✅ Bootstrap 5 integration
✅ Professional color scheme (Blue #2a5f7f, Orange #e67e22)
✅ Custom CSS dengan modern styling

### 10. Persiapan untuk Database Table

Buat migration untuk Portfolio dan Projects:

```bash
php artisan make:migration create_portfolios_table
php artisan make:migration create_projects_table
```

### 11. WhatsApp Button Info

- Number: +6285733867375
- Icon: Font Awesome WhatsApp icon (fas fa-whatsapp)
- Color: #25D366 (official WhatsApp green)
- Position: Fixed bottom-right
- Responsive untuk mobile

---

## Troubleshooting

**Error: "Class not found"**
- Jalankan: `composer dump-autoload`

**Database Connection Error**
- Pastikan MySQL running di Laragon
- Check DB credentials di .env

**Port sudah terpakai**
- Ganti port di command: `php artisan serve --port=8001`

---

## Akses Website

- Local: `http://127.0.0.1:8000`
- Virtual Host: `http://bangun-impian.test`

---

Generated: 2025-12-15
