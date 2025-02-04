<div>
    <form eire:submit.prevent="Store()" class="space-y-6">
        <div class="grid grid-cols-2 gap-2 pl-6 sm:grid-cols-2">
            <div>
                <x-label for="editForm.name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de Perfil Usuario</x-label>
                <x-input type="text" wire:model='editForm.name' id="editForm.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre de Perfil Usuario" />
                <x-input-error for="editForm.name" />
            </div>
        </div>
    </form>
</div>
