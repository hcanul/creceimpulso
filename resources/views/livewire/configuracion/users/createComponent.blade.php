<div>
    <form eire:submit.prevent="Store()" class="space-y-6">
        <div class="grid grid-cols-2 gap-2 pl-6 sm:grid-cols-2">
            <div>
                <x-label for="createForm.name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre Usuario</x-label>
                <x-input type="text" wire:model='createForm.name' id="createForm.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre Usuario" />
                <x-input-error for="createForm.name" />
            </div>
            <div>
                <x-label for="createForm.apaterno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Paterno</x-label>
                <x-input type="text" wire:model='createForm.apaterno' id="createForm.apaterno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Apellido Paterno" />
                <x-input-error for="createForm.apaterno" />
            </div>
            <div>
                <x-label for="createForm.amaterno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido Materno</x-label>
                <x-input type="text" wire:model='createForm.amaterno' id="createForm.amaterno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Apellido Materno" />
                <x-input-error for="createForm.amaterno" />
            </div>
            <div>
                <x-label for="createForm.email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electronico</x-label>
                <x-input type="email" wire:model='createForm.email' id="createForm.amaterno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Correo Electronico" />
                <x-input-error for="createForm.email" />
            </div>
            <div>
                <x-label for="createForm.profile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perfil de usuario</x-label>
                <select wire:model='createForm.profile' id="createForm.profile' id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="null" selected>Elija una opcion</option>
                    @forelse ( $roles as $role )
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @empty
                        <option selected>Sin Datos</option>
                    @endforelse
                </select>
                <x-input-error for="createForm.profile" />
            </div>
            <div>
                <x-label for="createForm.city_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Oficina</x-label>
                <select wire:model='createForm.city_id' id="createForm.city_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="null" selected>Elija una opcion</option>
                    @forelse ( $cities as $city )
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @empty
                        <option selected>Sin Datos</option>
                    @endforelse
                </select>
                <x-input-error for="createForm.city_id" />
            </div>
        </div>
    </form>
</div>
