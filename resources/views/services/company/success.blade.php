@extends('layouts.app')

@section('title', 'Solicitud de Servicio para Empresas - Smile At Work')
@section('page-title', 'Solicitud de Servicio para Empresas')
@section('page-subtitle', 'Gracias por tu solicitud. Te hemos enviado un correo de confirmación.')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-lg w-full">
        <!-- Tarjeta Principal de Confirmación -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden transition-all duration-500 hover:shadow-3xl transform hover:scale-105">
            <!-- Header con Gradiente -->
            <div class="bg-gradient-to-r from-green-500 to-green-600 py-8 px-6 text-center relative overflow-hidden">
                <!-- Elementos Decorativos -->
                <div class="absolute top-4 left-4 w-8 h-8 rounded-full bg-white opacity-20"></div>
                <div class="absolute bottom-4 right-4 w-6 h-6 rounded-full bg-white opacity-20"></div>
                <div class="absolute -top-10 -right-10 w-20 h-20 rounded-full bg-white opacity-10"></div>
                
                <!-- Icono de Confirmación -->
                <div class="relative mx-auto mb-4">
                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center shadow-lg mx-auto">
                        <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white text-3xl"></i>
                        </div>
                    </div>
                    <!-- Efecto de Pulsación -->
                    <div class="absolute inset-0 rounded-full border-4 border-green-200 animate-ping opacity-75"></div>
                </div>
                
                <h1 class="text-3xl font-bold text-white comic-font mb-2">¡Solicitud Enviada!</h1>
                <p class="text-green-100 text-lg">Tu solicitud ha sido procesada exitosamente</p>
            </div>

            <!-- Contenido de la Confirmación -->
            <div class="p-8 text-center">
                <!-- Mensaje Principal -->
                <div class="mb-8">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope-open-text text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Correo de Confirmación Enviado</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Hemos recibido tu solicitud correctamente y te hemos enviado un correo de confirmación 
                        con todos los detalles. Revisa tu bandeja de entrada.
                    </p>
                </div>

                <!-- Botón de Google Calendar -->
                @if(session('calendar_url'))
                <div class="mb-8 p-6 bg-gradient-to-r from-blue-50 to-green-50 rounded-2xl border border-blue-200">
                    <div class="flex items-center justify-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                            <i class="fab fa-google text-red-600 text-xl"></i>
                        </div>
                        <div class="text-left">
                            <h4 class="font-semibold text-gray-800">¿Agendar en Google Calendar?</h4>
                            <p class="text-sm text-gray-600">Agrega esta cita a tu calendario</p>
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
                    <div class="bg-yellow-50 p-4 rounded-xl border border-yellow-200">
                        <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="fas fa-clock text-white text-sm"></i>
                        </div>
                        <h4 class="font-semibold text-yellow-800 text-sm mb-1">Próximo Paso</h4>
                        <p class="text-yellow-700 text-xs">Te contactaremos dentro de 24 horas</p>
                    </div>
                    
                    <div class="bg-blue-50 p-4 rounded-xl border border-blue-200">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-2">
                            <i class="fas fa-phone text-white text-sm"></i>
                        </div>
                        <h4 class="font-semibold text-blue-800 text-sm mb-1">Soporte</h4>
                        <p class="text-blue-700 text-xs">¿Preguntas? Contáctanos</p>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="space-y-4">
                    <a href="{{ route('services.company.create') }}" 
                       class="inline-flex items-center justify-center space-x-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-bold py-4 px-8 rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl w-full">
                        <i class="fas fa-plus-circle"></i>
                        <span>Nueva Solicitud</span>
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
                    <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                    Recuerda revisar tu carpeta de spam si no encuentras nuestro correo
                </p>
            </div>
        </div>

        <!-- Tarjetas Informativas Adicionales -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center transition-all duration-300 hover:shadow-xl">
                <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-calendar-check text-white"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Cita Programada</h4>
                <p class="text-sm text-gray-600">Tu solicitud ha sido registrada en nuestro sistema</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center transition-all duration-300 hover:shadow-xl">
                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-check text-white"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Equipo Asignado</h4>
                <p class="text-sm text-gray-600">Nuestro equipo revisará tu solicitud</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 text-center transition-all duration-300 hover:shadow-xl">
                <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-rocket text-white"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Próximos Pasos</h4>
                <p class="text-sm text-gray-600">Te contactaremos para coordinar detalles</p>
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
    
    .bounce-in {
        animation: bounceIn 0.8s ease-out;
    }
    
    @keyframes bounceIn {
        0% { transform: scale(0.3); opacity: 0; }
        50% { transform: scale(1.05); }
        70% { transform: scale(0.9); }
        100% { transform: scale(1); opacity: 1; }
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

        // Efecto de confeti virtual (sutil)
        setTimeout(() => {
            const confettiEmojis = ['🎉', '✨', '🎊', '🥳', '👏'];
            const mainCardElement = document.querySelector('.bg-white.rounded-3xl');
            
            confettiEmojis.forEach((emoji, index) => {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.textContent = emoji;
                    confetti.className = 'fixed text-2xl pointer-events-none z-50';
                    confetti.style.left = Math.random() * 100 + 'vw';
                    confetti.style.top = '-50px';
                    confetti.style.opacity = '0';
                    document.body.appendChild(confetti);
                    
                    // Animación de confeti
                    const animation = confetti.animate([
                        { transform: 'translateY(0) rotate(0deg)', opacity: 1 },
                        { transform: `translateY(${window.innerHeight + 100}px) rotate(${360 + Math.random() * 360}deg)`, opacity: 0 }
                    ], {
                        duration: 2000 + Math.random() * 2000,
                        easing: 'cubic-bezier(0.1, 0.8, 0.3, 1)'
                    });
                    
                    animation.onfinish = () => confetti.remove();
                }, index * 300);
            });
        }, 1000);
    });
</script>
@endsection