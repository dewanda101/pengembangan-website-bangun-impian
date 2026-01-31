# 🚀 COMMAND REFERENCE - COPY & PASTE READY

## 1️⃣ NAVIGATE TO PROJECT
```bash
cd C:\laragon\www\bangun-impian
```

## 2️⃣ GENERATE APP KEY
```bash
php artisan key:generate
```
Expected: `Application key set successfully.`

## 3️⃣ START DEVELOPMENT SERVER
```bash
php artisan serve
```
Access: `http://127.0.0.1:8000`

## 4️⃣ ALTERNATIVE: START ON DIFFERENT PORT
```bash
php artisan serve --port=8001
```
Access: `http://127.0.0.1:8001`

## 5️⃣ CLEAR CACHE & RELOAD
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## 6️⃣ COMPOSER RELOAD
```bash
composer dump-autoload
```

## 7️⃣ DATABASE: CHECK CONNECTION
```bash
php artisan tinker
```
Then type:
```
DB::connection()->getPDO()
```
Exit: `exit()`

## 8️⃣ DATABASE: COUNT RECORDS
```bash
php artisan tinker
Portfolio::count()
Service::count()
User::count()
```

## 9️⃣ VIEW LOGS
```bash
tail -f storage/logs/laravel.log
```
(Press Ctrl+C to exit)

## 🔟 RESET DATABASE
```bash
php artisan migrate:refresh --seed
```

## ⚡ QUICK DEVELOPMENT SETUP
```bash
cd C:\laragon\www\bangun-impian
php artisan key:generate
php artisan serve
```
Then open: `http://127.0.0.1:8000`

---

## 🎯 COMMON ISSUES & FIXES

### Port 8000 Busy
```bash
# Use different port
php artisan serve --port=8001

# Or kill process
netstat -ano | findstr :8000
taskkill /PID <PID> /F
```

### Database Connection Error
```bash
# Check database exists in MySQL
# Verify .env file credentials
# Check MySQL service running in Laragon
```

### "Class not found" Error
```bash
composer dump-autoload
php artisan clear-cache
php artisan config:cache
```

### Want to See All Commands
```bash
php artisan
# Shows all available commands
```

---

## 📱 TESTING IN BROWSER

### Desktop View
```
http://127.0.0.1:8000
```

### Mobile View
```
F12 (Developer Tools)
→ Toggle Device Toolbar (Ctrl+Shift+M)
→ Select device (iPhone, Galaxy, etc.)
```

### Virtual Host
```
http://bangun-impian.test
(Only works if virtual host is configured)
```

---

## 🔧 USEFUL ARTISAN COMMANDS

```bash
# Check Laravel version
php artisan --version

# List all routes
php artisan route:list

# Clear all cache
php artisan cache:flush

# Show application info
php artisan about

# Tinker interactive shell
php artisan tinker

# Run queue
php artisan queue:work

# Scheduler
php artisan schedule:run
```

---

## 📝 QUICK .ENV CHECKLIST

```env
✓ APP_NAME="BangunImpian"
✓ APP_ENV=local
✓ APP_DEBUG=true
✓ APP_KEY=base64:... (auto-filled)
✓ APP_URL=http://bangun-impian.test

✓ DB_CONNECTION=mysql
✓ DB_HOST=127.0.0.1
✓ DB_PORT=3306
✓ DB_DATABASE=bangun_impian
✓ DB_USERNAME=root
✓ DB_PASSWORD=
```

---

## 🎯 PRODUCTION CHECKLIST

Before deployment:
```bash
# Build assets
npm run build

# Migrate database
php artisan migrate --force

# Optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set .env to production
APP_ENV=production
APP_DEBUG=false
```

---

**Last Updated:** December 15, 2025  
**For:** BangunImpian Laravel Project  
**Ready:** Copy-paste commands directly in terminal
