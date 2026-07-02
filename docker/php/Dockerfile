FROM php:5.6-apache

# Extensions ที่เว็บ PHP เก่ามักใช้
RUN docker-php-ext-install mysql mysqli pdo pdo_mysql

# เปิด mod_rewrite
RUN a2enmod rewrite

# ตั้ง error log ลงไฟล์ ไม่แสดงบนหน้าเว็บ
RUN echo "display_errors = Off" >> /usr/local/etc/php/php.ini \
 && echo "log_errors = On" >> /usr/local/etc/php/php.ini \
 && echo "error_log = /var/log/apache2/php_error.log" >> /usr/local/etc/php/php.ini \
 && echo "date.timezone = Asia/Bangkok" >> /usr/local/etc/php/php.ini \
 && echo "default_charset = windows-874" >> /usr/local/etc/php/php.ini \
 && echo "mysql.default_charset = tis620" >> /usr/local/etc/php/php.ini \
 && echo "AddDefaultCharset Off" >> /etc/apache2/apache2.conf \
 && echo "php_admin_value default_charset windows-874" >> /etc/apache2/apache2.conf \
 && echo "php_admin_value date.timezone Asia/Bangkok" >> /etc/apache2/apache2.conf

# อนุญาต .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf
