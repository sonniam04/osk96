@echo off
echo === OSK96 Update ===

git pull

cd laravel
composer install --optimize-autoloader --no-interaction
php artisan config:clear
php artisan cache:clear

echo.
echo === Update เสร็จแล้ว ===
echo รันด้วยคำสั่ง: php artisan serve

pause
