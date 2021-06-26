FROM php:8

WORKDIR /code

COPY . /code

CMD php ./app/main.php
