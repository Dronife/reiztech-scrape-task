FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip opcache

RUN pecl install redis && docker-php-ext-enable redis


################################################## ENABLE XDEBUG HERE
#RUN pecl install xdebug && docker-php-ext-enable xdebug
#COPY ./etc/xdebug/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN chown -R www-data:www-data /var/www/

WORKDIR /var/www

COPY . /var/www

RUN composer install --ignore-platform-reqs --prefer-dist --no-interaction --no-scripts

EXPOSE 9000
CMD ["php-fpm"]
