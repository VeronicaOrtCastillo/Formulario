
<div>
    @if ($solicitudEnviada)
        <!-- Mostrar mensaje si la solicitud ya fue enviada -->
        <!-- Mostrar mensaje si la solicitud ya fue enviada -->
        @if ($estadoSolicitud === 'pendiente')
            <div class="p-6 bg-yellow-500 text-white text-center font-semibold mt-2" style="font-family: 'Times New Roman', Times, serif; font-size: 30px;">
                <p>Tu solicitud está pendiente de revisión.</p>
            </div>
        @elseif ($estadoSolicitud === 'aceptado')
            <div class="p-6 bg-green-500 text-white text-center font-semibold mt-2" style="font-family: 'Times New Roman', Times, serif; font-size: 30px;">
                <p>¡Felicidades! Tu solicitud ha sido aceptada.</p>
            </div>
        @elseif ($estadoSolicitud === 'rechazado')
            <div class="p-6 bg-red-500 text-white text-center font-semibold mt-2" style="font-family: 'Times New Roman', Times, serif; font-size: 30px;">
                <p>Lo sentimos, tu solicitud ha sido rechazada.</p>
            </div>
        @endif
        
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
                        maxlength="18" 
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
                    <input 
                        id="files" 
                        type="file" 
                        wire:model="newFile" 
                        accept="application/pdf" 
                        class="hidden"
                        onchange="this.dispatchEvent(new InputEvent('input'))"
                    />

                    <label for="files" class="mt-2 bg-blue-500 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded cursor-pointer">
                        Seleccionar Archivo
                    </label>

                    <ul id="file-list" class="mt-2">
                        @foreach ($files as $index => $file)
                            <li class="flex justify-between items-center bg-gray-200 p-2 rounded mb-2">
                                <span>{{ is_string($file) ? basename($file) : $file->getClientOriginalName() }}</span>
                                <button type="button" wire:click="eliminarArchivo({{ $index }})" class="text-red-500">X</button>
                            </li>
                        @endforeach
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
        </p>
        
    @endif
</div>