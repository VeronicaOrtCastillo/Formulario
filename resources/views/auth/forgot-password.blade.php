<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('¿Olvidaste tu Contraseña? Coloca tu email de registro y te enviaremos un enlace, para que puedas crear una nueva') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus style="text-transform: lowercase;"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <div class="flex justify-between my-5">
            <x-link
                :href="route('login')"
            >
                Iniciar Sesión
            </x-link>

            <x-link
                :href="route('register')"
            >
                Crear Cuenta
            </x-link>
            
        </div>
        
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="w-full justify-center bg-red-700 hover:bg-red-900">
                {{ __('Enviar Instrucciones') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
