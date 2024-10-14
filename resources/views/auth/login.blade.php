<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
            </label>
        </div>

        <!-- google recaptch -->
        <div class="form-group mt-4">
            {!! NoCaptcha::renderJs('es', false, 'onloadCallback') !!}
            {!! NoCaptcha::display() !!}

            <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2" />

        </div>        

        <div class="flex justify-between my-9">
            <!-- Con x-link mandamoa a llamar al componente link
                 Con slot podremos rrutilizar el componente pero 
                 son repetir contenido
                Con:href redirigimos el enlace-->            
            <x-link
                :href="route('register')"
            >
                Crear Cuenta
            </x-link>

            <x-link
                :href="route('password.request')"
            >
                ¿Olvidaste tu Contraseña?
            </x-link>
        </div>

        <x-primary-button class="w-full justify-center bg-red-700 hover:bg-red-900">
            {{ __('Iniciar Sesión') }}
        </x-primary-button>

    </form>
</x-guest-layout>


<script>
    var onloadCallback = function() {
        alert("recaptcha esta lista");
    };
</script>