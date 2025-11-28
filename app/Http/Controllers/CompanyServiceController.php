<?php

namespace App\Http\Controllers;

use App\Models\CompanyService;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompanyRequestConfirmation;

class CompanyServiceController extends Controller
{
    public function create()
    {
        return view('company-services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'persona_contacto' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'required|string|max:20',
            'num_colaboradores' => 'required|integer|min:1',
            'tipo_servicio' => 'required|in:Permanente,Por evento',
            'fecha_hora' => 'required|date',
            'mensaje_adicional' => 'nullable|string',
        ]);

        // Crear el servicio de la empresa
        $companyService = CompanyService::create([
            'nombre_empresa' => $validated['nombre_empresa'],
            'persona_contacto' => $validated['persona_contacto'],
            'cargo' => $validated['cargo'],
            'email' => $validated['email'],
            'telefono' => $validated['telefono'],
            'num_colaboradores' => $validated['num_colaboradores'],
            'tipo_servicio' => $validated['tipo_servicio'],
            'mensaje_adicional' => $validated['mensaje_adicional'],
        ]);

        // Crear la cita
        $appointment = Appointment::create([
            'company_service_id' => $companyService->id,
            'user_id' => Auth::id() ?? null, // Si está logueado, se asigna, sino null (o podrías ajustar según tu lógica de negocio)
            'fecha_hora' => $validated['fecha_hora'],
            'service_type' => CompanyService::class,
            'service_id' => $companyService->id,
            'mensaje_adicional' => $validated['mensaje_adicional'],
            'estado' => 'Pendiente',
        ]);

        // Enviar correo de confirmación
        Mail::to($companyService->email)->send(new CompanyRequestConfirmation($companyService, $appointment));

        // Generar link de Google Meet (aquí iría la lógica real, por ahora un placeholder)
        $meetLink = $this->generateMeetLink($appointment);

        // Podrías guardar el meetLink en la cita si lo deseas
        // $appointment->update(['meet_link' => $meetLink]);

        return redirect()->route('company-services.success')
                         ->with('success', 'Solicitud enviada correctamente. Te hemos enviado un correo de confirmación.');
    }

    private function generateMeetLink(Appointment $appointment)
    {
        // Lógica para generar Google Meet
        // Por ahora, retornamos un enlace placeholder
        return "https://meet.google.com/new?hs=191&tok=" . str_random(10);
    }
}