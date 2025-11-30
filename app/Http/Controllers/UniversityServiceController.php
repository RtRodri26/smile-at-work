<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\UniversityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CitaAgendada;
use Illuminate\Support\Facades\Http;
use App\Services\GoogleCalendarService;
use Carbon\Carbon;
use App\Helpers\MailHelper;

class UniversityServiceController extends Controller
{
    private $calendar;

    public function __construct(GoogleCalendarService $calendar)
    {
        $this->calendar = $calendar;
    }

    // Mostrar formulario
    public function create()
    {
        return view('services.university.create');
    }

    // Guardar solicitud
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_universidad' => 'required|string|max:255',
            'area_facultad'      => 'required|string|max:255',
            'persona_contacto'   => 'required|string|max:255',
            'email'              => 'required|email',
            'telefono'           => 'required|string|max:20',
            'tipo_servicio'      => 'required|in:Por horas,Permanente,Por evento',
            'fecha_estimado'     => 'required|date',
            'comentarios'        => 'nullable|string',
        ]);

        // Guardar en la base de datos
        $universityService = UniversityService::create([
            'user_id'             => auth()->id() ?? 1,
            'nombre_universidad'  => $validated['nombre_universidad'],
            'area_facultad'       => $validated['area_facultad'],
            'persona_contacto'    => $validated['persona_contacto'],
            'email'               => $validated['email'],
            'telefono'            => $validated['telefono'],
            'tipo_servicio'       => $validated['tipo_servicio'],
            'fecha_estimada'      => $validated['fecha_estimado'],
            'comentarios'         => $validated['comentarios'],
            'estado'              => 'Pendiente',
        ]);

        // Preparar fechas para cita
        $fecha = Carbon::parse($validated['fecha_estimado'])->timezone('America/Lima');
        $start = $fecha->toIso8601String();
        $end   = $fecha->copy()->addHour()->toIso8601String();

        // Generar link de Meet
        $meetLink = "https://meet.google.com/new";

        // Crear Appointment
        $appointment = Appointment::create([
            'company_service_id' => $universityService->id,
            'service_type' => UniversityService::class,
            'service_id'   => $universityService->id,
            'user_id'      => auth()->id() ?? 1,
            'fecha_hora'   => $validated['fecha_estimado'],
            'estado'       => 'Pendiente',
            'link_meet'    => $meetLink,
        ]);

        // Enviar datos a Google Forms
    //     Http::asForm()->post(
    //          "https://docs.google.com/forms/d/e/1FAIpQLSek8WXVuZb8w_XNjMdtnyx_kZmICiTVmKdKxVsqQE-zfIORRw/formResponse",
    // [
    //     "entry.869764052"   => $request->nombre_universidad,
    //     "entry.2097108218"  => $request->area_facultad,
    //     "entry.1585850004"  => $request->persona_contacto,
    //     "entry.406786088"   => $request->email,
    //     "entry.367926774"   => $request->telefono,
    //     "entry.1208678419"  => $request->tipo_servicio,
    //     "entry.559174007"   => $request->fecha_estimado,
    //     "entry.2007732100"  => $request->comentarios,
    // ]
    //     );

    Http::asForm()->post(
             "https://docs.google.com/forms/d/e/1FAIpQLScyIU8y9zTO0N4aLQTfjGT4QQK9vVyAZ36vcrhe21mqeDD28A/formResponse",
    [
        "entry.618884553"   => $request->nombre_universidad,
        "entry.1609623055"  => $request->area_facultad,
        "entry.2068782042"  => $request->persona_contacto,
        "entry.1372832319"   => $request->email,
        "entry.1679556401"   => $request->telefono,
        "entry.883898500"  => $request->tipo_servicio,
        "entry.1114992071"   => $request->fecha_estimado,
        "entry.842406466"  => $request->comentarios,
    ]
        );

        // Enviar correo al cliente (universidad)
        // Mail::to($validated['email'])->send(new CitaAgendada([
        //     'nombre'   => $validated['persona_contacto'],
        //     'fecha'    => $fecha->format('Y-m-d'),
        //     'hora'     => $fecha->format('H:i'),
        //     'empresa'  => $validated['nombre_universidad'],
        //     'meetLink' => $meetLink,
        //     'tipo_usuario' => 'cliente',
        //     'detalle' => $validated['comentarios'],
        // ]));

        Mail::to($validated['email'])->send(
            new CitaAgendada(MailHelper::armarDatosCorreo($validated, 'universidad', 'cliente', $meetLink))
        );

        // Crear evento en Google Calendar para admin
        $adminEmail = config('mail.admin_email');
        $adminEvent = $this->calendar->createMeetEvent(
            "Solicitud Universidad: {$validated['nombre_universidad']}",
            "Universidad: {$validated['nombre_universidad']}\n".
            "Área/Facultad: {$validated['area_facultad']}\n".
            "Contacto: {$validated['persona_contacto']}\n".
            "Correo: {$validated['email']}\n".
            "Teléfono: {$validated['telefono']}\n".
            "meetLink: {$meetLink}\n".
            "Tipo de servicio: {$validated['tipo_servicio']}\n".
            "Comentarios: {$validated['comentarios']}",
            $start,
            $end,
            $adminEmail
        );

        // Enviar correo a admin
        // Mail::to($adminEmail)->send(new CitaAgendada([
        //     'nombre'   => 'Administrador',
        //     'fecha'    => $fecha->format('Y-m-d'),
        //     'hora'     => $fecha->format('H:i'),
        //     'empresa'  => $validated['nombre_universidad'],
        //     'telefono' => $validated['telefono'],
        //     'email'    => $validated['email'],
        //     'cargo'    => null,
        //     'tipo_servicio' => $validated['tipo_servicio'],
        //     'num_colaboradores' => null,
        //     'persona_contacto' => $validated['persona_contacto'],
        //     'mensaje_adicional' => $validated['comentarios'],
        //     'meetLink' => $meetLink,
        //     'tipo_usuario' => 'admin',
        //     'detalle' => $validated['comentarios'],
        // ]));


        Mail::to(config('mail.admin_email'))->send(
            new CitaAgendada(MailHelper::armarDatosCorreo($validated, 'universidad', 'admin', $meetLink))
        );

        $calendarUrl = $this->calendar->buildUniversityClientCalendarUrl(
            $validated,
            $start,
            $end
        );

        return redirect()
            ->route('services.university.success')
            ->with('success', 'Solicitud enviada correctamente.')
            ->with('calendar_url', $calendarUrl);
    }

    public function success()
    {
        return view('services.university.success')
            ->with('calendar_url', session('calendar_url'));
    }
}
