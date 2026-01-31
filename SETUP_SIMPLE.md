# 🚀 INSTRUKSI SETUP LARAGON - SIMPLE & VISUAL

## 📍 Project Path
```
C:\laragon\www\bangun-impian
```

---

## 🎯 5 LANGKAH SETUP (Ikuti Urutan!)

### ✅ LANGKAH 1: BUKA LARAGON
```
Pastikan Laragon sudah running dengan:
- ✓ Apache: ON
- ✓ MySQL: ON
- ✓ MongoDB: Optional
```

---

### ✅ LANGKAH 2: IMPORT DATABASE

**2A. Buka HeidiSQL**
```
Laragon → Database button → HeidiSQL opens
```

**2B. Buat Database Baru**
```
Right-click di panel kiri
↓
New Database
↓
Nama: bangun_impian
Charset: utf8mb4
Collation: utf8mb4_unicode_ci
↓
Click OK
```

**2C. Import SQL File**
```
Select database: bangun_impian
↓
Menu → File → Load SQL file
↓
Browse: C:\laragon\www\bangun-impian\database\bangun_impian.sql
↓
Click Execute/Import
↓
Tunggu sampai selesai (5-10 detik)
```

**Status:** ✅ Database siap dengan 6 tables + sample data

---

### ✅ LANGKAH 3: EDIT .ENV FILE

**3A. Buka File**
```
C:\laragon\www\bangun-impian\.env
(pakai Notepad atau VS Code)
```

**3B. Isi Konfigurasi**
```env
APP_NAME="BangunImpian"
APP_ENV=local
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

**3C. Save File**
```
Ctrl + S
```

**Status:** ✅ .env dikonfigurasi

---

### ✅ LANGKAH 4: GENERATE APP KEY

**4A. Buka Command Prompt / PowerShell**
```
Windows + R
↓
cmd atau powershell
↓
Press Enter
```

**4B. Navigate ke Project**
```bash
cd C:\laragon\www\bangun-impian
```

**4C. Generate Key**
```bash
php artisan key:generate
```

**Output yang diharapkan:**
```
Application key set successfully.
```

**Status:** ✅ App key generated

---

### ✅ LANGKAH 5: SETUP VIRTUAL HOST & TEST

**5A. Edit Hosts File (Requires Admin)**
```
Right-click Notepad → Run as Administrator
↓
File → Open
↓
Navigate to: C:\Windows\System32\drivers\etc\hosts
↓
Add baris baru di akhir:
   127.0.0.1 bangun-impian.test
↓
Save (Ctrl + S)
```

**5B. Edit Virtual Host di Laragon**
```
Laragon Menu → Apache → httpd-vhosts.conf
↓
Scroll to bottom
↓
Add this code:

<VirtualHost *:80>
    ServerName bangun-impian.test
    DocumentRoot "C:/laragon/www/bangun-impian/public"
    <Directory "C:/laragon/www/bangun-impian/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>

↓
Save & Close
```

**5C. Restart Apache**
```
Laragon → Click Restart button
↓
Wait 5-10 seconds
```

**5D. Run Server**
```bash
cd C:\laragon\www\bangun-impian
php artisan serve
```

**Output:**
```
Starting Laravel development server: http://127.0.0.1:8000
```

**5E. Test Access**
```
Option 1: http://127.0.0.1:8000
Option 2: http://bangun-impian.test

Buka salah satu di browser
```

**Status:** ✅ Website live!

---

## 🎉 WEBSITE SIAP!

Jika semua langkah berhasil, Anda akan melihat:

✅ **Homepage** dengan:
- Navbar BangunImpian
- Hero section dengan buttons
- About section dengan statistics
- 6 Services cards
- Portfolio showcase
- Contact form
- WhatsApp floating button (bottom-right)
- Footer

---

## 🧪 TEST CHECKLIST

Setelah akses website, cek:

- [ ] Homepage loads tanpa error
- [ ] Navbar links berfungsi
- [ ] WhatsApp button visible (bottom-right)
- [ ] WhatsApp button responsive (test di mobile view)
- [ ] Images loading correctly
- [ ] Colors correct (blue #2a5f7f, orange #e67e22)
- [ ] Animations smooth
- [ ] Contact form buttons visible
- [ ] Mobile responsive (F12 → toggle device)

---

## 🚨 JIKA ADA ERROR

### Error: "Connection refused" (Database)
```
Solusi:
1. Check MySQL running di Laragon
2. Verify database name: bangun_impian
3. Try import SQL lagi
```

### Error: "Virtual host not found"
```
Solusi:
1. Restart Apache (Laragon button)
2. Check hosts file
3. Check httpd-vhosts.conf syntax
```

### Error: "Class not found"
```
Solusi:
cd C:\laragon\www\bangun-impian
composer dump-autoload
php artisan clear-cache
```

### Port 8000 sudah dipakai
```
Solusi:
php artisan serve --port=8001
Atau kill process: netstat -ano | findstr :8000
```

---

## 📁 File Penting

| File | Lokasi | Untuk |
|------|--------|-------|
| .env | Root folder | Configuration |
| app.blade.php | resources/views/layouts/ | Master template |
| home.blade.php | resources/views/ | Homepage |
| HomeController.php | app/Http/Controllers/ | Logic |
| bangun_impian.sql | database/ | Database schema |

---

## 📱 TESTING MOBILE

**Buka Developer Tools:**
```
F12 atau Ctrl + Shift + I
↓
Click device toggle icon
↓
Select device: iPhone, Galaxy, Pixel
↓
Test responsiveness
```

---

## ✨ WHATSAPP BUTTON TEST

Klik WhatsApp button (hijau di corner) → harus:
- ✅ Buka WhatsApp / Browser
- ✅ Linked ke: +6285733867375
- ✅ Pre-filled message
- ✅ Icon resmi WhatsApp

---

## 🎯 NEXT STEPS (Opsional)

Setelah setup berhasil:

1. Login ke Admin (nanti)
2. Upload portfolio images
3. Add testimonials
4. Setup email notifications
5. Customize colors/fonts
6. Deploy ke production

---

## 📞 QUICK REFERENCE

| Aksi | Command |
|-----|---------|
| Start server | `php artisan serve` |
| Clear cache | `php artisan clear-cache` |
| Tinker (DB) | `php artisan tinker` |
| View logs | `tail -f storage/logs/laravel.log` |
| Restart Laragon | Laragon → Restart button |

---

## 🎉 STATUS SEKARANG

✅ Laravel project created  
✅ Database schema ready  
✅ Frontend design complete  
✅ WhatsApp integration done  
✅ Responsive design ready  
✅ Sample data included  

**= SIAP LAUNCH! 🚀**

---

**Time to Complete:** ~20 minutes  
**Difficulty:** Easy  
**Recommended:** Follow steps in order  
**Support:** Check SETUP_GUIDE.md or QUICK_START.md  

---

**Last Updated:** December 15, 2025  
**Version:** 1.0.0 Simple Guide
