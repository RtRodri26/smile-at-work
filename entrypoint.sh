#!/bin/bash
set -e

echo "==== Iniciando contenedor ===="

# Esperar base de datos PostgreSQL
echo "Esperando a la base de datos..."
until pg_isready -h $DB_HOST -p $DB_PORT -U $DB_USERNAME; do
  sleep 2
done
echo "Base de datos lista ✅"

# Migraciones
echo "Ejecutando migraciones..."
php artisan migrate --force
echo "Migraciones completadas ✅"

# Crear archivo JSON de Google
if [ ! -f storage/app/google/service_account.json ] && [ ! -z "$GOOGLE_CREDENTIALS" ]; then
    echo "Generando service_account.json de Google..."
    mkdir -p storage/app/google
    echo "$GOOGLE_CREDENTIALS" | base64 --decode > storage/app/google/service_account.json
    chmod 600 storage/app/google/service_account.json
    chown www-data:www-data storage/app/google/service_account.json
    echo "Archivo Google JSON generado ✅"
fi

# Iniciar supervisord
echo "Iniciando supervisord..."
exec supervisord -c /etc/supervisor/conf.d/supervisord.conf
