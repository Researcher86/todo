FROM php:8.3-cli

RUN \
    apt-get update && \
    apt-get install -y --no-install-recommends gcc libzip-dev zip unzip git wget

RUN \
    docker-php-ext-install zip pdo pdo_mysql opcache sockets

RUN \
    printf "\n" | pecl install xdebug && \
    printf "\n" | pecl install xhprof && \
    docker-php-ext-enable xdebug xhprof

# Install compoer
RUN curl -sS https://getcomposer.org/installer | php -- -- && mv composer.phar /usr/local/bin/composer

WORKDIR /app
