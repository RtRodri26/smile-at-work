<?php

namespace App\Helpers;

use Carbon\Carbon;

class MailHelper
{
    /**
     * Arma los datos para enviar correo de cita según tipo de servicio y usuario
     *
     * @param array $validated Datos validados del request
     * @param string $tipoServicio 'empresa', 'universidad' o 'evento'
     * @param string $tipoUsuario 'cliente' o 'admin'
     * @param string|null $meetLink Link de Google Meet
     * @return array
     */
    public static function armarDatosCorreo(array $validated, string $tipoServicio, string $tipoUsuario = 'cliente', string $meetLink = null): array
{
    $fecha = null;
    if (isset($validated['fecha_hora'])) {
        $fecha = Carbon::parse($validated['fecha_hora']);
    } elseif (isset($validated['fecha_evento'])) {
        $fecha = Carbon::parse($validated['fecha_evento']);
    } elseif (isset($validated['fecha_estimado'])) {
        $fecha = Carbon::parse($validated['fecha_estimado']);
    }
    $fecha = $fecha ? $fecha->timezone('America/Lima') : now();

    $nombreEmpresa = $validated['nombre_empresa'] ?? $validated['nombre_evento'] ?? $validated['nombre_universidad'] ?? 'N/A';

    // Datos base
    $datos = [
        'tipo_usuario' => $tipoUsuario,
        'empresa'      => $nombreEmpresa,
        'meetLink'     => $meetLink,
        'fecha'        => $fecha->format('Y-m-d'),
        'hora'         => $fecha->format('H:i'),
        'tipo_servicio'=> $validated['tipo_servicio'] ?? $validated['tipo_evento'] ?? null,
        'detalle'      => $validated['mensaje_adicional'] ?? $validated['comentarios'] ?? $validated['necesidades_especiales'] ?? null,
    ];

    if ($tipoUsuario === 'cliente') {
        // Datos específicos para el cliente
        $datos['nombre']  = $validated['persona_contacto'] ?? 'Cliente';
        $datos['cargo']   = $validated['cargo'] ?? null;
    } elseif ($tipoUsuario === 'admin') {
        // Datos específicos para el admin (información completa del cliente)
        $datos['nombre']           = 'Administrador';
        $datos['persona_contacto'] = $validated['persona_contacto'] ?? null;
        $datos['cargo']            = $validated['cargo'] ?? null;
        $datos['telefono']         = $validated['telefono'] ?? null;
        $datos['email']            = $validated['email'] ?? null;
        $datos['num_colaboradores']= $validated['num_colaboradores'] ?? null;
    }

    return $datos;
}

}
