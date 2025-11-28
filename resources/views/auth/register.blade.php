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
    
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, -15px); }
            100% { transform: translate(0, -0px); }
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <!-- Elementos decorativos flotantes -->
    <div class="absolute top-10 left-10 floating">
        <i class="fas fa-smile text-white text-4xl opacity-20"></i>
    </div>
    <div class="absolute bottom-10 right-10 floating" style="animation-delay: 1.5s;">
        <i class="fas fa-heart text-white text-4xl opacity-20"></i>
    </div>
    <div class="absolute top-20 right-20 floating" style="animation-delay: 2s;">
        <i class="fas fa-star text-white text-3xl opacity-20"></i>
    </div>

    <!-- Tarjeta de Registro -->
    <div class="bg-white rounded-2xl shadow-2xl card-hover w-full max-w-md overflow-hidden">
        <!-- Header con gradiente -->
        <div class="gradient-bg text-white py-8 px-6 text-center">
            <div class="flex items-center justify-center space-x-3 mb-4">
                <i class="fas fa-smile text-4xl"></i>
                <span class="text-3xl font-bold">Smile At Work</span>
            </div>
            <p class="text-purple-100">Únete a nuestra comunidad</p>
        </div>

        <!-- Formulario -->
        <div class="p-8">
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf
                
                <!-- DNI -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">
                        <i class="fas fa-id-card mr-2 text-purple-500"></i>DNI
                    </label>
                    <input type="text" name="dni" id="dni"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300"
                           placeholder="12345678"
                           maxlength="8"
                           value="{{ old('dni') }}"
                           required>
                    <div id="dni-validation" class="mt-2 text-sm hidden"></div>
                </div>

                <!-- Campos que se mostrarán después de validar el DNI -->
                <div id="personal-data" class="hidden fade-in">
                    <!-- Nombres -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">
                            <i class="fas fa-user mr-2 text-purple-500"></i>Nombres
                        </label>
                        <input type="text" name="nombres" id="nombres"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 bg-gray-50"
                               readonly>
                    </div>

                    <!-- Apellido Paterno -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">
                            <i class="fas fa-user mr-2 text-purple-500"></i>Apellido Paterno
                        </label>
                        <input type="text" name="apellido_paterno" id="apellido_paterno"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 bg-gray-50"
                               readonly>
                    </div>

                    <!-- Apellido Materno -->
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">
                            <i class="fas fa-user mr-2 text-purple-500"></i>Apellido Materno
                        </label>
                        <input type="text" name="apellido_materno" id="apellido_materno"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 bg-gray-50"
                               readonly>
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">
                        <i class="fas fa-envelope mr-2 text-purple-500"></i>Email
                    </label>
                    <input type="email" name="email" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300"
                           placeholder="tu@email.com"
                           value="{{ old('email') }}"
                           required>
                </div>

                <!-- Contraseña -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">
                        <i class="fas fa-lock mr-2 text-purple-500"></i>Contraseña
                    </label>
                    <input type="password" name="password" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300"
                           placeholder="••••••••"
                           required>
                    <p class="text-xs text-gray-500 mt-1">Mínimo 8 caracteres</p>
                </div>

                <!-- Confirmar Contraseña -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">
                        <i class="fas fa-lock mr-2 text-purple-500"></i>Confirmar Contraseña
                    </label>
                    <input type="password" name="password_confirmation" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300"
                           placeholder="••••••••"
                           required>
                </div>

                <!-- Términos -->
                <div class="mb-6">
                    <label class="flex items-start">
                        <input type="checkbox" name="terms" class="form-checkbox h-4 w-4 text-purple-600 rounded focus:ring-purple-500 mt-1" required>
                        <span class="ml-2 text-sm text-gray-600">
                            Acepto los 
                            <a href="#" class="text-purple-600 hover:text-purple-800">Términos de Servicio</a> 
                            y la 
                            <a href="#" class="text-purple-600 hover:text-purple-800">Política de Privacidad</a>
                        </span>
                    </label>
                </div>

                <!-- Botón de Registro -->
                <button type="submit" id="submitBtn"
                        class="w-full bg-gradient-to-r from-purple-500 to-purple-700 text-white font-bold py-4 px-4 rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105 mb-4 disabled:opacity-50 disabled:cursor-not-allowed"
                        disabled>
                    <i class="fas fa-user-plus mr-2"></i>Completar Registro
                </button>

                <!-- Link a Login -->
                <div class="text-center">
                    <p class="text-gray-600">
                        ¿Ya tienes cuenta? 
                        <a href="{{ route('login') }}" class="text-purple-600 font-semibold hover:text-purple-800 transition-colors duration-300">
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
                    this.parentElement.classList.add('ring-2', 'ring-purple-200', 'rounded-lg');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-purple-200');
                });
            });
        });
    </script>
</body>
</html>