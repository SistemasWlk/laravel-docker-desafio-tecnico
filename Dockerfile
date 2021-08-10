FROM newdeveloper/apache-php-composer:latest
WORKDIR /var/www/html/laravel-docker-desafio-tecnico/
COPY . /var/www/html/laravel-docker-desafio-tecnico/
RUN chmod -R 775 /var/www/html/laravel-docker-desafio-tecnico/storage/*
