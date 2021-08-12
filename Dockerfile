FROM newdeveloper/apache-php-composer:latest

MAINTAINER Wilker <sistemaswlk@gmail.com>

RUN apt-get update && apt-get upgrade -y \
    && curl -sL https://deb.nodesource.com/setup_14.x | bash - \
    && apt install nodejs && apt install -y build-essential gcc make libpng-dev

WORKDIR /var/www/html/laravel-docker-desafio-tecnico/
COPY . /var/www/html/laravel-docker-desafio-tecnico/
RUN chmod -R 777 /var/www/html/laravel-docker-desafio-tecnico/storage/*
ADD docker/apache2/000-default.conf /etc/apache2/sites-available/000-default.conf
ADD docker/config/package.json /var/www/html/laravel-docker-desafio-tecnico/package.json
