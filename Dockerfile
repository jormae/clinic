# FROM php:8.0-apache
FROM php:7.1-apache
# COPY apache2.conf /etc/apache2
COPY . /var/www/html
# Enable mod_rewrite for images with apache
RUN if command -v a2enmod >/dev/null 2>&1; then \
    a2enmod rewrite headers \
    ;fi
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN service apache2 restart

#install pdo_my_sql    
# RUN docker-php-ext-install pdo pdo_mysql
# for mysqli if you want
# RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli