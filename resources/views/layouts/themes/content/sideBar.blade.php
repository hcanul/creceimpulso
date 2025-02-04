<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{route('dashboard')}}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    @include('layouts.themes.icons.dashboard')
                    <span class="ml-3">Dashboard</span>
                </a>

                    @include('layouts.themes.content.menu.settings')
                    @include('layouts.themes.content.menu.DirGral')
                    @include('layouts.themes.content.menu.DirComer')
                    @include('layouts.themes.content.menu.GerenteReg')
                    @include('layouts.themes.content.menu.GerenteSucursal')
                    @include('layouts.themes.content.menu.RecHuman')
                    @include('layouts.themes.content.menu.AnalisisCredito')
                    @include('layouts.themes.content.menu.Administradores')
                    @include('layouts.themes.content.menu.Administracion')


        </ul>
    </div>
</aside>
