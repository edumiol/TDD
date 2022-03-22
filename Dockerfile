ARG COMPOSER_VERSION="latest"
FROM composer:${COMPOSER_VERSION} as composer

FROM php:8.1-alpine

COPY --from=composer /usr/bin/composer /usr/local/bin/composer
WORKDIR /usr/src/test-training
COPY . /usr/src/test-training