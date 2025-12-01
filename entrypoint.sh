#!/bin/bash
set -e

echo "==== Iniciando contenedor ===="

# Crear JSON de Google primero
GOOGLE_JSON_PATH="storage/app/google/service_account.json"
if [ ! -f "$GOOGLE_JSON_PATH" ] && [ ! -z "$GOOGLE_SERVICE_ACCOUNT_JSON_BASE64" ]; then
    echo "Generando service_account.json de Google..."
    mkdir -p storage/app/google
    echo $GOOGLE_SERVICE_ACCOUNT_JSON_BASE64 | base64 -d > "$GOOGLE_JSON_PATH"
    chmod 600 "$GOOGLE_JSON_PATH"
    chown www-data:www-data "$GOOGLE_JSON_PATH"
    echo "Archivo Google JSON generado ✅"
fi

# Esperar base de datos
echo "Esperando a la base de datos..."
until pg_isready -h $DB_HOST -p $DB_PORT -U $DB_USERNAME; do
  sleep 2
done
echo "Base de datos lista ✅"

# Migraciones
echo "Ejecutando migraciones..."
php artisan migrate --force
echo "Migraciones completadas ✅"

# Crear storage link si no existe
if [ ! -L public/storage ]; then
    echo "Creando enlace simbólico de storage..."
    php artisan storage:link
    chown -R www-data:www-data public/storage
    chmod -R 775 public/storage
    echo "Storage link creado ✅"
fi


# Iniciar supervisord
echo "Iniciando supervisord..."
exec supervisord -c /etc/supervisor/conf.d/supervisord.conf
