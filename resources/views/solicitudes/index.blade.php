<title>Solicitudes Recibidas</title>

<link rel="icon" type="image/png" sizes="180x180" href="/img/Principal.png">

<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold text-red-900 text-center mb-4" style="font-family: 'Times New Roman', Times, serif; font-size: 50px;">
            {{ __('Solicitudes Recibidas') }}
        </h1>
            <div class="py-1">
                <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
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
                                        <th class="border px-4 py-2 font-semibold text-center">Estado</th>
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
                                                    <div class="flex flex-wrap justify-center gap-0.5">
                                                        @foreach (json_decode($solicitud->files) as $file)
                                                            <a href="{{ Storage::url($file) }}" target="_blank" class="inline-block  mr-2">
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

                                            <td class="border border-gray-300 px-4 py-2 text-center">
                                                @if ($solicitud->status === 'pendiente')
                                                    <div class="flex justify-center gap-2">
                                                        <button class="bg-green-500 text-white p-1 rounded hover:bg-green-700 transition actualizar-estado" data-id="{{ $solicitud->id }}" data-estado="aceptado" title="Aceptar">
                                                            ✅
                                                        </button>
                                                        <button class="bg-red-200 text-white p-1 rounded hover:bg-red-700 transition actualizar-estado" data-id="{{ $solicitud->id }}" data-estado="rechazado" title="Rechazar">
                                                            ❌
                                                        </button>
                                                    </div>
                                                @elseif ($solicitud->status === 'aceptado')
                                                    <span class="font-semibold text-green-500">Aceptada</span>
                                                @elseif ($solicitud->status === 'rechazado')
                                                    <span class="font-semibold text-red-500">Rechazada</span>
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
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    document.querySelectorAll('.actualizar-estado').forEach(button => {
                                        button.addEventListener('click', function () {
                                            const solicitudId = this.dataset.id;
                                            const estado = this.dataset.estado;
                            
                                            fetch(`/solicitudes/${solicitudId}/estado`, {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                                },
                                                body: JSON.stringify({ estado })
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    location.reload(); // Recargar la página para ver los cambios
                                                }
                                            })
                                            .catch(error => console.error('Error:', error));
                                        });
                                    });
                                });
                            </script>
                            
                        </div>
                    </div>
                </div>
            </div>
    </x-slot>
</x-app-layout>
