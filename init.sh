#!/bin/sh

chown -R www-data:www-data /var/www

# Attendre que la base de données soit prête
until nc -z -v -w30 db 3306; do
  echo 'Waiting for database connection...'
  sleep 1
done

php artisan migrate

exec php-fpm
