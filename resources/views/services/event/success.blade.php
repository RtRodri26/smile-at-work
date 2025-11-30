@extends('layouts.app')

@section('title', 'Solicitud de Servicio para Eventos - Smile At Work')
@section('page-title', 'Solicitud de Servicio para Eventos')
@section('page-subtitle', 'Gracias por tu solicitud. Te hemos enviado un correo de confirmación.')

@section('content')
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-white rounded-lg shadow-md p-6 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h2 class="mt-4 text-2xl font-bold text-gray-900">¡Solicitud Enviada!</h2>
            <p class="mt-2 text-sm text-gray-600">Hemos recibido tu solicitud correctamente. Te hemos enviado un correo de confirmación.</p>
            
           @if(session('calendar_url'))
    <div class="mt-4">
        <a href="{{ session('calendar_url') }}" target="_blank"
           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700">
            Agregar evento a Google Calendar
        </a>
    </div>
@endif


            
            <div class="mt-6">
                <a href="{{ route('services.event.create') }}" 
                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Nueva Solicitud de Evento
                </a>
            </div>
        </div>
    </div>
@endsection