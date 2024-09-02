# Use the official PHP image with Apache
FROM php:8.1-apache

# Copy your project files to the Apache web root
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html

# Install any necessary PHP extensions (optional)
RUN docker-php-ext-install mysqli pdo pdo_mysql
