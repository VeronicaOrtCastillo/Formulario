<title>Solicitud</title>

<link rel="icon" type="image/png" sizes="180x180" href="/img/Principal.png">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-4xl text-red-900 text-center ">
            {{ __('Solicitud de Aguinaldo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="md:w-1/2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-white border-b border-gray-200">
                    
                    <div class="md:flex md:justify-center p-3">
                        <livewire:crear-solicitud>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
