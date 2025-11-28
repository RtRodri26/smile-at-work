@extends('layouts.app')

@section('title', 'Mi Perfil - Smile At Work')
@section('page-title', 'Mi Perfil')
@section('page-subtitle', 'Gestiona tu información personal')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Columna Izquierda - Foto de Perfil y Información Básica -->
        <div class="space-y-6">
            <!-- Tarjeta de Foto de Perfil -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Foto de Perfil</h3>
                
                <div class="text-center">
                    <!-- Avatar del Usuario -->
                    <div class="relative inline-block mb-4">
                        @if($profile->profile_photo)
                            <img src="{{ Storage::url($profile->profile_photo) }}" 
                                 alt="Foto de perfil" 
                                 class="w-32 h-32 rounded-full object-cover border-4 border-purple-200 shadow-lg">
                        @else
                            <div class="w-32 h-32 rounded-full bg-gradient-to-r from-purple-500 to-purple-700 flex items-center justify-center text-white text-4xl font-bold border-4 border-purple-200 shadow-lg">
                                {{ substr($user->nombres ?? $user->name, 0, 1) }}
                            </div>
                        @endif
                        
                        <!-- Indicador de Estado -->
                        <div class="absolute bottom-2 right-2 w-6 h-6 bg-green-500 border-2 border-white rounded-full"></div>
                    </div>

                    <!-- Información de la Foto -->
                    <p class="text-sm text-gray-600 mb-4">
                        @if($profile->profile_photo)
                            Foto actualmente establecida
                        @else
                            Agrega una foto para personalizar tu perfil
                        @endif
                    </p>

                    <!-- Formulario para Actualizar Foto -->
                    <form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        
                        <div class="flex flex-col items-center space-y-3">
                            <label for="profile_photo" class="cursor-pointer bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-colors duration-200 font-medium">
                                <i class="fas fa-camera mr-2"></i>Cambiar Foto
                            </label>
                            <input type="file" 
                                   name="profile_photo" 
                                   id="profile_photo" 
                                   accept="image/*"
                                   class="hidden"
                                   onchange="this.form.submit()">
                            
                            @if($profile->profile_photo)
                            <button type="button" 
                                    onclick="event.preventDefault(); document.getElementById('remove-photo-form').submit();"
                                    class="text-red-600 hover:text-red-700 text-sm font-medium">
                                <i class="fas fa-trash mr-1"></i>Eliminar Foto
                            </button>
                            @endif
                        </div>

                        <p class="text-xs text-gray-500 text-center">
                            Formatos: JPG, PNG, GIF<br>Máximo: 2MB
                        </p>
                    </form>

                    <!-- Formulario para Eliminar Foto (oculto) -->
                    <form id="remove-photo-form" action="{{ route('profile.photo.remove') }}" method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>

            <!-- Información de Contacto -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Información de Contacto</h3>
                
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-envelope text-blue-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Email</p>
                            <p class="font-medium text-gray-800">{{ $user->email }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-id-card text-green-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">DNI</p>
                            <p class="font-medium text-gray-800">{{ $user->dni }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-calendar text-purple-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Miembro desde</p>
                            <p class="font-medium text-gray-800">{{ $user->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna Central - Información Personal -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Información Personal -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Información Personal</h2>
                    <span class="text-sm text-purple-600 font-medium">Solo lectura</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nombres -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombres</label>
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <p class="text-gray-800 font-medium">{{ $user->nombres ?? 'No especificado' }}</p>
                        </div>
                    </div>

                    <!-- Apellido Paterno -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Apellido Paterno</label>
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <p class="text-gray-800 font-medium">{{ $user->apellido_paterno ?? 'No especificado' }}</p>
                        </div>
                    </div>

                    <!-- Apellido Materno -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Apellido Materno</label>
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <p class="text-gray-800 font-medium">{{ $user->apellido_materno ?? 'No especificado' }}</p>
                        </div>
                    </div>

                    <!-- Nombre Completo -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombre Completo</label>
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <p class="text-gray-800 font-medium">{{ $user->nombres ?? '' }} {{ $user->apellido_paterno ?? '' }} {{ $user->apellido_materno ?? '' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Nota Informativa -->
                <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                        <div>
                            <p class="text-sm text-blue-800 font-medium">Información protegida</p>
                            <p class="text-xs text-blue-600">
                                Tu información personal fue verificada mediante RENIEC al registrarte y no puede ser modificada. 
                                Para cambios, contacta con soporte.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas del Usuario -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl shadow-sm p-6 text-white">
                    <div class="text-center">
                        <i class="fas fa-concierge-bell text-3xl mb-3 opacity-80"></i>
                        <h3 class="text-2xl font-bold mb-1">{{ $stats['total_services'] }}</h3>
                        <p class="text-blue-100 text-sm">Total Servicios</p>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-yellow-500 to-yellow-700 rounded-xl shadow-sm p-6 text-white">
                    <div class="text-center">
                        <i class="fas fa-clock text-3xl mb-3 opacity-80"></i>
                        <h3 class="text-2xl font-bold mb-1">{{ $stats['pending_services'] }}</h3>
                        <p class="text-yellow-100 text-sm">Pendientes</p>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-500 to-green-700 rounded-xl shadow-sm p-6 text-white">
                    <div class="text-center">
                        <i class="fas fa-check-circle text-3xl mb-3 opacity-80"></i>
                        <h3 class="text-2xl font-bold mb-1">{{ $stats['completed_services'] }}</h3>
                        <p class="text-green-100 text-sm">Completados</p>
                    </div>
                </div>
            </div>

            <!-- Preferencias (Placeholder para futuras funcionalidades) -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Preferencias</h3>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-800">Notificaciones por email</p>
                            <p class="text-sm text-gray-600">Recibir actualizaciones de tus solicitudes</p>
                        </div>
                        <div class="relative inline-block w-12 h-6 rounded-full bg-gray-300">
                            <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform duration-200"></div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                        <div>
                            <p class="font-medium text-gray-800">Recordatorios de citas</p>
                            <p class="text-sm text-gray-600">Notificaciones antes de tus reuniones</p>
                        </div>
                        <div class="relative inline-block w-12 h-6 rounded-full bg-purple-600">
                            <div class="absolute right-1 top-1 w-4 h-4 bg-white rounded-full transition-transform duration-200"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-500">
                        Las preferencias estarán disponibles próximamente
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script para vista previa de la imagen -->
<script>
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

    // Mostrar alertas
    @if(session('success'))
        setTimeout(() => {
            const alert = document.createElement('div');
            alert.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
            alert.innerHTML = `
                <div class="flex items-center space-x-2">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            `;
            document.body.appendChild(alert);
            
            setTimeout(() => {
                alert.remove();
            }, 3000);
        }, 100);
    @endif

    @if(session('error'))
        setTimeout(() => {
            const alert = document.createElement('div');
            alert.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
            alert.innerHTML = `
                <div class="flex items-center space-x-2">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            `;
            document.body.appendChild(alert);
            
            setTimeout(() => {
                alert.remove();
            }, 3000);
        }, 100);
    @endif
</script>
@endsection