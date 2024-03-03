FROM php:8.3-cli

RUN \
    apt-get update && \
    apt-get install -y --no-install-recommends zip unzip git ssh-client wget

RUN \
    apt-get install -y \
        libxml2-dev libicu-dev librabbitmq-dev \
        gcc libgeoip-dev geoip-bin geoip-database libonig-dev && \
    docker-php-ext-install pdo pdo_mysql xml opcache intl sockets

RUN \
    printf "\n" | pecl install redis && \
    printf "\n" | pecl install amqp && \
    printf "\n" | pecl install apcu && \
    printf "\n" | pecl install xdebug && \
    docker-php-ext-enable redis amqp xdebug

# Install compoer
RUN curl -sS https://getcomposer.org/installer | php -- -- && mv composer.phar /usr/local/bin/composer

WORKDIR /app
