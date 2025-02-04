@props(['headers', 'rows', 'displayColumns', 'extraActions' => [], 'editPermission' => null, 'deletePermission' => null])

<div class="overflow-x-auto">
    <table class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <thead>
            <tr class="bg-gray-100 dark:bg-gray-700">
                @foreach($headers as $header)
                    <th class="px-4 py-2 text-xs font-medium text-left text-gray-600 uppercase border-b dark:text-gray-300">
                        {{ $header }}
                    </th>
                @endforeach
                <th class="px-4 py-2 text-xs font-medium text-left text-gray-600 uppercase border-b dark:text-gray-300">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($rows as $row)
                <tr class="transition hover:bg-gray-50 dark:hover:bg-gray-900">
                    @foreach($displayColumns as $column)
                        <td class="px-4 py-2 text-gray-700 border-b dark:text-gray-300">
                            @php
                                $value = $row;
                                foreach (explode('.', $column) as $segment) {
                                    if (isset($value->$segment)) {
                                        $value = $value->$segment;
                                    } else {
                                        $value = null;
                                        break;
                                    }
                                }
                            @endphp

                            @if($column == 'status')
                                @if($value == 'ACTIVO')
                                    <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                        <span class="w-2 h-2 bg-green-500 rounded-full me-1"></span>
                                        {{ ucfirst($value) }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                        <span class="w-2 h-2 bg-red-500 rounded-full me-1"></span>
                                        {{ ucfirst($value) }}
                                    </span>
                                @endif
                            @else
                            {{ $value }}
                            @endif
                        </td>
                    @endforeach

                    <td class="flex px-6 py-4 space-x-3 border-b">
                        @can($editPermission)
                            <button data-tooltip-target="edit-tooltip + {{ $row->id }}" type="button" wire:click="Editar({{ $row->id }})" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                @include('layouts.themes.icons.editar')
                            </button>
                            <div id="edit-tooltip + {{ $row->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm cpacity-0 tooltip dark:bg-gray-700">
                                Editar elemento
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        @endcan

                        @can($deletePermission)
                            <button data-tooltip-target="delete-tooltip + {{ $row->id }}" @click="$dispatch('confirm-delete', { id: {{ $row->id }} })" type="button" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                @include('layouts.themes.icons.delete')
                            </button>
                            <div id="delete-tooltip + {{ $row->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm cpacity-0 tooltip dark:bg-gray-700">
                                Eliminar elemento
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        @endcan

                        {{-- <button data-tooltip-target="ver-tooltip + {{ $row->id }}" type="button" wire:click="verRegistro({{ $row->id }})" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            @include('layouts.themes.icons.see') <!-- Icono de ver -->
                        </button>
                        <div id="ver-tooltip + {{ $row->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm cpacity-0 tooltip dark:bg-gray-700">
                            Ver elemento
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div> --}}

                        @foreach($extraActions as $extraAction)
                            @if(isset($extraAction['field']) && isset($extraAction['actions'][$row->{$extraAction['field']}]))
                                @php
                                    $action = $extraAction['actions'][$row->{$extraAction['field']}];
                                @endphp
                                <button type="button" wire:click="{{ $action['method'] }}({{ $row->id }})" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    @include($action['icon'])
                                </button>
                            @endif
                        @endforeach
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers) + 1 }}" class="px-4 py-2 text-center text-gray-500">
                        No se encontraron registros.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $rows->links() }}
    </div>
</div>
