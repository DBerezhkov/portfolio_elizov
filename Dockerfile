# Stage 1: Build frontend
FROM node:20-alpine AS frontend
WORKDIR /app
COPY package.json package-lock.json vite.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm ci && npm run build

# Stage 2: PHP app
FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev \
    && docker-php-ext-install zip pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

COPY . .
COPY --from=frontend /app/public/build ./public/build

RUN composer dump-autoload --optimize

RUN chmod -R 775 storage bootstrap/cache

ENV APP_ENV=production
ENV APP_DEBUG=false

EXPOSE 8000

CMD sh -c "php artisan config:clear && php artisan storage:link 2>/dev/null || true && php artisan migrate --force && php artisan portfolio:create-admin && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}"
