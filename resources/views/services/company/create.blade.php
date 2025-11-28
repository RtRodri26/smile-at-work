{{-- resources/views/services/company/create.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Servicio - Empresa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full bg-white rounded-lg shadow-md p-6">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Solicitud de Servicio para Empresas</h2>
                <p class="mt-2 text-sm text-gray-600">Complete el formulario para solicitar nuestros servicios</p>
            </div>

            <form action="{{ route('services.company.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Nombre Empresa --}}
                    <div>
                        <label for="nombre_empresa" class="block text-sm font-medium text-gray-700">
                            Nombre de la empresa *
                        </label>
                        <input type="text" id="nombre_empresa" name="nombre_empresa" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    {{-- Persona Contacto --}}
                    <div>
                        <label for="persona_contacto" class="block text-sm font-medium text-gray-700">
                            Persona de contacto *
                        </label>
                        <input type="text" id="persona_contacto" name="persona_contacto" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    {{-- Cargo --}}
                    <div>
                        <label for="cargo" class="block text-sm font-medium text-gray-700">
                            Cargo *
                        </label>
                        <input type="text" id="cargo" name="cargo" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Correo electrónico *
                        </label>
                        <input type="email" id="email" name="email" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    {{-- Teléfono --}}
                    <div>
                        <label for="telefono" class="block text-sm font-medium text-gray-700">
                            Teléfono *
                        </label>
                        <input type="tel" id="telefono" name="telefono" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    {{-- Número de Colaboradores --}}
                    <div>
                        <label for="num_colaboradores" class="block text-sm font-medium text-gray-700">
                            Nº de colaboradores *
                        </label>
                        <input type="number" id="num_colaboradores" name="num_colaboradores" min="1" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    {{-- Tipo de Servicio --}}
                    <div>
                        <label for="tipo_servicio" class="block text-sm font-medium text-gray-700">
                            Tipo de servicio *
                        </label>
                        <select id="tipo_servicio" name="tipo_servicio" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Seleccionar...</option>
                            <option value="Permanente">Permanente</option>
                            <option value="Por evento">Por evento</option>
                        </select>
                    </div>

                    {{-- Fecha y Hora de Cita --}}
                    <div>
                        <label for="fecha_hora" class="block text-sm font-medium text-gray-700">
                            Fecha y hora de cita *
                        </label>
                        <input type="datetime-local" id="fecha_hora" name="fecha_hora" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                {{-- Mensaje Adicional --}}
                <div>
                    <label for="mensaje_adicional" class="block text-sm font-medium text-gray-700">
                        Mensaje adicional
                    </label>
                    <textarea id="mensaje_adicional" name="mensaje_adicional" rows="4"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Describa brevemente sus necesidades..."></textarea>
                </div>

                {{-- Botón de Envío --}}
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Enviar Solicitud
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>