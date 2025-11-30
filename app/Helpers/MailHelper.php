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
        // Determinar la fecha según el tipo de formulario
        $fecha = null;
        if (isset($validated['fecha_hora'])) {
            $fecha = Carbon::parse($validated['fecha_hora']);
        } elseif (isset($validated['fecha_evento'])) {
            $fecha = Carbon::parse($validated['fecha_evento']);
        } elseif (isset($validated['fecha_estimado'])) {
            $fecha = Carbon::parse($validated['fecha_estimado']);
        }
        $fecha = $fecha ? $fecha->timezone('America/Lima') : now();

        // Determinar nombre de la empresa/universidad/evento
        $nombreEmpresa = $validated['nombre_empresa'] ?? $validated['nombre_evento'] ?? $validated['nombre_universidad'] ?? 'N/A';

        return [
            'tipo_usuario' => $tipoUsuario,
            'nombre'       => $validated['persona_contacto'] ?? 'Cliente',
            'empresa'      => $nombreEmpresa,
            'meetLink'     => $meetLink,
            'fecha'        => $fecha->format('Y-m-d'),
            'hora'         => $fecha->format('H:i'),
            'cargo'        => $validated['cargo'] ?? null,
            'tipo_servicio'=> $validated['tipo_servicio'] ?? $validated['tipo_evento'] ?? null,
            'num_colaboradores' => $validated['num_colaboradores'] ?? $validated['cantidad_ninos'] ?? null,
            'persona_contacto'  => $validated['persona_contacto'] ?? null,
            'telefono'     => $validated['telefono'] ?? null,
            'email'        => $validated['email'] ?? null,
            'mensaje_adicional'=> $validated['mensaje_adicional'] ?? $validated['comentarios'] ?? $validated['necesidades_especiales'] ?? null,
            'detalle'      => $validated['mensaje_adicional'] ?? $validated['comentarios'] ?? $validated['necesidades_especiales'] ?? null,
        ];
    }
}
