<title>Solicitud</title>

<link rel="icon" type="image/png" sizes="180x180" href="/img/Principal.png">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pago por Inactividad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="md:w-1/2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-white border-b border-gray-200">
                    <h1 class="text-4xl font-bold text-center mb-10">
                        Solicitud de Aguinaldo
                    </h1>

                    <div class="md:flex md:justify-center p-3">
                        <livewire:crear-solicitud>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
