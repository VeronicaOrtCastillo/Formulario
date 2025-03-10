# Usa una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala extensiones necesarias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Habilita mod_rewrite para Laravel
RUN a2enmod rewrite

# Copia los archivos del proyecto
COPY . /var/www/html

# Establece permisos
RUN chown -R www-data:www-data /var/www/html

# Expone el puerto 80
EXPOSE 80

# Comando de inicio
CMD ["apache2-foreground"]
