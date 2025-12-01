@extends('layouts.app')

@section('title', 'Solicitud de Servicio para Universidades - Smile At Work')
@section('page-title', 'Solicitud de Servicio para Universidades')
@section('page-subtitle', 'Gracias por tu solicitud. Te hemos enviado un correo de confirmación.')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-green-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-lg w-full">
        <!-- Tarjeta Principal de Confirmación -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden transition-all duration-500 hover:shadow-3xl transform hover:scale-105">
            <!-- Header con Gradiente -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 py-8 px-6 text-center relative overflow-hidden">
                <!-- Elementos Decorativos -->
                <div class="absolute top-4 left-4 w-8 h-8 rounded-full bg-white opacity-20"></div>
                <div class="absolute bottom-4 right-4 w-6 h-6 rounded-full bg-white opacity-20"></div>
                <div class="absolute -top-10 -right-10 w-20 h-20 rounded-full bg-white opacity-10"></div>
                
                <!-- Icono de Confirmación -->
                <div class="relative mx-auto mb-4">
                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-lg mx-auto">
                        <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                            <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>
                    <!-- Efecto de Pulsación -->
                    <div class="absolute inset-0 rounded-full border-4 border-blue-200 animate-ping opacity-75"></div>
                </div>
                
                <h1 class="text-3xl font-bold text-white mb-2">¡Solicitud Enviada!</h1>
                <p class="text-blue-100 text-lg">Tu solicitud universitaria ha sido procesada</p>
            </div>

            <!-- Contenido de la Confirmación -->
            <div class="p-8 text-center">
                <!-- Mensaje Principal -->
                <div class="mb-8">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Confirmación Enviada</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Hemos recibido tu solicitud universitaria correctamente y te hemos enviado 
                        un correo de confirmación con todos los detalles académicos.
                    </p>
                </div>

                <!-- Botón de Google Calendar -->
                @if(session('calendar_url'))
                <div class="mb-8 p-6 bg-gradient-to-r from-green-50 to-blue-50 rounded-2xl border border-green-200">
                    <div class="flex items-center justify-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="h-6 w-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                            </svg>
                        </div>
                        <div class="text-left">
                            <h4 class="font-semibold text-gray-800">¿Agendar en Calendario?</h4>
                            <p class="text-sm text-gray-600">No olvides agregar esta cita</p>
                        </div>
                    </div>
                    <a href="{{ session('calendar_url') }}" target="_blank"
                       class="inline-flex items-center justify-center space-x-3 bg-white border-2 border-gray-300 text-gray-800 font-semibold py-4 px-8 rounded-xl hover:border-red-400 hover:bg-red-50 hover:text-red-700 transition-all duration-300 transform hover:scale-105 shadow-md w-full">
                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                        </svg>
                        <span>Agregar a Google Calendar</span>
                    </a>
                </div>
                @endif

                <!-- Información Adicional -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <div class="bg-purple-50 p-4 rounded-xl border border-purple-200">
                        <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-2">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-purple-800 text-sm mb-1">Proceso Académico</h4>
                        <p class="text-purple-700 text-xs">Coordinación con tu universidad</p>
                    </div>
                    
                    <div class="bg-blue-50 p-4 rounded-xl border border-blue-200">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-2">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-blue-800 text-sm mb-1">Soporte Universitario</h4>
                        <p class="text-blue-700 text-xs">Atención especializada</p>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="space-y-4">
                    <a href="{{ route('services.university.create') }}" 
                       class="inline-flex items-center justify-center space-x-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-bold py-4 px-8 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl w-full">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span>Nueva Solicitud Universitaria</span>
                    </a>
                    
                    <a href="{{ route('dashboard') }}" 
                       class="inline-flex items-center justify-center space-x-3 bg-gray-100 text-gray-700 font-semibold py-3 px-6 rounded-lg hover:bg-gray-200 transition-all duration-300 transform hover:scale-105 w-full">
                        <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span>Volver al Dashboard</span>
                    </a>
                </div>
            </div>

            <!-- Footer Informativo -->
            <div class="bg-gray-50 py-4 px-6 border-t border-gray-200">
                <p class="text-center text-sm text-gray-500">
                    <svg class="h-4 w-4 text-blue-500 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Revisa tu carpeta de spam si no encuentras nuestro correo académico
                </p>
            </div>
        </div>

        <!-- Tarjetas Informativas Adicionales -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center transition-all duration-300 hover:shadow-xl">
                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Solicitud Recibida</h4>
                <p class="text-sm text-gray-600">Hemos registrado tu solicitud universitaria</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center transition-all duration-300 hover:shadow-xl">
                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Equipo Académico</h4>
                <p class="text-sm text-gray-600">Especialistas en servicios universitarios</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center transition-all duration-300 hover:shadow-xl">
                <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Proceso Ágil</h4>
                <p class="text-sm text-gray-600">Coordinación rápida con tu institución</p>
            </div>
        </div>
    </div>
</div>

<style>
    .shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    .shadow-3xl {
        box-shadow: 0 35px 60px -15px rgba(0, 0, 0, 0.3);
    }
    
    @keyframes ping {
        75%, 100% {
            transform: scale(2);
            opacity: 0;
        }
    }
    
    .animate-ping {
        animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
    }
    
    .fade-in {
        animation: fadeIn 0.8s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animación de entrada para la tarjeta principal
        const mainCard = document.querySelector('.bg-white.rounded-3xl');
        mainCard.style.opacity = '0';
        mainCard.style.transform = 'scale(0.8) translateY(50px)';
        
        setTimeout(() => {
            mainCard.style.transition = 'all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1)';
            mainCard.style.opacity = '1';
            mainCard.style.transform = 'scale(1) translateY(0)';
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