<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Empleo - Smile At Work</title>
    <style>
        body { font-family: 'Open Sans', sans-serif; background: #f5f7fa; color: #333; line-height: 1.6; padding: 20px; }
        .container { max-width: 650px; margin: 0 auto; background: #fff; border-radius: 12px; padding: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .header { text-align: center; padding-bottom: 20px; }
        .header h1 { color: #2c3e50; font-size: 24px; }
        .info-box { background: #f8f9fa; border-left: 4px solid #3498db; border-radius: 8px; padding: 20px; margin-bottom: 20px; }
        .info-item { margin-bottom: 10px; }
        .info-label { font-weight: 600; }
        .meet-link { display: inline-block; background: #3498db; color: #fff; padding: 10px 20px; border-radius: 6px; text-decoration: none; }
        .footer { text-align: center; font-size: 12px; color: #888; margin-top: 30px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Solicitud de Empleo Confirmada</h1>
        </div>

        @if($data['tipo_usuario'] === 'cliente')
            <p>Hola <strong>{{ $data['nombre'] }}</strong>,</p>
            <p>Hemos recibido tu postulación para el cargo de <strong>{{ $data['cargo'] }}</strong>.</p>

            <div class="info-box">
                <h3>Detalles de tu postulación</h3>
                <div class="info-item"><span class="info-label">Edad:</span> {{ $data['edad'] ?? '-' }}</div>
                <div class="info-item"><span class="info-label">Distrito:</span> {{ $data['distrito'] ?? '-' }}</div>
                <div class="info-item"><span class="info-label">Disponibilidad:</span> {{ $data['disponibilidad'] ?? '-' }}</div>
                <div class="info-item"><span class="info-label">Experiencia:</span> {{ $data['detalle'] ?? '-' }}</div>
                <div class="info-item"><span class="info-label">Teléfono:</span> {{ $data['telefono'] }}</div>
                <div class="info-item"><span class="info-label">Correo:</span> {{ $data['email'] }}</div>
                <div class="info-item"><span class="info-label">CV:</span> <a href="{{ $data['cv'] }}" target="_blank">Ver PDF</a></div>
                @if($data['fecha_entrevista'])
                    <div class="info-item"><span class="info-label">Fecha de entrevista:</span> {{ $data['fecha_entrevista'] }}</div>
                    <div class="info-item"><span class="info-label">Enlace Meet:</span> <a href="{{ $data['meetLink'] }}" class="meet-link">Unirse</a></div>
                @endif
            </div>
        @elseif($data['tipo_usuario'] === 'admin')
            <p>Se ha recibido una nueva postulación laboral:</p>

            <div class="info-box">
                <h3>Detalles del postulante</h3>
                <div class="info-item"><span class="info-label">Nombre:</span> {{ $data['persona_contacto'] }}</div>
                <div class="info-item"><span class="info-label">Edad:</span> {{ $data['edad'] }}</div>
                <div class="info-item"><span class="info-label">Distrito:</span> {{ $data['distrito'] }}</div>
                <div class="info-item"><span class="info-label">Cargo:</span> {{ $data['cargo'] }}</div>
                <div class="info-item"><span class="info-label">Disponibilidad:</span> {{ $data['disponibilidad'] }}</div>
                <div class="info-item"><span class="info-label">Experiencia:</span> {{ $data['experiencia'] }}</div>
                <div class="info-item"><span class="info-label">Teléfono:</span> {{ $data['telefono'] }}</div>
                <div class="info-item"><span class="info-label">Correo:</span> {{ $data['email'] }}</div>
                <div class="info-item"><span class="info-label">CV:</span> <a href="{{ $data['cv'] }}" target="_blank">Ver PDF</a></div>
                @if($data['fecha_entrevista'])
                    <div class="info-item"><span class="info-label">Fecha de entrevista:</span> {{ $data['fecha_entrevista'] }}</div>
                    <div class="info-item"><span class="info-label">Enlace Meet:</span> <a href="{{ $data['meetLink'] }}" class="meet-link">Unirse</a></div>
                @endif
            </div>
        @endif

        <div class="footer">
            © 2025 Smile At Work S.A. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>
