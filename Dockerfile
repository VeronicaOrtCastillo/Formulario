# Usa la imagen oficial de PHP como base
FROM php:8.2-fpm

# Instalación de dependencias de Laravel
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git unzip

# Instalar Composer (gestor de dependencias de PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurar el directorio de trabajo
WORKDIR /var/www

# Copiar el código de la aplicación
COPY . .



# Instalar las dependencias de Laravel (a través de Composer)
RUN composer install --no-dev --optimize-autoloader

# Establecer los permisos correctos para los archivos
RUN chown -R www-data:www-data /var/www

# Exponer el puerto 9000 para que PHP-FPM esté disponible
EXPOSE 8000

# Ejecutar el comando para iniciar PHP-FPM
CMD ["php-fpm"]
