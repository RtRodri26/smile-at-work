@extends('layouts.app')

@section('title', 'Dashboard - Smile At Work')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Resumen de tu actividad')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Mensaje de Bienvenida -->
    <div class="bg-gradient-to-r from-purple-500 to-purple-700 rounded-2xl shadow-lg overflow-hidden mb-8">
        <div class="p-8 text-white text-center">
            <i class="fas fa-smile-beam text-5xl mb-4"></i>
            <h1 class="text-3xl font-bold mb-2">¡Hola, {{ $user->nombres ?? $user->name }}!</h1>
            <p class="text-purple-100 text-lg">{{ $welcome_message }}</p>
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
            'color' => 'purple'
        ])
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Columna izquierda: span-2 -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Acciones Rápidas -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">¿Qué te gustaría hacer?</h2>
                
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
                        'color' => 'purple',
                        'route' => route('services.event.create')
                    ])
                    
                    @include('components.card-solicitud', [
                        'title' => 'Trabaja con Nosotros',
                        'description' => 'Únete a nuestro equipo',
                        'icon' => 'fas fa-handshake',
                        'color' => 'orange',
                        'route' => route('job.application.create')
                    ])
                </div>
            </div>

            <!-- Gráfico de estado de solicitudes -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Estado de tus Solicitudes</h2>
                <div class="space-y-4">
                    @foreach($statusCounts as $status => $count)
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-600">{{ $status }}</span>
                        <div class="w-1/2 bg-gray-200 rounded-full h-2.5">
                            @php
                                $total = array_sum($statusCounts);
                                $width = $total > 0 ? ($count / $total) * 100 : 0;
                            @endphp
                            <div class="h-2.5 rounded-full 
                                @if($status == 'Pendiente') bg-yellow-500
                                @elseif($status == 'Aceptada') bg-green-500
                                @elseif($status == 'Rechazada') bg-red-500
                                @else bg-purple-500 @endif" 
                                style="width: {{ $width }}%">
                            </div>
                        </div>
                        <span class="text-sm font-medium text-gray-900">{{ $count }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Solicitudes Recientes -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Tus Solicitudes Recientes</h2>
                @if($recentRequests->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentRequests as $request)
                        <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                            <div class="flex items-center space-x-4">
                                <div class="p-2 rounded-full bg-{{ $request->color }}-100 text-{{ $request->color }}-600">
                                    <i class="{{ $request->icon }}"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $request->type }}</p>
                                    <p class="text-sm text-gray-600">{{ $request->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-medium 
                                @if($request->estado == 'Pendiente') bg-yellow-100 text-yellow-800
                                @elseif($request->estado == 'Aceptada') bg-green-100 text-green-800
                                @elseif($request->estado == 'Rechazada') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ $request->estado }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-inbox text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500">No hay solicitudes recientes</p>
                        <a href="{{ route('services.index') }}" class="text-purple-600 hover:text-purple-700 font-medium">
                            Crear tu primera solicitud
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Columna derecha: span-1 -->
        <div class="space-y-6">
            <!-- Perfil Rápido -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Tu Perfil</h3>
                <div class="flex items-center space-x-4 mb-4">
                   <div class="relative">
    @if($profile && $profile->profile_photo)
        <img src="{{ Storage::url($profile->profile_photo) }}" 
             alt="Foto de perfil" 
             class="w-16 h-16 rounded-full object-cover border-2 border-purple-200">
    @else
        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-700 rounded-full flex items-center justify-center text-white font-bold text-xl border-2 border-purple-200">
            {{ substr($user->nombres ?? $user->name, 0, 1) }}
        </div>
    @endif
    <!-- Indicador de Estado -->
    <div class="absolute bottom-0 right-0 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></div>
</div>
                    <div>
                        <p class="font-semibold text-gray-800">{{ $user->nombres ?? $user->name }}</p>
                        <p class="text-sm text-gray-600">{{ $user->email }}</p>
                    </div>
                </div>
                <a href="{{ route('profile') }}" class="w-full bg-gray-100 text-gray-700 font-medium py-2 px-4 rounded-lg hover:bg-gray-200 transition-colors duration-200 text-center block">
                    Completar Perfil
                </a>
            </div>

            <!-- Consejos -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Consejos Rápidos</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start space-x-2">
                        <i class="fas fa-check text-green-500 mt-1"></i>
                        <span>Completa tu perfil para una mejor experiencia</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <i class="fas fa-check text-green-500 mt-1"></i>
                        <span>Revisa el estado de tus solicitudes regularmente</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <i class="fas fa-check text-green-500 mt-1"></i>
                        <span>Mantén tu información de contacto actualizada</span>
                    </li>
                </ul>
            </div>

            <!-- Próximas Citas -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Próximas Citas</h3>
                <div class="text-center py-8">
                    <i class="fas fa-calendar text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">No hay citas programadas</p>
                    <a href="#" class="text-purple-600 hover:text-purple-700 font-medium">
                        Agendar una cita
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection