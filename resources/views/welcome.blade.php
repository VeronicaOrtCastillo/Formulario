<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="icon" type="image/png" sizes="180x180" href="/img/Principal.png">

    <!-- Agrega el enlace a tu archivo de estilos de TailwindCSS (si no lo tienes, agrega la CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen items-center justify-center">
        <!-- Contenedor principal con tamaño responsivo -->
        <div class="w-full max-w-4xl p-4 bg-white rounded-lg shadow-lg">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <!-- Lado izquierdo (Imagen) -->
                <div class="flex-1 w-full max-w-md">
                    <img src="{{ asset('img/Principal.png') }}"
                    alt="Imagen" 
                    class="w-full h-auto object-cover rounded-lg">
                </div>

                <!-- Lado derecho (Botones) -->
                <div>
                    <img src="{{ asset('img/icono.png') }}"
                    alt="Imagen">
                    <div class="flex-1 flex flex-col items-center justify-center space-y-16 px-4 py-8 md:px-12 md:py-16 ">
                        <!-- Botón de Iniciar sesión -->
                        <a href="{{ route('login') }}" class="text-center px-20 py-3 bg-red-900 text-white rounded-xl hover:bg-red-600 w-full md:w-auto">
                            Iniciar sesión
                        </a>
                        <!-- Botón de Registrarse -->
                        <a href="{{ route('register') }}" class="text-center px-20 py-3 bg-green-900 text-white rounded-xl hover:bg-green-600 w-full md:w-auto">
                            Registrarse
                        </a>
                    </div>
                </div>
    </div>

</body>
</html>
