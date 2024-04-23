#
FROM php:8.3.6

WORKDIR /var/www/html

# Install dependencies
RUN apt-get update \
    && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        zip \
        unzip \
        git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js and npm
RUN apt-get install -y \
        gnupg \
        curl \
    && curl -sL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

copy ./src /var/www/html

#CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "80"]

CMD bash -c "composer install && php artisan migrate && php artisan serve --host=0.0.0.0 --port=80"

# Expose port 80 to the outside
EXPOSE 80 5173

