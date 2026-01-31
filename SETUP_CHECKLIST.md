# 🚀 BangunImpian Laravel Setup Checklist

**Project Location:** `C:\laragon\www\bangun-impian`  
**Status:** ✅ Ready for Laragon Integration  

---

## ✅ Phase 1: Project Structure (COMPLETED)

- [x] Laravel project created
- [x] Blade template layout created (`resources/views/layouts/app.blade.php`)
- [x] Home page view created (`resources/views/home.blade.php`)
- [x] HomeController created
- [x] Route configured for home page
- [x] CSS styling with modern design
- [x] WhatsApp button with Font Awesome icon
- [x] Responsive mobile design
- [x] Professional color scheme (Blue #2a5f7f, Orange #e67e22)

---

## 📋 Phase 2: Database Setup (DO THIS FIRST)

### Step 1: Create Database
- [ ] Open Laragon → Click "Database" button
- [ ] Open HeidiSQL
- [ ] Create new database:
  - Name: `bangun_impian`
  - Charset: `utf8mb4`
  - Collation: `utf8mb4_unicode_ci`

### Step 2: Import SQL Schema
- [ ] In HeidiSQL, select `bangun_impian` database
- [ ] Right-click → "Load SQL file"
- [ ] Select: `C:\laragon\www\bangun-impian\database\bangun_impian.sql`
- [ ] Click Execute

**Tables yang akan dibuat:**
- ✅ portfolios
- ✅ services
- ✅ testimonials
- ✅ contacts
- ✅ users
- ✅ projects

---

## 🔧 Phase 3: Laravel Configuration

### Step 1: Setup .env File
Open `C:\laragon\www\bangun-impian\.env`:

```env
APP_NAME="BangunImpian"
APP_ENV=local
APP_KEY=base64:... (FILL THIS)
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

### Step 2: Generate Application Key
```bash
cd C:\laragon\www\bangun-impian
php artisan key:generate
```

---

## 🌐 Phase 4: Laragon Configuration

### Step 1: Edit Hosts File
- [ ] Laragon Menu → "Edit Hosts" (requires admin)
- [ ] Add line:
```
127.0.0.1 bangun-impian.test
```

### Step 2: Create Virtual Host
- [ ] Laragon Menu → "Apache Conf" → "httpd-vhosts.conf"
- [ ] Add at end of file:

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

### Step 3: Restart Apache
- [ ] Click Laragon "Restart" button
- [ ] Wait 5-10 seconds for restart

---

## 🧪 Phase 5: Testing & Launch

### Step 1: Start Development Server
```bash
cd C:\laragon\www\bangun-impian
php artisan serve --host=127.0.0.1 --port=8000
```

### Step 2: Test Access
- [ ] Via port: `http://127.0.0.1:8000`
- [ ] Via virtual host: `http://bangun-impian.test`
- [ ] Check homepage loads correctly
- [ ] Test WhatsApp button (should open wa.me/6285733867375)
- [ ] Test responsive design (F12 → toggle device)
- [ ] Test all navigation links

### Step 3: Database Check
```bash
php artisan tinker
# Run these commands:
Portfolio::count()  # Should show: 3
Service::count()    # Should show: 6
User::count()       # Should show: 1 (admin)
```

---

## 📦 Files Tersedia

| File | Location | Purpose |
|------|----------|---------|
| app.blade.php | `resources/views/layouts/` | Master layout template |
| home.blade.php | `resources/views/` | Homepage view |
| HomeController.php | `app/Http/Controllers/` | Home page logic |
| bangun_impian.sql | `database/` | Database schema |
| SETUP_GUIDE.md | Root folder | Detailed setup guide |

---

## 🎯 Setelah Setup Selesai

### Buat Models & Migrations
```bash
php artisan make:model Portfolio
php artisan make:model Service
php artisan make:model Testimonial
php artisan make:model Contact

php artisan migrate
```

### Tambah Admin Pages
Contoh untuk manage portfolio:
```bash
php artisan make:controller Admin/PortfolioController --resource
php artisan make:migration create_portfolios_table
```

### Setup Authentication (Opsional)
```bash
php artisan make:auth
php artisan migrate
```

---

## 🚨 Troubleshooting

### Masalah: "Class not found"
```bash
composer dump-autoload
php artisan clear-cache
```

### Masalah: "Connection refused" (database)
- Pastikan MySQL service running di Laragon
- Check .env DB credentials
- Test via HeidiSQL

### Masalah: "Virtual host not found"
- Restart Apache dari Laragon
- Check hosts file (run Notepad as admin)
- Verify httpd-vhosts.conf syntax

### Masalah: Port 8000 sudah digunakan
```bash
php artisan serve --port=8001
```

---

## 📊 Project Statistics

| Metric | Value |
|--------|-------|
| Total Files | 20+ |
| HTML Templates | 2 |
| Controllers | 1 |
| Database Tables | 6 |
| CSS Lines | 600+ |
| Sample Data Rows | 10+ |
| Responsive Breakpoints | 4 |
| Font Awesome Icons | 1 (WhatsApp) |

---

## 🎨 Design Specifications

| Element | Specification |
|---------|----------------|
| Primary Color | #2a5f7f (Blue) |
| Accent Color | #e67e22 (Orange) |
| Font Family | Poppins (Google Fonts) |
| Font Weights | 400, 500, 600, 700, 800 |
| Button Style | Rounded (border-radius: 50px) |
| Shadows | Material Design (0 4px 12px) |
| Animations | Smooth (0.3s ease) |

---

## 📱 WhatsApp Configuration

**Number:** +6285733867375  
**Button Style:** Fixed position bottom-right  
**Icon:** Font Awesome (fas fa-whatsapp)  
**Color:** #25D366 (Official WhatsApp)  
**Hover Effect:** Scale 1.1, darker green  
**Message Template:** Pre-filled with greeting

---

## 🔒 Security Checklist

- [ ] .env file added to .gitignore
- [ ] APP_DEBUG set to false in production
- [ ] APP_KEY generated (not empty)
- [ ] Database password set (if needed)
- [ ] HTTPS configured (production only)
- [ ] Admin users created
- [ ] File permissions set correctly

---

## ✨ Next Steps

1. ✅ Complete database setup (Phase 2)
2. ✅ Configure .env file (Phase 3)
3. ✅ Setup Laragon virtual host (Phase 4)
4. ✅ Test access & functionality (Phase 5)
5. 🔄 Create admin dashboard
6. 🔄 Setup contact form processing
7. 🔄 Add image upload functionality
8. 🔄 Setup email notifications
9. 🔄 Deploy to production

---

**Last Updated:** December 15, 2025  
**Setup Time:** ~30 minutes  
**Status:** 🟢 Ready for Phase 2 (Database Setup)

---

## 📞 Quick Support

Jika ada masalah:
1. Check SETUP_GUIDE.md untuk detail lengkap
2. Lihat Troubleshooting section di atas
3. Verify database import di HeidiSQL
4. Check Laravel logs: `storage/logs/`
