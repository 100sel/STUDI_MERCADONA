FROM php:8.1-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libonig-dev \
    libpq-dev && \
    docker-php-ext-install pdo pdo_mysql pdo_pgsql intl opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www

RUN composer install

EXPOSE 9000
CMD ["php-fpm"]