FROM php:8.1-fpm-alpine

# Install Nginx
RUN apk add --no-cache nginx

# Copy your project files
COPY . /var/www/html

# Copy Nginx config file
COPY default.conf /etc/nginx/conf.d/default.conf

# Expose port 80
EXPOSE 80

# Start PHP-FPM and Nginx together
CMD ["/bin/sh", "-c", "php-fpm & nginx -g 'daemon off;'"]
