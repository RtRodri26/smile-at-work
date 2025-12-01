# ---------- 1. Build stage ----------
FROM composer:2 AS builder
WORKDIR /app

# Copiar el proyecto completo
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts


# ---------- 2. App stage ----------
FROM php:8.2-fpm

# Instalar dependencias del sistema + PostgreSQL
RUN apt-get update && apt-get install -y \
    zip unzip curl nginx supervisor git libpq-dev \
    && docker-php-ext-install pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# Copiar la app desde el build
COPY --from=builder /app /var/www/html

# Autoload + discover
RUN composer dump-autoload --optimize && \
    php artisan package:discover --ansi || true


# ===============================
# PERMISOS (CRÍTICO)
# ===============================

# Crear carpeta para el service_account (Laravel la escribirá)
RUN mkdir -p storage/app/google

# Dar permisos completos al runtime
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache


# ===============================
# NGINX
# ===============================
COPY nginx.conf /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default


# ===============================
# SUPERVISOR
# ===============================
COPY supervisor.conf /etc/supervisor/conf.d/supervisor.conf


# Variables de entorno
ENV APP_ENV=production
ENV APP_DEBUG=false


# ===============================
# CAMBIAR USUARIO POR DEFECTO
# Laravel debe correr como www-data
# ===============================
USER www-data


# ===============================
# COMANDO INICIAL
# Migraciones automáticas
# ===============================
CMD php artisan migrate --force && \
    supervisord -c /etc/supervisor/conf.d/supervisor.conf


EXPOSE 80
