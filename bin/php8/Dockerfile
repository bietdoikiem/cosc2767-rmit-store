FROM php:8.0.19-apache-buster

# Update
RUN apt-get -y update --fix-missing && \
    apt-get upgrade -y && \
    apt-get --no-install-recommends install -y apt-utils && \
    rm -rf /var/lib/apt/lists/*


# Install useful tools and install important libaries
RUN apt-get -y update && \
    apt-get -y --no-install-recommends install nano wget \
    dialog \
    libsqlite3-dev \
    libsqlite3-0 && \
    apt-get -y --no-install-recommends install default-mysql-client \
    zlib1g-dev \
    libzip-dev \
    libicu-dev && \
    apt-get -y --no-install-recommends install --fix-missing apt-utils \
    build-essential \
    git \
    curl \
    libonig-dev && \ 
    apt-get install -y iputils-ping && \
    apt-get -y --no-install-recommends install --fix-missing libcurl4 \
    libcurl4-openssl-dev \
    zip \
    openssl && \
    rm -rf /var/lib/apt/lists/* && \
    curl -sS https://getcomposer.org/installer | php && \ 
    mv composer.phar /usr/local/bin/composer

# Install PHPUnit
RUN wget -O phpunit.phar https://phar.phpunit.de/phpunit-9.phar && \
    chmod +x phpunit.phar && \
    mv phpunit.phar /usr/local/bin/phpunit


# Other PHP8 Extensions
RUN docker-php-ext-install pdo_sqlite && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install mysqli 

# Insure an SSL directory exists
RUN mkdir -p /etc/apache2/ssl

# Enable SSL support
RUN a2enmod ssl && a2enmod rewrite

# Enable apache modules
RUN a2enmod rewrite headers

COPY . /var/www/html

# Cleanup
RUN rm -rf /usr/src/*
