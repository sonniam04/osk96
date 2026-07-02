@echo off
echo === OSK96 Setup ===

cd laravel

if not exist .env (
    copy .env.example .env
    echo [OK] สร้าง .env แล้ว
)

echo [..] composer install...
composer install --optimize-autoloader --no-interaction

php artisan key:generate
php artisan storage:link
php artisan config:clear
php artisan cache:clear

echo.
echo === Setup เสร็จแล้ว ===
echo รันด้วยคำสั่ง: php artisan serve
echo เปิด: http://localhost:8000

pause
