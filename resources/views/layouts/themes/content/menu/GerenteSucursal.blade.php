<li>
    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-gerente-sucursal" data-collapse-toggle="dropdown-gerente-sucursal">
        @include('layouts.themes.icons.GerenteSucursal')
        <span class="flex-1 ml-3 text-left whitespace-nowrap">Gerente sucursal</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
    </button>
    <ul id="dropdown-gerente-sucursal" class="hidden py-2 space-y-2">
        {{-- <li>
            <a href="{{ route('IndexAdministrador') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                @include('layouts.themes.icons.InformeCartera')
                <span class="flex-1 ml-3 whitespace-nowrap">Reporte cartera</span>
            </a>
        </li>
        <li>
            <a href="{{ route('IndexDocumentacion') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                @include('layouts.themes.icons.Documentation')
                <span class="flex-1 ml-3 whitespace-nowrap">Documentación</span>
            </a>
        </li> --}}

    </ul>
</li>
