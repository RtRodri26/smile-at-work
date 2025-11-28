<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Smile At Work</title>
    
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

    <!-- Tarjeta de Login -->
    <div class="bg-white rounded-2xl shadow-2xl card-hover w-full max-w-md overflow-hidden">
        <!-- Header con gradiente -->
        <div class="gradient-bg text-white py-8 px-6 text-center">
            <div class="flex items-center justify-center space-x-3 mb-4">
                <i class="fas fa-smile text-4xl"></i>
                <span class="text-3xl font-bold">Smile At Work</span>
            </div>
            <p class="text-purple-100">Bienvenido de vuelta</p>
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

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
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
                </div>

                <!-- Recordarme -->
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-purple-600 rounded focus:ring-purple-500">
                        <span class="ml-2 text-sm text-gray-600">Recordar sesión</span>
                    </label>
                    
                    <a href="#" class="text-sm text-purple-600 hover:text-purple-800 transition-colors duration-300">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <!-- Botón de Login -->
                <button type="submit" 
                        class="w-full bg-gradient-to-r from-purple-500 to-purple-700 text-white font-bold py-4 px-4 rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105 mb-4">
                    <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                </button>

                <!-- Divider -->
                <div class="flex items-center my-6">
                    <div class="flex-1 border-t border-gray-300"></div>
                    <span class="px-4 text-gray-500 text-sm">o</span>
                    <div class="flex-1 border-t border-gray-300"></div>
                </div>

                <!-- Link a Registro -->
                <div class="text-center">
                    <p class="text-gray-600">
                        ¿No tienes cuenta? 
                        <a href="{{ route('register') }}" class="text-purple-600 font-semibold hover:text-purple-800 transition-colors duration-300">
                            Regístrate aquí
                        </a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Footer de la tarjeta -->
        <div class="bg-gray-50 py-4 px-6 border-t border-gray-200">
            <p class="text-center text-sm text-gray-500">
                Al iniciar sesión, aceptas nuestros 
                <a href="#" class="text-purple-600 hover:text-purple-800">Términos</a> 
                y 
                <a href="#" class="text-purple-600 hover:text-purple-800">Política de Privacidad</a>
            </p>
        </div>
    </div>

    <!-- Efectos de partículas (opcional) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Agregar efecto de focus mejorado a los inputs
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-purple-200');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-purple-200');
                });
            });
        });
    </script>
</body>
</html>