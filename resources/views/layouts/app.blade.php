<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Smile At Work')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .sidebar {
            transition: all 0.3s ease-in-out;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
        }
        
        .dropdown-enter {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, opacity 0.3s ease;
        }
        
        .dropdown-enter-active {
            max-height: 500px;
            opacity: 1;
        }
        
        .active-nav {
            background-color: #4f46e5;
            color: white;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Mobile menu button -->
    <div class="md:hidden fixed top-4 left-4 z-50">
        <button id="mobileMenuButton" class="bg-white p-3 rounded-lg shadow-md">
            <i class="fas fa-bars text-gray-700"></i>
        </button>
    </div>

    <div class="flex h-screen">
        <!-- Sidebar -->
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

                                <!-- Comunidad -->
                <a href="{{ route('community.index') }}" 
                   class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors duration-200 {{ request()->routeIs('community.index') ? 'active-nav' : '' }}">
                    <i class="fas fa-users w-5"></i>
                    <span>Comunidad</span>
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

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden md:ml-0">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between p-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-gray-600 text-sm">@yield('page-subtitle', 'Bienvenido de vuelta')</p>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- User Info -->
                        <div class="text-right">
                            <p class="font-semibold text-gray-800">{{ Auth::user()->nombres ?? Auth::user()->name }}</p>
                            <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                        </div>
                        
                        <!-- User Avatar -->


                        <div class="relative">
                        @auth
                            @if(isset($profile) && $profile->profile_photo)
                                <img src="{{ Storage::url($profile->profile_photo) }}" 
                                     alt="Foto de perfil" 
                                     class="w-10 h-10 rounded-full object-cover border-2 border-purple-200 cursor-pointer hover:border-purple-400 transition-colors">
                            @else
                                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-500 to-purple-700 flex items-center justify-center text-white text-lg font-bold border-2 border-purple-200 cursor-pointer hover:border-purple-400 transition-colors">
                                    {{ substr(auth()->user()->nombres ?? auth()->user()->name, 0, 1) }}
                                </div>
                            @endif
                            <!-- Indicador de Estado -->
                            <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></div>
                        @endauth
                    </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Overlay for mobile -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 md:hidden hidden"></div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobileMenuButton').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            sidebar.classList.toggle('open');
            overlay.classList.toggle('hidden');
        });

        // Close sidebar when clicking overlay
        document.getElementById('overlay').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            sidebar.classList.remove('open');
            overlay.classList.add('hidden');
        });

        // Services dropdown toggle
        document.getElementById('servicesDropdown').addEventListener('click', function() {
            const menu = document.getElementById('servicesMenu');
            const arrow = document.getElementById('dropdownArrow');
            
            menu.classList.toggle('dropdown-enter');
            arrow.classList.toggle('rotate-180');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('servicesDropdown');
            const menu = document.getElementById('servicesMenu');
            const arrow = document.getElementById('dropdownArrow');
            
            if (!dropdown.contains(event.target)) {
                menu.classList.add('dropdown-enter');
                arrow.classList.remove('rotate-180');
            }
        });

            document.getElementById('profile_photo').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            // Mostrar loading
            const button = document.querySelector('label[for="profile_photo"]');
            const originalHTML = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Subiendo...';
            button.disabled = true;
            
            // Enviar formulario automáticamente
            event.target.form.submit();
        }
    });

    </script>

    @stack('scripts')
</body>
</html>