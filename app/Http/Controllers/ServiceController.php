<?php

namespace App\Http\Controllers;

use App\Models\CompanyService;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompanyRequestConfirmation;


class ServiceController extends Controller
{
    // Mostrar formulario para empresa
    public function createCompany()
    {
        return view('services.company.create');
    }

    // Guardar solicitud de empresa
    public function storeCompany(Request $request)
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
        'user_id' => auth()->id() ?? 1,
    ]);

    // Crear la cita asociada
    $appointment = Appointment::create([
        'company_service_id' => $companyService->id,
        'user_id' => auth()->id() ?? 1,
        'service_type' => CompanyService::class,
        'service_id' => $companyService->id,
        'fecha_hora' => $validated['fecha_hora'],
        'mensaje_adicional' => $validated['mensaje_adicional'],
        'estado' => 'pendiente',
    ]);

    // Enviar correo de confirmación - Asegúrate de pasar los objetos, no IDs
    //Mail::to($companyService->email)->send(new CompanyRequestConfirmation($companyService, $appointment));

    return redirect()->route('services.company.success')
                     ->with('success', 'Solicitud enviada correctamente.');
}

    // Página de éxito
    public function success()
    {
        return view('services.company.success');
    }
}