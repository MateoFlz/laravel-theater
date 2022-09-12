FROM php:8.1.10-fpm

# Set working directory
WORKDIR /var/www

# Add docker php ext repo
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install php extensions
RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions mbstring pdo_mysql zip exif pcntl gd memcached

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    git \
    curl \
    lua-zlib-dev \
    libmemcached-dev \
    nginx


# Install supervisor
RUN apt-get install -y supervisor

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy code to /var/www
COPY --chown=www:www-data . /var/www

# add root to www group
RUN chmod -R ug+w /var/www/storage
RUN chmod -R 777 /var/www
# Copy nginx/php/supervisor configs
RUN cp docker/supervisor.conf /etc/supervisord.conf
RUN cp docker/php.ini /usr/local/etc/php/conf.d/app.ini
RUN cp docker/nginx.conf /etc/nginx/sites-enabled/default

# PHP Error Log Files
RUN mkdir /var/log/php
RUN touch /var/log/php/errors.log && chmod 777 /var/log/php/errors.log

# Deployment steps
RUN composer install --optimize-autoloader --no-dev
RUN composer dump-autoload
RUN chmod 777 /var/www/docker/run.sh
RUN cp .env.example /var/www/.env
EXPOSE 80
ENTRYPOINT ["/var/www/docker/run.sh"]

# FROM php:latest


# RUN apt-get update \
#     && apt-get install -y gnupg gosu curl ca-certificates zip unzip git supervisor
# # algunas configuraciones para que funcione el contenedor
# RUN docker-php-ext-install pdo pdo_mysql

# # instala composer en el contenedor
# RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer


# WORKDIR /var/www/html/

# # da permisos para editar los archivos en esta ruta del container
# RUN chown -R www-data:www-data /var/www
# RUN chmod 755 /var/www

# COPY . /var/www/html/

# COPY .env.example /var/www/html/.env
# #run composer intalar vendor

# ENV COMPOSER_ALLOW_SUPERUSER 1

# RUN composer install

# CMD php artisan migrate:refresh

# FROM php:fpm-buster

# WORKDIR /var/www/html/laravel-theater
# COPY . /var/www/html/laravel-theater/


# COPY .env.example /var/www/html/laravel-theater/.env


# # algunas configuraciones para que funcione el contenedor
# RUN docker-php-ext-install pdo pdo_mysql

# # instala composer en el contenedor
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# #run composer intalar vendor
# RUN composer install

# CMD php artisan migrate
# # da permisos para editar los archivos en esta ruta del container
# RUN chown -R www-data:www-data /var/www
# RUN chmod 755 /var/www
