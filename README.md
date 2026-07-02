# OSK96 — ชมรมศิษย์เก่าสวนกุหลาบวิทยาลัย รุ่น 92(96)

## Requirements
- PHP 8.2+ พร้อม extensions: `pdo_mysql`, `mbstring`, `zip`, `gd`
- Composer

## วิธี Clone แล้วรัน

### Windows
```bat
git clone https://github.com/sonniam04/osk96.git
cd osk96
setup.bat
cd laravel
php artisan serve
```

### Linux / Mac
```bash
git clone https://github.com/sonniam04/osk96.git
cd osk96
chmod +x setup.sh && ./setup.sh
cd laravel
php artisan serve
```

เปิดเบราว์เซอร์ที่ `http://localhost:8000`

## วิธีรันด้วย Docker
```bash
docker compose up -d
```
เปิดเบราว์เซอร์ที่ `http://localhost:8082`
