<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Smile At Work</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'smile': {
                            'yellow': '#F7C948',
                            'blue': '#0077B6', 
                            'orange': '#F28C38',
                            'green': '#BBC34A',
                            'red': '#E94B4B',
                            'pink': '#F8A5A5',
                        }
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                        'fade-in': 'fadeIn 0.5s ease-in',
                        'wiggle': 'wiggle 2s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-15px)' }
                        },
                        fadeIn: {
                            'from': { opacity: '0', transform: 'translateY(10px)' },
                            'to': { opacity: '1', transform: 'translateY(0)' }
                        },
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' }
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        .bubble {
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
        }
        
        .sticker {
            transform: rotate(-5deg);
            box-shadow: 3px 3px 10px rgba(0,0,0,0.1);
        }
        
        .cloud {
            background: white;
            border-radius: 100px;
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
            position: relative;
        }
        
        .cloud:after, .cloud:before {
            content: '';
            background: white;
            border-radius: 50%;
            position: absolute;
        }
        
        .cloud:after {
            width: 50px;
            height: 50px;
            top: -25px;
            left: 25px;
        }
        
        .cloud:before {
            width: 70px;
            height: 70px;
            top: -35px;
            right: 25px;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-smile-green to-smile-blue flex items-center justify-center p-4">
    <!-- Elementos decorativos flotantes -->
    <div class="fixed top-10 left-10 animate-float hidden md:block">
        <div class="w-16 h-16 bubble bg-smile-yellow opacity-20"></div>
    </div>
    <div class="fixed bottom-10 right-10 animate-float hidden md:block" style="animation-delay: 1.5s;">
        <div class="w-20 h-20 bubble bg-smile-orange opacity-20"></div>
    </div>
    <div class="fixed top-20 right-20 animate-float hidden md:block" style="animation-delay: 2s;">
        <div class="w-12 h-12 bubble bg-smile-pink opacity-20"></div>
    </div>

    <!-- Nubes decorativas -->
    <div class="fixed top-5 left-1/4 cloud w-24 h-12 opacity-30 animate-float hidden md:block"></div>
    <div class="fixed bottom-16 right-1/4 cloud w-32 h-16 opacity-30 animate-float hidden md:block" style="animation-delay: 1s;"></div>

    <!-- Tarjeta de Registro -->
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden animate-fade-in">
        <!-- Header con gradiente -->
        <div class="bg-gradient-to-r from-smile-orange to-smile-yellow text-white py-8 px-6 text-center relative overflow-hidden">
            <div class="flex items-center justify-center space-x-3 mb-4">
                <div class="relative">
                    <i class="fas fa-smile text-4xl animate-wiggle"></i>
                    <div class="absolute -top-1 -right-1 w-3 h-3 bubble bg-smile-blue"></div>
                </div>
                <span class="text-3xl font-bold">Smile At Work</span>
            </div>
            <p class="text-orange-100">Únete a nuestra comunidad</p>
        </div>

        <!-- Formulario -->
        <div class="p-6 md:p-8 max-h-[70vh] overflow-y-auto">
            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded mb-6">
                    @foreach($errors->all() as $error)
                        <p class="text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf
                
                <!-- DNI -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">
                        <i class="fas fa-id-card mr-2 text-smile-orange"></i>DNI
                    </label>
                    <input type="text" name="dni" id="dni"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-smile-orange focus:border-transparent transition-all duration-300"
                           placeholder="12345678"
                           maxlength="8"
                           value="{{ old('dni') }}"
                           required>
                    <div id="dni-validation" class="mt-2 text-sm hidden"></div>
                </div>

                <!-- Campos que se mostrarán después de validar el DNI -->
                <div id="personal-data" class="hidden animate-fade-in">
                    <!-- Nombres -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">
                            <i class="fas fa-user mr-2 text-smile-orange"></i>Nombres
                        </label>
                        <input type="text" name="nombres" id="nombres"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-smile-orange focus:border-transparent transition-all duration-300 bg-gray-50"
                               readonly>
                    </div>

                    <!-- Apellido Paterno -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">
                            <i class="fas fa-user mr-2 text-smile-orange"></i>Apellido Paterno
                        </label>
                        <input type="text" name="apellido_paterno" id="apellido_paterno"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-smile-orange focus:border-transparent transition-all duration-300 bg-gray-50"
                               readonly>
                    </div>

                    <!-- Apellido Materno -->
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">
                            <i class="fas fa-user mr-2 text-smile-orange"></i>Apellido Materno
                        </label>
                        <input type="text" name="apellido_materno" id="apellido_materno"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-smile-orange focus:border-transparent transition-all duration-300 bg-gray-50"
                               readonly>
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">
                        <i class="fas fa-envelope mr-2 text-smile-orange"></i>Email
                    </label>
                    <input type="email" name="email" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-smile-orange focus:border-transparent transition-all duration-300"
                           placeholder="tu@email.com"
                           value="{{ old('email') }}"
                           required>
                </div>

                <!-- Contraseña -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">
                        <i class="fas fa-lock mr-2 text-smile-orange"></i>Contraseña
                    </label>
                    <input type="password" name="password" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-smile-orange focus:border-transparent transition-all duration-300"
                           placeholder="••••••••"
                           required>
                    <p class="text-xs text-gray-500 mt-1">Mínimo 8 caracteres</p>
                </div>

                <!-- Confirmar Contraseña -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">
                        <i class="fas fa-lock mr-2 text-smile-orange"></i>Confirmar Contraseña
                    </label>
                    <input type="password" name="password_confirmation" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-smile-orange focus:border-transparent transition-all duration-300"
                           placeholder="••••••••"
                           required>
                </div>

                <!-- Términos -->
                <div class="mb-6">
                    <label class="flex items-start">
                        <input type="checkbox" name="terms" class="form-checkbox h-4 w-4 text-smile-orange rounded focus:ring-smile-orange mt-1" required>
                        <span class="ml-2 text-sm text-gray-600">
                            Acepto los 
                            <a href="#" class="text-smile-blue hover:text-smile-blue/80 transition-colors">Términos de Servicio</a> 
                            y la 
                            <a href="#" class="text-smile-blue hover:text-smile-blue/80 transition-colors">Política de Privacidad</a>
                        </span>
                    </label>
                </div>

                <!-- Botón de Registro -->
                <button type="submit" id="submitBtn"
                        class="w-full bg-gradient-to-r from-smile-orange to-smile-yellow text-white font-bold py-4 px-4 rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105 mb-4 disabled:opacity-50 disabled:cursor-not-allowed"
                        disabled>
                    <i class="fas fa-user-plus mr-2"></i>Completar Registro
                </button>

                <!-- Link a Login -->
                <div class="text-center">
                    <p class="text-gray-600">
                        ¿Ya tienes cuenta? 
                        <a href="{{ route('login') }}" class="text-smile-blue font-semibold hover:text-smile-blue/80 transition-colors">
                            Inicia sesión aquí
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para validación de DNI en tiempo real -->
    <script>
        document.getElementById('dni').addEventListener('input', function() {
            const dni = this.value;
            const validationDiv = document.getElementById('dni-validation');
            const personalDataDiv = document.getElementById('personal-data');
            const submitBtn = document.getElementById('submitBtn');
            
            // Reset estado
            personalDataDiv.classList.add('hidden');
            submitBtn.disabled = true;
            
            if (dni.length === 8) {
                validationDiv.classList.remove('hidden');
                validationDiv.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Validando DNI...';
                validationDiv.className = 'mt-2 text-sm text-blue-600';
                
                fetch('{{ route("validar.dni") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ dni: dni })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        validationDiv.innerHTML = '<i class="fas fa-check-circle mr-2"></i>DNI válido';
                        validationDiv.className = 'mt-2 text-sm text-green-600';
                        
                        // Autocompletar campos
                        document.getElementById('nombres').value = data.data.nombres || '';
                        document.getElementById('apellido_paterno').value = data.data.apellido_paterno || '';
                        document.getElementById('apellido_materno').value = data.data.apellido_materno || '';
                        
                        // Mostrar campos de datos personales
                        personalDataDiv.classList.remove('hidden');
                        
                        // Habilitar botón de registro
                        submitBtn.disabled = false;
                        
                        // Mostrar mensaje de éxito
                        setTimeout(() => {
                            validationDiv.innerHTML += '<div class="text-green-600 mt-1">Datos cargados automáticamente</div>';
                        }, 500);
                        
                    } else {
                        validationDiv.innerHTML = '<i class="fas fa-times-circle mr-2"></i>' + data.message;
                        validationDiv.className = 'mt-2 text-sm text-red-600';
                        submitBtn.disabled = true;
                    }
                })
                .catch(error => {
                    validationDiv.innerHTML = '<i class="fas fa-times-circle mr-2"></i>Error al validar DNI';
                    validationDiv.className = 'mt-2 text-sm text-red-600';
                    submitBtn.disabled = true;
                });
            } else if (dni.length > 0) {
                validationDiv.classList.remove('hidden');
                validationDiv.innerHTML = '<i class="fas fa-info-circle mr-2"></i>El DNI debe tener 8 dígitos';
                validationDiv.className = 'mt-2 text-sm text-yellow-600';
                submitBtn.disabled = true;
            } else {
                validationDiv.classList.add('hidden');
                submitBtn.disabled = true;
            }
        });

        // Validar formulario antes de enviar
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const dni = document.getElementById('dni').value;
            const nombres = document.getElementById('nombres').value;
            const apellidoPaterno = document.getElementById('apellido_paterno').value;
            
            if (dni.length !== 8 || !nombres || !apellidoPaterno) {
                e.preventDefault();
                alert('Por favor, complete la validación del DNI primero');
                document.getElementById('dni').focus();
            }
        });

        // Efectos de focus en los inputs
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-orange-200', 'rounded-lg');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-orange-200');
                });
            });
        });
    </script>
</body>
</html>