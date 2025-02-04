<x-dialog-modal wire:model='open'>
    <x-slot name="title">
        <div class="flex items-center w-full p-6 space-x-2 border-b border-gray-200 rounded-b dark:border-gray-600">
            {{$componentName}} | {{$selected_id > 0 ? 'EDITAR':' NUEVO'}}
        </div>
    </x-slot>
    <x-slot name="content">
        <div>
            @if ($selected_id > 0)
                @include('livewire.configuracion.roles.editComponent')
            @else
                @include('livewire.configuracion.roles.createComponent')
            @endif

        </div>
    </x-slot>
    <x-slot name="footer">
        <div class="flex items-center w-full p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            @if ($selected_id > 0)
                <button wire:click.prevent='Update()' type="button"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar</button>
            @else
                <button wire:click.prevent='Store()'  type="button"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
            @endif
            <button wire:click.prevent='resetUI()' onclick="wire()" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
        </div>
    </x-slot>
</x-dialog-modal>
