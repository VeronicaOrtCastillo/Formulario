<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre Completo')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" style="text-transform: uppercase;" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" style="text-transform: lowercase;" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />
            <div class="relative">
                <x-text-input 
                    id="password" 
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="new-password" />
                <button 
                    type="button" 
                    onclick="togglePassword('password', this)" 
                    class="absolute right-2 top-1/2 transform -translate-y-1/2"
                    style="font-size: 0.875rem; color: #6b7280; opacity: 0.8; padding: 0;">
                        Mostrar
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirma tu Contraseña')" />
            <div class="relative">
                <x-text-input 
                    id="password_confirmation" 
                    class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation" 
                    required autocomplete="new-password" />

                <button 
                    type="button" 
                    onclick="togglePassword('password_confirmation', this)" 
                    class="absolute right-2 top-1/2 transform -translate-y-1/2"
                    style="font-size: 0.875rem; color: #6b7280; opacity: 0.8; padding: 0;">
                        Mostrar
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <script>
            function togglePassword(fieldId, button) {
                const field = document.getElementById(fieldId);
                if (field.type === "password") {
                    field.type = "text";
                    button.textContent = "Ocultar";
                } else {
                    field.type = "password";
                    button.textContent = "Mostrar";
                }
            }
        </script>

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
