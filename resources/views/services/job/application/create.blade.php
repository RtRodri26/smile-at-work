@extends('layouts.app')

@section('title', 'Trabaja con Nosotros - Smile At Work')
@section('page-title', 'Postulación Laboral')
@section('page-subtitle', 'Complete el formulario para postular a un cargo')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full bg-white rounded-lg shadow-md p-6">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">Postulación Laboral</h2>
            <p class="mt-2 text-sm text-gray-600">Complete el formulario para unirse a nuestro equipo</p>
        </div>

        <form action="{{ route('job.application.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Nombre completo --}}
                <div>
                    <label for="nombre_completo" class="block text-sm font-medium text-gray-700">Nombre completo *</label>
                    <input type="text" id="nombre_completo" name="nombre_completo" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Edad --}}
                <div>
                    <label for="edad" class="block text-sm font-medium text-gray-700">Edad *</label>
                    <input type="number" id="edad" name="edad" required min="18" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Distrito --}}
                <div>
                    <label for="distrito" class="block text-sm font-medium text-gray-700">Distrito *</label>
                    <input type="text" id="distrito" name="distrito" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Cargo --}}
                <div>
                    <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo al que postula *</label>
                    <select id="cargo" name="cargo" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Seleccionar...</option>
                        <option value="Educadora">Educadora</option>
                        <option value="Auxiliar">Auxiliar</option>
                        <option value="Practicante">Practicante</option>
                    </select>
                </div>

                {{-- Disponibilidad --}}
                <div>
                    <label for="disponibilidad" class="block text-sm font-medium text-gray-700">Disponibilidad horaria *</label>
                    <input type="text" id="disponibilidad" name="disponibilidad" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500" placeholder="Ej: Lunes a Viernes 8am-5pm">
                </div>

                {{-- Experiencia --}}
                <div class="md:col-span-2">
                    <label for="experiencia" class="block text-sm font-medium text-gray-700">Experiencia breve *</label>
                    <textarea id="experiencia" name="experiencia" rows="4" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500" placeholder="Describa brevemente su experiencia laboral"></textarea>
                </div>

                {{-- CV --}}
                <div class="md:col-span-2">
                    <label for="cv" class="block text-sm font-medium text-gray-700">Adjuntar CV (PDF) *</label>
                    <input type="file" id="cv" name="cv" accept="application/pdf" required class="mt-1 block w-full text-sm text-gray-600">
                </div>

                {{-- Teléfono --}}
                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono *</label>
                    <input type="tel" id="telefono" name="telefono" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Correo electrónico --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico *</label>
                    <input type="email" id="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-3 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Fecha de entrevista (opcional) --}}
                <div>
                    <label for="fecha_entrevista" class="block text-sm font-medium text-gray-700">
                        Fecha y hora de entrevista *
                    </label>
                    <input type="datetime-local" id="fecha_entrevista" name="fecha_entrevista" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            {{-- Botón de envío --}}
            <div>
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Enviar Postulación
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
