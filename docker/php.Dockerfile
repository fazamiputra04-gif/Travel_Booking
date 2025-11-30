FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libonig-dev zip unzip git \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd mysqli pdo pdo_mysql mbstring opcache

WORKDIR /var/www/html
EXPOSE 9000
CMD ["php-fpm"]
