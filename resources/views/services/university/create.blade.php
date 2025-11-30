@extends('layouts.app')

@section('title', 'Solicitud de Servicio para Universidades - Smile At Work')
@section('page-title', 'Solicitud de Servicio para Universidades')
@section('page-subtitle', 'Complete el formulario para solicitar nuestros servicios')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full bg-white rounded-lg shadow-md p-6">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Solicitud de Servicio para Universidades</h2>
            <p class="mt-2 text-sm text-gray-600">Complete el formulario para solicitar nuestros servicios</p>
        </div>

        <form action="{{ route('services.university.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Nombre Universidad --}}
                <div>
                    <label for="nombre_universidad" class="block text-sm font-medium text-gray-700">Nombre de la universidad *</label>
                    <input type="text" id="nombre_universidad" name="nombre_universidad" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Área / Facultad --}}
                <div>
                    <label for="area_facultad" class="block text-sm font-medium text-gray-700">Área / Facultad *</label>
                    <input type="text" id="area_facultad" name="area_facultad" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Persona Contacto --}}
                <div>
                    <label for="persona_contacto" class="block text-sm font-medium text-gray-700">Persona de contacto *</label>
                    <input type="text" id="persona_contacto" name="persona_contacto" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico *</label>
                    <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Teléfono --}}
                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono *</label>
                    <input type="tel" id="telefono" name="telefono" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Tipo de Servicio --}}
                <div>
                    <label for="tipo_servicio" class="block text-sm font-medium text-gray-700">Tipo de servicio *</label>
                    <select id="tipo_servicio" name="tipo_servicio" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Seleccionar...</option>
                        <option value="Por horas">Por horas</option>    
                        <option value="Permanente">Permanente</option>
                        <option value="Por evento">Por evento</option>
                    </select>
                </div>

                {{-- Fecha estimada --}}
                <div>
                    <label for="fecha_estimado" class="block text-sm font-medium text-gray-700">
                        Fecha y hora de cita *
                    </label>
                    <input type="datetime-local" id="fecha_estimado" name="fecha_estimado" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            {{-- Comentarios --}}
            <div>
                <label for="comentarios" class="block text-sm font-medium text-gray-700">Comentarios</label>
                <textarea id="comentarios" name="comentarios" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500" placeholder="Describa brevemente sus necesidades..."></textarea>
            </div>

            {{-- Botón de Envío --}}
            <div>
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Enviar Solicitud
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
