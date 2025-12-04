#!/bin/sh

set -e

echo "Waiting for database..."

# Wait for database to be ready using PHP instead of nc
until php -r "try { new PDO('mysql:host=db;port=3306', 'phela_user', 'root'); exit(0); } catch (PDOException \$e) { exit(1); }" 2>/dev/null; do
    echo "Database is unavailable - sleeping"
    sleep 2
done

echo "Database is up - executing command"

cd /var/www

# Generate app key if not set
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "" ]; then
    php artisan key:generate --force || true
fi

# Clear and cache config
php artisan config:clear || true
php artisan config:cache || true

# Clear and cache routes
php artisan route:clear || true
php artisan route:cache || true

# Clear and cache views
php artisan view:clear || true
php artisan view:cache || true

# Run migrations
php artisan migrate --force || true

exec "$@"
