FROM php:7.0-apache

MAINTAINER Ivo Bathke <ivo.bathke@gmail.com>

RUN a2enmod rewrite

RUN apt-get update -q
RUN apt-get upgrade -qy
RUN apt-get install -qy \
    libmcrypt4 libxml2-utils \
    libfreetype6-dev libjpeg62-turbo-dev \
libpng12-dev libxml2-dev zlib1g-dev

RUN docker-php-ext-install opcache mysqli pdo pdo_mysql

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install gd

COPY php.ini /usr/local/etc/php/
COPY apache2.conf /etc/apache2/apache2.conf
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www
