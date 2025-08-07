FROM php:8.2-fpm

# Install Nginx and required PHP extensions
RUN apt-get update && apt-get install -y nginx \
    && docker-php-ext-install mysqli pdo pdo_mysql

# Copy project files to /var/www/html
COPY . /var/www/html

# Copy nginx config
COPY default.conf /etc/nginx/sites-available/default

# Expose port
EXPOSE 80

# Start both PHP-FPM and Nginx
CMD service nginx start && php-fpm
