@extends('layouts.app')

@section('title', 'Bienvenido - Smile At Work')
@section('page-title', 'Bienvenido')
@section('page-subtitle', '¡Nos alegra verte de nuevo!')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Tarjeta de Bienvenida -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <!-- Header con gradiente -->
        <div class="gradient-bg text-white py-8 px-6 text-center">
            <i class="fas fa-smile-beam text-5xl mb-4"></i>
            <h1 class="text-3xl font-bold">¡Bienvenido a Smile At Work!</h1>
            <p class="text-purple-100 mt-2">{{ $welcome_message }}</p>
        </div>
        
        <!-- Contenido -->
        <div class="p-8">
            <!-- Información del usuario -->
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">
                    Hola, <span class="text-purple-600">{{ $user->nombres ?? $user->name }}</span>
                </h2>
                <p class="text-gray-600 mt-2">
                    Estamos encantados de tenerte en nuestra comunidad. 
                    Tu registro se ha completado exitosamente.
                </p>
            </div>

            <!-- Opciones Principales -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Perfil -->
                <a href="{{ route('profile') }}" 
                   class="flex items-center p-6 border-2 border-purple-200 rounded-xl hover:bg-purple-50 hover:border-purple-300 transition-all duration-300">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                        <i class="fas fa-user text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-gray-800">Mi Perfil</h3>
                        <p class="text-sm text-gray-600">Completa tu información personal</p>
                    </div>
                </a>

                <!-- Servicios -->
                <a href="{{ route('services.index') }}" 
                   class="flex items-center p-6 border-2 border-blue-200 rounded-xl hover:bg-blue-50 hover:border-blue-300 transition-all duration-300">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <i class="fas fa-concierge-bell text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-gray-800">Servicios</h3>
                        <p class="text-sm text-gray-600">Explora nuestros servicios</p>
                    </div>
                </a>
            </div>

            <!-- Mensaje de bienvenida extendido -->
            <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                <h3 class="font-bold text-lg text-gray-800 mb-3">¿Qué puedes hacer en Smile At Work?</h3>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Solicitar servicios para empresas, universidades o eventos
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Postular para trabajar con nosotros
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Conectar con otros miembros de la comunidad
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        Gestionar tus solicitudes y citas
                    </li>
                </ul>
            </div>

            <!-- Botón de acción principal -->
            <div class="text-center mt-8">
                <a href="{{ route('services.index') }}" 
                   class="bg-gradient-to-r from-purple-500 to-purple-700 text-white font-bold py-4 px-8 rounded-full hover:shadow-lg transition-all duration-300 inline-block">
                   <i class="fas fa-rocket mr-2"></i>
                   Comenzar a Explorar
                </a>
            </div>
        </div>
    </div>

    <!-- Información adicional -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <i class="fas fa-shield-alt text-purple-600 text-xl mb-2"></i>
            <p class="text-sm text-gray-600">Tu información está protegida</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <i class="fas fa-clock text-purple-600 text-xl mb-2"></i>
            <p class="text-sm text-gray-600">Soporte 24/7 disponible</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <i class="fas fa-users text-purple-600 text-xl mb-2"></i>
            <p class="text-sm text-gray-600">Comunidad activa</p>
        </div>
    </div>
</div>
@endsection