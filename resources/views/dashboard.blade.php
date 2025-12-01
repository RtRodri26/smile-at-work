@extends('layouts.app')

@section('title', 'Dashboard - Smile At Work')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Resumen de tu actividad')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Mensaje de Bienvenida -->
    <div class="bg-gradient-to-r from-yellow-400 to-orange-500 rounded-2xl shadow-xl overflow-hidden mb-8 relative">
        <!-- Elementos decorativos -->
        <div class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white opacity-20"></div>
        <div class="absolute bottom-4 left-4 w-6 h-6 rounded-full bg-white opacity-20"></div>
        
        <div class="p-8 text-white text-center relative z-10">
            <div class="flex justify-center mb-4">
                <div class="relative">
                    <i class="fas fa-smile-beam text-5xl text-white"></i>
                    <div class="absolute -top-1 -right-1 w-3 h-3 rounded-full bg-red-500"></div>
                </div>
            </div>
            <h1 class="text-3xl font-bold mb-2 comic-font">¡Hola, {{ $user->nombres ?? $user->name }}!</h1>
            <p class="text-yellow-100 text-lg">{{ $welcome_message }}</p>
        </div>
    </div>

    <!-- Estadísticas Rápidas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @include('components.stats-card', [
            'title' => 'Total Servicios',
            'value' => $stats['total_services'],
            'icon' => 'fas fa-concierge-bell',
            'color' => 'blue'
        ])
        
        @include('components.stats-card', [
            'title' => 'Pendientes',
            'value' => $stats['pending_services'],
            'icon' => 'fas fa-clock',
            'color' => 'yellow'
        ])
        
        @include('components.stats-card', [
            'title' => 'Postulaciones Activas',
            'value' => $stats['active_applications'],
            'icon' => 'fas fa-briefcase',
            'color' => 'green'
        ])
        
        @include('components.stats-card', [
            'title' => 'Completados',
            'value' => $stats['completed_services'],
            'icon' => 'fas fa-check-circle',
            'color' => 'orange'
        ])
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Columna izquierda: span-2 -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Acciones Rápidas -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transition-all duration-300 hover:shadow-xl">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 comic-font">¿Qué te gustaría hacer?</h2>
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-bolt text-blue-600"></i>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @include('components.card-solicitud', [
                        'title' => 'Servicio para Empresa',
                        'description' => 'Solicita servicios para tu organización',
                        'icon' => 'fas fa-building',
                        'color' => 'blue',
                        'route' => route('services.company.create')
                    ])
                    
                    @include('components.card-solicitud', [
                        'title' => 'Servicio para Universidad',
                        'description' => 'Servicios educativos y recreativos',
                        'icon' => 'fas fa-university',
                        'color' => 'green',
                        'route' => route('services.university.create')
                    ])
                    
                    @include('components.card-solicitud', [
                        'title' => 'Servicio para Evento',
                        'description' => 'Organización de eventos especiales',
                        'icon' => 'fas fa-calendar-check',
                        'color' => 'orange',
                        'route' => route('services.event.create')
                    ])
                    
                    @include('components.card-solicitud', [
                        'title' => 'Trabaja con Nosotros',
                        'description' => 'Únete a nuestro equipo',
                        'icon' => 'fas fa-handshake',
                        'color' => 'yellow',
                        'route' => route('services.job.application.create')
                    ])
                </div>
            </div>

            <!-- Gráfico de estado de solicitudes -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transition-all duration-300 hover:shadow-xl">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 comic-font">Estado de tus Solicitudes</h2>
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                        <i class="fas fa-chart-bar text-green-600"></i>
                    </div>
                </div>
                
                <div class="space-y-6">
                    @foreach($statusCounts as $status => $count)
                    <div class="group">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-600 flex items-center">
                                @if($status == 'Pendiente')
                                    <i class="fas fa-clock text-yellow-500 mr-2"></i>
                                @elseif($status == 'Aceptada')
                                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                @elseif($status == 'Rechazada')
                                    <i class="fas fa-times-circle text-red-500 mr-2"></i>
                                @else
                                    <i class="fas fa-circle text-blue-500 mr-2"></i>
                                @endif
                                {{ $status }}
                            </span>
                            <span class="text-sm font-bold text-gray-900 bg-gray-100 px-3 py-1 rounded-full group-hover:scale-110 transition-transform duration-200">
                                {{ $count }}
                            </span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                            @php
                                $total = array_sum($statusCounts);
                                $width = $total > 0 ? ($count / $total) * 100 : 0;
                            @endphp
                            <div class="h-3 rounded-full transition-all duration-1000 ease-out 
                                @if($status == 'Pendiente') bg-yellow-500
                                @elseif($status == 'Aceptada') bg-green-500
                                @elseif($status == 'Rechazada') bg-red-500
                                @else bg-blue-500 @endif" 
                                style="width: {{ $width }}%">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Solicitudes Recientes -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transition-all duration-300 hover:shadow-xl">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 comic-font">Tus Solicitudes Recientes</h2>
                    <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center">
                        <i class="fas fa-history text-purple-600"></i>
                    </div>
                </div>
                
                @if($recentRequests->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentRequests as $request)
                        <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl transition-all duration-300 hover:border-blue-300 hover:bg-blue-50 group">
                            <div class="flex items-center space-x-4">
                                <div class="p-3 rounded-full bg-{{ $request->color }}-100 text-{{ $request->color }}-600 group-hover:scale-110 transition-transform duration-200">
                                    <i class="{{ $request->icon }} text-lg"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $request->type }}</p>
                                    <p class="text-sm text-gray-600 flex items-center">
                                        <i class="fas fa-clock text-gray-400 mr-1 text-xs"></i>
                                        {{ $request->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-medium shadow-sm
                                @if($request->estado == 'Pendiente') bg-yellow-100 text-yellow-800 border border-yellow-200
                                @elseif($request->estado == 'Aceptada') bg-green-100 text-green-800 border border-green-200
                                @elseif($request->estado == 'Rechazada') bg-red-100 text-red-800 border border-red-200
                                @else bg-gray-100 text-gray-800 border border-gray-200 @endif group-hover:scale-105 transition-transform duration-200">
                                {{ $request->estado }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-inbox text-3xl text-gray-400"></i>
                        </div>
                        <p class="text-gray-500 text-lg mb-2">No hay solicitudes recientes</p>
                        <a href="{{ route('services.index') }}" class="text-blue-600 hover:text-blue-700 font-medium inline-flex items-center group">
                            Crear tu primera solicitud
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-200"></i>
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Columna derecha: span-1 -->
        <div class="space-y-6">
            <!-- Perfil Rápido -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transition-all duration-300 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800 comic-font">Tu Perfil</h3>
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-user text-blue-600 text-sm"></i>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4 mb-6">
                    <div class="relative">
                        @if($profile && $profile->profile_photo)
                            <img src="{{ Storage::url($profile->profile_photo) }}" 
                                 alt="Foto de perfil" 
                                 class="w-16 h-16 rounded-full object-cover border-2 border-yellow-300 shadow-sm">
                        @else
                            <div class="w-16 h-16 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full flex items-center justify-center text-white font-bold text-xl border-2 border-yellow-300 shadow-sm">
                                {{ substr($user->nombres ?? $user->name, 0, 1) }}
                            </div>
                        @endif
                        <!-- Indicador de Estado -->
                        <div class="absolute bottom-0 right-0 w-4 h-4 bg-green-500 border-2 border-white rounded-full shadow-sm"></div>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">{{ $user->nombres ?? $user->name }}</p>
                        <p class="text-sm text-gray-600">{{ $user->email }}</p>
                    </div>
                </div>
                <a href="{{ route('profile') }}" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium py-3 px-4 rounded-xl hover:shadow-lg transition-all duration-300 text-center block group">
                    <span class="group-hover:scale-105 transition-transform duration-200 inline-block">
                        Completar Perfil
                    </span>
                </a>
            </div>

            <!-- Consejos -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transition-all duration-300 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800 comic-font">Consejos Rápidos</h3>
                    <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                        <i class="fas fa-lightbulb text-green-600 text-sm"></i>
                    </div>
                </div>
                
                <ul class="space-y-4">
                    <li class="flex items-start space-x-3 p-3 bg-green-50 rounded-lg group hover:bg-green-100 transition-colors duration-200">
                        <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                        <span class="text-gray-700 group-hover:text-gray-900">Completa tu perfil para una mejor experiencia</span>
                    </li>
                    <li class="flex items-start space-x-3 p-3 bg-blue-50 rounded-lg group hover:bg-blue-100 transition-colors duration-200">
                        <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                        <span class="text-gray-700 group-hover:text-gray-900">Revisa el estado de tus solicitudes regularmente</span>
                    </li>
                    <li class="flex items-start space-x-3 p-3 bg-yellow-50 rounded-lg group hover:bg-yellow-100 transition-colors duration-200">
                        <div class="w-6 h-6 bg-yellow-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                        <span class="text-gray-700 group-hover:text-gray-900">Mantén tu información de contacto actualizada</span>
                    </li>
                </ul>
            </div>

            <!-- Próximas Citas -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 transition-all duration-300 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800 comic-font">Próximas Citas</h3>
                    <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center">
                        <i class="fas fa-calendar text-orange-600 text-sm"></i>
                    </div>
                </div>
                
                <div class="text-center py-8">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar text-2xl text-gray-400"></i>
                    </div>
                    <p class="text-gray-500 mb-3">No hay citas programadas</p>
                    <a href="#" class="text-blue-600 hover:text-blue-700 font-medium inline-flex items-center group">
                        Agendar una cita
                        <i class="fas fa-plus ml-2 group-hover:scale-110 transition-transform duration-200"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .comic-font {
        font-family: 'Comic Neue', cursive;
    }
    
    .hover-lift:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
    }
    
    .shadow-lg {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .shadow-xl {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
</style>

<script>
    // Animación de entrada para los elementos
    document.addEventListener('DOMContentLoaded', function() {
        const elements = document.querySelectorAll('.bg-white');
        elements.forEach((el, index) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                el.style.transition = 'all 0.6s ease-out';
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, index * 100);
        });
        
        // Animación para las barras de progreso
        const progressBars = document.querySelectorAll('.h-3 > div');
        progressBars.forEach(bar => {
            const originalWidth = bar.style.width;
            bar.style.width = '0%';
            
            setTimeout(() => {
                bar.style.transition = 'width 1s ease-out';
                bar.style.width = originalWidth;
            }, 500);
        });
    });
</script>
@endsection