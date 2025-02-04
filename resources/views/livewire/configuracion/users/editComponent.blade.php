<div>
    <form eire:submit.prevent="Store()" class="space-y-6">
        <div class="grid grid-cols-2 gap-2 pl-6 sm:grid-cols-2">
            <div>
                <x-label for="editForm.name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre Usuario</x-label>
                <x-input type="text" wire:model='editForm.name' id="editForm.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre Usuario" />
                <x-input-error for="editForm.name" />
            </div>
            <div>
                <x-label for="editForm.apaterno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Paterno</x-label>
                <x-input type="text" wire:model='editForm.apaterno' id="editForm.apaterno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Apellido Paterno" />
                <x-input-error for="editForm.apaterno" />
            </div>
            <div>
                <x-label for="editForm.amaterno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Materno</x-label>
                <x-input type="text" wire:model='editForm.amaterno' id="editForm.amaterno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Apellido Materno" />
                <x-input-error for="editForm.amaterno" />
            </div>
            <div>
                <x-label for="editForm.email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electronico</x-label>
                <x-input type="email" wire:model='editForm.email' id="editForm.amaterno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Correo Electronico" />
                <x-input-error for="editForm.email" />
            </div>
            <div>
                <x-label for="editForm.profile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perfil de usuario</x-label>
                <select wire:model='editForm.profile' id="editForm.profile' id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="null" selected>Elija una opcion</option>
                    @forelse ( $roles as $role )
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @empty
                        <option selected>Sin Datos</option>
                    @endforelse
                </select>
                <x-input-error for="editForm.profile" />
            </div>
            <div>
                <x-label for="editForm.city_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Oficina</x-label>
                <select wire:model='editForm.city_id' id="editForm.city_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="null" selected>Elija una opcion</option>
                    @forelse ( $cities as $city )
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @empty
                        <option selected>Sin Datos</option>
                    @endforelse
                </select>
                <x-input-error for="editForm.city_id" />
            </div>
        </div>
    </form>
</div>
