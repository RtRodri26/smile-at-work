<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smile At Work - Transformando Espacios con Alegría</title>
    
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
            overflow-x: hidden;
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
        
        .hover-lift:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }
        
        /* Animaciones mejoradas */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes wiggle {
            0%, 100% { transform: rotate(-3deg); }
            50% { transform: rotate(3deg); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .floating {
            animation: float 3s ease-in-out infinite;
        }
        
        .wiggling {
            animation: wiggle 2s ease-in-out infinite;
        }
        
        .pulsing {
            animation: pulse 2s ease-in-out infinite;
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        .bubble {
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
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
        
        .rainbow-border {
            border: 4px solid;
            border-image: linear-gradient(to right, var(--smile-red), var(--smile-orange), var(--smile-yellow), var(--smile-green), var(--smile-blue)) 1;
        }
        
        .rainbow-text {
            background: linear-gradient(to right, var(--smile-red), var(--smile-orange), var(--smile-yellow), var(--smile-green), var(--smile-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .crayon-effect {
            background: linear-gradient(to bottom, transparent 50%, rgba(255,255,255,0.3) 50%);
            background-size: 100% 4px;
        }
        
        .section-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        
        .card-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
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
        
        .btn-secondary {
            background-color: var(--smile-blue);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background-color: #005a8f;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 119, 182, 0.3);
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
        
        .soft-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white soft-shadow fixed w-full z-50">
        <div class="section-container">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
<div class="flex items-center">
  <div class="relative">
    <img src="https://i.postimg.cc/rpLtKHwF/3.jpg"
         alt="Logo Smile At Work"
         class="w-10 h-10 rounded-full object-cover">
    <div class="absolute -top-1 -right-1 w-3 h-3 bubble color-bg-red rounded-full"></div>
  </div>

  <span class="font-bold text-xl text-gray-800 ml-2 comic-font color-text-blue">Smile At Work</span>
</div>


                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#about" class="text-gray-600 hover:color-text-orange font-medium transition-colors duration-300">Quiénes Somos</a>
                    <a href="#values" class="text-gray-600 hover:color-text-orange font-medium transition-colors duration-300">Valores</a>
                    <a href="#services" class="text-gray-600 hover:color-text-orange font-medium transition-colors duration-300">Servicios</a>
                    <a href="{{ route('login') }}" class="text-gray-600 hover:color-text-orange font-medium transition-colors duration-300">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn-primary px-6 py-2 rounded-full font-medium soft-shadow">
                        Registrarse
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="btn-mobile" aria-expanded="false" class="p-2 rounded focus:outline-none">
          <i id="icon-mobile" class="fas fa-bars text-xl text-gray-600"></i>
        </button>
                </div>
            </div>
        </div>
  <!-- Mobile simple menu (por defecto hidden) -->
  <div id="mobile-menu-simple" class="md:hidden hidden px-4 pb-4">
    <a href="#about" class="block py-2 text-gray-700 border-b">Quiénes Somos</a>
    <a href="#values" class="block py-2 text-gray-700 border-b">Valores</a>
    <a href="#services" class="block py-2 text-gray-700 border-b">Servicios</a>
    <a href="{{ route('login') }}" class="block py-2 text-gray-700 border-b">Iniciar Sesión</a>
    <a href="{{ route('register') }}" class="block mt-2 btn-primary px-4 py-2 rounded-full text-center">Registrarse</a>
  </div>
    </nav>

   <!-- Hero Section - Diseño Elegante Mejorado -->
<section class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-yellow-50 pt-24 pb-20 md:pt-32 md:pb-28">
    <!-- Fondo con diseño geométrico -->
    <div class="absolute inset-0 overflow-hidden">
        <!-- Formas abstractas suaves -->
        <div class="absolute -top-20 -left-20 w-80 h-80 rounded-full bg-gradient-to-br from-blue-100/50 to-transparent"></div>
        <div class="absolute top-1/4 -right-20 w-96 h-96 rounded-full bg-gradient-to-bl from-yellow-100/40 to-transparent"></div>
        <div class="absolute bottom-1/3 left-1/4 w-64 h-64 rounded-full bg-gradient-to-tr from-green-100/30 to-transparent"></div>
        <div class="absolute -bottom-20 right-1/4 w-72 h-72 rounded-full bg-gradient-to-tl from-pink-100/30 to-transparent"></div>
        
        <!-- Patrón de puntos sutiles -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-1/4 w-1 h-1 bg-blue-400 rounded-full"></div>
            <div class="absolute top-1/3 right-1/3 w-2 h-2 bg-yellow-400 rounded-full"></div>
            <div class="absolute bottom-1/4 left-1/3 w-1.5 h-1.5 bg-green-400 rounded-full"></div>
            <div class="absolute bottom-10 right-1/4 w-2.5 h-2.5 bg-orange-400 rounded-full"></div>
        </div>
    </div>
    
    <!-- Elementos decorativos elegantes -->
    <div class="absolute top-16 left-10 w-24 h-24 opacity-10">
        <div class="w-full h-full border-2 border-blue-300 rounded-full animate-pulse"></div>
    </div>
    <div class="absolute bottom-32 right-16 w-32 h-32 opacity-10">
        <div class="w-full h-full border-2 border-yellow-300 rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
    </div>
    
    <!-- Iconos decorativos flotantes suaves -->
    <div class="absolute top-1/3 right-1/5 transform -translate-y-1/2">
        <div class="w-16 h-16 rounded-full bg-white/80 shadow-lg backdrop-blur-sm flex items-center justify-center border border-blue-100">
            <i class="fas fa-heart text-xl text-pink-400"></i>
        </div>
    </div>
    <div class="absolute bottom-1/3 left-1/5 transform translate-y-1/2">
        <div class="w-20 h-20 rounded-full bg-white/80 shadow-lg backdrop-blur-sm flex items-center justify-center border border-yellow-100">
            <i class="fas fa-star text-2xl text-yellow-500"></i>
        </div>
    </div>
    
    <!-- Contenido principal -->
    <div class="section-container relative z-10">
        <div class="max-w-4xl mx-auto">
            <!-- Badge elegante -->
            <div class="flex justify-center mb-8">
                <div class="inline-flex items-center bg-gradient-to-r from-blue-500/10 to-yellow-500/10 backdrop-blur-sm rounded-full px-6 py-3 border border-blue-200/50">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-sm font-medium text-blue-800">¡Transformando familias desde 2025!</span>
                </div>
            </div>
            
            <!-- Título principal elegante -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 md:mb-8 text-center text-gray-900 leading-tight">
                <span class="block">Guarderías Móviles</span>
                <span class="block mt-2">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 via-blue-500 to-blue-400">
                        Donde trabajas
                    </span>
                    <span class="text-gray-700 mx-2">o</span>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-600 via-yellow-500 to-orange-500">
                        estudias
                    </span>
                </span>
            </h1>
            
            <!-- Subtítulo legible -->
            <div class="relative mb-8 md:mb-12">
                <div class="absolute -left-6 top-1/2 transform -translate-y-1/2 hidden md:block">
                    <i class="fas fa-quote-left text-3xl text-blue-200"></i>
                </div>
                <p class="text-lg md:text-xl text-gray-700 text-center leading-relaxed px-4 md:px-12">
                    Llevamos <span class="font-semibold text-blue-600">espacios seguros y estimulantes</span> para niños directamente a empresas, universidades y eventos, para que padres y madres puedan <span class="font-semibold text-green-600">trabajar o estudiar con tranquilidad</span>.
                </p>
                <div class="absolute -right-6 top-1/2 transform -translate-y-1/2 hidden md:block">
                    <i class="fas fa-quote-right text-3xl text-yellow-200"></i>
                </div>
            </div>
            
            <!-- Mensaje destacado con diseño elegante -->
            <div class="bg-gradient-to-r from-blue-50 via-white to-yellow-50 rounded-2xl p-6 md:p-8 mb-10 border border-blue-100 shadow-sm max-w-3xl mx-auto">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mr-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-100 to-yellow-100 flex items-center justify-center">
                            <i class="fas fa-lightbulb text-xl text-yellow-600"></i>
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-800">
                            <span class="font-semibold text-blue-700">Sabemos el desafío:</span> Muchos padres no tienen con quién dejar a sus pequeños, limitando su desarrollo profesional y educativo. 
                            <span class="font-semibold text-green-700 block mt-2">¡Tenemos la solución perfecta!</span>
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Botones elegantes -->
            <div class="flex flex-col sm:flex-row gap-4 md:gap-6 justify-center items-center mb-12">
                <!-- Botón primario -->
                <a href="{{ route('register') }}" 
                   class="group relative overflow-hidden bg-gradient-to-r from-blue-600 to-blue-500 text-white font-semibold py-4 px-8 md:px-10 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 min-w-[240px] text-center">
                   <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                   <span class="relative z-10 flex items-center justify-center">
                       <i class="fas fa-rocket mr-3"></i>
                       Solicitar Servicio
                   </span>
                </a>
                
                <!-- Botón secundario -->
                <!-- <a href="#services" 
                   class="group relative overflow-hidden bg-white text-blue-700 font-semibold py-4 px-8 md:px-10 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 min-w-[240px] text-center border border-blue-200">
                   <div class="absolute inset-0 bg-blue-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                   <span class="relative z-10 flex items-center justify-center">
                       <i class="fas fa-play-circle mr-3 text-blue-600"></i>
                       Ver Demo
                   </span>
                </a> -->

                
            </div>
            
            <!-- Beneficios destacados -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-3xl mx-auto">
                <div class="text-center p-4">
                    <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-shield-alt text-blue-600"></i>
                    </div>
                    <div class="font-bold text-gray-900 mb-1">100% Seguro</div>
                    <div class="text-sm text-gray-600">Espacios certificados</div>
                </div>
                
                <div class="text-center p-4">
                    <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-graduation-cap text-yellow-600"></i>
                    </div>
                    <div class="font-bold text-gray-900 mb-1">Educativo</div>
                    <div class="text-sm text-gray-600">Estimulación temprana</div>
                </div>
                
                <div class="text-center p-4">
                    <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-clock text-green-600"></i>
                    </div>
                    <div class="font-bold text-gray-900 mb-1">Flexible</div>
                    <div class="text-sm text-gray-600">Horarios adaptables</div>
                </div>
                
                <div class="text-center p-4">
                    <div class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-heart text-pink-600"></i>
                    </div>
                    <div class="font-bold text-gray-900 mb-1">Profesional</div>
                    <div class="text-sm text-gray-600">Personal calificado</div>
                </div>
            </div>
            
            <!-- Flecha de scroll elegante -->
            <div class="mt-16 flex justify-center">
                <a href="#about" class="animate-bounce-slow">
                    <div class="w-12 h-12 rounded-full border-2 border-blue-200 flex items-center justify-center group hover:border-blue-300 transition-colors duration-300">
                        <i class="fas fa-chevron-down text-blue-400 group-hover:text-blue-500 transition-colors duration-300"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

    <!-- Quiénes Somos -->
    <section id="about" class="py-20 bg-white relative overflow-hidden">
        <div class="section-container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="fade-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 comic-font color-text-blue">¿Quiénes Somos?</h2>
                    <p class="text-lg text-gray-600 mb-4">
                        <strong class="color-text-orange">Smile At Work</strong> es una propuesta innovadora que lleva guarderías y espacios de estimulación temprana a espacios no convencionales como empresas, eventos y universidades.
                    </p>
                    <p class="text-lg text-gray-600 mb-6">
                        Creamos ambientes seguros, flexibles y llenos de estímulos donde los niños pueden quedarse mientras sus padres continúan con sus actividades. Ofrecemos cuidado infantil profesional, estimulación temprana y actividades sensoriales.
                    </p>
                    <div class="space-y-4">
                        <div class="bg-gray-50 p-4 rounded-lg border-l-4 color-border-green soft-shadow">
                            <h3 class="text-xl font-semibold mb-2 color-text-green">Nuestra Misión</h3>
                            <p class="text-gray-600">
                                Facilitar que padres y madres puedan trabajar, estudiar o capacitarse con tranquilidad, sabiendo que sus hijos están en un espacio seguro, creativo y lleno de aprendizaje.
                            </p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border-l-4 color-border-blue soft-shadow">
                            <h3 class="text-xl font-semibold mb-2 color-text-blue">Nuestra Visión</h3>
                            <p class="text-gray-600">
                                Ser la solución líder en Latinoamérica para el cuidado infantil en espacios no convencionales, transformando miles de familias.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 fade-in" style="animation-delay: 0.3s;">
                    <div class="relative">
                        <img src="https://cms-imgp.jw-cdn.org/img/p/500300103/univ/art/500300103_univ_lsr_lg.jpg" 
                             alt="Niños jugando en guardería" class="rounded-lg soft-shadow hover-lift w-full h-48 object-cover">
                        <div class="absolute -top-3 -right-3 w-10 h-10 rounded-full flex items-center justify-center color-bg-yellow soft-shadow">
                            <i class="fas fa-child text-white"></i>
                        </div>
                    </div>
                    <div class="relative mt-8">
                        <img src="https://toirobot.com/wp-content/uploads/2023/10/abatherapy-1920w.webp" 
                             alt="Actividades sensoriales para niños" class="rounded-lg soft-shadow hover-lift w-full h-48 object-cover">
                        <div class="absolute -top-3 -right-3 w-10 h-10 rounded-full flex items-center justify-center color-bg-green soft-shadow">
                            <i class="fas fa-hands text-white"></i>
                        </div>
                    </div>
                    <div class="relative">
                        <img src="https://limobelinwo.com/wp-content/uploads/2023/04/guarderia-de-una-oficina-5.jpg" 
                             alt="Guardería en espacio de trabajo" class="rounded-lg soft-shadow hover-lift w-full h-48 object-cover">
                        <div class="absolute -top-3 -right-3 w-10 h-10 rounded-full flex items-center justify-center color-bg-blue soft-shadow">
                            <i class="fas fa-briefcase text-white"></i>
                        </div>
                    </div>
                    <div class="relative mt-8">
                        <img src="https://arizent.brightspotcdn.com/dims4/default/66b4ea2/2147483647/strip/true/crop/7952x5304+0+0/resize/1024x684!/format/webp/quality/90/?url=https%3A%2F%2Fsource-media-brightspot.s3.us-east-1.amazonaws.com%2F8e%2Fb4%2Fc666a2be48d3a7aa3dcc88b2a8ea%2Fcopy-of-little-founders-12.jpg" 
                             alt="Padre e hijo felices" class="rounded-lg soft-shadow hover-lift w-full h-48 object-cover">
                        <div class="absolute -top-3 -right-3 w-10 h-10 rounded-full flex items-center justify-center color-bg-orange soft-shadow">
                            <i class="fas fa-heart text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Cómo Funciona -->
      <section id="how-it-works" class="py-20 gradient-bg-pink relative overflow-hidden">
        <div class="section-container">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 comic-font color-text-blue">¿Cómo Funciona?</h2>
                <p class="text-xl text-gray-700 max-w-2xl mx-auto">
                    Un proceso simple para brindar tranquilidad a padres y diversión a niños
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Paso 1 -->
                <div class="bg-white p-8 rounded-2xl card-shadow text-center hover-lift border-t-4 fade-in color-border-yellow">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 color-bg-yellow soft-shadow">
                        <span class="text-white font-bold text-2xl">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Solicita el Servicio</h3>
                    <p class="text-gray-600">
                        Empresas, universidades u organizadores de eventos nos contactan para implementar nuestra guardería móvil.
                    </p>
                </div>

                <!-- Paso 2 -->
                <div class="bg-white p-8 rounded-2xl card-shadow text-center hover-lift border-t-4 fade-in color-border-green" style="animation-delay: 0.2s;">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 color-bg-green soft-shadow">
                        <span class="text-white font-bold text-2xl">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Adaptamos el Espacio</h3>
                    <p class="text-gray-600">
                        Creamos un ambiente seguro, creativo y lleno de aprendizaje en el lugar indicado (oficina, universidad, evento).
                    </p>
                </div>

                <!-- Paso 3 -->
                <div class="bg-white p-8 rounded-2xl card-shadow text-center hover-lift border-t-4 fade-in color-border-blue" style="animation-delay: 0.4s;">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 color-bg-blue soft-shadow">
                        <span class="text-white font-bold text-2xl">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">¡Diversión y Aprendizaje!</h3>
                    <p class="text-gray-600">
                        Los niños disfrutan de actividades guiadas por profesionales mientras sus padres trabajan o estudian con tranquilidad.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios -->
    <section id="services" class="py-20 bg-white relative overflow-hidden">
        <div class="section-container">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 comic-font color-text-blue">Nuestros Servicios</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Soluciones flexibles diseñadas para diferentes necesidades y contextos
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Servicio Empresas -->
                <div class="p-8 rounded-2xl card-shadow hover-lift border fade-in color-border-blue">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 color-bg-blue soft-shadow">
                            <i class="fas fa-building text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Para Empresas</h3>
                    </div>
                    <p class="text-gray-600 mb-6 text-center">
                        Guardería in situ para empleados, permitiendo que padres y madres trabajen con tranquilidad mientras sus hijos están cerca, seguros y estimulados.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Aumento de productividad</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Reducción de ausentismo</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Mejora del clima laboral</span>
                        </li>
                    </ul>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="btn-secondary px-8 py-3 rounded-full font-medium soft-shadow inline-block">
                            Solicitar para Empresa
                        </a>
                    </div>
                </div>

                <!-- Servicio Universidades -->
                <div class="p-8 rounded-2xl card-shadow hover-lift border fade-in color-border-green" style="animation-delay: 0.2s;">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 color-bg-green soft-shadow">
                            <i class="fas fa-university text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Para Universidades</h3>
                    </div>
                    <p class="text-gray-600 mb-6 text-center">
                        Espacios de cuidado para hijos de estudiantes y personal académico, facilitando que puedan asistir a clases o trabajar sin preocupaciones.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Continuidad de estudios</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Apoyo a estudiantes padres</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Inclusión educativa</span>
                        </li>
                    </ul>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="px-8 py-3 rounded-full font-medium soft-shadow inline-block color-bg-green text-white hover:bg-opacity-90 transition-colors">
                            Solicitar para Universidad
                        </a>
                    </div>
                </div>

                <!-- Servicio Eventos -->
                <div class="p-8 rounded-2xl card-shadow hover-lift border fade-in color-border-orange" style="animation-delay: 0.4s;">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 color-bg-orange soft-shadow">
                            <i class="fas fa-calendar-check text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Para Eventos</h3>
                    </div>
                    <p class="text-gray-600 mb-6 text-center">
                        Guardería temporal en conferencias, congresos, ferias y cualquier evento donde los asistentes necesiten un espacio seguro para sus hijos.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Mayor asistencia al evento</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Experiencia familiar completa</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Valor añadido para participantes</span>
                        </li>
                    </ul>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="btn-primary px-8 py-3 rounded-full font-medium soft-shadow inline-block">
                            Solicitar para Evento
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Valores -->
    <section id="values" class="py-20 relative overflow-hidden" style="background-color: rgba(248, 165, 165, 0.1);">
        <div class="section-container">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 comic-font color-text-blue">Lo Que Ofrecemos</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Servicios profesionales que marcan la diferencia
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Valor 1 -->
                <div class="bg-white p-8 rounded-2xl card-shadow hover-lift border-t-4 fade-in color-border-yellow">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 color-bg-yellow soft-shadow">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Espacios Seguros</h3>
                    <p class="text-gray-600">
                        Ambientes diseñados con los más altos estándares de seguridad, supervisados por profesionales calificados.
                    </p>
                </div>

                <!-- Valor 2 -->
                <div class="bg-white p-8 rounded-2xl card-shadow hover-lift border-t-4 fade-in color-border-green" style="animation-delay: 0.2s;">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 color-bg-green soft-shadow">
                        <i class="fas fa-brain text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Estimulación Temprana</h3>
                    <p class="text-gray-600">
                        Actividades diseñadas por especialistas para promover el desarrollo cognitivo, emocional y social de los niños.
                    </p>
                </div>

                <!-- Valor 3 -->
                <div class="bg-white p-8 rounded-2xl card-shadow hover-lift border-t-4 fade-in color-border-blue" style="animation-delay: 0.4s;">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 color-bg-blue soft-shadow">
                        <i class="fas fa-palette text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Actividades Sensoriales</h3>
                    <p class="text-gray-600">
                        Juegos y experiencias que estimulan los sentidos y fomentan la creatividad y curiosidad natural de los niños.
                    </p>
                </div>

                <!-- Valor 4 -->
                <div class="bg-white p-8 rounded-2xl card-shadow hover-lift border-t-4 fade-in color-border-orange" style="animation-delay: 0.6s;">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 color-bg-orange soft-shadow">
                        <i class="fas fa-user-friends text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Profesionales Calificados</h3>
                    <p class="text-gray-600">
                        Equipo de educadores, psicólogos y cuidadores con experiencia en desarrollo infantil y primeros auxilios.
                    </p>
                </div>

                <!-- Valor 5 -->
                <div class="bg-white p-8 rounded-2xl card-shadow hover-lift border-t-4 fade-in color-border-red" style="animation-delay: 0.8s;">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 color-bg-red soft-shadow">
                        <i class="fas fa-sun text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Ambientes Positivos</h3>
                    <p class="text-gray-600">
                        Espacios coloridos, alegres y diseñados para generar bienestar y felicidad en los niños.
                    </p>
                </div>

                <!-- Valor 6 -->
                <div class="bg-white p-8 rounded-2xl card-shadow hover-lift border-t-4 fade-in color-border-blue" style="animation-delay: 1s;">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 color-bg-blue soft-shadow">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Flexibilidad Total</h3>
                    <p class="text-gray-600">
                        Servicios por horas, días completos o temporadas según las necesidades específicas de cada cliente.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
  <section class="gradient-bg-blue py-20 relative overflow-hidden">
        <div class="section-container text-center">
            <div class="max-w-4xl mx-auto fade-in">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 comic-font">¿Listo para Transformar tu Espacio?</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Únete a las decenas de empresas, universidades y eventos que ya confían en Smile At Work para el cuidado de los más pequeños.
                </p>
                <p class="text-lg mb-10 text-white italic">
                    "Cuidamos a quienes amas mientras tú sigues creciendo"
                </p>
                <a href="#register" class="bg-white font-bold py-4 px-12 rounded-full soft-shadow transition-all duration-300 transform hover:scale-105 inline-block color-text-blue">
                    Solicitar Servicio
                </a>
            </div>
        </div>
    </section>


    <!-- Footer -->
<footer class="bg-gray-800 text-white pt-16 pb-8 relative overflow-hidden">
    <!-- Elementos decorativos -->
    <div class="absolute top-0 left-0 w-32 h-32 opacity-10 color-bg-yellow rounded-full -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-40 h-40 opacity-10 color-bg-blue rounded-full translate-x-1/3 translate-y-1/3"></div>
    
    <div class="section-container relative z-10">
        <!-- Sección principal del footer -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            
            <!-- Columna 1: Logo y descripción -->
            <div class="space-y-6">
                <div class="flex items-center">
                    <div class="relative mr-3">
                        <i class="fas fa-smile text-3xl color-text-yellow"></i>
                        <div class="absolute -top-1 -right-1 w-3 h-3 bubble color-bg-red"></div>
                    </div>
                    <div>
                        <h2 class="font-bold text-2xl comic-font color-text-blue">Smile At Work</h2>
                        <p class="text-sm text-gray-300">Cuidamos a quienes cuidan</p>
                    </div>
                </div>
                <p class="text-gray-400 leading-relaxed">
                    Transformamos espacios laborales y educativos con alegría y profesionalismo, llevando guarderías y estimulación temprana donde más se necesita.
                </p>
<div class="flex space-x-4">
    <!-- Facebook -->
    <a href="https://www.facebook.com/share/1GdpLt9LkN/" target="_blank"
       class="w-10 h-10 rounded-full color-bg-blue hover:color-bg-orange transition-colors duration-300 flex items-center justify-center">
        <i class="fab fa-facebook-f"></i>
    </a>

    <!-- Instagram -->
    <a href="https://www.instagram.com/smile_atwork?igsh=dXRidnY2ODBheXlt" target="_blank"
       class="w-10 h-10 rounded-full color-bg-blue hover:color-bg-orange transition-colors duration-300 flex items-center justify-center">
        <i class="fab fa-instagram"></i>
    </a>

    <!-- LinkedIn -->
    <a href="https://www.linkedin.com/in/smile-at-work-6a51a3397?utm_source=share_via&utm_content=profile&utm_medium=member_android"
       target="_blank"
       class="w-10 h-10 rounded-full color-bg-blue hover:color-bg-orange transition-colors duration-300 flex items-center justify-center">
        <i class="fab fa-linkedin-in"></i>
    </a>

    <!-- TikTok (reemplaza YouTube) -->
    <a href="https://www.tiktok.com/@smile.at.work?_r=1&_t=ZS-91sNB8lF3sz" target="_blank"
       class="w-10 h-10 rounded-full color-bg-blue hover:color-bg-orange transition-colors duration-300 flex items-center justify-center">
        <i class="fab fa-tiktok"></i>
    </a>
</div>

            </div>
            
            <!-- Columna 2: Enlaces rápidos -->
            <div>
                <h3 class="text-xl font-bold mb-6 pb-2 border-b-2 color-border-orange inline-block">Enlaces Rápidos</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="#about" class="text-gray-400 hover:text-white hover:color-text-yellow transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 color-text-orange"></i>
                            Quiénes Somos
                        </a>
                    </li>
                    <li>
                        <a href="#services" class="text-gray-400 hover:text-white hover:color-text-yellow transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 color-text-orange"></i>
                            Nuestros Servicios
                        </a>
                    </li>
                    <li>
                        <a href="#how-it-works" class="text-gray-400 hover:text-white hover:color-text-yellow transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 color-text-orange"></i>
                            Cómo Funciona
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white hover:color-text-yellow transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 color-text-orange"></i>
                            Blog & Noticias
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white hover:color-text-yellow transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2 color-text-orange"></i>
                            Preguntas Frecuentes
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Columna 3: Servicios -->
            <div>
                <h3 class="text-xl font-bold mb-6 pb-2 border-b-2 color-border-green inline-block">Nuestros Servicios</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white hover:color-text-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-building mr-2 color-text-green"></i>
                            Guarderías Empresariales
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white hover:color-text-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-university mr-2 color-text-green"></i>
                            Guarderías Universitarias
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white hover:color-text-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-calendar-alt mr-2 color-text-green"></i>
                            Guarderías para Eventos
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white hover:color-text-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-brain mr-2 color-text-green"></i>
                            Estimulación Temprana
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white hover:color-text-green transition-colors duration-300 flex items-center">
                            <i class="fas fa-hands mr-2 color-text-green"></i>
                            Actividades Sensoriales
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Columna 4: Contacto -->
            <div>
                <h3 class="text-xl font-bold mb-6 pb-2 border-b-2 color-border-blue inline-block">Contáctanos</h3>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-3 color-text-blue"></i>
                        <span class="text-gray-400">Chimbote - Nv. Chimbote - Perú</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone mr-3 color-text-blue"></i>
                        <a href="tel:+18001234567" class="text-gray-400 hover:text-white transition-colors duration-300">+51 936 798 481</a>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-3 color-text-blue"></i>
                        <a href="smileatwork292517@gmail.com" class="text-gray-400 hover:text-white transition-colors duration-300">smileatwork292517@gmail.com</a>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-clock mr-3 color-text-blue"></i>
                        <span class="text-gray-400">Lun-Vie: 8:00 AM - 6:00 PM</span>
                    </li>
                </ul>
                
                <!-- Newsletter -->
                <div class="mt-8">
                    <h4 class="text-lg font-semibold mb-3 color-text-yellow">Suscríbete a nuestro newsletter</h4>
                    <div class="flex">
                        <input type="email" placeholder="Tu correo electrónico" class="flex-grow px-4 py-2 rounded-l-lg text-gray-800 focus:outline-none">
                        <button class="color-bg-orange hover:color-bg-yellow transition-colors duration-300 px-4 py-2 rounded-r-lg font-medium">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Línea divisoria -->
        <div class="border-t border-gray-700 pt-8 mt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- Copyright -->
                <div class="mb-4 md:mb-0">
                    <p class="text-gray-400">
                        &copy; 2025 <span class="color-text-yellow font-semibold">Smile At Work</span>. Todos los derechos reservados.
                    </p>
                </div>
                
                <!-- Enlaces legales -->
                <div class="flex flex-wrap justify-center gap-6 text-sm">
                    <a href="#" class="text-gray-400 hover:text-white hover:color-text-orange transition-colors duration-300">Política de Privacidad</a>
                    <a href="#" class="text-gray-400 hover:text-white hover:color-text-orange transition-colors duration-300">Términos y Condiciones</a>
                    <a href="#" class="text-gray-400 hover:text-white hover:color-text-orange transition-colors duration-300">Aviso Legal</a>
                    <a href="#" class="text-gray-400 hover:text-white hover:color-text-orange transition-colors duration-300">Cookies</a>
                </div>
                
                <!-- Métodos de pago -->
                <div class="mt-4 md:mt-0">
                    <p class="text-gray-400 text-sm mb-2 text-center md:text-right">Métodos de pago aceptados:</p>
                    <div class="flex space-x-2">
                        <i class="fab fa-cc-visa text-xl text-gray-400"></i>
                        <i class="fab fa-cc-mastercard text-xl text-gray-400"></i>
                        <i class="fab fa-cc-amex text-xl text-gray-400"></i>
                        <i class="fab fa-cc-paypal text-xl text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Logo desarrolladores -->
        <div class="text-center mt-8 pt-6 border-t border-gray-700">
            <p class="text-gray-500 text-sm">
                Desarrollado  por 
                <span class="font-bold color-text-yellow">RETO & EFOJ</span> | 
                Soluciones Digitales Profesionales
            </p>
        </div>
    </div>
</footer>

    <!-- Smooth Scroll -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Animación de aparición al hacer scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });


        (function(){
    const btn = document.getElementById('btn-mobile');
    const menu = document.getElementById('mobile-menu-simple');
    const icon = document.getElementById('icon-mobile');

    btn.addEventListener('click', () => {
      const isHidden = menu.classList.contains('hidden');
      if (isHidden) {
        menu.classList.remove('hidden');
        btn.setAttribute('aria-expanded', 'true');
        if (icon) icon.className = 'fas fa-times text-xl text-gray-600';
      } else {
        menu.classList.add('hidden');
        btn.setAttribute('aria-expanded', 'false');
        if (icon) icon.className = 'fas fa-bars text-xl text-gray-600';
      }
    });
  })();
    </script>
</body>
</html>