#!/bin/bash
set -e

echo "=== OSK96 Setup ==="

cd laravel

# Copy .env
if [ ! -f .env ]; then
  cp .env.example .env
  echo "[OK] สร้าง .env แล้ว"
fi

# Install dependencies
echo "[..] composer install..."
composer install --optimize-autoloader --no-interaction

# Generate app key
php artisan key:generate

# Create storage symlink and clear cache
php artisan storage:link 2>/dev/null || true
php artisan config:clear
php artisan cache:clear

echo ""
echo "=== Setup เสร็จแล้ว ==="
echo "รันด้วยคำสั่ง: php artisan serve"
echo "เปิด: http://localhost:8000"
