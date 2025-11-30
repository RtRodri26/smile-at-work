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
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --smile-yellow: #F7C948;
            --smile-blue: #0077B6;
            --smile-orange: #F28C38;
            --smile-green: #BBC34A;
            --smile-red: #E94B4B;
            --smile-pink: #F8A5A5;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .comic-font {
            font-family: 'Comic Neue', cursive;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--smile-yellow) 0%, var(--smile-orange) 100%);
        }
        
        .gradient-bg-blue {
            background: linear-gradient(135deg, var(--smile-blue) 0%, var(--smile-green) 100%);
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
        
        .bubble {
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
        }
        
        .sticker {
            position: absolute;
            transform: rotate(-5deg);
            box-shadow: 3px 3px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            padding: 8px 12px;
            font-weight: bold;
            z-index: 10;
            font-size: 0.8rem;
        }
        
        .sticker-yellow {
            background-color: var(--smile-yellow);
            color: #333;
        }
        
        .sticker-blue {
            background-color: var(--smile-blue);
            color: white;
        }
        
        .sticker-green {
            background-color: var(--smile-green);
            color: white;
        }
        
        .sticker-orange {
            background-color: var(--smile-orange);
            color: white;
        }
        
        .sticker-red {
            background-color: var(--smile-red);
            color: white;
        }
        
        .rainbow-text {
            background: linear-gradient(to right, var(--smile-red), var(--smile-orange), var(--smile-yellow), var(--smile-green), var(--smile-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .soft-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .btn-primary {
            background-color: var(--smile-orange);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--smile-yellow);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(242, 140, 56, 0.3);
        }
        
        .color-bg-yellow { background-color: var(--smile-yellow); }
        .color-bg-blue { background-color: var(--smile-blue); }
        .color-bg-orange { background-color: var(--smile-orange); }
        .color-bg-green { background-color: var(--smile-green); }
        .color-bg-red { background-color: var(--smile-red); }
        .color-bg-pink { background-color: var(--smile-pink); }
        
        .color-text-yellow { color: var(--smile-yellow); }
        .color-text-blue { color: var(--smile-blue); }
        .color-text-orange { color: var(--smile-orange); }
        .color-text-green { color: var(--smile-green); }
        .color-text-red { color: var(--smile-red); }
        
        .input-focus:focus {
            border-color: var(--smile-orange);
            box-shadow: 0 0 0 3px rgba(242, 140, 56, 0.2);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        .wiggling {
            animation: wiggle 2s ease-in-out infinite;
        }
        
        @keyframes wiggle {
            0%, 100% { transform: rotate(-3deg); }
            50% { transform: rotate(3deg); }
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
<body class="gradient-bg min-h-screen flex items-center justify-center p-4 overflow-hidden">
    <!-- Elementos decorativos flotantes -->
    <div class="absolute top-10 left-10 floating">
        <div class="w-16 h-16 bubble color-bg-yellow opacity-20"></div>
    </div>
    <div class="absolute bottom-10 right-10 floating" style="animation-delay: 1.5s;">
        <div class="w-20 h-20 bubble color-bg-blue opacity-20"></div>
    </div>
    <div class="absolute top-20 right-20 floating" style="animation-delay: 2s;">
        <div class="w-12 h-12 bubble color-bg-green opacity-20"></div>
    </div>
    <div class="absolute bottom-20 left-20 floating" style="animation-delay: 0.5s;">
        <div class="w-14 h-14 bubble color-bg-orange opacity-20"></div>
    </div>
    
    <!-- Nubes decorativas -->
    <div class="absolute top-5 left-1/4 cloud w-24 h-12 opacity-30 floating"></div>
    <div class="absolute bottom-16 right-1/4 cloud w-32 h-16 opacity-30 floating" style="animation-delay: 1s;"></div>
    
    <!-- Stickers decorativos -->
    <div class="sticker sticker-yellow top-24 left-10 floating">¡Hola!</div>
    <div class="sticker sticker-blue bottom-32 right-10 floating" style="animation-delay: 0.7s;">😊</div>
    <div class="sticker sticker-green top-40 right-20 floating" style="animation-delay: 1.2s;">¡Bienvenido!</div>

    <!-- Tarjeta de Login -->
    <div class="bg-white rounded-2xl shadow-2xl card-hover w-full max-w-md overflow-hidden fade-in relative">
        <!-- Decoración superior -->
        <div class="absolute -top-4 -right-4 w-8 h-8 rounded-full color-bg-red"></div>
        <div class="absolute -top-2 -left-4 w-6 h-6 rounded-full color-bg-yellow"></div>
        
        <!-- Header con gradiente -->
        <div class="gradient-bg-blue text-white py-8 px-6 text-center relative overflow-hidden">
            <!-- Elementos decorativos en el header -->
            <div class="absolute top-2 left-2 w-6 h-6 rounded-full bg-white opacity-20"></div>
            <div class="absolute bottom-2 right-4 w-8 h-8 rounded-full bg-white opacity-20"></div>
            
            <div class="flex items-center justify-center space-x-3 mb-4 relative z-10">
                <div class="relative">
                    <i class="fas fa-smile text-4xl text-white wiggling"></i>
                    <div class="absolute -top-1 -right-1 w-3 h-3 bubble color-bg-red"></div>
                </div>
                <span class="text-3xl font-bold comic-font">Smile At Work</span>
            </div>
            <p class="text-blue-100 text-lg">Bienvenido de vuelta</p>
        </div>

        <!-- Formulario -->
        <div class="p-8">
            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6 soft-shadow fade-in">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle text-red-500 mr-2"></i>
                        <div>
                            @foreach($errors->all() as $error)
                                <p class="text-sm">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6 soft-shadow fade-in">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email -->
                <div class="mb-6 relative fade-in" style="animation-delay: 0.1s;">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">
                        <i class="fas fa-envelope mr-2 color-text-orange"></i>Email
                    </label>
                    <div class="relative">
                        <input type="email" name="email" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus transition-all duration-300 pl-10"
                               placeholder="tu@email.com"
                               value="{{ old('email') }}"
                               required>
                        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Contraseña -->
                <div class="mb-6 relative fade-in" style="animation-delay: 0.2s;">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">
                        <i class="fas fa-lock mr-2 color-text-orange"></i>Contraseña
                    </label>
                    <div class="relative">
                        <input type="password" name="password" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none input-focus transition-all duration-300 pl-10"
                               placeholder="••••••••"
                               required>
                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Recordarme y Olvidé contraseña -->
                <div class="flex items-center justify-between mb-6 fade-in" style="animation-delay: 0.3s;">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 color-text-orange rounded focus:ring-orange-500">
                        <span class="ml-2 text-sm text-gray-600">Recordar sesión</span>
                    </label>
                    
                    <a href="#" class="text-sm color-text-blue hover:underline transition-colors duration-300">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <!-- Botón de Login -->
                <button type="submit" 
                        class="w-full btn-primary font-bold py-4 px-4 rounded-lg soft-shadow transition-all duration-300 transform hover:scale-105 mb-4 fade-in" style="animation-delay: 0.4s;">
                    <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                </button>

                <!-- Divider -->
                <div class="flex items-center my-6 fade-in" style="animation-delay: 0.5s;">
                    <div class="flex-1 border-t border-gray-300"></div>
                    <span class="px-4 text-gray-500 text-sm">o</span>
                    <div class="flex-1 border-t border-gray-300"></div>
                </div>

                <!-- Link a Registro -->
                <div class="text-center fade-in" style="animation-delay: 0.6s;">
                    <p class="text-gray-600">
                        ¿No tienes cuenta? 
                        <a href="{{ route('register') }}" class="color-text-blue font-semibold hover:underline transition-colors duration-300">
                            Regístrate aquí
                        </a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Footer de la tarjeta -->
        <div class="bg-gray-50 py-4 px-6 border-t border-gray-200 fade-in" style="animation-delay: 0.7s;">
            <p class="text-center text-sm text-gray-500">
                Al iniciar sesión, aceptas nuestros 
                <a href="#" class="color-text-blue hover:underline">Términos</a> 
                y 
                <a href="#" class="color-text-blue hover:underline">Política de Privacidad</a>
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
                    this.parentElement.classList.add('ring-2', 'ring-orange-200');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-orange-200');
                });
            });
            
            // Efecto de aparición escalonada para los elementos
            const fadeElements = document.querySelectorAll('.fade-in');
            fadeElements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>
</html>