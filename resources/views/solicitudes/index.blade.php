<title>Solicitudes Recibidas</title>

<link rel="icon" type="image/png" sizes="180x180" href="/img/Principal.png">

<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold text-center mb-6">
            {{ __('Listado de Solicitudes Recibidas') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="table-auto w-full text-left border-collapse rounded-lg shadow-md overflow-hidden">
                        <thead class="bg-red-900 text-white">
                            <tr>
                                <th class=" border px-6 py-3 font-semibold  text-center">ID</th>
                                <th class=" border px-6 py-3 font-semibold  text-center">Nombre</th>
                                <th class=" border px-6 py-3 font-semibold  text-center">CURP</th>
                                <th class=" border px-6 py-3 font-semibold  text-center">RFC</th>
                                <th class=" border px-6 py-3 font-semibold  text-center">Clabe Interbancaria</th>
                                <th class=" border px-6 py-3 font-semibold  text-center">Fecha de Envío</th>
                                <th class=" border px-6 py-3 font-semibold  text-center">Archivos</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($solicitudes as $solicitud)
                                <tr class="hover:bg-gray-200">
                                    <td class="border border-gray-300 px-6 py-3">{{ $solicitud->id }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $solicitud->name }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $solicitud->curp }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $solicitud->rfc }}</td>
                                    <td class="border border-gray-300 px-6 py-3">{{ $solicitud->clabe }}</td>
                                    <td class="border border-gray-300 px-6 py-3">
                                        {{ $solicitud->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="border border-gray-300 px-6 py-3">
                                        @if ($solicitud->files)
                                            <div class="flex gap-2">
                                                @foreach (json_decode($solicitud->files) as $file)
                                                    <!-- Enlace al archivo PDF -->
                                                    <a href="{{ Storage::url($file) }}" target="_blank" class="inline-block mb-2 mr-2">
                                                        <!-- Imagen personalizada para PDF -->
                                                        <img 
                                                            src="{{ asset('img/PDF_I.png') }}" 
                                                            alt="PDF" 
                                                            class="w-8 h-8 hover:scale-110 transition-transform" 
                                                        />
                                                    </a>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-gray-500">Sin archivos</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">No hay solicitudes registradas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
