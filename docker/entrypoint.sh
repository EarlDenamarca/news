#!/bin/sh

if [ ! -f 'vendor/autoload.php' ]; then
    composer install
    php artisan key:generate
fi

/usr/sbin/apache2ctl -D FOREGROUND