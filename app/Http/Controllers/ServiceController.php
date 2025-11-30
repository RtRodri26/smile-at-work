<?php

namespace App\Http\Controllers;

use App\Models\CompanyService;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CitaAgendada;
use Illuminate\Support\Facades\Http;
use App\Services\GoogleCalendarService;
use Carbon\Carbon;

class ServiceController extends Controller
{
    private $calendar;

    public function __construct(GoogleCalendarService $calendar)
    {
        $this->calendar = $calendar;
    }


    public function createCompany()
    {
        return view('services.company.create');
    }


    public function storeCompany(Request $request)
    {
        // ---------------------------------------------------
        // 1. VALIDAR REQUEST
        // ---------------------------------------------------
        $validated = $request->validate([
            'nombre_empresa'      => 'required|string|max:255',
            'persona_contacto'    => 'required|string|max:255',
            'cargo'               => 'required|string|max:255',
            'email'               => 'required|email',
            'telefono'            => 'required|string|max:20',
            'num_colaboradores'   => 'required|integer|min:1',
            'tipo_servicio'       => 'required|in:Permanente,Por evento',
            'fecha_hora'          => 'required|date',
            'mensaje_adicional'   => 'nullable|string',
        ]);

        // ---------------------------------------------------
        // 2. REGISTRO BASE DE DATOS
        // ---------------------------------------------------
        $companyService = CompanyService::create([
            'nombre_empresa'     => $validated['nombre_empresa'],
            'persona_contacto'   => $validated['persona_contacto'],
            'cargo'              => $validated['cargo'],
            'email'              => $validated['email'],
            'telefono'           => $validated['telefono'],
            'num_colaboradores'  => $validated['num_colaboradores'],
            'tipo_servicio'      => $validated['tipo_servicio'],
            'mensaje_adicional'  => $validated['mensaje_adicional'],
            'user_id'            => auth()->id() ?? 1,
        ]);

        $fecha = Carbon::parse($validated['fecha_hora'])->timezone('America/Lima');
        $start = $fecha->toIso8601String();
        $end   = $fecha->copy()->addHour()->toIso8601String();

        // 3. Generar link de Meet manual
        $meetLink = "https://meet.google.com/new";

        $appointment = Appointment::create([
            'company_service_id' => $companyService->id,
            'user_id'            => auth()->id() ?? 1,
            'service_type'       => CompanyService::class,
            'service_id'         => $companyService->id,
            'fecha_hora'         => $validated['fecha_hora'],
            'mensaje_adicional'  => $validated['mensaje_adicional'],
            'estado'             => 'pendiente',
            'link_meet'          => $meetLink, // null para cliente
        ]);


        // ---------------------------------------------------
        // 5. ENVIAR GOOGLE FORMS
        // ---------------------------------------------------
        Http::asForm()->post(
            "https://docs.google.com/forms/d/e/1FAIpQLSf1OmG1EUZFaM43FOc_BE_apV5zC9BLhWEcYIxop8uAiD_Jow/formResponse",
            [
                "entry.261398419"  => $validated['nombre_empresa'],
                "entry.136904738"  => $validated['persona_contacto'],
                "entry.1395866429" => $validated['cargo'],
                "entry.992963390"  => $validated['email'],
                "entry.1849773656" => $validated['telefono'],
                "entry.215061745"  => $validated['num_colaboradores'],
                "entry.68088871"   => $validated['tipo_servicio'],
                "entry.589867778"  => $validated['fecha_hora'],
                "entry.199205871"  => $validated['mensaje_adicional'],
            ]
        );

        // ---------------------------------------------------
        // 6. ENVIAR CORREO
        // ---------------------------------------------------
        // Mail::to($validated['email'])->send(new CitaAgendada([
        //     'nombre'   => $validated['persona_contacto'],
        //     'fecha'    => $fecha->format('Y-m-d'),
        //     'hora'     => $fecha->format('H:i'),
        //     'empresa'  => $validated['nombre_empresa'],
        //     'meetLink' => null,
        //     'tipo_usuario' => 'cliente',
        //     'detalle' => $validated['mensaje_adicional'],
        // ]));


Mail::to($validated['email'])->send(
    new CitaAgendada(MailHelper::armarDatosCorreo($validated, 'empresa', 'cliente'))
);

        // 5. Enviar correo al ADMIN (con link)
    $adminEmail = config('mail.admin_email'); // puedes definirlo en .env
    $adminEvent = $this->calendar->createMeetEvent(
    "Reunión con {$validated['nombre_empresa']}",
    "Empresa: {$validated['nombre_empresa']}\nContacto: {$validated['persona_contacto']}\nCargo: {$validated['cargo']}\nCorreo: {$validated['email']}\nTeléfono: {$validated['telefono']}\nServicio: {$validated['tipo_servicio']}\nColaboradores: {$validated['num_colaboradores']}\nMensaje: {$validated['mensaje_adicional']}",
    $start,
    $end,
    $adminEmail
);
    // Mail::to($adminEmail)->send(new CitaAgendada([
    //     'nombre'   => 'Administrador',
    //     'fecha'    => $fecha->format('Y-m-d'),
    //     'hora'     => $fecha->format('H:i'),
    //     'empresa'  => $validated['nombre_empresa'],
    //     'telefono' => $validated['telefono'],
    //     'email'    => $validated['email'],
    //     'cargo'    => $validated['cargo'],
    //     'tipo_servicio' => $validated['tipo_servicio'],
    //     'num_colaboradores' => $validated['num_colaboradores'],
    //     'persona_contacto' => $validated['persona_contacto'],
    //     'mensaje_adicional' => $validated['mensaje_adicional'],
    //     'meetLink' => $meetLink,
    //     'tipo_usuario' => 'admin',
    //     'detalle' => $validated['mensaje_adicional'],
    // ]));

Mail::to(config('mail.admin_email'))->send(
    new CitaAgendada(MailHelper::armarDatosCorreo($validated, 'empresa', 'admin', $meetLink))
);
        // ---------------------------------------------------
        // 7. URL PARA EL CALENDARIO DEL CLIENTE (OPCIONAL)
        // ---------------------------------------------------
        $calendarUrl = $this->calendar->buildClientCalendarUrl(
            $validated,
            $start,
            $end
        );

        // ---------------------------------------------------
        // 8. REDIRIGIR CON ÉXITO
        // ---------------------------------------------------
        return redirect()
            ->route('services.company.success')
            ->with('success', 'Solicitud enviada correctamente.')
            ->with('calendar_url', $calendarUrl);
    }

    public function success()
    {
        return view('services.company.success');
    }
}
