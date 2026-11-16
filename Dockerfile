FROM composer:2.10.3 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install --no-dev --no-interaction --no-progress --prefer-dist --optimize-autoloader

FROM php:8.5.12-apache-trixie

ENV APACHE_DOCUMENT_ROOT=/var/www/src/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# `src` is the directory with the PHP files and our libraries
COPY src/ /var/www/src
# `vendor` contains the production dependencies built above.
COPY --from=vendor /app/vendor/ /var/www/vendor
