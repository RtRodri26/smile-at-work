@extends('layouts.app')

@section('title', 'Solicitud de Servicio para Eventos - Smile At Work')
@section('page-title', 'Solicitud de Servicio para Eventos')
@section('page-subtitle', 'Complete el formulario para solicitar su evento')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full bg-white rounded-lg shadow-md p-6">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Solicitud de Servicio para Eventos</h2>
            <p class="mt-2 text-sm text-gray-600">Complete el formulario para solicitar su evento</p>
        </div>

        <form action="{{ route('services.event.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Nombre del evento --}}
                <div>
                    <label for="nombre_evento" class="block text-sm font-medium text-gray-700">Nombre del evento *</label>
                    <input type="text" id="nombre_evento" name="nombre_evento" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Tipo de evento --}}
                <div>
                    <label for="tipo_evento" class="block text-sm font-medium text-gray-700">Tipo de evento *</label>
                    <select id="tipo_evento" name="tipo_evento" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Seleccionar...</option>
                        <option value="Feria">Feria</option>
                        <option value="Conferencia">Conferencia</option>
                        <option value="Congreso">Congreso</option>
                        <option value="Apertura">Apertura</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                {{-- Fecha del evento --}}
                <div>
                    <label for="fecha_evento" class="block text-sm font-medium text-gray-700">
                        Fecha y hora de evento *
                    </label>
                    <input type="datetime-local" id="fecha_evento" name="fecha_evento" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Duración --}}
                <div>
                    <label for="duracion" class="block text-sm font-medium text-gray-700">Duración *</label>
                    <input type="text" id="duracion" name="duracion" required placeholder="Ej: 2 horas" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Lugar --}}
                <div>
                    <label for="lugar" class="block text-sm font-medium text-gray-700">Lugar *</label>
                    <input type="text" id="lugar" name="lugar" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Cantidad estimada de niños --}}
                <div>
                    <label for="cantidad_ninos" class="block text-sm font-medium text-gray-700">Cantidad estimada de niños *</label>
                    <input type="number" id="cantidad_ninos" name="cantidad_ninos" required min="0" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Persona de contacto --}}
                <div>
                    <label for="persona_contacto" class="block text-sm font-medium text-gray-700">Persona de contacto *</label>
                    <input type="text" id="persona_contacto" name="persona_contacto" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Teléfono --}}
                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono *</label>
                    <input type="tel" id="telefono" name="telefono" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Correo --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico *</label>
                    <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            {{-- Necesidades especiales --}}
            <div>
                <label for="necesidades_especiales" class="block text-sm font-medium text-gray-700">Necesidades especiales</label>
                <textarea id="necesidades_especiales" name="necesidades_especiales" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500" placeholder="Indique si hay requerimientos especiales"></textarea>
            </div>

            {{-- Botón de envío --}}
            <div>
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Enviar Solicitud
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
