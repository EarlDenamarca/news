FROM php:8.4-apache

RUN apt-get update && apt-get install -y

RUN apt-get install -y \
    libzip-dev \
    zip \
    unzip 

RUN apt-get install default-mysql-client nano -y

RUN docker-php-ext-install mysqli pdo pdo_mysql zip

# INSTALL COMPOSER
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# Copy all files
COPY . /var/www/html

# Change working directory
WORKDIR /var/www/html

# Copy 000-default.conf
RUN rm /etc/apache2/sites-available/000-default.conf
COPY docker/apache/000-default.conf /etc/apache2/sites-available

# Run Composer install
RUN composer install

# Change permisson on storage and docker folder
RUN chmod 777 -R storage/
RUN chmod 777 -R docker/

# Enable Mod Rewrite on Apache
RUN a2enmod rewrite

#ENTRYPOINT
ENTRYPOINT [ "docker/entrypoint.sh" ]