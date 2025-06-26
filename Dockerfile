FROM php:8.1-apache

# Install ekstensi PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# Konfigurasi Apache agar root foldernya `public`
COPY ./apache.conf /etc/apache2/sites-available/000-default.conf
