<!-- Navbar Superior -->
<header class="sticky top-0 z-30 bg-white/95 backdrop-blur-sm shadow-sm border-b border-gray-100">
    <div class="flex items-center justify-between h-16 px-4 md:px-6">
        
        <!-- Botón menú móvil + Título de página -->
        <div class="flex items-center space-x-4">
            <!-- Botón hamburguesa (solo móvil) -->
            <button onclick="toggleSidebar()" 
                    class="lg:hidden p-2 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-smile-orange transition-colors">
                <i class="fas fa-bars text-xl"></i>
            </button>
            
            <!-- Breadcrumb / Título -->
            <div>
                <h2 class="text-lg font-semibold text-gray-800">
                    @yield('page-title', 'Dashboard')
                </h2>
                @hasSection('breadcrumb')
                    <nav class="text-sm text-gray-500">
                        @yield('breadcrumb')
                    </nav>
                @endif
            </div>
        </div>
        
        <!-- Acciones del lado derecho -->
        <div class="flex items-center space-x-2 md:space-x-4">
            
            <!-- Buscador (oculto en móvil) -->
            <div class="hidden md:block relative">
                <form action="{{ route('user.comunidad.index') }}" method="GET">
                    <input type="text" 
                           name="buscar" 
                           placeholder="Buscar..." 
                           class="w-48 lg:w-64 pl-10 pr-4 py-2 bg-gray-100 border-0 rounded-full text-sm focus:ring-2 focus:ring-smile-yellow focus:bg-white transition-all duration-200"
                           value="{{ request('buscar') }}">
                    <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </form>
            </div>
            
            <!-- Notificaciones -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" 
                        class="relative p-2 rounded-full text-gray-500 hover:bg-smile-yellow/10 hover:text-smile-orange transition-colors">
                    <i class="fas fa-bell text-xl"></i>
                    @php
                        $notifCount = auth()->user()->notificaciones()->where('leida', false)->count();
                    @endphp
                    @if($notifCount > 0)
                        <span class="absolute -top-1 -right-1 w-5 h-5 bg-smile-red text-white text-xs font-bold rounded-full flex items-center justify-center animate-pulse">
                            {{ $notifCount > 9 ? '9+' : $notifCount }}
                        </span>
                    @endif
                </button>
                
                <!-- Dropdown Notificaciones -->
                <div x-show="open" 
                     @click.away="open = false"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden z-50">
                    
                    <div class="p-4 border-b border-gray-100 bg-gradient-to-r from-smile-yellow/10 to-smile-orange/10">
                        <div class="flex items-center justify-between">
                            <h3 class="font-semibold text-gray-800">Notificaciones</h3>
                            @if($notifCount > 0)
                                <form action="{{ route('user.notificaciones.leer-todas') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-xs text-smile-blue hover:underline">
                                        Marcar todas como leídas
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    
                    <div class="max-h-80 overflow-y-auto">
                        @php
                            $notificaciones = auth()->user()->notificaciones()->latest()->take(5)->get();
                        @endphp
                        
                        @forelse($notificaciones as $notif)
                            <a href="{{ $notif->url_destino ?? '#' }}" 
                               class="block p-4 hover:bg-gray-50 border-b border-gray-50 {{ !$notif->leida ? 'bg-smile-yellow/5' : '' }}">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                        @switch($notif->tipo)
                                            @case('SEGUIDOR')
                                                <div class="w-10 h-10 rounded-full bg-smile-blue/10 flex items-center justify-center">
                                                    <i class="fas fa-user-plus text-smile-blue"></i>
                                                </div>
                                                @break
                                            @case('LIKE')
                                                <div class="w-10 h-10 rounded-full bg-smile-red/10 flex items-center justify-center">
                                                    <i class="fas fa-heart text-smile-red"></i>
                                                </div>
                                                @break
                                            @case('COMENTARIO')
                                                <div class="w-10 h-10 rounded-full bg-smile-green/10 flex items-center justify-center">
                                                    <i class="fas fa-comment text-smile-green"></i>
                                                </div>
                                                @break
                                            @case('SOLICITUD')
                                            @case('RESPUESTA_SOLICITUD')
                                                <div class="w-10 h-10 rounded-full bg-smile-orange/10 flex items-center justify-center">
                                                    <i class="fas fa-clipboard-check text-smile-orange"></i>
                                                </div>
                                                @break
                                            @default
                                                <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center">
                                                    <i class="fas fa-bell text-gray-500"></i>
                                                </div>
                                        @endswitch
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm text-gray-800 {{ !$notif->leida ? 'font-medium' : '' }}">
                                            {{ $notif->mensaje }}
                                        </p>
                                        <p class="text-xs text-gray-400 mt-1">
                                            {{ $notif->fecha_notificacion->diffForHumans() }}
                                        </p>
                                    </div>
                                    @if(!$notif->leida)
                                        <div class="flex-shrink-0">
                                            <span class="w-2 h-2 bg-smile-yellow rounded-full block"></span>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        @empty
                            <div class="p-8 text-center">
                                <i class="fas fa-bell-slash text-4xl text-gray-300 mb-3"></i>
                                <p class="text-gray-500 text-sm">No tienes notificaciones</p>
                            </div>
                        @endforelse
                    </div>
                    
                    <a href="{{ route('user.notificaciones.index') }}" 
                       class="block p-3 text-center text-sm text-smile-blue hover:bg-gray-50 font-medium">
                        Ver todas las notificaciones
                    </a>
                </div>
            </div>
            
            <!-- Perfil Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" 
                        class="flex items-center space-x-2 p-1.5 rounded-full hover:bg-gray-100 transition-colors">
                    @if(auth()->user()->foto_perfil)
                        <img src="{{ asset('storage/' . auth()->user()->foto_perfil) }}" 
                             alt="Perfil" 
                             class="w-9 h-9 rounded-full object-cover border-2 border-smile-yellow">
                    @else
                        <div class="w-9 h-9 rounded-full bg-gradient-to-br from-smile-yellow to-smile-orange flex items-center justify-center text-white font-bold">
                            {{ strtoupper(substr(auth()->user()->nombres, 0, 1)) }}
                        </div>
                    @endif
                    <i class="fas fa-chevron-down text-xs text-gray-400 hidden md:block"></i>
                </button>
                
                <!-- Dropdown Perfil -->
                <div x-show="open" 
                     @click.away="open = false"
                     x-transition
                     class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden z-50">
                    
                    <div class="p-4 border-b border-gray-100 bg-gradient-to-r from-smile-yellow/10 to-smile-orange/10">
                        <p class="font-semibold text-gray-800">{{ auth()->user()->nombres }}</p>
                        <p class="text-xs text-gray-500">{{ auth()->user()->correo }}</p>
                    </div>
                    
                    <div class="p-2">
                        <a href="{{ route('user.perfil.index') }}" 
                           class="flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors">
                            <i class="fas fa-user w-5 text-center"></i>
                            <span>Mi Perfil</span>
                        </a>
                        <a href="{{ route('user.perfil.editar') }}" 
                           class="flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors">
                            <i class="fas fa-cog w-5 text-center"></i>
                            <span>Configuración</span>
                        </a>
                        
                        @if(auth()->user()->id_rol == 1)
                            <hr class="my-2">
                            <a href="{{ route('admin.dashboard') }}" 
                               class="flex items-center space-x-3 px-3 py-2 rounded-lg text-smile-orange hover:bg-smile-orange/10 transition-colors">
                                <i class="fas fa-shield-alt w-5 text-center"></i>
                                <span>Panel Admin</span>
                            </a>
                        @endif
                        
                        <hr class="my-2">
                        
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" 
                                    class="w-full flex items-center space-x-3 px-3 py-2 rounded-lg text-smile-red hover:bg-smile-red/10 transition-colors">
                                <i class="fas fa-sign-out-alt w-5 text-center"></i>
                                <span>Cerrar Sesión</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    
    <!-- Buscador móvil (expandible) -->
    <div class="md:hidden px-4 pb-3">
        <form action="{{ route('user.comunidad.index') }}" method="GET">
            <div class="relative">
                <input type="text" 
                       name="buscar" 
                       placeholder="Buscar en la comunidad..." 
                       class="w-full pl-10 pr-4 py-2.5 bg-gray-100 border-0 rounded-full text-sm focus:ring-2 focus:ring-smile-yellow focus:bg-white transition-all"
                       value="{{ request('buscar') }}">
                <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"></i>
            </div>
        </form>
    </div>
    
</header>