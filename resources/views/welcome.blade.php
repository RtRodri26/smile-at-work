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
                        <i class="fas fa-smile text-2xl color-text-yellow"></i>
                        <div class="absolute -top-1 -right-1 w-3 h-3 bubble color-bg-red"></div>
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
                    <button type="button" class="text-gray-600 hover:color-text-orange focus:outline-none focus:text-orange-500">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
      <section class="gradient-bg text-white pt-20 pb-20 relative overflow-hidden">
        <!-- Background elements -->
        <div class="absolute top-10 left-10 w-20 h-20 bubble floating opacity-20 color-bg-yellow"></div>
        <div class="absolute top-1/4 right-20 w-16 h-16 bubble floating opacity-20 color-bg-blue" style="animation-delay: 0.5s;"></div>
        <div class="absolute bottom-20 left-1/4 w-24 h-24 bubble floating opacity-20 color-bg-green" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-10 right-10 w-12 h-12 bubble floating opacity-20 color-bg-orange" style="animation-delay: 1.5s;"></div>
        
        <!-- Floating stickers -->
        <div class="floating-sticker sticker-1 comic-font">¡Aprendizaje Divertido!</div>
        <div class="floating-sticker sticker-2 comic-font">Espacios Seguros</div>
        <div class="floating-sticker sticker-3 comic-font">Estimulación Temprana</div>
        
        <div class="section-container pt-16 relative z-10">
            <div class="text-center max-w-4xl mx-auto fade-in">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight comic-font">
                    Guarderías Móviles donde<br><span class="rainbow-text">Trabajas o Estudias</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Llevamos espacios seguros, flexibles y llenos de estímulos para niños directamente a empresas, universidades y eventos.
                </p>
                <p class="text-lg mb-10 max-w-3xl mx-auto">
                    Sabemos que muchos padres y madres no tienen con quién dejar a sus pequeños, y eso les impide trabajar, estudiar o capacitarse con tranquilidad. 
                    <strong>¡Nosotros tenemos la solución!</strong>
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#register" class="bg-white font-bold py-4 px-8 rounded-full soft-shadow transition-all duration-300 transform hover:scale-105 color-text-blue">
                        Solicitar Nuestro Servicio
                    </a>
                    <a href="#services" class="border-2 border-white font-bold py-4 px-8 rounded-full hover:bg-white hover:text-blue-800 transition-all duration-300">
                        Conocer Servicios
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
                        <img src="https://images.unsplash.com/photo-1541692641319-981cc79ee10a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             alt="Niños jugando en guardería" class="rounded-lg soft-shadow hover-lift w-full h-48 object-cover">
                        <div class="absolute -top-3 -right-3 w-10 h-10 rounded-full flex items-center justify-center color-bg-yellow soft-shadow">
                            <i class="fas fa-child text-white"></i>
                        </div>
                    </div>
                    <div class="relative mt-8">
                        <img src="https://images.unsplash.com/photo-1516627145497-ae6953a11bdd?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             alt="Actividades sensoriales para niños" class="rounded-lg soft-shadow hover-lift w-full h-48 object-cover">
                        <div class="absolute -top-3 -right-3 w-10 h-10 rounded-full flex items-center justify-center color-bg-green soft-shadow">
                            <i class="fas fa-hands text-white"></i>
                        </div>
                    </div>
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             alt="Guardería en espacio de trabajo" class="rounded-lg soft-shadow hover-lift w-full h-48 object-cover">
                        <div class="absolute -top-3 -right-3 w-10 h-10 rounded-full flex items-center justify-center color-bg-blue soft-shadow">
                            <i class="fas fa-briefcase text-white"></i>
                        </div>
                    </div>
                    <div class="relative mt-8">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
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
                        <a href="#register" class="btn-secondary px-8 py-3 rounded-full font-medium soft-shadow inline-block">
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
                        <a href="#register" class="px-8 py-3 rounded-full font-medium soft-shadow inline-block color-bg-green text-white hover:bg-opacity-90 transition-colors">
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
                        <a href="#register" class="btn-primary px-8 py-3 rounded-full font-medium soft-shadow inline-block">
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
                    <a href="#" class="w-10 h-10 rounded-full color-bg-blue hover:color-bg-orange transition-colors duration-300 flex items-center justify-center">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full color-bg-blue hover:color-bg-orange transition-colors duration-300 flex items-center justify-center">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full color-bg-blue hover:color-bg-orange transition-colors duration-300 flex items-center justify-center">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full color-bg-blue hover:color-bg-orange transition-colors duration-300 flex items-center justify-center">
                        <i class="fab fa-youtube"></i>
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
                        <span class="text-gray-400">Oficinas en principales ciudades de Latinoamérica</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone mr-3 color-text-blue"></i>
                        <a href="tel:+18001234567" class="text-gray-400 hover:text-white transition-colors duration-300">+1 (800) 123-4567</a>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-3 color-text-blue"></i>
                        <a href="mailto:info@smileatwork.com" class="text-gray-400 hover:text-white transition-colors duration-300">info@smileatwork.com</a>
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
                        &copy; 2024 <span class="color-text-yellow font-semibold">Smile At Work</span>. Todos los derechos reservados.
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
                Desarrollado con <i class="fas fa-heart color-text-red mx-1"></i> por 
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
    </script>
</body>
</html>