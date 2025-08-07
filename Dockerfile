FROM php:8.1-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy source code
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 in container
EXPOSE 80
