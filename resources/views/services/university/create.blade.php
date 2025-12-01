@extends('layouts.app')

@section('title', 'Solicitud de Servicio para Universidades - Smile At Work')
@section('page-title', 'Solicitud de Servicio para Universidades')
@section('page-subtitle', 'Complete el formulario para solicitar nuestros servicios')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 to-blue-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header Mejorado -->
        <div class="text-center mb-12">
            <div class="flex justify-center mb-4">
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-green-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-university text-white text-3xl"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center shadow-md">
                        <i class="fas fa-graduation-cap text-white text-xs"></i>
                    </div>
                </div>
            </div>
            <h2 class="text-4xl font-bold text-gray-900 comic-font mb-4">Solicitud de Servicio para Universidades</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Complete el formulario para solicitar nuestros servicios educativos y transformar el ambiente universitario
            </p>
        </div>

        <!-- Formulario Mejorado -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-3xl">
            <!-- Barra de progreso -->
            <div class="bg-gradient-to-r from-green-500 to-green-600 h-2 w-full"></div>
            
            <div class="p-8">
                <form action="{{ route('services.university.store') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <!-- Grid de Campos Principales -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        {{-- Nombre Universidad --}}
                        <div class="group">
                            <label for="nombre_universidad" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors duration-200">
                                    <i class="fas fa-university text-green-600 text-sm"></i>
                                </div>
                                Nombre de la universidad *
                            </label>
                            <input type="text" id="nombre_universidad" name="nombre_universidad" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-300 placeholder-gray-400 group-hover:border-green-300"
                                placeholder="Ingrese el nombre de su universidad">
                        </div>

                        {{-- Área / Facultad --}}
                        <div class="group">
                            <label for="area_facultad" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors duration-200">
                                    <i class="fas fa-book text-blue-600 text-sm"></i>
                                </div>
                                Área / Facultad *
                            </label>
                            <input type="text" id="area_facultad" name="area_facultad" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 placeholder-gray-400 group-hover:border-blue-300"
                                placeholder="Ej: Facultad de Ingeniería">
                        </div>

                        {{-- Persona Contacto --}}
                        <div class="group">
                            <label for="persona_contacto" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-purple-200 transition-colors duration-200">
                                    <i class="fas fa-user-graduate text-purple-600 text-sm"></i>
                                </div>
                                Persona de contacto *
                            </label>
                            <input type="text" id="persona_contacto" name="persona_contacto" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 placeholder-gray-400 group-hover:border-purple-300"
                                placeholder="Nombre completo del contacto">
                        </div>

                        {{-- Email --}}
                        <div class="group">
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-yellow-200 transition-colors duration-200">
                                    <i class="fas fa-envelope text-yellow-600 text-sm"></i>
                                </div>
                                Correo electrónico *
                            </label>
                            <input type="email" id="email" name="email" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-300 placeholder-gray-400 group-hover:border-yellow-300"
                                placeholder="contacto@universidad.edu">
                        </div>

                        {{-- Teléfono --}}
                        <div class="group">
                            <label for="telefono" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-red-200 transition-colors duration-200">
                                    <i class="fas fa-phone text-red-600 text-sm"></i>
                                </div>
                                Teléfono *
                            </label>
                            <input type="tel" id="telefono" name="telefono" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-300 placeholder-gray-400 group-hover:border-red-300"
                                placeholder="+51 XXX XXX XXX">
                        </div>

                        {{-- Tipo de Servicio --}}
                        <div class="group">
                            <label for="tipo_servicio" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-indigo-200 transition-colors duration-200">
                                    <i class="fas fa-concierge-bell text-indigo-600 text-sm"></i>
                                </div>
                                Tipo de servicio *
                            </label>
                            <select id="tipo_servicio" name="tipo_servicio" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 group-hover:border-indigo-300 appearance-none bg-white">
                                <option value="">Seleccionar tipo de servicio...</option>
                                <option value="Por horas">Por horas</option>    
                                <option value="Permanente">Permanente</option>
                                <option value="Por evento">Por evento</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 mt-9">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>

                        {{-- Fecha estimada --}}
                        <div class="group">
                            <label for="fecha_estimado" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <div class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-pink-200 transition-colors duration-200">
                                    <i class="fas fa-calendar-alt text-pink-600 text-sm"></i>
                                </div>
                                Fecha y hora de cita *
                            </label>
                            <input type="datetime-local" id="fecha_estimado" name="fecha_estimado" required
                                class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-all duration-300 group-hover:border-pink-300">
                        </div>
                    </div>

                    {{-- Comentarios --}}
                    <div class="group">
                        <label for="comentarios" class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                            <div class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-teal-200 transition-colors duration-200">
                                <i class="fas fa-comments text-teal-600 text-sm"></i>
                            </div>
                            Comentarios adicionales
                        </label>
                        <textarea id="comentarios" name="comentarios" rows="4"
                            class="mt-1 block w-full border-2 border-gray-200 rounded-xl shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-all duration-300 placeholder-gray-400 group-hover:border-teal-300 resize-none"
                            placeholder="Describa brevemente sus necesidades educativas, objetivos del servicio, cantidad aproximada de estudiantes, y cualquier información relevante para nuestro equipo..."></textarea>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-xs text-gray-500">Información opcional pero muy útil</span>
                            <span class="text-xs text-gray-500" id="char-count">0/500</span>
                        </div>
                    </div>

                    <!-- Información de Ayuda Específica para Universidades -->
                    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-lightbulb text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-green-800 mb-2">Servicios Universitarios Disponibles</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm text-green-600">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-check text-green-500 text-xs"></i>
                                        <span>Talleres de bienestar estudiantil</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-check text-green-500 text-xs"></i>
                                        <span>Programas de salud mental</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-check text-green-500 text-xs"></i>
                                        <span>Actividades recreativas</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-check text-green-500 text-xs"></i>
                                        <span>Eventos de integración</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Botón de Envío --}}
                    <div class="pt-6">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300 focus:ring-opacity-50">
                            <div class="flex items-center justify-center space-x-3">
                                <i class="fas fa-paper-plane"></i>
                                <span class="text-lg">Enviar Solicitud Universitaria</span>
                            </div>
                        </button>
                        <p class="text-center text-sm text-gray-500 mt-4">
                            Al enviar este formulario, aceptas nuestros 
                            <a href="#" class="text-green-600 hover:text-green-700 font-medium">términos y condiciones académicos</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>

        <!-- Beneficios para Universidades -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
            <div class="text-center p-6 bg-white rounded-2xl shadow-lg border border-gray-100">
                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-brain text-white"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Bienestar Estudiantil</h4>
                <p class="text-sm text-gray-600">Mejora el ambiente académico y la salud mental de tus estudiantes</p>
            </div>
            
            <div class="text-center p-6 bg-white rounded-2xl shadow-lg border border-gray-100">
                <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-white"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Integración Grupal</h4>
                <p class="text-sm text-gray-600">Fomenta la cohesión y el trabajo en equipo entre estudiantes</p>
            </div>
            
            <div class="text-center p-6 bg-white rounded-2xl shadow-lg border border-gray-100">
                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-white"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-2">Rendimiento Académico</h4>
                <p class="text-sm text-gray-600">Ambientes positivos mejoran el desempeño educativo</p>
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
        const textarea = document.getElementById('comentarios');
        const charCount = document.getElementById('char-count');
        
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

        // Efecto de hover para las tarjetas de beneficios
        const benefitCards = document.querySelectorAll('.grid > div');
        benefitCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.classList.add('transform', 'scale-105', 'shadow-xl');
                this.querySelector('.w-12').classList.add('scale-110');
            });
            
            card.addEventListener('mouseleave', function() {
                this.classList.remove('transform', 'scale-105', 'shadow-xl');
                this.querySelector('.w-12').classList.remove('scale-110');
            });
        });

        // Sugerencias dinámicas basadas en el tipo de servicio seleccionado
        const tipoServicioSelect = document.getElementById('tipo_servicio');
        const comentariosTextarea = document.getElementById('comentarios');
        
        tipoServicioSelect.addEventListener('change', function() {
            const servicio = this.value;
            let sugerencia = '';
            
            switch(servicio) {
                case 'Por horas':
                    sugerencia = 'Sugerencia: Especifique la cantidad de horas semanales requeridas y los horarios preferidos.';
                    break;
                case 'Permanente':
                    sugerencia = 'Sugerencia: Describa la duración estimada del servicio permanente y los objetivos a largo plazo.';
                    break;
                case 'Por evento':
                    sugerencia = 'Sugerencia: Detalle el tipo de evento, cantidad de participantes y fechas específicas.';
                    break;
            }
            
            if (sugerencia && !comentariosTextarea.value) {
                comentariosTextarea.placeholder = sugerencia + ' ' + comentariosTextarea.placeholder;
            }
        });
    });
</script>
@endsection