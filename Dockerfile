FROM composer:2.1.3

WORKDIR /code

COPY . /code

RUN composer install

CMD php ./app/main.php
