FROM php:8.3.7-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    nodejs \
    netcat-openbsd

RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs
RUN apt-get update && apt-get install -y netcat-openbsd

WORKDIR /var/www

COPY . /var/www

RUN composer install --no-interaction --no-plugins --no-scripts
RUN npm i

COPY init.sh /usr/local/bin/

RUN chmod +x /usr/local/bin/init.sh

CMD ["sh", "/usr/local/bin/init.sh"]
