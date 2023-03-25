FROM php:8.2-fpm

# Packages
RUN apt-get update  \
    && apt-get install -y --no-install-recommends \
    git \
    curl \
    wget \
    libmemcached-dev \
    libz-dev \
    libpq-dev \
    libmcrypt-dev \
    libzip-dev \
    libpng-dev \
    zip \
    unzip \
    nano \
    autoconf  \
    libc-dev pkg-config libssl-dev zlib1g-dev librdkafka-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev

# PHP extensions
RUN docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    pdo_pgsql \
    zip \
    sockets \
    bcmath \
    gd \
  && pecl install rdkafka \
  && docker-php-ext-enable rdkafka \
  && pecl install redis && docker-php-ext-enable redis \
  && pecl install mongodb && docker-php-ext-enable mongodb \
  && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \

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

