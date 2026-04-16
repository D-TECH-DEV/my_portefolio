FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git curl zip unzip \
    libpng-dev libonig-dev libxml2-dev libzip-dev

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# AJOUT DE --no-scripts ICI pour éviter la connexion à la DB pendant le build
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Permissions
RUN chown -R www-data:www-data /var/www

CMD ["php-fpm"]
