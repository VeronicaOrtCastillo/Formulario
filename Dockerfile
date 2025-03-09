# Usa la imagen oficial de PHP como base
FROM php:8.2-fpm

# Instalación de dependencias
RUN apt-get update && apt-get install -y \
    nginx \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    unzip \
    && apt-get clean

# Instalar Composer (gestor de dependencias de PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurar el directorio de trabajo
WORKDIR /var/www

# Copiar el código de la aplicación
COPY . .

# Instalar las dependencias de Laravel (a través de Composer)
RUN composer install --no-dev --optimize-autoloader

# Copiar la configuración de Nginx
COPY nginx/default.conf /etc/nginx/sites-available/default


# Establecer los permisos correctos para los archivos
RUN chown -R www-data:www-data /var/www

# Exponer el puerto 9000 para que PHP-FPM esté disponible
EXPOSE 8080

# Iniciar Nginx y PHP-FPM
CMD service nginx start && php-fpm