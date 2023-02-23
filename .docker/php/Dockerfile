FROM php:8.1.5-fpm-alpine

LABEL version="8.1.5-composer" description="php-fpm 8.1.5 alpine + composer" maintainer="Esdras Schonevald<esdraschonevald@gmail.com>"

WORKDIR /var/www

RUN apk update && apk add --no-cache libpq-dev bash

RUN docker-php-ext-install pdo pdo_pgsql

RUN rm -rf /var/www/html

RUN ln -s public html

RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

RUN php composer-setup.php

RUN php -r "unlink('composer-setup.php');"

RUN mv composer.phar /usr/local/bin/composer

EXPOSE 9000

ENTRYPOINT [ "php-fpm" ]