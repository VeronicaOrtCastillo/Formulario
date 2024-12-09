<title>Verifica Email</title>

<link rel="icon" type="image/png" sizes="180x180" href="/img/Principal.png">

<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Confirmaremos tu correo electrónico antes de continuar. Revisa tu correo y presiona sobre el botón de confirmación.') }}
        <p class="mt-4 font-medium text-sm text-red-600">{{ __('Nota: Si no recibiste el correo, presiona el botón Reenviar correo de Confirmación') }}</p>

    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Se ha enviado un nuevo correo de confirmación al correo que ingresaste al registrarte') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button class="w-full justify-center bg-red-700 hover:bg-red-900">
                    {{ __('Reenviar Correo de Confirmación') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Cerrar Sesión') }}
            </button>
        </form>
    </div>
</x-guest-layout>
