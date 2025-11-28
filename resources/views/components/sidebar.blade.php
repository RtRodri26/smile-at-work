<div class="sidebar bg-gray-800 text-white w-64 fixed inset-y-0 left-0 z-40 md:relative md:translate-x-0" id="sidebar">
    <!-- Logo -->
    <div class="p-6 border-b border-gray-700">
        <div class="flex items-center space-x-3">
            <i class="fas fa-smile text-2xl text-purple-400"></i>
            <span class="text-xl font-bold">Smile At Work</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="p-4 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" 
           class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'active-nav' : '' }}">
            <i class="fas fa-tachometer-alt w-5"></i>
            <span>Dashboard</span>
        </a>

        <!-- Servicios Dropdown -->
        <div class="relative">
            <button id="servicesDropdown" 
                    class="flex items-center justify-between w-full p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-concierge-bell w-5"></i>
                    <span>Servicios</span>
                </div>
                <i class="fas fa-chevron-down text-xs transition-transform duration-200" id="dropdownArrow"></i>
            </button>
            
            <!-- Dropdown Menu -->
            <div id="servicesMenu" class="dropdown-enter ml-4 mt-1 space-y-1">
                <a href="{{ route('services.company.create') }}" 
                   class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('services.company.*') ? 'text-purple-300' : '' }}">
                    <i class="fas fa-building w-4"></i>
                    <span class="text-sm">Para Empresas</span>
                </a>
                
                <a href="{{ route('services.university.create') }}" 
                   class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('services.university.*') ? 'text-purple-300' : '' }}">
                    <i class="fas fa-university w-4"></i>
                    <span class="text-sm">Para Universidades</span>
                </a>
                
                <a href="{{ route('services.event.create') }}" 
                   class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('services.event.*') ? 'text-purple-300' : '' }}">
                    <i class="fas fa-calendar-check w-4"></i>
                    <span class="text-sm">Para Eventos</span>
                </a>
                
                <a href="{{ route('job.application.create') }}" 
                   class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('job.application.*') ? 'text-purple-300' : '' }}">
                    <i class="fas fa-handshake w-4"></i>
                    <span class="text-sm">Trabaja con Nosotros</span>
                </a>
            </div>
        </div>

        <!-- Perfil -->
        <a href="{{ route('profile') }}" 
           class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('profile') ? 'active-nav' : '' }}">
            <i class="fas fa-user w-5"></i>
            <span>Mi Perfil</span>
        </a>

        <!-- Configuración -->
        <a href="#" 
           class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200">
            <i class="fas fa-cog w-5"></i>
            <span>Configuración</span>
        </a>

        <!-- Cerrar Sesión -->
        <form method="POST" action="{{ route('logout') }}" class="pt-4 border-t border-gray-700">
            @csrf
            <button type="submit" 
                    class="flex items-center space-x-3 w-full p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200 text-red-400">
                <i class="fas fa-sign-out-alt w-5"></i>
                <span>Cerrar Sesión</span>
            </button>
        </form>
    </nav>
</div>