#!/bin/bash
# Installer Composer
curl -sS https://getcomposer.org/installer -o composer-setup.php
php8.2 composer-setup.php --install-dir=/usr/local/bin --filename=composer
composer install --no-dev --optimize-autoloader
npm install
npm run build