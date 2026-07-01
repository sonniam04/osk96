FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd opcache \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && rm -rf /var/lib/apt/lists/* /tmp/pear

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN echo "date.timezone = Asia/Bangkok" >> /usr/local/etc/php/php.ini \
 && echo "upload_max_filesize = 20M" >> /usr/local/etc/php/php.ini \
 && echo "post_max_size = 20M" >> /usr/local/etc/php/php.ini \
 && echo "opcache.enable=1" >> /usr/local/etc/php/php.ini \
 && echo "opcache.enable_cli=1" >> /usr/local/etc/php/php.ini \
 && echo "opcache.memory_consumption=256" >> /usr/local/etc/php/php.ini \
 && echo "opcache.max_accelerated_files=20000" >> /usr/local/etc/php/php.ini \
 && echo "opcache.validate_timestamps=1" >> /usr/local/etc/php/php.ini \
 && echo "opcache.revalidate_freq=60" >> /usr/local/etc/php/php.ini \
 && echo "opcache.interned_strings_buffer=16" >> /usr/local/etc/php/php.ini \
 && echo "opcache.fast_shutdown=1" >> /usr/local/etc/php/php.ini \
 && echo "expose_php=Off" >> /usr/local/etc/php/php.ini \
 && echo "session.cookie_httponly=1" >> /usr/local/etc/php/php.ini \
 && echo "session.cookie_samesite=Lax" >> /usr/local/etc/php/php.ini \
 && echo "display_errors=Off" >> /usr/local/etc/php/php.ini \
 && echo "log_errors=On" >> /usr/local/etc/php/php.ini

WORKDIR /var/www/html

# Copy application code into the image so vendor/ lives on Linux FS (fast I/O)
# storage/ and bootstrap/cache/ will be overridden by named volumes at runtime
COPY laravel/ /var/www/html/

RUN composer install --optimize-autoloader --no-interaction 2>/dev/null || true

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
