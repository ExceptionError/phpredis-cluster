FROM php:7.4-cli as base

RUN apt-get update \
  && docker-php-ext-install sockets \
  && pecl install redis \
  && docker-php-ext-enable redis

WORKDIR /var/www/app

ENTRYPOINT ["php", "proxy.php"]
