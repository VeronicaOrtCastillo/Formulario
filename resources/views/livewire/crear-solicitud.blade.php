
<div>
    @if ($solicitudEnviada)
        <!-- Mostrar mensaje si la solicitud ya fue enviada -->
        <div class="p-6 bg-red-900 text-white text-center font-semibold mt-2" style="font-family: 'Times New Roman', Times, serif; font-size: 60px;">
            <p>Ya has enviado la solicitud</p>
            <p>Revisaremos la informacion enviada</p>

        </div>
        
    @elseif (!$userStatus || auth()->user()->usertype == 'admin') <!-- Mostrar si el usuario está deshabilitado o es administrador -->
        
        <form class="md:w-1/1 space-y-5" wire:submit.prevent='crearSolicitud'>
                <!-- Contenido del formulario -->
                <!-- Nombre -->
                <div>
                    <x-input-label 
                        for="name" 
                        :value="__('Nombre')" />
                    <x-text-input 
                        id="name" 
                        class="block mt-1 w-full " 
                        type="text" 
                        wire:model="name" 
                        :value="old('name')" 
                        style="text-transform: uppercase; font-size: 0.875rem;"
                        placeholder="Ingresa tu nombre completo"
                    />
                    @error('name')
                        <livewire:mostrar-alerta :message="$message" />
                    @enderror
                </div>
                <!-- CURP -->
                <div>
                    <x-input-label for="curp" :value="__('CURP')" />
                    <x-text-input 
                        id="curp" 
                        class="block mt-1 w-full" 
                        type="text" 
                        wire:model="curp" 
                        :value="old('curp')" 
                        style="text-transform: uppercase; font-size: 0.875rem;"
                        placeholder="Ingresa tu curp"
                    />
                    @error('curp')
                        <livewire:mostrar-alerta :message="$message" />
                    @enderror
                </div>
                <!-- RFC -->
                <div>
                    <x-input-label for="rfc" :value="__('RFC')" />
                    <x-text-input 
                        id="rfc" 
                        class="block mt-1 w-full" 
                        type="text" 
                        wire:model="rfc" 
                        :value="old('rfc')" 
                        maxlength="13" 
                        style="text-transform: uppercase; font-size: 0.875rem;"
                        placeholder="Ingresa tu rfc"
                    />

                    @error('rfc')
                        <livewire:mostrar-alerta :message="$message" />
                    @enderror
                </div>
                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input 
                        id="email" 
                        class="block mt-1 w-full placeholder-uppercase" 
                        type="email" 
                        wire:model="email" 
                        :value="old('email')" 
                        placeholder="Ingresa tu Correo Electronico"
                        style="text-transform: lowercase; font-size: 0.875rem;"
                    />

                    @error('email')
                        <livewire:mostrar-alerta :message="$message" />
                    @enderror
                </div>

                <style>
                    .placeholder-uppercase::placeholder {
                        text-transform: uppercase; /* Asegura que el placeholder esté en mayúsculas */
                    }
                </style>
                <!--Clabe Interbancaria-->
                <div>
                    <x-input-label for="clabe" :value="__('Clabe Interbancaria')" />
                    <x-text-input 
                        id="clabe" 
                        class="block mt-1 w-full" 
                        type="text" 
                        wire:model="clabe" 
                        :value="old('clabe')" 
                        maxlength="18" 
                        style="text-transform: uppercase; font-size: 0.875rem;"
                        placeholder="Ingresa tu clabe interbancaria"
                    />
                    @error('clabe')
                        <livewire:mostrar-alerta :message="$message" />
                    @enderror
                </div>
                <div>
                    <x-input-label for="files" :value="__('Sube los archivos solicitados')" />
                    <x-text-input
                        id="files"
                        class="block mt-1 w-full"
                        type="file"
                        wire:model="files"
                        multiple
                        accept="application/pdf"
                    />
                    <ul id="file-list">
                        @if ($files)
                            @foreach ($files as $file)
                                <li>{{ $file->getClientOriginalName() }}</li>
                            @endforeach
                        @endif
                    </ul>

                    @error('files')
                    <livewire:mostrar-alerta :message="$message" />
                    @enderror
                </div>

                <div style="text-align: center; color: #969292e7;">
                    <p>La información deberá ser enviada a la dirección Paseo de la Reforma 116, Col. Juárez, Cuauhtémoc, Ciudad de México, México, C.P. 06600"</p>
                </div>

                <!----
                <div>
                    <textarea 
                        class="w-full"
                        placeholder="La información deberá ser enviada a la dirección Paseo de la Reforma 116, Col. Juárez, Cuauhtémoc, Ciudad de México, México, C.P. 06600"
                        style="font-size: 1.2rem; height: 100px; white-space: normal; word-wrap: break-word;"
                    ></textarea>
                </div>
                -->
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
                    Enviar
                </button>
        </form>
    @else
        <p class="p-6 bg-red-900 text-white text-center font-semibold mt-2">Este formulario no está disponible para ti</p>
    @endif
</div>