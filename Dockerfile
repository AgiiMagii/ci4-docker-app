FROM php:8.2-apache

# Instalē nepieciešamās bibliotēkas
RUN apt-get update && \
    apt-get install -y libsqlite3-dev libicu-dev && \
    docker-php-ext-install pdo pdo_sqlite intl && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Apache default mape -> public folder
RUN sed -i 's|/var/www/html|/var/www/codeigniter_app/public|g' /etc/apache2/sites-available/000-default.conf \
    && a2enmod rewrite

# Uzstādi darba mapi
WORKDIR /var/www/codeigniter_app

# Izveido images mapi un uzstādi tiesības
RUN mkdir -p /var/www/codeigniter_app/public/images && \
    chown -R www-data:www-data /var/www/codeigniter_app/public/images && \
    chmod -R 775 /var/www/codeigniter_app/public/images

# Nodrošini, ka visa projekta mape pieder www-data
RUN chown -R www-data:www-data /var/www/codeigniter_app

CMD ["apache2-foreground"]
