FROM php:8.1-apache

RUN docker-php-ext-install mysqli

RUN echo "DirectoryIndex index.html index.php" >> /etc/apache2/apache2.conf

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
