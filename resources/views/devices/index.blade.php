<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Devices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-6 bg-gray text-center border-b border-gray-200">
                    {{ $titulo }}
                </div>
                <div class="flex flex-row-reverse p-6 bg-gray text-center">
                    <div class="box-content">
                        <a href="{{ route('devices.create') }}" class="text-white border-1 bg-blue-600 p-3 hover:bg-blue-500 rounded-md">
                            Nuevo</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <x-table>
                        <x-slot name="table_header">
                            <x-table-column>Dispositivo ID</x-table-column>
                            <x-table-column>Dev UI</x-table-column>
                            <x-table-column>App UI</x-table-column>
                            <x-table-column>Frecuencia de Región</x-table-column>
                        </x-slot>
                        
                        @foreach ($devices as $device)                  
                            <tr>
                                <x-table-column>{{ $device->id_device }}</x-table-column>
                                <x-table-column>{{ $device->deveui }}</x-table-column>
                                <x-table-column>{{ $device->appeui }}</x-table-column>
                                <x-table-column :name="__('text-center')" class="text-center">{{ $device->freq_region }}</x-table-column>
                            </tr>
                        @endforeach
                    </x-table>               
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
