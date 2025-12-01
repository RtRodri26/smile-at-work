# ---------- 1. Build stage ----------
FROM composer:2 AS builder
WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# ---------- 2. App stage ----------
FROM php:8.2-fpm

# Instalar dependencias + cliente de Postgres
RUN apt-get update && apt-get install -y \
    zip unzip curl nginx supervisor git libpq-dev postgresql-client \
    && docker-php-ext-install pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# Copiar app desde el build
COPY --from=builder /app /var/www/html

# Optimizar autoload + package discovery
RUN composer dump-autoload --optimize && \
    php artisan package:discover --ansi || true

# Permisos
RUN mkdir -p storage/app/google && \
    chmod -R 777 storage bootstrap/cache

# NGINX
COPY nginx.conf /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Entrypoint
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

EXPOSE 80
