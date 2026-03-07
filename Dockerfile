FROM php:8.2-apache

RUN apt-get update && \
    apt-get install -y libsqlite3-dev libicu-dev && \
    docker-php-ext-install pdo pdo_sqlite intl && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

RUN sed -i 's|/var/www/html|/var/www/codeigniter_app/public|g' /etc/apache2/sites-available/000-default.conf \
    && a2enmod rewrite

WORKDIR /var/www/codeigniter_app

# Fix folder permissions for writable directories
RUN chown -R www-data:www-data /var/www/codeigniter_app

CMD ["apache2-foreground"]
