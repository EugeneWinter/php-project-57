set -o errexit

mkdir -p database/migrations

if [ ! -f database/migrations/database.sqlite ]; then
    touch database/migrations/database.sqlite
fi

chmod 666 database/migrations/database.sqlite

composer install --no-interaction --no-dev --prefer-dist

php artisan key:generate

php artisan migrate --force

php artisan config:cache
php artisan route:cache
php artisan view:cache