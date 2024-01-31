# FROM php:8.0-apache
FROM php:7.1-apache
# COPY apache2.conf /etc/apache2
COPY . /var/www/html
# COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer
# Enable mod_rewrite for images with apache
RUN if command -v a2enmod >/dev/null 2>&1; then \
    a2enmod rewrite headers \
    ;fi
RUN docker-php-ext-install mysqli pdo pdo_mysql
# RUN composer install
# RUN composer require vlucas/phpdotenv

# INSTALL AND UPDATE COMPOSER
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer self-update

# INSTALL YOUR DEPENDENCIES
RUN composer install

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN service apache2 restart

#install pdo_my_sql    
# RUN docker-php-ext-install pdo pdo_mysql
# for mysqli if you want
# RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli