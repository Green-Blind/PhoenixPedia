#!/bin/sh

cp .env.example .env
cp nginx/conf.d/laravel.conf.example nginx/conf.d/laravel.conf
composer install
npm install
php artisan key:generate

# Attendre que la base de données soit prête
until nc -z -v -w30 db 3306; do
  echo 'Waiting for database connection...'
  sleep 1
done

php artisan migrate

exec php-fpm
