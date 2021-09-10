<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Dispositivo') }}
        </h2>
    </x-slot>
    
    <x-device-card>  
        <!-- Validation Errors -->
        <x-device-validation-errors class="mb-4" :errors="$errors" />

        <!-- form create Device -->
        <div class="p-6 bg-gray text-center border-b border-gray-200">
        {{ $title }}
        </div>

        <form method="POST" action="{{ route('devices.store') }}">
            @csrf
            <div>
                <x-label for="id_device" :value="__('Dispositivo Id')" />

                <x-input id="id_device" class="block mt-1 w-full" type="text" name="id_device" :value="old('id_device')" required autofocus />
            </div>
            <!-- Dev EUI -->
            <div>
                <x-label for="deveui" :value="__('Dev EUI')" />

                <x-input id="deveui" class="block mt-1 w-full" type="text" name="deveui" :value="old('deveui')"  autofocus />
            </div>
            <!-- App EUI -->
            <div>
                <x-label for="appeui" :value="__('App EUI')" />

                <x-input id="appeui" class="block mt-1 w-full" type="text" name="appeui" :value="old('appeui')"  autofocus />
            </div>
            <!-- Frecuencia de Región -->
            <div>
                <x-label for="freq_region" :value="__('Frecuencia de Región')" />

                <x-input id="freq_region" class="block mt-1 w-full" type="text" name="freq_region" :value="old('freq_region')"  autofocus />
            </div>
            
            <div class="flex items-center justify-end mt-4">
                            
                <x-button class="ml-3">
                    {{ __('Crear') }}
                </x-button>
            </div>
        </form>
    </div> 
    </x-device-card>
</x-app-layout>
