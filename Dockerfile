FROM php:8.3.7-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    nodejs \
    netcat-openbsd

# Install required PHP extensions
RUN docker-php-ext-install \
    bcmath \
    bz2 \
    calendar \
    ctype \
    curl \
    exif \
    ffi \
    fileinfo \
    ftp \
    gettext \
    iconv \
    intl \
    mbstring \
    opcache \
    pdo \
    pdo_mysql \
    phar \
    posix \
    readline \
    shmop \
    sockets \
    sysvmsg \
    sysvsem \
    sysvshm \
    tokenizer \

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs


WORKDIR /var/www

# Copy the application files
COPY . /var/www

# Install PHP dependencies
RUN composer install --no-interaction --no-plugins --no-scripts

# Install Node.js dependencies
RUN npm i

# Copy the initialization script and make it executable
COPY init.sh /usr/local/bin/

# Set the command to run the initialization script
RUN chmod +x /usr/local/bin/init.sh

CMD ["sh", "/usr/local/bin/init.sh"]
