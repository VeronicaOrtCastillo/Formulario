<title>Inicio</title>

<link rel="icon" type="image/png" sizes="180x180" href="/img/Principal.png">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenido Administrador') }}
        </h2>
    </x-slot>

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
</x-app-layout>



