FROM php:fpm-buster

WORKDIR /var/www/html/laravel-theater
COPY . /var/www/html/laravel-theater/


COPY .env.example /var/www/html/laravel-theater/.env


# algunas configuraciones para que funcione el contenedor
RUN docker-php-ext-install pdo pdo_mysql

# instala composer en el contenedor
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#run composer intalar vendor
RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181

# da permisos para editar los archivos en esta ruta del container
RUN chown -R www-data:www-data /var/www
RUN chmod 755 /var/www
