FROM php:7.3.3-apache-stretch

ENV APACHE_DOCUMENT_ROOT /var/www/src/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# `src` is the directory with the PHP files and our libraries
COPY src/ /var/www/src
# `vendor` contains dependent libraries
COPY vendor/ /var/www/vendor
