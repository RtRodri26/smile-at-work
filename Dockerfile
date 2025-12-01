# ---------- 1. Build stage ----------
FROM composer:2 AS builder
WORKDIR /app

# Copiar TODO el proyecto primero
COPY . .

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# ---------- 2. App stage ----------
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    zip unzip curl nginx supervisor git libpq-dev \
    && docker-php-ext-install pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# Copiar la app desde builder
COPY --from=builder /app /var/www/html

# Ejecutar scripts de Laravel ahora sí existen
RUN composer dump-autoload --optimize && \
    php artisan package:discover --ansi || true

# Permisos
RUN chown -R www-data:www-data storage bootstrap/cache

# Copiar config de nginx y supervisor
COPY nginx.conf /etc/nginx/conf.d/default.conf
COPY supervisor.conf /etc/supervisor/conf.d/supervisor.conf

ENV APP_ENV=production
ENV APP_DEBUG=false

# Migraciones automáticas al arrancar
CMD php artisan migrate --force && supervisord -c /etc/supervisor/conf.d/supervisor.conf

EXPOSE 80
