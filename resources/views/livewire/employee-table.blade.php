<div class="overflow-auto">
    <h1 class="text-xl text-center font-semibold mb-4">Listado de Empleados</h1>
    <table class="table-auto w-full text-left border-collapse rounded-lg shadow-md overflow-hidden">
        <thead class="bg-red-900 text-white">
            <tr>
                <th class="border px-4 py-2 font-semibold text-center">ID</th>
                <th class="border px-4 py-2 font-semibold text-center">Nombre</th>
                <th class="border px-4 py-2 font-semibold text-center">Correo Electrónico</th>
                <th class="border px-4 py-2 font-semibold text-center">Estado Actual</th>
                <th class="border px-4 py-2 font-semibold text-center">Modificar</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($employees as $employee)
                <tr class="hover:bg-gray-200">
                    <td class="px-4 py-2 border border-gray-300 text-center">{{ $employee->id }}</td>
                    <td class="px-4 py-2 border border-gray-300 text-center">{{ $employee->name }}</td>
                    <td class="px-4 py-2 border border-gray-300 text-center">{{ $employee->email }}</td>
                    <td class="px-4 py-2 border border-gray-300 text-center">{{ $employee->status ? 'Activo' : 'Inactivo' }}</td>
                    <td class="px-4 py-2 border border-gray-300 text-center">
                        @if($employee->status)
                            <button wire:click="deactivate({{ $employee->id }})" class="bg-red-800 text-white px-2 py-1 rounded hover:bg-red-700 transition">
                                Desactivar
                            </button>
                        @else
                            <button wire:click="activate({{ $employee->id }})" class="bg-orange-800 text-white px-2 py-1 rounded hover:bg-orange-700 transition">
                                Activar
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
