# Personas No Activas - PAGO DE AGUINALDO
### El objetivo de este proyecto es gestionar las solicutudes de las personas no activas para los empleados de la secretaria de bienestar social

## Requrimientos
- PHP >= 8.1
- Composer
- Node.js
- Yarn
- MySQL
- LLaves de seguridad (reCaptcha)

> **Nota:** Se recomienda usar <a href="https://herd.laravel.com/" target="_blank">Laravel Herd</a> para el entorno de desarrollo
> **Nota:** Se puede utilizar cualquier gestor de bases de datos,realizando los cambios adecuados
> **Nota:** Se generan las llaves de seguridad  <a href="https://www.google.com/recaptcha/admin" target="_blank">Google reCAPTCHA</a>

## Instalación

### Clonar el repositorio
```bash
git clone git@github.com:VeronicaOrtCastillo/Formulario.git
``` 

###  Instalar dependencias
```bash
composer install && yarn install
```

### Configuración
```bash
cp .env.example .env
```

### Generar la llave de la aplicación
```bash
php artisan key:generate
```

### Configurar la base de datos
### Configurar el archivo `.env` con los datos de la base de datos
### Ejecutar las migraciones y los seeders
```bash
php artisan migrate --seed
```

### Generar las llaves de seguridad de google
```bash
cp -r storage/app/fonts/Montserrat/* vendor/setasign/fpdf/font/
```

### Compilar los assets y correr el servidor
```bash
yarn dev
```
