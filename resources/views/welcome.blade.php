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
        
        <div class="section-container pt-16 relative z-10">
            <div class="text-center max-w-4xl mx-auto fade-in">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight comic-font">
                    Transformamos Espacios<br>con <span class="rainbow-text">Alegría</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">
                    Creamos ambientes laborales y educativos positivos donde las personas puedan florecer y alcanzar su máximo potencial.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="bg-white font-bold py-4 px-8 rounded-full soft-shadow transition-all duration-300 transform hover:scale-105 color-text-blue">
                        Comenzar Ahora
                    </a>
                    <a href="#services" class="border-2 border-white font-bold py-4 px-8 rounded-full hover:bg-white transition-all duration-300 color-text-blue">
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
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 comic-font color-text-blue">Quiénes Somos</h2>
                    <p class="text-lg text-gray-600 mb-4">
                        <strong class="color-text-orange">Smile At Work</strong> es una plataforma innovadora dedicada a transformar espacios laborales y educativos a través de servicios especializados que promueven el bienestar, la felicidad y la productividad.
                    </p>
                    <div class="space-y-4">
                        <div class="bg-gray-50 p-4 rounded-lg border-l-4 color-border-green soft-shadow">
                            <h3 class="text-xl font-semibold mb-2 color-text-green">Nuestra Misión</h3>
                            <p class="text-gray-600">
                                Crear ambientes positivos donde las personas puedan desarrollarse plenamente, fomentando la alegría y el compromiso en cada espacio que tocamos.
                            </p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border-l-4 color-border-blue soft-shadow">
                            <h3 class="text-xl font-semibold mb-2 color-text-blue">Nuestra Visión</h3>
                            <p class="text-gray-600">
                                Ser la plataforma líder en Latinoamérica para la transformación positiva de entornos laborales y educativos.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 fade-in" style="animation-delay: 0.3s;">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             alt="Trabajo en equipo" class="rounded-lg soft-shadow hover-lift w-full h-48 object-cover">
                        <div class="absolute -top-3 -right-3 w-10 h-10 rounded-full flex items-center justify-center color-bg-yellow soft-shadow">
                            <i class="fas fa-heart text-white"></i>
                        </div>
                    </div>
                    <div class="relative mt-8">
                        <img src="https://images.unsplash.com/photo-1551836026-d5c88ac5c4b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             alt="Ambiente positivo" class="rounded-lg soft-shadow hover-lift w-full h-48 object-cover">
                        <div class="absolute -top-3 -right-3 w-10 h-10 rounded-full flex items-center justify-center color-bg-green soft-shadow">
                            <i class="fas fa-smile text-white"></i>
                        </div>
                    </div>
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             alt="Reunión productiva" class="rounded-lg soft-shadow hover-lift w-full h-48 object-cover">
                        <div class="absolute -top-3 -right-3 w-10 h-10 rounded-full flex items-center justify-center color-bg-blue soft-shadow">
                            <i class="fas fa-users text-white"></i>
                        </div>
                    </div>
                    <div class="relative mt-8">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             alt="Personas felices" class="rounded-lg soft-shadow hover-lift w-full h-48 object-cover">
                        <div class="absolute -top-3 -right-3 w-10 h-10 rounded-full flex items-center justify-center color-bg-orange soft-shadow">
                            <i class="fas fa-star text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Valores -->
    <section id="values" class="py-20 relative overflow-hidden" style="background-color: rgba(248, 165, 165, 0.1);">
        <div class="section-container">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 comic-font color-text-blue">Nuestros Valores</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Principios que guían cada acción que realizamos y cada servicio que ofrecemos
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Valor 1 -->
                <div class="bg-white p-8 rounded-2xl card-shadow text-center hover-lift border-t-4 fade-in color-border-yellow">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 color-bg-yellow soft-shadow">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Pasión</h3>
                    <p class="text-gray-600">
                        Amamos lo que hacemos y nos esforzamos por transmitir esa pasión en cada proyecto.
                    </p>
                </div>

                <!-- Valor 2 -->
                <div class="bg-white p-8 rounded-2xl card-shadow text-center hover-lift border-t-4 fade-in color-border-green" style="animation-delay: 0.2s;">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 color-bg-green soft-shadow">
                        <i class="fas fa-handshake text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Compromiso</h3>
                    <p class="text-gray-600">
                        Nos comprometemos con nuestros clientes para lograr los mejores resultados posibles.
                    </p>
                </div>

                <!-- Valor 3 -->
                <div class="bg-white p-8 rounded-2xl card-shadow text-center hover-lift border-t-4 fade-in color-border-blue" style="animation-delay: 0.4s;">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 color-bg-blue soft-shadow">
                        <i class="fas fa-lightbulb text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Innovación</h3>
                    <p class="text-gray-600">
                        Buscamos constantemente nuevas formas de mejorar y adaptarnos a las necesidades.
                    </p>
                </div>

                <!-- Valor 4 -->
                <div class="bg-white p-8 rounded-2xl card-shadow text-center hover-lift border-t-4 fade-in color-border-orange" style="animation-delay: 0.6s;">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 color-bg-orange soft-shadow">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Trabajo en Equipo</h3>
                    <p class="text-gray-600">
                        Creemos en el poder de la colaboración y el trabajo conjunto para lograr grandes cosas.
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
                    Soluciones especializadas diseñadas para diferentes necesidades y contextos
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Servicio Empresas -->
                <div class="p-8 rounded-2xl card-shadow hover-lift border fade-in color-border-blue">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 color-bg-blue soft-shadow">
                            <i class="fas fa-building text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Servicios para Empresas</h3>
                    </div>
                    <p class="text-gray-600 mb-6 text-center">
                        Programas de bienestar laboral, talleres de team building y asesorías para mejorar el clima organizacional.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Aumento de productividad</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Mejora del ambiente laboral</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Reducción de estrés</span>
                        </li>
                    </ul>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="btn-secondary px-8 py-3 rounded-full font-medium soft-shadow inline-block">
                            Solicitar Servicio
                        </a>
                    </div>
                </div>

                <!-- Servicio Universidades -->
                <div class="p-8 rounded-2xl card-shadow hover-lift border fade-in color-border-green" style="animation-delay: 0.2s;">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 color-bg-green soft-shadow">
                            <i class="fas fa-university text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Servicios para Universidades</h3>
                    </div>
                    <p class="text-gray-600 mb-6 text-center">
                        Actividades recreativas, programas de salud mental y eventos para enriquecer la vida universitaria.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Mejora del rendimiento académico</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Espacios de esparcimiento</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Apoyo emocional</span>
                        </li>
                    </ul>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="px-8 py-3 rounded-full font-medium soft-shadow inline-block color-bg-green text-white hover:bg-opacity-90 transition-colors">
                            Solicitar Servicio
                        </a>
                    </div>
                </div>

                <!-- Servicio Eventos -->
                <div class="p-8 rounded-2xl card-shadow hover-lift border fade-in color-border-orange" style="animation-delay: 0.4s;">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 color-bg-orange soft-shadow">
                            <i class="fas fa-calendar-check text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Servicios para Eventos</h3>
                    </div>
                    <p class="text-gray-600 mb-6 text-center">
                        Organización de eventos corporativos, educativos y sociales con un enfoque en la experiencia positiva.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Eventos memorables</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Activaciones innovadoras</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check mr-3 color-text-green"></i>
                            <span class="text-gray-600">Gestión profesional</span>
                        </li>
                    </ul>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="btn-primary px-8 py-3 rounded-full font-medium soft-shadow inline-block">
                            Solicitar Servicio
                        </a>
                    </div>
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
                    Únete a nuestra comunidad y descubre cómo podemos ayudarte a crear ambientes más positivos y productivos.
                </p>
                <a href="{{ route('register') }}" class="bg-white font-bold py-4 px-12 rounded-full soft-shadow transition-all duration-300 transform hover:scale-105 inline-block color-text-blue">
                    Registrarse Ahora
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="section-container">
            <div class="text-center">
                <div class="flex justify-center items-center mb-6">
                    <div class="relative">
                        <i class="fas fa-smile text-2xl color-text-yellow"></i>
                        <div class="absolute -top-1 -right-1 w-3 h-3 bubble color-bg-red"></div>
                    </div>
                    <span class="font-bold text-xl ml-2 comic-font color-text-blue">Smile At Work</span>
                </div>
                <p class="text-gray-400 mb-4">
                    Transformando espacios laborales y educativos con alegría y profesionalismo.
                </p>
                <p class="text-gray-400">
                    &copy; 2024 Smile At Work. Todos los derechos reservados.
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