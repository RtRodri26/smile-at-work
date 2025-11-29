<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cita Agendada</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px;">

    <div style="max-width: 600px; margin: auto; background: white; padding: 25px; border-radius: 10px;">

        <img src="https://tuservidor.com/logo.png" alt="Logo de Smile At Work" style="width: 120px; display:block; margin:auto;">

        <h2 style="text-align: center; color: #2c3e50;">Confirmación de Cita Agendada</h2>

        <p>Hola <strong>{{ $data['nombre'] }}</strong>,</p>

        @if($data['tipo_usuario'] === 'cliente')
            <p>
                Hemos registrado correctamente su solicitud de cita para su empresa 
                <strong>{{ $data['empresa'] }}</strong>.
            </p>

            <p>
                🗓 <strong>Fecha:</strong> {{ $data['fecha'] }} <br>
                ⏰ <strong>Hora:</strong> {{ $data['hora'] }}
            </p>

            <p>
                📋 <strong>Detalles de la cita:</strong><br>
                {{ $data['detalle'] ?? 'No hay detalles adicionales.' }}
            </p>

            <p>
                ⚠️ El enlace de Google Meet será proporcionado por el administrador antes de la reunión.
            </p>
        @elseif($data['tipo_usuario'] === 'admin')
            <p>
                Se ha programado una nueva cita para la empresa <strong>{{ $data['empresa'] }}</strong>.
            </p>

            <p>
                🗓 <strong>Fecha:</strong> {{ $data['fecha'] }} <br>
                ⏰ <strong>Hora:</strong> {{ $data['hora'] }}
            </p>

            <p>
                📋 <strong>Detalles de la cita:</strong><br>
                {{ $data['detalle'] }}
            </p>

            <p>
                🔗 <strong>Enlace de Google Meet para iniciar la reunión:</strong> 
                <a href="{{ $data['meetLink'] }}">{{ $data['meetLink'] }}</a>
            </p>
        @endif

        <p>
            En caso necesite reprogramar o cancelar la cita, puede contactarnos directamente por correo o WhatsApp.
        </p>

        <br>

        <p style="font-size: 13px; color: #555;">
            Atentamente,<br>
            <strong>Equipo de Atención</strong><br>
            Smile At Work S.A.<br>
            contacto@smileatwork.com
        </p>
    </div>

</body>
</html>
