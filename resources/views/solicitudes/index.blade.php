<title>Solicitudes Recibidas</title>

<link rel="icon" type="image/png" sizes="180x180" href="/img/Principal.png">

<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold text-red-900 text-center mb-6" style="font-family: 'Times New Roman', Times, serif; font-size: 50px;">
            {{ __('Solicitudes Recibidas') }}
        </h1>
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200 overflow-auto">
                            <table class="table-auto w-full text-left border-collapse rounded-lg shadow-md overflow-hidden">
                                <thead class="bg-red-900 text-white">
                                    <tr>
                                        <th class="border px-4 py-2 font-semibold text-center">ID</th>
                                        <th class="border px-4 py-2 font-semibold text-center">Nombre</th>
                                        <th class="border px-4 py-2 font-semibold text-center">CURP</th>
                                        <th class="border px-4 py-2 font-semibold text-center">RFC</th>
                                        <th class="border px-4 py-2 font-semibold text-center">Clabe Interbancaria</th>
                                        <th class="border px-4 py-2 font-semibold text-center">Fecha de Envío</th>
                                        <th class="border px-4 py-2 font-semibold text-center">Archivos</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($solicitudes as $solicitud)
                                        <tr class="hover:bg-gray-200">
                                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $solicitud->id }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $solicitud->name }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $solicitud->curp }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $solicitud->rfc }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $solicitud->clabe }}</td>
                                            <td class="border border-gray-300 px-4 py-2 text-center">
                                                {{ $solicitud->created_at->format('d/m/Y') }}
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2 text-center">
                                                @if ($solicitud->files)
                                                    <div class="flex flex-wrap justify-center gap-2">
                                                        @foreach (json_decode($solicitud->files) as $file)
                                                            <a href="{{ Storage::url($file) }}" target="_blank" class="inline-block mb-2 mr-2">
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
                                            <td colspan="7" class="text-center py-4">No hay solicitudes registradas</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </x-slot>
</x-app-layout>
