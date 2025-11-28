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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #667eea;
            --secondary: #764ba2;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <i class="fas fa-smile text-2xl text-purple-600 mr-2"></i>
                    <span class="font-bold text-xl text-gray-800">Smile At Work</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#about" class="text-gray-600 hover:text-purple-600 font-medium">Quiénes Somos</a>
                    <a href="#values" class="text-gray-600 hover:text-purple-600 font-medium">Valores</a>
                    <a href="#services" class="text-gray-600 hover:text-purple-600 font-medium">Servicios</a>
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-purple-600 font-medium">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-purple-500 to-purple-700 text-white px-6 py-2 rounded-full font-medium hover:shadow-lg transition-all duration-300">
                        Registrarse
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="text-gray-600 hover:text-purple-600 focus:outline-none focus:text-purple-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="gradient-bg text-white pt-20 pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                    Transformamos Espacios<br>con <span class="text-yellow-300">Alegría</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-purple-100 max-w-3xl mx-auto">
                    Creamos ambientes laborales y educativos positivos donde las personas puedan florecer y alcanzar su máximo potencial.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="bg-white text-purple-600 font-bold py-4 px-8 rounded-full hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                        Comenzar Ahora
                    </a>
                    <a href="#services" class="border-2 border-white text-white font-bold py-4 px-8 rounded-full hover:bg-white hover:text-purple-600 transition-all duration-300">
                        Conocer Servicios
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quiénes Somos -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Quiénes Somos</h2>
                    <p class="text-lg text-gray-600 mb-4">
                        <strong>Smile At Work</strong> es una plataforma innovadora dedicada a transformar espacios laborales y educativos a través de servicios especializados que promueven el bienestar, la felicidad y la productividad.
                    </p>
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-xl font-semibold text-purple-600 mb-2">Nuestra Misión</h3>
                            <p class="text-gray-600">
                                Crear ambientes positivos donde las personas puedan desarrollarse plenamente, fomentando la alegría y el compromiso en cada espacio que tocamos.
                            </p>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-purple-600 mb-2">Nuestra Visión</h3>
                            <p class="text-gray-600">
                                Ser la plataforma líder en Latinoamérica para la transformación positiva de entornos laborales y educativos.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Trabajo en equipo" class="rounded-lg shadow-lg hover-lift">
                    <img src="https://images.unsplash.com/photo-1551836026-d5c88ac5c4b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Ambiente positivo" class="rounded-lg shadow-lg mt-8 hover-lift">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Reunión productiva" class="rounded-lg shadow-lg hover-lift">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                         alt="Personas felices" class="rounded-lg shadow-lg mt-8 hover-lift">
                </div>
            </div>
        </div>
    </section>

    <!-- Valores -->
    <section id="values" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Nuestros Valores</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Principios que guían cada acción que realizamos y cada servicio que ofrecemos
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Valor 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-700 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Pasión</h3>
                    <p class="text-gray-600">
                        Amamos lo que hacemos y nos esforzamos por transmitir esa pasión en cada proyecto.
                    </p>
                </div>

                <!-- Valor 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-700 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-handshake text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Compromiso</h3>
                    <p class="text-gray-600">
                        Nos comprometemos con nuestros clientes para lograr los mejores resultados posibles.
                    </p>
                </div>

                <!-- Valor 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-700 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-lightbulb text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Innovación</h3>
                    <p class="text-gray-600">
                        Buscamos constantemente nuevas formas de mejorar y adaptarnos a las necesidades.
                    </p>
                </div>

                <!-- Valor 4 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg text-center hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-700 rounded-full flex items-center justify-center mx-auto mb-6">
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
    <section id="services" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Nuestros Servicios</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Soluciones especializadas diseñadas para diferentes necesidades y contextos
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Servicio Empresas -->
                <div class="bg-gradient-to-br from-blue-50 to-purple-50 p-8 rounded-2xl shadow-lg hover-lift border border-blue-100">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-building text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Servicios para Empresas</h3>
                    </div>
                    <p class="text-gray-600 mb-6 text-center">
                        Programas de bienestar laboral, talleres de team building y asesorías para mejorar el clima organizacional.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Aumento de productividad</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Mejora del ambiente laboral</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Reducción de estrés</span>
                        </li>
                    </ul>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-8 py-3 rounded-full font-medium hover:shadow-lg transition-all duration-300 inline-block">
                            Solicitar Servicio
                        </a>
                    </div>
                </div>

                <!-- Servicio Universidades -->
                <div class="bg-gradient-to-br from-green-50 to-blue-50 p-8 rounded-2xl shadow-lg hover-lift border border-green-100">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-university text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Servicios para Universidades</h3>
                    </div>
                    <p class="text-gray-600 mb-6 text-center">
                        Actividades recreativas, programas de salud mental y eventos para enriquecer la vida universitaria.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Mejora del rendimiento académico</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Espacios de esparcimiento</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Apoyo emocional</span>
                        </li>
                    </ul>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-green-500 to-blue-600 text-white px-8 py-3 rounded-full font-medium hover:shadow-lg transition-all duration-300 inline-block">
                            Solicitar Servicio
                        </a>
                    </div>
                </div>

                <!-- Servicio Eventos -->
                <div class="bg-gradient-to-br from-orange-50 to-pink-50 p-8 rounded-2xl shadow-lg hover-lift border border-orange-100">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-r from-orange-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calendar-check text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Servicios para Eventos</h3>
                    </div>
                    <p class="text-gray-600 mb-6 text-center">
                        Organización de eventos corporativos, educativos y sociales con un enfoque en la experiencia positiva.
                    </p>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Eventos memorables</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Activaciones innovadoras</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            <span class="text-gray-600">Gestión profesional</span>
                        </li>
                    </ul>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-orange-500 to-pink-600 text-white px-8 py-3 rounded-full font-medium hover:shadow-lg transition-all duration-300 inline-block">
                            Solicitar Servicio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="gradient-bg py-20">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">¿Listo para Transformar tu Espacio?</h2>
            <p class="text-xl text-purple-100 mb-8 max-w-2xl mx-auto">
                Únete a nuestra comunidad y descubre cómo podemos ayudarte a crear ambientes más positivos y productivos.
            </p>
            <a href="{{ route('register') }}" class="bg-white text-purple-600 font-bold py-4 px-12 rounded-full hover:shadow-2xl transition-all duration-300 transform hover:scale-105 inline-block">
                Registrarse Ahora
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex justify-center items-center mb-6">
                    <i class="fas fa-smile text-2xl text-purple-400 mr-2"></i>
                    <span class="font-bold text-xl">Smile At Work</span>
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
    </script>
</body>
</html>