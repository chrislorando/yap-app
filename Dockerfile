FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    git \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libsqlite3-dev \
    && rm -rf /var/lib/apt/lists/*

# Install Node.js (alternative method)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer files first (for Docker layer caching)
COPY composer.json composer.lock ./

# Copy npm files first
COPY package*.json ./

# Install Node dependencies
RUN npm install

# Copy application files
COPY . .

# Install PHP dependencies
# RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN composer install --optimize-autoloader --no-interaction

# Build frontend assets
RUN npm run build

# Set permissions
# RUN chown -R www-data:www-data /var/www
# RUN mkdir -p storage/framework/{cache,sessions,testing,views} \
#     && chown -R www-data:www-data storage bootstrap/cache \
#     && chmod -R 775 storage bootstrap/cache \
#     && chmod -R 775 /var/www/database/ \
#     && chown -R www-data:www-data /var/www/database/

RUN mkdir -p storage/framework/{cache,sessions,testing,views} \
    && mkdir -p database/ \
    && touch database/database.sqlite \
    && chown -R www-data:www-data storage bootstrap/cache database \
    && chmod -R 775 storage bootstrap/cache database \
    && chmod 664 database/database.sqlite

# Salin konfigurasi nginx dari direktori lokal ke image
# COPY ./docker/nginx/conf.d /tmp/conf.d
# COPY ./docker/nginx/conf.d /test

# # Salin entrypoint script ke dalam image
# COPY entrypoint.sh /entrypoint.sh
# RUN chmod +x /entrypoint.sh

# # Tentukan entrypoint
# ENTRYPOINT ["/bin/sh", "/entrypoint.sh"]

EXPOSE 9000
CMD ["php-fpm"]