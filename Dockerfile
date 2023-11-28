FROM php:8.1-apache

RUN a2enmod rewrite
RUN docker-php-ext-install mysqli pdo_mysql

COPY src/ /var/www/html/
RUN chmod -R 755 /var/www/html/
EXPOSE 80

CMD ["apache2-foreground"]