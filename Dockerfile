FROM php:7.3-apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN service apache2 restart
RUN a2enmod rewrite
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo pdo_mysql
RUN apt-get update && apt-get upgrade -y
