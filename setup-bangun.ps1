# Laravel Setup Script for BangunImpian
$projectPath = "c:\laragon\www\bangun-impian"
$results = @()

# Change to project directory
Set-Location $projectPath

Write-Host "=== BangunImpian Laravel Setup ===" -ForegroundColor Cyan

# Step 1: Ensure composer dependencies are installed
Write-Host "`n[STEP 0] Installing Composer Dependencies..." -ForegroundColor Yellow
try {
    $composerOutput = & composer install 2>&1
    if ($LASTEXITCODE -eq 0) {
        Write-Host "[OK] Composer dependencies installed successfully" -ForegroundColor Green
        $results += @{ Step = "Composer Install"; Status = "SUCCESS" }
    } else {
        Write-Host "[FAIL] Composer install failed" -ForegroundColor Red
        $results += @{ Step = "Composer Install"; Status = "FAILED" }
    }
} catch {
    Write-Host "[FAIL] Error: $_" -ForegroundColor Red
    $results += @{ Step = "Composer Install"; Status = "FAILED"; Error = $_.Exception.Message }
}

# Step 1: Generate APP_KEY
Write-Host "`n[STEP 1] Generating APP_KEY..." -ForegroundColor Yellow
try {
    $keyOutput = & php artisan key:generate 2>&1
    if ($LASTEXITCODE -eq 0) {
        Write-Host "[OK] APP_KEY generated successfully" -ForegroundColor Green
        $results += @{ Step = "Generate APP_KEY"; Status = "SUCCESS" }
    } else {
        Write-Host "[FAIL] APP_KEY generation failed: $keyOutput" -ForegroundColor Red
        $results += @{ Step = "Generate APP_KEY"; Status = "FAILED"; Error = $keyOutput }
    }
} catch {
    Write-Host "[FAIL] Error: $_" -ForegroundColor Red
    $results += @{ Step = "Generate APP_KEY"; Status = "FAILED"; Error = $_.Exception.Message }
}

# Step 4: Update .env file with configuration
Write-Host "`n[STEP 4] Configuring .env file..." -ForegroundColor Yellow
try {
    $envContent = @"
APP_NAME=BangunImpian
APP_ENV=local
APP_DEBUG=true
APP_URL=http://bangun-impian.test

LOG_CHANNEL=single
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bangun_impian
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=cookie
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_HOST=localhost
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=hello@example.com
MAIL_FROM_NAME="BangunImpian"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY=
MIX_PUSHER_APP_CLUSTER=mt1
"@
    
    $envPath = Join-Path $projectPath ".env"
    Set-Content -Path $envPath -Value $envContent -Encoding UTF8
    Write-Host "[OK] .env file configured successfully" -ForegroundColor Green
    $results += @{ Step = "Configure .env"; Status = "SUCCESS" }
} catch {
    Write-Host "[FAIL] Error: $_" -ForegroundColor Red
    $results += @{ Step = "Configure .env"; Status = "FAILED"; Error = $_.Exception.Message }
}

# Step 2: Create database (via command line)
Write-Host "`n[STEP 2] Creating MySQL Database..." -ForegroundColor Yellow
Write-Host "[INFO] Database creation requires manual action" -ForegroundColor Yellow
Write-Host "[INFO] Please use Laragon's phpMyAdmin or HeidiSQL to create database" -ForegroundColor Yellow
$results += @{ Step = "Create Database"; Status = "MANUAL_REQUIRED"; Note = "Create database 'bangun_impian' using phpMyAdmin or HeidiSQL" }

# Step 3: Run migrations
Write-Host "`n[STEP 3] Running Database Migrations..." -ForegroundColor Yellow
Write-Host "[INFO] Migrations will run after database is created" -ForegroundColor Yellow
Write-Host "[INFO] Run: php artisan migrate --force" -ForegroundColor Yellow
$results += @{ Step = "Run Migrations"; Status = "PENDING"; Note = "Run after database is created" }

# Step 5: Virtual host setup instructions
Write-Host "`n[STEP 5] Virtual Host Setup..." -ForegroundColor Yellow
Write-Host "[INFO] Virtual host configuration requires manual setup in Laragon" -ForegroundColor Yellow
Write-Host "  Please follow these steps:" -ForegroundColor Cyan
Write-Host "  1. Open Laragon application" -ForegroundColor Cyan
Write-Host "  2. Right-click on the application root" -ForegroundColor Cyan
Write-Host "  3. Select 'Edit Hosts'" -ForegroundColor Cyan
Write-Host "  4. Add: 127.0.0.1 bangun-impian.test" -ForegroundColor Cyan
Write-Host "  5. Select 'Edit vhosts' and configure bangun-impian.test" -ForegroundColor Cyan
Write-Host "  6. Restart Laragon services" -ForegroundColor Cyan
$results += @{ Step = "Virtual Host Setup"; Status = "MANUAL_REQUIRED"; Instructions = "See above" }

# Step 6: Verify setup
Write-Host "`n[STEP 6] Verifying Setup..." -ForegroundColor Yellow
try {
    $checkOutput = & php artisan --version 2>&1
    if ($LASTEXITCODE -eq 0) {
        Write-Host "[OK] Laravel installation verified: $checkOutput" -ForegroundColor Green
        $results += @{ Step = "Verify Setup"; Status = "SUCCESS"; Version = $checkOutput }
    }
} catch {
    Write-Host "[FAIL] Verification failed: $_" -ForegroundColor Red
}

# Summary Report
Write-Host "`n`n=== SETUP SUMMARY ===" -ForegroundColor Cyan
Write-Host "============================================================" -ForegroundColor Cyan

foreach ($result in $results) {
    $step = $result.Step
    $status = $result.Status
    
    switch ($status) {
        "SUCCESS" { $color = "Green"; $icon = "[OK]" }
        "FAILED" { $color = "Red"; $icon = "[FAIL]" }
        "PENDING" { $color = "Yellow"; $icon = "[PENDING]" }
        "MANUAL_REQUIRED" { $color = "Yellow"; $icon = "[MANUAL]" }
        "NEEDS_VERIFICATION" { $color = "Yellow"; $icon = "[INFO]" }
        default { $color = "White"; $icon = "[?]" }
    }
    
    Write-Host "$icon $step : $status" -ForegroundColor $color
    
    if ($result.Note) {
        Write-Host "    Note: $($result.Note)" -ForegroundColor $color
    }
    if ($result.Error) {
        Write-Host "    Error: $($result.Error)" -ForegroundColor Red
    }
}

Write-Host "============================================================" -ForegroundColor Cyan
Write-Host "`nNEXT STEPS:" -ForegroundColor Cyan
Write-Host "1. Create MySQL database 'bangun_impian' using Laragon phpMyAdmin/HeidiSQL" -ForegroundColor White
Write-Host "2. Run: php artisan migrate --force" -ForegroundColor White
Write-Host "3. Configure virtual host (see STEP 5 above)" -ForegroundColor White
Write-Host "4. Restart Laragon services" -ForegroundColor White
Write-Host "5. Run: php artisan serve" -ForegroundColor White
Write-Host "6. Access: http://bangun-impian.test or http://localhost:8000" -ForegroundColor White

Write-Host "`nSetup script completed!" -ForegroundColor Green
