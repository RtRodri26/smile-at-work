<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Services\GoogleCalendarService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Mail\SolicitudAgendada;

class JobApplicationController extends Controller
{
    private $calendar;

    public function __construct(GoogleCalendarService $calendar)
    {
        $this->calendar = $calendar;
    }

    // Mostrar formulario
    public function create()
    {
        return view('services.job.application.create');
    }

    // Guardar solicitud
    public function store(Request $request)
    {
        $validated = $request->validate([
    'nombre_completo'  => 'required|string|max:255',
    'edad'             => 'required|integer|min:18',
    'distrito'         => 'required|string|max:100',
    'cargo'            => 'required|string|in:Educadora,Auxiliar,Practicante',
    'disponibilidad'   => 'required|string|max:255',
    'experiencia'      => 'required|string',
    'cv'               => 'required|file|mimes:pdf|max:2048', // max 2MB
    'telefono'         => 'required|string|max:20',
    'email'            => 'required|email|max:255',
    'fecha_entrevista' => 'nullable|date', 
    'comentarios_admin' => 'nullable|string', // opcional si se agenda entrevista
]);

        $cvPath = $request->file('cv')->store('cvs', 'public');
        // Guardar en la base de datos
        $eventService = JobApplication::create([
            'user_id'             => auth()->id() ?? 1,
            'nombre_completo'  => $validated['nombre_completo'],
            'edad'       => $validated['edad'],
            'distrito'    => $validated['distrito'],
            'cargo'            => $validated['cargo'],
            'disponibilidad'            => $validated['disponibilidad'],
            'experiencia'               => $validated['experiencia'],
            'cv_path'      => $cvPath,
            'telefono'            => $validated['telefono'],
            'email'               => $validated['email'],
            'fecha_entrevista' => $validated['fecha_entrevista'],
            'estado'              => 'Pendiente',   
        ]);

        // Preparar fechas para cita
        $fecha = Carbon::parse($validated['fecha_entrevista'])->timezone('America/Lima');
        $start = $fecha->toIso8601String();
        $end   = $fecha->copy()->addHour()->toIso8601String();

        // Generar link de Meet
        $meetLink = "https://meet.google.com/new";

        // Crear Appointment
        $appointment = Appointment::create([
            'company_service_id' => $eventService->id,
            'service_type' => JobApplication::class,
            'service_id'   => $eventService->id,
            'user_id'      => auth()->id() ?? 1,
            'fecha_hora'   => $validated['fecha_entrevista'],
            'estado'       => 'Pendiente',
            'link_meet'    => $meetLink,
        ]);

       // Enviar datos a Google Forms
        Http::asForm()->post(
             "https://docs.google.com/forms/d/e/1FAIpQLSe_d5N2Mbd57l3tS_o3gdrZ6Loo34u7BImYuXJn8AgaYHWkNA/formResponse",
    [
        "entry.1990155931"   => $request->nombre_completo,
        "entry.840833559"  => $request->edad,
        "entry.1348487280"  => $request->distrito,
        "entry.1932684074"   => $request->cargo,
        "entry.1568097584"   => $request->disponibilidad,
        "entry.521983805"  => $request->experiencia,
        "entry.1547635733"   => $request->cv,
        "entry.622337295"  => $request->telefono,
        "entry.1270076324"  => $request->email,
        "entry.205231113"  => $request->fecha_entrevista,
    ]
        );

        // Enviar correo al cliente (evento)
        Mail::to($validated['email'])->send(new SolicitudAgendada([
            'nombre'   => $validated['nombre_completo'],
            'fecha'    => $fecha->format('Y-m-d'),
            'hora'     => $fecha->format('H:i'),
            'cargo'  => $validated['cargo'],
            'meetLink' => null,
            'tipo_usuario' => 'cliente',
            'cv' => asset('storage/'.$cvPath),
            'telefono' => $validated['telefono'],
            'email' => $validated['email'],
            'fecha_entrevista' => $validated['fecha_entrevista'],
            'experiencia' => $validated['experiencia'],
            'detalle' => $validated['experiencia'],
        ]));

        // Crear evento en Google Calendar para admin
        $adminEmail = config('mail.admin_email');
        $adminEvent = $this->calendar->createMeetEvent(
            "Solicitud Entrevista: {$validated['nombre_completo']}",
            "Entrevista: {$validated['nombre_completo']}\n".
            "Edad: {$validated['edad']}\n".
            "Distrito: {$validated['distrito']}\n".
            "Cargo solicitado: {$validated['cargo']}\n".
            "Disponibilidad: {$validated['disponibilidad']}\n".
            "Experiencia: {$validated['experiencia']}\n".
            "Correo: {$validated['email']}\n".
            "Teléfono: {$validated['telefono']}\n".
            "meetLink: {$meetLink}\n",
            $start,
            $end,
            $adminEmail
        );

        // Enviar correo a admin
        Mail::to($adminEmail)->send(new SolicitudAgendada([
            'nombre'   => 'Administrador',
            'fecha'    => $fecha->format('Y-m-d'),
            'hora'     => $fecha->format('H:i'),
            'edad'     => $validated['edad'],
            'distrito' => $validated['distrito'],   
            'cargo'  => $validated['cargo'],
            'disponibilidad' => $validated['disponibilidad'],
            'experiencia' => $validated['experiencia'],
            'telefono' => $validated['telefono'],
            'email'    => $validated['email'],
            'persona_contacto' => $validated['nombre_completo'],
            'mensaje_adicional' => $validated['experiencia'],
            'fecha_entrevista' => $validated['fecha_entrevista'],
            'meetLink' => $meetLink,
            'tipo_usuario' => 'admin',
            'cv' => asset('storage/'.$cvPath),
            'detalle' => $validated['experiencia'],
        ]));

        $calendarUrl = $this->calendar->buildSolicitudClientCalendarUrl(
            $validated,
            $start,
            $end
        );

        return redirect()
            ->route('services.job.application.success')
            ->with('success', 'Solicitud enviada correctamente.')
            ->with('calendar_url', $calendarUrl);
    }

    public function success()
    {
        return view('services.job.application.success')
            ->with('calendar_url', session('calendar_url'));
    }
}
