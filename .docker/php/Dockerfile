FROM php:8.1.5-fpm-alpine

WORKDIR /var/www

RUN apk update && apk add --no-cache libpq-dev bash

RUN docker-php-ext-install pdo pdo_pgsql

RUN rm -rf /var/www/html

RUN ln -s public html

RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini