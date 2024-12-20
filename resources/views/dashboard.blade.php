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
                    <div class="card bg-white rounded-lg shadow-lg  hover:bg-orange-900">
                            <img src="/img/CURP.jpeg" 
                                 alt="Consultar CURP" 
                                 class="w-full h-48 object-cover">

                        <div class="p-4 text-gray-800 hover:text-white">
                            <a href="https://www.gob.mx/curp/" target="_blank">
                                <h3 class="text-lg font-semibold mb-2">CONSULTAR CURP</h3>
                                <p>Haz clic para consultar tu CURP.</p>
                            </a>
                        </div>
                    </div>
                    <!-- Tarjeta 2 -->
                    <div class="card bg-white rounded-lg shadow-lg  hover:bg-orange-900">
                            <img src="/img/RFC.png" 
                                 alt="Consulta RFC" 
                                 class="w-full h-48 object-cover">

                        <div class="p-4 text-gray-800 hover:text-white">
                            <a href="https://www.sat.gob.mx/aplicacion/operacion/31274/consulta-tu-clave-de-rfc-mediante-curp" target="_blank">
                                <h3 class="text-lg font-semibold mb-2">CONSULTAR RFC</h3>
                                <p>Consulta tu clave RFC mediante CURP.</p>
                            </a>

                        </div>
                    </div>
                    <!-- Tarjeta 3 -->
                    <div class="card bg-white rounded-lg shadow-lg  hover:bg-orange-900">
                            <img src="/img/CLABE.jpg" 
                                 alt="Clabe Interbancaria" 
                                 class="w-full h-48 object-cover">

                        <div class="p-4 text-gray-800 hover:text-white">
                            <a href="https://www.gob.mx/condusef/articulos/sabes-cual-es-la-clabe" target="_blank">
                                <h3 class="text-lg font-semibold mb-2">CLABE INTERBANCARIA</h3>
                                <p>Consulta información sobre tu Clabe Interbancaria.</p>
                            </a>
                        </div>
                    </div>
                    <!-- Tarjeta 4 -->
                    <div class="card bg-white rounded-lg shadow-lg  hover:bg-orange-900">
                            <img src="/img/PDF.png" 
                                 alt="Convertir PDF" 
                                 class="w-full h-48 object-cover">

                        <div class="p-4 text-gray-800 hover:text-white">
                            <a href="https://www.adobe.com/mx/acrobat/online/convert-pdf.html" target="_blank">
                                <h3 class="text-lg font-semibold mb-2">CONVERTIR A PDF</h3>
                                <p>Convierte tus archivos a formato PDF.</p>
                            </a>
                        </div>
                    </div>
                    <!-- Tarjeta 5 -->
                    <div class="card bg-white rounded-lg shadow-lg  hover:bg-orange-900">
                            <img src="/img/Banco.jpg" 
                                 alt="Convertir Banco" 
                                 class="w-full h-48 object-cover">
                                 
                        <div class="p-4 text-gray-800 hover:text-white">
                            <a href="https://ubicatubancodelbienestar.bienestar.gob.mx/" target="_blank">
                                <h3 class="text-lg font-semibold mb-2">CONSULTAR AQUI</h3>
                                <p>Las sucursales del Banco del Bienestar</p>
                            </a>
                        </div>
                    </div>
                    <!-- Tarjeta 6 -->
                    <div class="card bg-white rounded-lg shadow-lg  hover:bg-orange-900">
                            <img src="/img/Bienestar.jpg" 
                                 alt="Bienestar" 
                                 class="w-full h-48 object-cover">

                        <div class="p-4 text-gray-800 hover:text-white">
                            <a href="https://www.gob.mx/" target="_blank">
                                <h3 class="text-lg font-semibold mb-2">CONSULTAR AQUI</h3>
                                <p>Todos los tramites que puedes realizar</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

<style>    
    .card {
        transition: transform 0.2s, box-shadow 0.2s, background-color 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
</style>
