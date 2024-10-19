# Usar la imagen base de PHP con Apache
FROM php:8.1-apache

# Instalar dependencias del sistema y extensiones de PHP necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar solo los archivos de composer primero para aprovechar la cache
COPY composer.json composer.lock ./

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar las dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Copiar el resto de los archivos del proyecto
COPY . .

# Dar permisos de escritura a las carpetas necesarias
RUN chown -R www-data:www-data storage bootstrap/cache

# Exponer el puerto 80
EXPOSE 80

# Iniciar Apache
CMD ["apache2-foreground"]

