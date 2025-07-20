FROM php:8.2-fpm

# System dependencies (single layer)
RUN apt-get update && apt-get install -y \
    unzip \
    curl \
    git \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libsqlite3-dev \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# PHP extensions (single layer)
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite zip

# Install Composer (dedicated layer)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy only necessary files first
COPY composer.json composer.lock package.json ./
COPY resources/ ./resources/
COPY database/ ./database/

# Install dependencies (cacheable layer)
RUN composer install --no-dev --optimize-autoloader --no-interaction \
    && npm install \
    && npm run build

# Copy remaining files
COPY . .

# Optimized permission setup
RUN mkdir -p storage/framework/{cache,sessions,testing,views} \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

CMD ["php-fpm"]