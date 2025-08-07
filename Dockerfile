# Use official PHP image with Apache
FROM php:8.1-apache

# Enable mysqli extension
RUN docker-php-ext-install mysqli

# Copy source code to container
COPY . /var/www/html/

# Give proper permissions
RUN chown -R www-data:www-data /var/www/html

# Expose Apache port
EXPOSE 80
