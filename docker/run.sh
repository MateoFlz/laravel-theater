#!/bin/bash

cd /var/www


chmod -R 777 storage
php artisan key:generate
php artisan config:clear
php artisan cache:clear
php artisan route:cache

php artisan migrate:fresh


/usr/bin/supervisord -c /etc/supervisord.conf
