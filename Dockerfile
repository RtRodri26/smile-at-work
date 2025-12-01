# ---------- 1. Build stage ----------
FROM composer:2 AS builder
WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts


# ---------- 2. App stage ----------
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    zip unzip curl nginx supervisor git libpq-dev \
    && docker-php-ext-install pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --from=builder /app /var/www/html

RUN composer dump-autoload --optimize && \
    php artisan package:discover --ansi || true


# PERMISOS
RUN mkdir -p storage/app/google && \
    chmod -R 775 storage bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache


# NGINX
COPY nginx.conf /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default


# SUPERVISOR
COPY supervisor.conf /etc/supervisor/conf.d/supervisor.conf


ENV APP_ENV=production
ENV APP_DEBUG=false


# Run migrations and start supervisor
CMD php artisan migrate --force && \
    supervisord -c /etc/supervisor/conf.d/supervisor.conf

EXPOSE 80
