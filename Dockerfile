FROM php:8.2-fpm

# Cài đặt các gói cần thiết để cài đặt các extension
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    unzip \
    curl \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install node
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash
RUN apt-get install -y nodejs

# Đặt thư mục làm thư mục làm việc
WORKDIR /var/www

#
COPY . .
COPY ./tools.bullken.click ./tools.bullken.click
RUN chown -R www-data:www-data tools.bullken.click && \
    chmod -R 775 tools.bullken.click/storage tools.bullken.click/bootstrap/cache

# Đặt lại thư mục làm việc để chạy composer install
WORKDIR /var/www/tools.bullken.click
RUN composer install
RUN npm install

