FROM php:8.1-fpm

#   TOOLS
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    unzip \
    nodejs \
    npm \
    vim


#   PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

#   COMPOSER
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#   NPM
RUN npm install

#   USER
#ARG user=naythukhant
#ARG uid=999
#
#RUN useradd -G www-data,root -u $uid -d /home/$user $user
#
#RUN mkdir -p /home/$user/.composer && \
#    chown -R $user:$user /home/$user
#
#USER $user


