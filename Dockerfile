FROM php:8.0.7

WORKDIR /code

COPY . /code

RUN composer install

CMD php ./app/run_main.php
