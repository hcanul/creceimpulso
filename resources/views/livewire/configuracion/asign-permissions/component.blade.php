<div>
    <div class="pb-4 font-medium text-gray-900 whitespace-nowrap dark:text-white justify-self-auto">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{$componentName}} | {{$pageTitle}}</h3>
    </div>
    <div class="flex items-center justify-between pb-4 bg-white ma-3 dark:bg-gray-900">
        @can('Ver OpcionesPermisos')
            <div class="justify-self-auto">
                <x-select-model
                    :options="$roles"
                    wire:model.live="role"
                    value-field="id"
                    label-field="name"
                    label="Selecciona un Rol"
                    >
                </x-select-model>
            </div>
            <div class="justify-self-auto">
                <button type="button" wire:click.prevent='SyncAll' class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2  text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Sincronizar Todos
                    </span>
                </button>
                <button type="button" @click="$dispatch('confirm-remove')" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2  text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Revocar Todos
                    </span>
                </button>
            </div>
        @endcan

    </div>

    @can('Ver ListaPermisos')
        <div id="default-styled-tab-content" >
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Permiso</th>
                        <th scope="col" class="px-6 py-3">Roles con el permiso</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permiso)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $permiso->id }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex items-center mb-4">
                                    <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        <input
                                            wire:click="SyncPermiso(document.getElementById('p{{ $permiso->id }}').checked, '{{ $permiso->name }}');"
                                            value="{{ $permiso->id }}"
                                            id="p{{ $permiso->id }}"
                                            type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            {{ $permiso->checked == 1 ? 'checked' : '' }}>
                                        {{ $permiso->name }}
                                    </label>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                {{ \App\Models\User::permission($permiso->name)->count() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $permissions->links() }}
        </div>
    @endcan
    <x-confirm-remove />
</div>
