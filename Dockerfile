# ---------- 1. Build stage ----------
FROM composer:2 AS builder
WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

COPY . .
RUN composer dump-autoload --optimize

# ---------- 2. Runtime stage ----------
FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    zip unzip curl nginx supervisor git libpq-dev \
    && docker-php-ext-install pdo_pgsql pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# Copiar código del build
COPY --from=builder /app /var/www/html

# Permisos de Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Copiar configuración de nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Crear enlace de storage
RUN php artisan storage:link || true

# Variables de entorno base
ENV APP_ENV=production
ENV APP_DEBUG=false

# --- SUPERVISOR FILE ---
RUN mkdir -p /etc/supervisor/conf.d
COPY supervisor.conf /etc/supervisor/conf.d/supervisor.conf

EXPOSE 80

# Ejecutar supervisor al iniciar
CMD php artisan migrate --force && supervisord -c /etc/supervisor/supervisor.conf
