<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- roll 
        <div class="mt-4">
            <x-input-label for="rol" :value="__('Selecciona tu status')"/>

            <select
                id="rol"
                name="rol"
                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">

                <option value=""> Selecciona una opcion </option>
                <option value="1"> Activo </option>
                <option value="2"> Inactivo </option>

            </select>
        </div>
        -->

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirma tu Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex justify-between my-5">
            <!-- Con x-link mandamoa a llamar al componente link
                 Con slot podremos rrutilizar el componente pero 
                 son repetir contenido
                Con:href redirigimos el enlace-->            
            <x-link
                :href="route('login')"
            >
                Iniciar Sesión
            </x-link>

            <x-link
                :href="route('password.request')"
            >
                ¿Olvidaste tu Contraseña?
            </x-link>
        </div>

        <x-primary-button class="w-full justify-center bg-red-700 hover:bg-red-900">
            {{ __('Crear Cuenta') }}
        </x-primary-button>

    </form>
</x-guest-layout>
