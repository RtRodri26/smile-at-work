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
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --smile-yellow: #F7C948;
            --smile-blue: #0077B6;
            --smile-orange: #F28C38;
            --smile-green: #BBC34A;
            --smile-red: #E94B4B;
            --smile-pink: #F8A5A5;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .comic-font {
            font-family: 'Comic Neue', cursive;
        }
        
        .sidebar {
            transition: all 0.3s ease-in-out;
            background: linear-gradient(180deg, var(--smile-blue) 0%, #005a8f 100%);
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
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
            border-left: 4px solid var(--smile-yellow);
        }
        
        .nav-item {
            transition: all 0.2s ease;
            border-radius: 8px;
            margin: 4px 0;
        }
        
        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateX(4px);
        }
        
        .bubble {
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
        }
        
        .soft-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--smile-yellow) 0%, var(--smile-orange) 100%);
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, -10px); }
            100% { transform: translate(0, -0px); }
        }
        
        .wiggling {
            animation: wiggle 2s ease-in-out infinite;
        }
        
        @keyframes wiggle {
            0%, 100% { transform: rotate(-3deg); }
            50% { transform: rotate(3deg); }
        }
        
        .color-bg-yellow { background-color: var(--smile-yellow); }
        .color-bg-blue { background-color: var(--smile-blue); }
        .color-bg-orange { background-color: var(--smile-orange); }
        .color-bg-green { background-color: var(--smile-green); }
        .color-bg-red { background-color: var(--smile-red); }
        .color-bg-pink { background-color: var(--smile-pink); }
        
        .color-text-yellow { color: var(--smile-yellow); }
        .color-text-blue { color: var(--smile-blue); }
        .color-text-orange { color: var(--smile-orange); }
        .color-text-green { color: var(--smile-green); }
        .color-text-red { color: var(--smile-red); }
        
        .btn-primary {
            background-color: var(--smile-orange);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--smile-yellow);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(242, 140, 56, 0.3);
        }
        
        .header-gradient {
            background: linear-gradient(90deg, var(--smile-blue) 0%, var(--smile-green) 100%);
        }
        
        .status-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid white;
            position: absolute;
            bottom: 0;
            right: 0;
        }
        
        .status-online {
            background-color: var(--smile-green);
        }
        
        .status-busy {
            background-color: var(--smile-red);
        }
        
        .status-away {
            background-color: var(--smile-yellow);
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--smile-red);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: bold;
        }
        
        .sidebar-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Mobile menu button -->
    <div class="md:hidden fixed top-4 left-4 z-50">
        <button id="mobileMenuButton" class="bg-white p-3 rounded-lg soft-shadow color-text-blue">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar text-white w-64 fixed inset-y-0 left-0 z-40 md:relative md:translate-x-0" id="sidebar">
            <!-- Logo -->
            <div class="p-6 sidebar-header">
                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <i class="fas fa-smile text-2xl color-text-yellow wiggling"></i>
                        <div class="absolute -top-1 -right-1 w-3 h-3 bubble color-bg-red"></div>
                    </div>
                    <span class="text-xl font-bold comic-font">Smile At Work</span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="p-4 space-y-1">
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center space-x-3 p-3 nav-item {{ request()->routeIs('dashboard') ? 'active-nav' : '' }}">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Servicios Dropdown -->
                <div class="relative">
                    <button id="servicesDropdown" 
                            class="flex items-center justify-between w-full p-3 nav-item">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-concierge-bell w-5"></i>
                            <span>Servicios</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs transition-transform duration-200" id="dropdownArrow"></i>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div id="servicesMenu" class="dropdown-enter ml-4 mt-1 space-y-1">
                        <a href="{{ route('services.company.create') }}" 
                           class="flex items-center space-x-3 p-2 rounded-lg hover:bg-white hover:bg-opacity-10 transition-colors duration-200 {{ request()->routeIs('services.company.*') ? 'color-text-yellow' : '' }}">
                            <i class="fas fa-building w-4"></i>
                            <span class="text-sm">Para Empresas</span>
                        </a>
                        
                        <a href="{{ route('services.university.create') }}" 
                           class="flex items-center space-x-3 p-2 rounded-lg hover:bg-white hover:bg-opacity-10 transition-colors duration-200 {{ request()->routeIs('services.university.*') ? 'color-text-yellow' : '' }}">
                            <i class="fas fa-university w-4"></i>
                            <span class="text-sm">Para Universidades</span>
                        </a>
                        
                        <a href="{{ route('services.event.create') }}" 
                           class="flex items-center space-x-3 p-2 rounded-lg hover:bg-white hover:bg-opacity-10 transition-colors duration-200 {{ request()->routeIs('services.event.*') ? 'color-text-yellow' : '' }}">
                            <i class="fas fa-calendar-check w-4"></i>
                            <span class="text-sm">Para Eventos</span>
                        </a>
                        
                        <a href="{{ route('services.job.application.create') }}" 
                           class="flex items-center space-x-3 p-2 rounded-lg hover:bg-white hover:bg-opacity-10 transition-colors duration-200 {{ request()->routeIs('job.application.*') ? 'color-text-yellow' : '' }}">
                            <i class="fas fa-handshake w-4"></i>
                            <span class="text-sm">Trabaja con Nosotros</span>
                        </a>
                    </div>
                </div>

                <!-- Perfil -->
                <a href="{{ route('profile') }}" 
                   class="flex items-center space-x-3 p-3 nav-item {{ request()->routeIs('profile') ? 'active-nav' : '' }}">
                    <i class="fas fa-user w-5"></i>
                    <span>Mi Perfil</span>
                </a>

                <!-- Comunidad -->
                <a href="{{ route('community.index') }}" 
                   class="flex items-center space-x-3 p-3 nav-item {{ request()->routeIs('community.index') ? 'active-nav' : '' }}">
                    <i class="fas fa-users w-5"></i>
                    <span>Comunidad</span>
                    <div class="notification-badge">3</div>
                </a>

                <!-- Configuración -->
                <!-- <a href="#" 
                   class="flex items-center space-x-3 p-3 nav-item">
                    <i class="fas fa-cog w-5"></i>
                    <span>Configuración</span>
                </a> -->
            </nav>
            
            <!-- User Info & Logout -->
            <div class="absolute bottom-0 w-full p-4 sidebar-footer">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="relative">
                        @auth
                            @if(isset($profile) && $profile->profile_photo)
                                <img src="{{ Storage::url($profile->profile_photo) }}" 
                                     alt="Foto de perfil" 
                                     class="w-10 h-10 rounded-full object-cover border-2 border-yellow-200 cursor-pointer hover:border-yellow-400 transition-colors">
                            @else
                                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-400 flex items-center justify-center text-white text-lg font-bold border-2 border-yellow-200 cursor-pointer hover:border-yellow-400 transition-colors">
                                    {{ substr(auth()->user()->nombres ?? auth()->user()->name, 0, 1) }}
                                </div>
                            @endif
                            <!-- Indicador de Estado -->
                            <div class="status-indicator status-online"></div>
                        @endauth
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-white truncate">{{ Auth::user()->nombres ?? Auth::user()->name }}</p>
                        <p class="text-sm text-blue-100 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                
                <!-- Cerrar Sesión -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="flex items-center space-x-3 w-full p-3 rounded-lg hover:bg-white hover:bg-opacity-10 transition-colors duration-200 text-red-200 hover:text-white">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span>Cerrar Sesión</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden md:ml-0">
            <!-- Header -->
            <header class="bg-white soft-shadow border-b border-gray-200">
                <div class="flex items-center justify-between p-4">
                    <div class="fade-in">
                        <h1 class="text-2xl font-bold color-text-blue comic-font">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-gray-600 text-sm">@yield('page-subtitle', 'Bienvenido de vuelta')</p>
                    </div>
                    
                    <div class="flex items-center space-x-6">
                        <!-- Notifications -->
                        <div class="relative">
                            <button class="p-2 rounded-full hover:bg-gray-100 transition-colors duration-200 color-text-blue">
                                <i class="fas fa-bell text-xl"></i>
                                <div class="notification-badge">5</div>
                            </button>
                        </div>
                        
                        <!-- Messages -->
                        <div class="relative">
                            <button class="p-2 rounded-full hover:bg-gray-100 transition-colors duration-200 color-text-blue">
                                <i class="fas fa-envelope text-xl"></i>
                                <div class="notification-badge">2</div>
                            </button>
                        </div>
                        
                        <!-- User Info -->
                        <div class="text-right hidden md:block">
                            <p class="font-semibold color-text-blue">{{ Auth::user()->nombres ?? Auth::user()->name }}</p>
                            <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                        </div>
                        
                        <!-- User Avatar -->
                        <div class="relative">
                            @auth
                                @if(isset($profile) && $profile->profile_photo)
                                    <img src="{{ Storage::url($profile->profile_photo) }}" 
                                         alt="Foto de perfil" 
                                         class="w-10 h-10 rounded-full object-cover border-2 border-yellow-200 cursor-pointer hover:border-yellow-400 transition-colors">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-400 flex items-center justify-center text-white text-lg font-bold border-2 border-yellow-200 cursor-pointer hover:border-yellow-400 transition-colors">
                                        {{ substr(auth()->user()->nombres ?? auth()->user()->name, 0, 1) }}
                                    </div>
                                @endif
                                <!-- Indicador de Estado -->
                                <div class="status-indicator status-online"></div>
                            @endauth
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6 bg-gradient-to-br from-gray-50 to-blue-50">
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
            
            // Add animation class
            if (sidebar.classList.contains('open')) {
                sidebar.classList.add('fade-in');
            }
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
        
        // Add hover effects to notification icons
        document.querySelectorAll('header button').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.classList.add('transform', 'scale-110');
            });
            
            button.addEventListener('mouseleave', function() {
                this.classList.remove('transform', 'scale-110');
            });
        });
    </script>

    @stack('scripts')
</body>
</html>