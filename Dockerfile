FROM php:7.1-apache
RUN apt-get update -y
RUN apt-get install -y git zip
RUN docker-php-ext-install mysqli
RUN pecl install xdebug-2.6.0
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --prefer-source --no-interaction

