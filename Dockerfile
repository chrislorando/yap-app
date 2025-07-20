FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip curl git libzip-dev libonig-dev libxml2-dev \
    nodejs npm \
    && docker-php-ext-install pdo pdo_sqlite zip

# Set working directory
WORKDIR /var/www

# Copy composer and install
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . .

RUN composer install --no-dev --optimize-autoloader

# Install Node modules and build assets
RUN npm install && npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www

CMD ["php-fpm"]
