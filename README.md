# Bangun Impian - Admin CRUD System

Modern Laravel-based website for Bangun Impian construction company with complete admin panel for managing contacts, portfolio, and services.

## Features ✨

### Public Website
- Home page with navigation
- About company (Tentang)
- Services showcase (Layanan) - 6 professional services with features
- Portfolio gallery (Portofolio) - project filtering by category
- Contact form (Kontak) - automatic database saving

### Admin Panel
- 🔐 **Secure Login** - Email/password authentication with `is_admin` role check
- 📊 **Dashboard** - Statistics and quick overview
- 💬 **Kontak Management** - CRUD for contact submissions with status tracking (baru/dibaca/selesai)
- 🖼️ **Portfolio Management** - Full CRUD with image upload (max 2MB, auto-deletion on replace)
- 🎨 **Layanan Management** - Manage 6 services with 3 feature fields each

## Stack

- Laravel 12.42.0 (PHP 8.2.28)
- MySQL via Laragon
- Bootstrap 5 UI
- Eloquent ORM

## Quick Start 🚀

```bash
# 1. Install dependencies
composer install

# 2. Setup environment
cp .env.example .env
php artisan key:generate

# 3. Database
php artisan migrate
php artisan db:seed

# 4. Start server
php artisan serve --host=127.0.0.1 --port=8000

# 5. Access
# Website: http://127.0.0.1:8000
# Admin: http://127.0.0.1:8000/admin/login
```

## Admin Login

```
Email: admin@local
Password: password
```

⚠️ **IMPORTANT:** Change credentials immediately in production!

## Database Tables

| Table | Purpose | Columns |
|-------|---------|---------|
| `users` | Admin accounts | id, name, email, password, is_admin (boolean) |
| `kontaks` | Contact submissions | nama, email, telepon, jenis_proyek, pesan, status (enum: baru/dibaca/selesai) |
| `portfolios` | Projects | nama_proyek, kategori, judul, deskripsi, luas, tahun, gambar (filepath) |
| `layanans` | Services | judul, deskripsi, fitur_1, fitur_2, fitur_3, icon_color |

## Routes Overview

### Public Routes
```
GET  /                 → Home
GET  /tentang          → About
GET  /layanan          → Services
GET  /portofolio       → Portfolio
GET  /kontak           → Contact form
POST /kontak           → Save contact to DB
```

### Admin Routes (Protected by EnsureAdmin middleware)
```
GET  /admin/login               → Login page
POST /admin/login               → Process login
POST /admin/logout              → Logout

GET  /admin                     → Dashboard
GET  /admin/kontak              → List contacts (paginated)
POST /admin/kontak              → Create new contact
GET  /admin/kontak/{id}/edit    → Edit contact form
PUT  /admin/kontak/{id}         → Update contact
DELETE /admin/kontak/{id}       → Delete contact

# Same pattern for /admin/portfolio and /admin/layanan
```

## Key Features

### Authentication
- Email/password login with session management
- `is_admin` flag on users table for role-based access
- EnsureAdmin middleware protects all admin routes
- Automatic logout on unauthorized access

### Kontak Management
- View all contact form submissions with pagination
- Edit status: baru (new) → dibaca (read) → selesai (completed)
- Delete old submissions
- Validation on form fields

### Portfolio Management
- Upload project images (JPEG, PNG, GIF, max 2MB)
- Auto-delete old images when replaced
- Categorize by: rumah, komersial, ibadah
- Display luas (area) and tahun (year)

### Layanan Management
- Edit company services
- Add 3 features per service
- Customize icon colors

## File Structure

```
app/Models/              → Kontak, Portfolio, Layanan models
app/Http/Controllers/Admin/
  ├─ AdminAuthController.php    (login/logout)
  ├─ KontakController.php       (CRUD)
  ├─ PortfolioController.php    (CRUD + image)
  └─ LayananController.php      (CRUD)

app/Http/Middleware/
  └─ EnsureAdmin.php            (protect admin routes)

resources/views/
  ├─ layouts/app.blade.php      (main layout)
  ├─ home.blade.php, tentang.blade.php, layanan.blade.php, etc.
  └─ admin/                     (all admin panel views)
    ├─ auth/login.blade.php
    ├─ dashboard.blade.php
    ├─ kontak/, portfolio/, layanan/  (CRUD views)

database/
  ├─ migrations/        (4 tables: users, sessions, kontaks, portfolios, layanans)
  └─ seeders/DatabaseSeeder.php  (creates admin@local user)

tests/Feature/          (AdminKontakTest, AdminPortfolioTest, AdminLayananTest)
```

## Testing

```bash
php artisan test --testsuite=Feature
```

Tests included:
- Admin can create Kontak (contact)
- Admin can create Layanan (service)
- Admin can create Portfolio (project)

## Common Tasks

### Change Admin Password
```php
php artisan tinker
> \App\Models\User::where('email', 'admin@local')->update(['password' => bcrypt('newpassword')])
```

### Clear Cache
```bash
php artisan cache:clear
php artisan view:clear
```

### Create Storage Symlink (for images)
```bash
php artisan storage:link
```

### Backup Database
```bash
php artisan tinker
> DB::connection('mysql')->statement("BACKUP DATABASE bangun_impian TO '/tmp/backup.sql'");
```

## Troubleshooting

**Login fails with "Email atau kata sandi salah"**
- Verify email is `admin@local` and password is `password`
- Check user exists: `php artisan tinker` → `User::first()`

**Images not displaying**
- Run: `php artisan storage:link`
- Check permissions on `storage/app/public/`

**Admin routes give 403 Forbidden**
- Ensure user has `is_admin` = true
- Clear session: `php artisan tinker` → `Cache::flush()`

**Server won't start on port 8000**
- Try: `php artisan serve --host=127.0.0.1 --port=8001`
- Check for other processes: `lsof -i :8000` (Mac/Linux) or `netstat -ano | findstr :8000` (Windows)

## Security

- Passwords hashed with bcrypt
- CSRF tokens on all forms
- Admin routes require authentication + `is_admin` role
- SQL injection prevention via Eloquent ORM
- XSS protection via Blade templating

## License

Proprietary - Bangun Impian 2026

## Support

Contact development team for issues or feature requests.
