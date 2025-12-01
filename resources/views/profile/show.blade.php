@extends('layouts.app')

@section('title', 'Mi Perfil - Smile At Work')
@section('page-title', 'Mi Perfil')
@section('page-subtitle', 'Gestiona tu información personal')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Columna Izquierda - Foto de Perfil y Información Básica -->
        <div class="space-y-6">
            <!-- Tarjeta de Foto de Perfil -->
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 transition-all duration-300 hover:shadow-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800 comic-font">Foto de Perfil</h3>
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-camera text-blue-600 text-sm"></i>
                    </div>
                </div>
                
                <div class="text-center">
                    <!-- Avatar del Usuario -->
                    <div class="relative inline-block mb-6">
                        @if($profile->profile_photo)
                            <img src="{{ Storage::url($profile->profile_photo) }}" 
                                 alt="Foto de perfil" 
                                 class="w-32 h-32 rounded-full object-cover border-4 border-yellow-300 shadow-lg transition-all duration-300 hover:scale-105">
                        @else
                            <div class="w-32 h-32 rounded-full bg-gradient-to-r from-yellow-400 to-orange-400 flex items-center justify-center text-white text-4xl font-bold border-4 border-yellow-300 shadow-lg transition-all duration-300 hover:scale-105">
                                {{ substr($user->nombres ?? $user->name, 0, 1) }}
                            </div>
                        @endif
                        
                        <!-- Indicador de Estado -->
                        <div class="absolute bottom-2 right-2 w-6 h-6 bg-green-500 border-2 border-white rounded-full shadow-sm"></div>
                    </div>

                    <!-- Información de la Foto -->
                    <p class="text-sm text-gray-600 mb-6 px-4 py-3 bg-gray-50 rounded-xl">
                        @if($profile->profile_photo)
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>Foto actualmente establecida
                        @else
                            <i class="fas fa-user-plus text-blue-500 mr-2"></i>Agrega una foto para personalizar tu perfil
                        @endif
                    </p>

                    <!-- Formulario para Actualizar Foto -->
                    <form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        
                        <div class="flex flex-col items-center space-y-4">
                            <label for="profile_photo" class="cursor-pointer bg-gradient-to-r from-blue-500 to-blue-600 text-white px-8 py-3 rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105 font-medium shadow-md">
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
                                    class="text-red-500 hover:text-red-600 text-sm font-medium flex items-center space-x-2 px-4 py-2 rounded-lg hover:bg-red-50 transition-colors duration-200">
                                <i class="fas fa-trash mr-1"></i>
                                <span>Eliminar Foto</span>
                            </button>
                            @endif
                        </div>

                        <p class="text-xs text-gray-500 text-center bg-blue-50 p-3 rounded-lg border border-blue-100">
                            <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                            Formatos: JPG, PNG, GIF | Máximo: 2MB
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
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 transition-all duration-300 hover:shadow-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800 comic-font">Información de Contacto</h3>
                    <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                        <i class="fas fa-address-card text-green-600 text-sm"></i>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-center space-x-4 p-3 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors duration-200">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center shadow-sm">
                            <i class="fas fa-envelope text-white text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Email</p>
                            <p class="font-semibold text-gray-800">{{ $user->email }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4 p-3 bg-green-50 rounded-xl hover:bg-green-100 transition-colors duration-200">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center shadow-sm">
                            <i class="fas fa-id-card text-white text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">DNI</p>
                            <p class="font-semibold text-gray-800">{{ $user->dni }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4 p-3 bg-orange-50 rounded-xl hover:bg-orange-100 transition-colors duration-200">
                        <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center shadow-sm">
                            <i class="fas fa-calendar text-white text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Miembro desde</p>
                            <p class="font-semibold text-gray-800">{{ $user->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna Central - Información Personal -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Información Personal -->
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 transition-all duration-300 hover:shadow-2xl">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 comic-font mb-2">Información Personal</h2>
                        <p class="text-gray-600">Datos verificados y protegidos</p>
                    </div>
                    <div class="px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">
                        <i class="fas fa-shield-check mr-2"></i>Solo lectura
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nombres -->
                    <div class="group">
                        <label class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-user text-blue-500 mr-2"></i>Nombres
                        </label>
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 transition-all duration-300 group-hover:bg-blue-50 group-hover:border-blue-200">
                            <p class="text-gray-800 font-semibold text-lg">{{ $user->nombres ?? 'No especificado' }}</p>
                        </div>
                    </div>

                    <!-- Apellido Paterno -->
                    <div class="group">
                        <label class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-user text-green-500 mr-2"></i>Apellido Paterno
                        </label>
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 transition-all duration-300 group-hover:bg-green-50 group-hover:border-green-200">
                            <p class="text-gray-800 font-semibold text-lg">{{ $user->apellido_paterno ?? 'No especificado' }}</p>
                        </div>
                    </div>

                    <!-- Apellido Materno -->
                    <div class="group">
                        <label class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-user text-orange-500 mr-2"></i>Apellido Materno
                        </label>
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 transition-all duration-300 group-hover:bg-orange-50 group-hover:border-orange-200">
                            <p class="text-gray-800 font-semibold text-lg">{{ $user->apellido_materno ?? 'No especificado' }}</p>
                        </div>
                    </div>

                    <!-- Nombre Completo -->
                    <div class="group">
                        <label class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-id-card text-purple-500 mr-2"></i>Nombre Completo
                        </label>
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 transition-all duration-300 group-hover:bg-purple-50 group-hover:border-purple-200">
                            <p class="text-gray-800 font-semibold text-lg">{{ $user->nombres ?? '' }} {{ $user->apellido_paterno ?? '' }} {{ $user->apellido_materno ?? '' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Nota Informativa -->
                <div class="mt-8 p-5 bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 rounded-xl">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-info-circle text-white"></i>
                        </div>
                        <div>
                            <p class="text-sm text-blue-800 font-semibold mb-2">Información protegida</p>
                            <p class="text-xs text-blue-600 leading-relaxed">
                                Tu información personal fue verificada mediante RENIEC al registrarte y no puede ser modificada. 
                                Para cambios, contacta con nuestro equipo de soporte.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas del Usuario -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Servicios -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl shadow-lg p-6 text-white transition-all duration-300 hover:scale-105 hover:shadow-xl group">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-concierge-bell text-2xl text-white opacity-90"></i>
                        </div>
                        <h3 class="text-3xl font-bold mb-2">{{ $stats['total_services'] }}</h3>
                        <p class="text-blue-100 text-sm font-medium">Total Servicios</p>
                    </div>
                </div>

                <!-- Pendientes -->
                <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-2xl shadow-lg p-6 text-white transition-all duration-300 hover:scale-105 hover:shadow-xl group">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-clock text-2xl text-white opacity-90"></i>
                        </div>
                        <h3 class="text-3xl font-bold mb-2">{{ $stats['pending_services'] }}</h3>
                        <p class="text-yellow-100 text-sm font-medium">Pendientes</p>
                    </div>
                </div>

                <!-- Completados -->
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl shadow-lg p-6 text-white transition-all duration-300 hover:scale-105 hover:shadow-xl group">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-check-circle text-2xl text-white opacity-90"></i>
                        </div>
                        <h3 class="text-3xl font-bold mb-2">{{ $stats['completed_services'] }}</h3>
                        <p class="text-green-100 text-sm font-medium">Completados</p>
                    </div>
                </div>
            </div>

            <!-- Preferencias (Placeholder para futuras funcionalidades) -->
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100 transition-all duration-300 hover:shadow-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800 comic-font">Preferencias</h3>
                    <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center">
                        <i class="fas fa-sliders-h text-purple-600 text-sm"></i>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <!-- Notificaciones por email -->
                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:border-blue-300 hover:bg-blue-50 transition-all duration-300 group">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-envelope text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Notificaciones por email</p>
                                <p class="text-sm text-gray-600">Recibir actualizaciones de tus solicitudes</p>
                            </div>
                        </div>
                        <div class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-12 h-6 bg-gray-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-6 after:content-[''] after:absolute after:top-1 after:left-1 after:bg-white after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-500"></div>
                        </div>
                    </div>

                    <!-- Recordatorios de citas -->
                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:border-green-300 hover:bg-green-50 transition-all duration-300 group">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-bell text-green-600"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Recordatorios de citas</p>
                                <p class="text-sm text-gray-600">Notificaciones antes de tus reuniones</p>
                            </div>
                        </div>
                        <div class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-12 h-6 bg-green-500 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-6 after:content-[''] after:absolute after:top-1 after:left-1 after:bg-white after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-green-500"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 text-center p-4 bg-gray-50 rounded-xl border border-gray-200">
                    <p class="text-sm text-gray-500 flex items-center justify-center">
                        <i class="fas fa-tools text-gray-400 mr-2"></i>
                        Las preferencias estarán disponibles próximamente
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .comic-font {
        font-family: 'Comic Neue', cursive;
    }
    
    .shadow-xl {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Script para vista previa de la imagen -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Efecto de carga para elementos
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

        // Manejo del cambio de foto
        document.getElementById('profile_photo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // Mostrar loading
                const button = document.querySelector('label[for="profile_photo"]');
                const originalHTML = button.innerHTML;
                button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Subiendo...';
                button.disabled = true;
                
                // Enviar formulario automáticamente
                setTimeout(() => {
                    event.target.form.submit();
                }, 500);
            }
        });

        // Mostrar alertas con mejor diseño
        @if(session('success'))
            setTimeout(() => {
                const alert = document.createElement('div');
                alert.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-4 rounded-xl shadow-2xl z-50 fade-in';
                alert.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold">¡Éxito!</p>
                            <p class="text-sm text-green-100">{{ session('success') }}</p>
                        </div>
                    </div>
                `;
                document.body.appendChild(alert);
                
                setTimeout(() => {
                    alert.classList.add('fade-out');
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }, 3000);
            }, 300);
        @endif

        @if(session('error'))
            setTimeout(() => {
                const alert = document.createElement('div');
                alert.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-4 rounded-xl shadow-2xl z-50 fade-in';
                alert.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-white text-sm"></i>
                        </div>
                        <div>
                            <p class="font-semibold">Error</p>
                            <p class="text-sm text-red-100">{{ session('error') }}</p>
                        </div>
                    </div>
                `;
                document.body.appendChild(alert);
                
                setTimeout(() => {
                    alert.classList.add('fade-out');
                    setTimeout(() => {
                        alert.remove();
                    }, 500);
                }, 3000);
            }, 300);
        @endif

        // Añadir efecto de hover a las tarjetas de estadísticas
        const statCards = document.querySelectorAll('.bg-gradient-to-br');
        statCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>
@endsection