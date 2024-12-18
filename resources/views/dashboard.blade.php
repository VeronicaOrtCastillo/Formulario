<title>Inicio</title>

<link rel="icon" type="image/png" sizes="180x180" href="/img/Principal.png">

<x-app-layout>
    <x-slot name="header">
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (@session()->has('mensaje'))
                    <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3">
                        {{ session('mensaje') }}
                    </div>
                @endif

                <!-- Contenedor de las tarjetas -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Tarjeta 1 -->
                    <div class="card bg-white rounded-lg shadow-lg  hover:bg-red-900">
                        <a href="https://www.gob.mx/curp/" target="_blank">
                            <img src="/img/CURP.jpeg" 
                                 alt="Consultar CURP" 
                                 class="w-full h-48 object-cover">
                        </a>
                        <div class="p-4 text-gray-800 hover:text-white">
                            <h3 class="text-lg font-semibold mb-2">Consultar CURP</h3>
                            <p>Haz clic para consultar tu CURP.</p>
                        </div>
                    </div>
                    <!-- Tarjeta 2 -->
                    <div class="card bg-white rounded-lg shadow-lg  hover:bg-red-800">
                        <a href="https://www.sat.gob.mx/aplicacion/operacion/31274/consulta-tu-clave-de-rfc-mediante-curp" target="_blank">
                            <img src="/img/RFC.png" 
                                 alt="Consulta RFC" 
                                 class="w-full h-48 object-cover">
                        </a>
                        <div class="p-4 text-gray-800 hover:text-white">
                            <h3 class="text-lg font-semibold mb-2">Consulta RFC</h3>
                            <p>Consulta tu clave RFC mediante CURP.</p>
                        </div>
                    </div>
                    <!-- Tarjeta 3 -->
                    <div class="card bg-white rounded-lg shadow-lg  hover:bg-red-800">
                        <a href="https://www.gob.mx/condusef/articulos/sabes-cual-es-la-clabe" target="_blank">
                            <img src="/img/CLABE.jpg" 
                                 alt="Clabe Interbancaria" 
                                 class="w-full h-48 object-cover">
                        </a>
                        <div class="p-4 text-gray-800 hover:text-white">
                            <h3 class="text-lg font-semibold mb-2">Clabe Interbancaria</h3>
                            <p>Consulta información sobre tu Clabe Interbancaria.</p>
                        </div>
                    </div>
                    <!-- Tarjeta 4 -->
                    <div class="card bg-white rounded-lg shadow-lg  hover:bg-red-800">
                        <a href="https://www.adobe.com/mx/acrobat/online/convert-pdf.html" target="_blank">
                            <img src="/img/PDF.png" 
                                 alt="Convertir PDF" 
                                 class="w-full h-48 object-cover">
                        </a>
                        <div class="p-4 text-gray-800 hover:text-white">
                            <h3 class="text-lg font-semibold mb-2">Convertir a PDF</h3>
                            <p>Convierte tus archivos a PDF.</p>
                        </div>
                    </div>
                    <!-- Tarjeta 5 -->
                    <div class="card bg-white rounded-lg shadow-lg  hover:bg-red-800">
                        <a href="https://ubicatubancodelbienestar.bienestar.gob.mx/" target="_blank">
                            <img src="/img/Banco.jpg" 
                                 alt="Convertir Banco" 
                                 class="w-full h-48 object-cover">
                        </a>
                        <div class="p-4 text-gray-800 hover:text-white">
                            <h3 class="text-lg font-semibold mb-2">Consulta aquí</h3>
                            <p>Las sucursales del Banco del Bienestar</p>
                        </div>
                    </div>
                    <!-- Tarjeta 6 -->
                    <div class="card bg-white rounded-lg shadow-lg  hover:bg-red-800">
                        <a href="https://www.gob.mx/" target="_blank">
                            <img src="/img/Bienestar.jpg" 
                                 alt="Bienestar" 
                                 class="w-full h-48 object-cover">
                        </a>
                        <div class="p-4 text-gray-800 hover:text-white">
                            <h3 class="text-lg font-semibold mb-2">Consulta aquí</h3>
                            <p>Todos los tramites que puedes realizar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

<style>

    /* Asegúrate de que el contenedor principal ocupe todo el alto de la ventana */
    

    .card {
        transition: transform 0.2s, box-shadow 0.2s, background-color 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
</style>
