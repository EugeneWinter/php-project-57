FROM php:8.2-apache

# Установка зависимостей системы
RUN apt-get update \&&\ apt-get install -y \\
    libpq-dev \\
    libzip-dev \\
    unzip \\
    && rm -rf /var/lib/apt/lists/*

# Установка PHP расширений
RUN docker-php-ext-install pdo pdo_pgsql zip

# Установка Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Настройка Apache
RUN a2enmod rewrite

# Копирование файлов проекта
WORKDIR /var/www/html
COPY . .

# Установка зависимостей Composer
RUN composer install --no-dev --optimize-autoloader

# Настройка прав доступа
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Копирование конфигурации Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Экспорт порта
EXPOSE 80

# Запуск миграций и Apache
CMD bash -c "php artisan migrate --force && apache2-foreground"
