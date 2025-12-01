@extends('layouts.app')

@section('title', 'Solicitud para Trabajo - Smile At Work')
@section('page-title', 'Solicitud para Trabajo')
@section('page-subtitle', 'Gracias por tu solicitud. Te hemos enviado un correo de confirmación.')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-yellow-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header Mejorado -->
        <div class="text-center mb-12">
            <div class="flex justify-center mb-4">
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-green-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-briefcase text-white text-3xl"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center shadow-md">
                        <i class="fas fa-star text-white text-xs"></i>
                    </div>
                </div>
            </div>
            <h2 class="text-4xl font-bold text-gray-900 comic-font mb-4">¡Solicitud de Trabajo Enviada!</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Hemos recibido tu solicitud correctamente. Te hemos enviado un correo de confirmación con todos los detalles.
            </p>
        </div>

        <!-- Tarjeta Principal de Confirmación -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-3xl">
            <!-- Barra de progreso -->
            <div class="bg-gradient-to-r from-green-500 to-green-600 h-2 w-full"></div>
            
            <div class="p-8">
                <!-- Mensaje Principal -->
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-contract text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Postulación Confirmada</h3>
                    <p class="text-gray-600 leading-relaxed max-w-2xl mx-auto">
                        Hemos recibido tu solicitud de empleo correctamente y te hemos enviado 
                        un correo de confirmación con todos los detalles. Revisa tu bandeja de entrada.
                    </p>
                </div>

                <!-- Botón de Google Calendar -->
                @if(session('calendar_url'))
                <div class="mb-8 p-6 bg-gradient-to-r from-yellow-50 to-green-50 rounded-2xl border border-yellow-200">
                    <div class="flex items-center justify-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                            <i class="fab fa-google text-red-600 text-xl"></i>
                        </div>
                        <div class="text-left">
                            <h4 class="font-semibold text-gray-800">¿Agendar Entrevista?</h4>
                            <p class="text-sm text-gray-600">No olvides agregar tu entrevista al calendario</p>
                        </div>
                    </div>
                    <a href="{{ session('calendar_url') }}" target="_blank"
                       class="inline-flex items-center justify-center space-x-3 bg-white border-2 border-gray-300 text-gray-800 font-semibold py-4 px-8 rounded-xl hover:border-red-400 hover:bg-red-50 hover:text-red-700 transition-all duration-300 transform hover:scale-105 shadow-md w-full">
                        <i class="fab fa-google text-red-500"></i>
                        <span>Agregar a Google Calendar</span>
                    </a>
                </div>
                @endif

                <!-- Información Adicional -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <div class="bg-green-50 p-4 rounded-xl border border-green-200">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="fas fa-clock text-white text-sm"></i>
                        </div>
                        <h4 class="font-semibold text-green-800 text-sm mb-1">Proceso de Revisión</h4>
                        <p class="text-green-700 text-xs">Revisaremos tu CV en 24-48 horas</p>
                    </div>
                    
                    <div class="bg-blue-50 p-4 rounded-xl border border-blue-200">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="fas fa-phone text-white text-sm"></i>
                        </div>
                        <h4 class="font-semibold text-blue-800 text-sm mb-1">Contacto</h4>
                        <p class="text-blue-700 text-xs">Te contactaremos para entrevista</p>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="space-y-4">
                    <a href="{{ route('services.job.application.create') }}" 
                       class="inline-flex items-center justify-center space-x-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-bold py-4 px-8 rounded-xl hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl w-full">
                        <i class="fas fa-plus-circle"></i>
                        <span>Nueva Solicitud de Trabajo</span>
                    </a>
                    
                    <a href="{{ route('dashboard') }}" 
                       class="inline-flex items-center justify-center space-x-3 bg-gray-100 text-gray-700 font-semibold py-3 px-6 rounded-lg hover:bg-gray-200 transition-all duration-300 transform hover:scale-105 w-full">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Volver al Dashboard</span>
                    </a>
                </div>
            </div>

            <!-- Footer Informativo -->
            <div class="bg-gray-50 py-4 px-6 border-t border-gray-200">
                <p class="text-center text-sm text-gray-500">
                    <i class="fas fa-info-circle text-green-500 mr-1"></i>
                    Recuerda revisar tu carpeta de spam si no encuentras nuestro correo
                </p>
            </div>
        </div>

        <!-- Tarjetas Informativas Adicionales -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center transition-all duration-300 hover:shadow-xl">
                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-check text-white"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Postulación Recibida</h4>
                <p class="text-sm text-gray-600">Tu CV y datos han sido registrados en nuestro sistema</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center transition-all duration-300 hover:shadow-xl">
                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-search text-white"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Revisión en Proceso</h4>
                <p class="text-sm text-gray-600">Nuestro equipo de RRHH revisará tu perfil</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center transition-all duration-300 hover:shadow-xl">
                <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-handshake text-white"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Próximo Contacto</h4>
                <p class="text-sm text-gray-600">Te contactaremos para coordinar entrevista</p>
            </div>
        </div>
    </div>
</div>

<style>
    .comic-font {
        font-family: 'Comic Neue', cursive;
    }
    
    .shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    .shadow-3xl {
        box-shadow: 0 35px 60px -15px rgba(0, 0, 0, 0.3);
    }
    
    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animación de entrada para la tarjeta principal
        const mainCard = document.querySelector('.bg-white.rounded-2xl');
        mainCard.style.opacity = '0';
        mainCard.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            mainCard.style.transition = 'all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1)';
            mainCard.style.opacity = '1';
            mainCard.style.transform = 'translateY(0)';
        }, 200);

        // Animación escalonada para las tarjetas informativas
        const infoCards = document.querySelectorAll('.grid.grid-cols-1 > div');
        infoCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.6s ease-out';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 600 + (index * 200));
        });

        // Efectos de hover mejorados
        const allCards = document.querySelectorAll('.bg-white');
        allCards.forEach(card => {
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