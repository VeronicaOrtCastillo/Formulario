<title>Inicio</title>

<link rel="icon" type="image/png" sizes="180x180" href="/img/Principal.png">

<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold text-red-900 text-center mb-6" style="font-family: 'Times New Roman', Times, serif; font-size: 60px;">
            {{ __('Listado de Empleados Registrados') }}
        </h1>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (@session()->has('mensaje'))
                    <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3">
                        {{ session('mensaje') }}
                    </div>
                @endif
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Componente Livewire de la tabla de empleados -->
                        <livewire:employee-table />
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>



