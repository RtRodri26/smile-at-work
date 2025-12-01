@extends('layouts.app')

@section('title', 'Solicitud de Servicio para Eventos - Smile At Work')
@section('page-title', 'Solicitud de Servicio para Eventos')
@section('page-subtitle', 'Complete el formulario para solicitar su evento')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-yellow-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header Mejorado -->
        <div class="text-center mb-12">
            <div class="flex justify-center mb-4">
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-calendar-alt text-white text-3xl"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center shadow-md">
                        <i class="fas fa-star text-white text-xs"></i>
                    </div>
                </div>
            </div>
            <h2 class="text-4xl font-bold text-gray-900 comic-font mb-4">Solicitud de Servicio para Eventos</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Complete el formulario para solicitar nuestros servicios especializados y hacer de su evento una experiencia inolvidable
            </p>
        </div>

        <!-- Formulario Mejorado -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-3xl">
            <!-- Barra de progreso -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 w-full"></div>
            
            <div class="p-8">
                <form action="{{ route('services.event.store') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <!-- Grid de Campos Principales -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        {{-- Nombre del Evento --}}
                        <div class="group">
                            <label for="nombre_evento" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors duration-200">
                                    <i class="fas fa-tag text-blue-600 text-sm"></i>
                                </div>
                                Nombre del evento *
                            </label>
                            <input type="text" id="nombre_evento" name="nombre_evento" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 placeholder-gray-400 group-hover:border-blue-300"
                                placeholder="Ingrese el nombre de su evento">
                        </div>

                        {{-- Tipo de Evento --}}
                        <div class="group">
                            <label for="tipo_evento" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors duration-200">
                                    <i class="fas fa-calendar-check text-green-600 text-sm"></i>
                                </div>
                                Tipo de evento *
                            </label>
                            <select id="tipo_evento" name="tipo_evento" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300 group-hover:border-green-300 appearance-none bg-white">
                                <option value="">Seleccionar tipo de evento...</option>
                                <option value="Feria">Feria</option>
                                <option value="Conferencia">Conferencia</option>
                                <option value="Congreso">Congreso</option>
                                <option value="Apertura">Apertura</option>
                                <option value="Otro">Otro</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 mt-9">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>

                        {{-- Fecha y Hora del Evento --}}
                        <div class="group">
                            <label for="fecha_evento" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-yellow-200 transition-colors duration-200">
                                    <i class="fas fa-clock text-yellow-600 text-sm"></i>
                                </div>
                                Fecha y hora de evento *
                            </label>
                            <input type="datetime-local" id="fecha_evento" name="fecha_evento" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-300 group-hover:border-yellow-300">
                        </div>

                        {{-- Duración --}}
                        <div class="group">
                            <label for="duracion" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-200 transition-colors duration-200">
                                    <i class="fas fa-hourglass-half text-purple-600 text-sm"></i>
                                </div>
                                Duración *
                            </label>
                            <input type="text" id="duracion" name="duracion" required placeholder="Ej: 2 horas"
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 placeholder-gray-400 group-hover:border-purple-300">
                        </div>

                        {{-- Lugar --}}
                        <div class="group">
                            <label for="lugar" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-200 transition-colors duration-200">
                                    <i class="fas fa-map-marker-alt text-orange-600 text-sm"></i>
                                </div>
                                Lugar *
                            </label>
                            <input type="text" id="lugar" name="lugar" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300 placeholder-gray-400 group-hover:border-orange-300"
                                placeholder="Dirección del evento">
                        </div>

                        {{-- Cantidad estimada de niños --}}
                        <div class="group">
                            <label for="cantidad_ninos" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-red-200 transition-colors duration-200">
                                    <i class="fas fa-child text-red-600 text-sm"></i>
                                </div>
                                Cantidad estimada de niños *
                            </label>
                            <input type="number" id="cantidad_ninos" name="cantidad_ninos" min="0" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 placeholder-gray-400 group-hover:border-red-300"
                                placeholder="Número estimado de niños">
                        </div>

                        {{-- Persona de contacto --}}
                        <div class="group">
                            <label for="persona_contacto" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-indigo-200 transition-colors duration-200">
                                    <i class="fas fa-user text-indigo-600 text-sm"></i>
                                </div>
                                Persona de contacto *
                            </label>
                            <input type="text" id="persona_contacto" name="persona_contacto" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 placeholder-gray-400 group-hover:border-indigo-300"
                                placeholder="Nombre completo">
                        </div>

                        {{-- Teléfono --}}
                        <div class="group">
                            <label for="telefono" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-pink-200 transition-colors duration-200">
                                    <i class="fas fa-phone text-pink-600 text-sm"></i>
                                </div>
                                Teléfono *
                            </label>
                            <input type="tel" id="telefono" name="telefono" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-300 placeholder-gray-400 group-hover:border-pink-300"
                                placeholder="Número de contacto">
                        </div>

                        {{-- Correo electrónico --}}
                        <div class="group md:col-span-2">
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-teal-200 transition-colors duration-200">
                                    <i class="fas fa-envelope text-teal-600 text-sm"></i>
                                </div>
                                Correo electrónico *
                            </label>
                            <input type="email" id="email" name="email" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 placeholder-gray-400 group-hover:border-teal-300"
                                placeholder="correo@ejemplo.com">
                        </div>
                    </div>

                    {{-- Necesidades especiales --}}
                    <div class="group">
                        <label for="necesidades_especiales" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors duration-200">
                                <i class="fas fa-clipboard-list text-blue-600 text-sm"></i>
                            </div>
                            Necesidades especiales
                        </label>
                        <textarea id="necesidades_especiales" name="necesidades_especiales" rows="4"
                            class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 placeholder-gray-400 group-hover:border-blue-300 resize-none"
                            placeholder="Indique si hay requerimientos especiales, accesibilidad, equipamiento adicional, temas específicos, restricciones alimentarias, etc."></textarea>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-xs text-gray-500">Opcional pero recomendado</span>
                            <span class="text-xs text-gray-500" id="char-count">0/500</span>
                        </div>
                    </div>

                    <!-- Información de Ayuda -->
                    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-lightbulb text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-yellow-800 mb-2">¿Necesita inspiración para su evento?</h4>
                                <p class="text-sm text-yellow-600 leading-relaxed">
                                    Contamos con animadores profesionales, actividades recreativas, shows infantiles y mucho más. 
                                    Nuestro equipo se pondrá en contacto para personalizar su evento según sus necesidades.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Botón de Envío --}}
                    <div class="pt-6">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50">
                            <div class="flex items-center justify-center space-x-3">
                                <i class="fas fa-paper-plane"></i>
                                <span class="text-lg">Enviar Solicitud de Evento</span>
                            </div>
                        </button>
                        <p class="text-center text-sm text-gray-500 mt-4">
                            Al enviar este formulario, aceptas nuestros 
                            <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">términos y condiciones</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>

        <!-- Pasos del Proceso para Eventos -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
            <div class="text-center p-6 bg-white rounded-2xl shadow-lg border border-gray-100">
                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-edit text-white"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Complete el Formulario</h4>
                <p class="text-sm text-gray-600">Proporcione los detalles de su evento y necesidades específicas</p>
            </div>
            
            <div class="text-center p-6 bg-white rounded-2xl shadow-lg border border-gray-100">
                <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-calendar-check text-white"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Planificación Personalizada</h4>
                <p class="text-sm text-gray-600">Coordinaremos los detalles y actividades para su evento</p>
            </div>
            
            <div class="text-center p-6 bg-white rounded-2xl shadow-lg border border-gray-100">
                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-birthday-cake text-white"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">¡Celebremos Juntos!</h4>
                <p class="text-sm text-gray-600">Disfrutamos creando momentos mágicos para los más pequeños</p>
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
    
    /* Estilos personalizados para el select */
    select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animación de entrada para elementos del formulario
        const formElements = document.querySelectorAll('.group');
        formElements.forEach((el, index) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                el.style.transition = 'all 0.6s ease-out';
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, index * 100);
        });

        // Contador de caracteres para el textarea
        const textarea = document.getElementById('necesidades_especiales');
        const charCount = document.getElementById('char-count');
        
        if (textarea && charCount) {
            textarea.addEventListener('input', function() {
                const count = this.value.length;
                charCount.textContent = `${count}/500`;
                
                if (count > 450) {
                    charCount.classList.add('text-orange-500');
                    charCount.classList.remove('text-gray-500');
                } else if (count > 400) {
                    charCount.classList.add('text-yellow-500');
                    charCount.classList.remove('text-gray-500');
                } else {
                    charCount.classList.remove('text-orange-500', 'text-yellow-500');
                    charCount.classList.add('text-gray-500');
                }
            });
        }

        // Efecto de focus mejorado para inputs
        const inputs = document.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('transform', 'scale-105');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('transform', 'scale-105');
            });
        });

        // Validación en tiempo real para campos requeridos
        const requiredFields = document.querySelectorAll('input[required], select[required]');
        requiredFields.forEach(field => {
            field.addEventListener('blur', function() {
                if (!this.value) {
                    this.classList.add('border-red-300', 'bg-red-50');
                    this.classList.remove('border-gray-200');
                } else {
                    this.classList.remove('border-red-300', 'bg-red-50');
                    this.classList.add('border-gray-200');
                }
            });
        });

        // Efecto de hover para las tarjetas de proceso
        const processCards = document.querySelectorAll('.grid > div');
        processCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.classList.add('transform', 'scale-105', 'shadow-xl');
            });
            
            card.addEventListener('mouseleave', function() {
                this.classList.remove('transform', 'scale-105', 'shadow-xl');
            });
        });
    });
</script>
@endsection