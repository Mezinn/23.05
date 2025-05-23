FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    bash \
    icu-dev \
    libxml2-dev \
    oniguruma-dev \
    libzip-dev \
    zlib-dev \
    curl \
    git \
    linux-headers \
    $PHPIZE_DEPS

RUN pecl install xdebug

RUN docker-php-ext-enable xdebug

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer