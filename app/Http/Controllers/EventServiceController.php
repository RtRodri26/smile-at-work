<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\EventService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CitaAgendada;
use Illuminate\Support\Facades\Http;
use App\Services\GoogleCalendarService;
use Carbon\Carbon;
use App\Helpers\MailHelper;


class EventServiceController extends Controller
{
    private $calendar;

    public function __construct(GoogleCalendarService $calendar)
    {
        $this->calendar = $calendar;
    }

    // Mostrar formulario
    public function create()
    {
        return view('services.event.create');
    }

    // Guardar solicitud
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_evento' => 'required|string',
            'tipo_evento' => 'required|string',
            'fecha_evento' => 'required|date',
            'duracion' => 'required|string',
            'lugar' => 'required|string',
            'cantidad_ninos' => 'required|integer|min:0',
            'persona_contacto' => 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|email',
            'necesidades_especiales' => 'nullable|string',
        ]);

        // Guardar en la base de datos
        $eventService = EventService::create([
            'user_id'             => auth()->id() ?? 1,
            'nombre_evento'  => $validated['nombre_evento'],
            'tipo_evento'       => $validated['tipo_evento'],
            'fecha_evento'    => $validated['fecha_evento'],
            'duracion'            => $validated['duracion'],
            'lugar'               => $validated['lugar'],
            'cantidad_ninos'      => $validated['cantidad_ninos'],
            'persona_contacto'    => $validated['persona_contacto'],
            'email'               => $validated['email'],
            'telefono'            => $validated['telefono'],
            'necesidades_especiales' => $validated['necesidades_especiales'],
            'estado'              => 'Pendiente',
        ]);

        // Preparar fechas para cita
        $fecha = Carbon::parse($validated['fecha_evento'])->timezone('America/Lima');
        $start = $fecha->toIso8601String();
        $end   = $fecha->copy()->addHour()->toIso8601String();

        // Generar link de Meet
        $meetLink = "https://meet.google.com/new";

        // Crear Appointment
        $appointment = Appointment::create([
            'company_service_id' => $eventService->id,
            'service_type' => EventService::class,
            'service_id'   => $eventService->id,
            'user_id'      => auth()->id() ?? 1,
            'fecha_hora'   => $validated['fecha_evento'],
            'estado'       => 'Pendiente',
            'link_meet'    => $meetLink,
        ]);

        // Enviar datos a Google Forms
        Http::asForm()->post(
             "https://docs.google.com/forms/d/e/1FAIpQLSfitQ1a0iSIbU6HP16799xXQWk9Ll6N5riu6UZ3PufnNC_EKw/formResponse",
    [
        "entry.27074974"   => $request->nombre_evento,
        "entry.530239391"  => $request->tipo_evento,
        "entry.1120404175"  => $request->fecha_evento,
        "entry.1892985053"   => $request->duracion,
        "entry.625890627"   => $request->lugar,
        "entry.158880118"  => $request->cantidad_ninos,
        "entry.472556606"   => $request->persona_contacto,
        "entry.1356413125"  => $request->telefono,
        "entry.845165181"  => $request->email,
        "entry.1888422063"  => $request->necesidades_especiales,
    ]
        );

        // Enviar correo al cliente (evento)
        // Mail::to($validated['email'])->send(new CitaAgendada([
        //     'nombre'   => $validated['persona_contacto'],
        //     'fecha'    => $fecha->format('Y-m-d'),
        //     'hora'     => $fecha->format('H:i'),
        //     'empresa'  => $validated['nombre_evento'],
        //     'meetLink' => null,
        //     'tipo_usuario' => 'cliente',
        //     'detalle' => $validated['necesidades_especiales'],
        // ]));

        Mail::to($validated['email'])->send(
            new CitaAgendada(MailHelper::armarDatosCorreo($validated, 'evento', 'cliente'))
        );

        // Crear evento en Google Calendar para admin
        $adminEmail = config('mail.admin_email');
        $adminEvent = $this->calendar->createMeetEvent(
            "Solicitud Evento: {$validated['nombre_evento']}",
            "Evento: {$validated['nombre_evento']}\n".
            "Tipo de evento: {$validated['tipo_evento']}\n".
            "Contacto: {$validated['persona_contacto']}\n".
            "Duración: {$validated['duracion']}\n".
            "Lugar: {$validated['lugar']}\n".
            "Cantidad de niños: {$validated['cantidad_ninos']}\n".
            "Correo: {$validated['email']}\n".
            "meetLink: {$meetLink}\n".
            "Teléfono: {$validated['telefono']}\n".
            "Comentarios: {$validated['necesidades_especiales']}",

            $start,
            $end,
            $adminEmail
        );

        // Enviar correo a admin
        // Mail::to($adminEmail)->send(new CitaAgendada([
        //     'nombre'   => 'Administrador',
        //     'fecha'    => $fecha->format('Y-m-d'),
        //     'hora'     => $fecha->format('H:i'),
        //     'empresa'  => $validated['nombre_evento'],
        //     'telefono' => $validated['telefono'],
        //     'email'    => $validated['email'],
        //     'cargo'    => null,
        //     'tipo_servicio' => $validated['tipo_evento'],
        //     'num_colaboradores' => null,
        //     'persona_contacto' => $validated['persona_contacto'],
        //     'mensaje_adicional' => $validated['necesidades_especiales'],
        //     'meetLink' => $meetLink,
        //     'tipo_usuario' => 'admin',
        //     'detalle' => $validated['necesidades_especiales'],
        // ]));

        Mail::to(config('mail.admin_email'))->send(
            new CitaAgendada(MailHelper::armarDatosCorreo($validated, 'evento', 'admin', $meetLink))
        );

        $calendarUrl = $this->calendar->buildEventClientCalendarUrl(
            $validated,
            $start,
            $end
        );

        return redirect()
            ->route('services.event.success')
            ->with('success', 'Solicitud enviada correctamente.')
            ->with('calendar_url', $calendarUrl);
    }

    public function success()
    {
        return view('services.event.success')
            ->with('calendar_url', session('calendar_url'));
    }
}
