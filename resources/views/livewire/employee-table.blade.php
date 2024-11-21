<div>
    <h2 class="text-xl font-semibold mb-4">Listado de Empleados</h2>
    <table class="table-auto w-full border-collapse border border-red-300">
        <thead>
            <tr>
                <th class="px-2 py-2 border border-red-300">ID</th>
                <th class="px-4 py-2 border border-red-300">Nombre</th>
                <th class="px-4 py-2 border border-red-300">Correo Electrónico</th>
                <th class="px-4 py-2 border border-red-300">Estado Actual</th>
                <th class="px-4 py-2 border border-red-300">Modificar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td class="px-4 py-2 border-gray-300">{{ $employee->id }}</td>
                    <td class="px-4 py-2 border-gray-300">{{ $employee->name }}</td>
                    <td class="px-4 py-2 border-gray-300">{{ $employee->email }}</td>
                    <td class="px-4 py-2 border-gray-300">{{ $employee->status ? 'Activo' : 'Inactivo' }}</td>
                    <td class="px-4 py-2 border-gray-300">
                        <!-- Aquí puedes agregar botones para habilitar/deshabilitar -->
                        @if($employee->status)
                            <button wire:click="deactivate({{ $employee->id }})" class="bg-red-500 text-white px-2 py-1 rounded">Desactivar</button>
                        @else
                            <button wire:click="activate({{ $employee->id }})" class="bg-green-500 text-white px-2 py-1 rounded">Activar</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
