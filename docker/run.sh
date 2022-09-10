#!/bin/sh

cd /var/www

composer install 
php artisan migrate:fresh
php artisan cache:clear
php artisan route:cache

/usr/bin/supervisord -c /etc/supervisord.conf
