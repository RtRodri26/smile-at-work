<?php

namespace App\Services;

use Google\Client;
use Google\Service\Calendar;
use Carbon\Carbon;
use Google\Service\Calendar\Event as Google_Service_Calendar_Event;

class GoogleCalendarService
{
    private $service;
    private $calendarId;

    public function __construct()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google/service_account.json'));
        $client->addScope(Calendar::CALENDAR);
        $client->setSubject(config('services.google.service_account_email'));

        $this->service = new Calendar($client);
        $this->calendarId = config('services.google.calendar_id');
    }

    public function createEvent($summary, $description, $startDateTime, $endDateTime, $email = null)
    {
        $event = new Calendar\Event([
            'summary' => $summary,
            'description' => $description,
            'start' => ['dateTime' => $startDateTime, 'timeZone' => 'America/Lima'],
            'end'   => ['dateTime' => $endDateTime,   'timeZone' => 'America/Lima'],

        ]);

        return $this->service->events->insert($this->calendarId, $event);
    }

    public function createMeetEvent($title, $description, $start, $end, $calendarId = null, $attendeeEmail = null)
{
    // Generar link de meet manual
    $meetLink = "https://meet.google.com/new";

    $event = new Google_Service_Calendar_Event([
        'summary' => $title,
        'description' => $description,
        'start' => ['dateTime' => $start, 'timeZone' => 'America/Lima'],
        'end'   => ['dateTime' => $end,   'timeZone' => 'America/Lima'],
        'attendees' => $attendeeEmail ? [
            ['email' => $attendeeEmail]]:[],
    ]);

    // si no se pasa calendarId, usa el de la cuenta de servicio
    $calendarId = $calendarId ?? $this->calendarId;

    $inserted = $this->service->events->insert($this->calendarId, $event);

    $inserted->hangoutLink = $meetLink;

    return $inserted;
}


public function buildClientCalendarUrl(array $validated, string $startIso, string $endIso)
{
    // Convertir fechas ISO 8601 al formato que Google Calendar usa (YYYYMMDDTHHMMSSZ)
    $start = Carbon::parse($startIso)->format('Ymd\THis');
    $end   = Carbon::parse($endIso)->format('Ymd\THis');

    // Título del evento
    $title = urlencode("Reunión con " . $validated['nombre_empresa']);

    // Detalles del evento
    $details = urlencode(
        "Empresa: {$validated['nombre_empresa']}\n" .
        "Contacto: {$validated['persona_contacto']}\n" .
        "Correo: {$validated['email']}\n" .
        "Teléfono: {$validated['telefono']}\n" .
        "Servicio: {$validated['tipo_servicio']}\n" .
        "Colaboradores: {$validated['num_colaboradores']}\n" .
        "Mensaje: {$validated['mensaje_adicional']}"
    );

    // Construir URL del calendario para el cliente
    return "https://calendar.google.com/calendar/render?action=TEMPLATE" .
           "&text={$title}" .
           "&dates={$start}/{$end}" .
           "&details={$details}" .
           "&ctz=America/Lima";
}


public function buildUniversityClientCalendarUrl(array $validated, string $startIso, string $endIso)
{
    // Convertir fechas ISO 8601 al formato que Google Calendar usa (YYYYMMDDTHHMMSSZ)
    $start = Carbon::parse($startIso)->format('Ymd\THis');
    $end   = Carbon::parse($endIso)->format('Ymd\THis');

    // Título del evento
    $title = urlencode("Reunión con " . $validated['nombre_universidad']);

    // Detalles del evento
    $details = urlencode(
        "Universidad: {$validated['nombre_universidad']}\n" .
        "Área / Facultad: {$validated['area_facultad']}\n" .
        "Contacto: {$validated['persona_contacto']}\n" .
        "Correo: {$validated['email']}\n" .
        "Teléfono: {$validated['telefono']}\n" .
        "Tipo de servicio: {$validated['tipo_servicio']}\n" .
        "Comentarios: {$validated['comentarios']}"
    );

    // Construir URL del calendario para el cliente
    return "https://calendar.google.com/calendar/render?action=TEMPLATE" .
           "&text={$title}" .
           "&dates={$start}/{$end}" .
           "&details={$details}" .
           "&ctz=America/Lima";
}

public function buildEventClientCalendarUrl(array $validated, string $startIso, string $endIso)
{
    // Convertir fechas ISO 8601 al formato que Google Calendar usa (YYYYMMDDTHHMMSSZ)
    $start = Carbon::parse($startIso)->format('Ymd\THis');
    $end   = Carbon::parse($endIso)->format('Ymd\THis');

    // Título del evento
    $title = urlencode("Reunión con " . $validated['nombre_evento']);

    // Detalles del evento
    $details = urlencode(
        "Evento: {$validated['nombre_evento']}\n" .
        "Tipo de evento: {$validated['tipo_evento']}\n" .
        "Contacto: {$validated['persona_contacto']}\n" .
        "Correo: {$validated['email']}\n" .
        "Teléfono: {$validated['telefono']}\n" .
        "Duración: {$validated['duracion']}\n" .
        "Lugar: {$validated['lugar']}\n" .
        "Cantidad de niños: {$validated['cantidad_ninos']}\n" .
        "Necesidades especiales: {$validated['necesidades_especiales']}"
    );

    // Construir URL del calendario para el cliente
    return "https://calendar.google.com/calendar/render?action=TEMPLATE" .
           "&text={$title}" .
           "&dates={$start}/{$end}" .
           "&details={$details}" .
           "&ctz=America/Lima";
}

public function buildSolicitudClientCalendarUrl(array $validated, string $startIso, string $endIso)
{
    // Convertir fechas ISO 8601 al formato que Google Calendar usa (YYYYMMDDTHHMMSSZ)
    $start = Carbon::parse($startIso)->format('Ymd\THis');
    $end   = Carbon::parse($endIso)->format('Ymd\THis');

    // Título del evento
    $title = urlencode("Entrevista con " . $validated['nombre_completo']);

    // Detalles del evento
    $details = urlencode(
        "Postulante: {$validated['nombre_completo']}\n" .
        "Edad: {$validated['edad']}\n" .
        "Distrito: {$validated['distrito']}\n" .
        "Cargo postulado: {$validated['cargo']}\n" .
        "Disponibilidad: {$validated['disponibilidad']}\n" .
        "Experiencia: {$validated['experiencia']}\n" .
        "Correo: {$validated['email']}\n" .
        "Teléfono: {$validated['telefono']}\n"    );

    // Construir URL del calendario para el cliente
    return "https://calendar.google.com/calendar/render?action=TEMPLATE" .
           "&text={$title}" .
           "&dates={$start}/{$end}" .
           "&details={$details}" .
           "&ctz=America/Lima";
}


}
