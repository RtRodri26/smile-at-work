<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cita Agendada - Smile At Work</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap');

        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Open Sans', sans-serif; background: linear-gradient(135deg,#f5f7fa 0%,#c3cfe2 100%); padding:20px; color:#333; line-height:1.6; }
        .container { max-width:650px; margin:0 auto; background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg,#2c3e50 0%,#3498db 100%); padding:30px 30px 20px; text-align:center; color:white; }
        .logo-container { display:flex; align-items:center; justify-content:center; margin-bottom:15px; }
        .logo { width:180px; height:auto; filter:brightness(0) invert(1); }
        .header h1 { font-family:'Montserrat',sans-serif; font-weight:700; font-size:28px; margin-bottom:10px; letter-spacing:0.5px; }
        .header p { font-size:16px; opacity:0.9; }
        .content { padding:35px; }
        .greeting { margin-bottom:25px; font-size:18px; }
        .greeting strong { color:#2c3e50; }
        .info-box { background:#f8f9fa; border-radius:8px; padding:20px; margin-bottom:25px; border-left:4px solid #3498db; }
        .info-box h3 { font-family:'Montserrat',sans-serif; color:#2c3e50; margin-bottom:15px; font-size:18px; }
        .info-item { display:flex; margin-bottom:10px; }
        .info-label { font-weight:600; min-width:180px; color:#2c3e50; }
        .info-value { flex:1; }
        .meet-link { display:inline-block; background:#3498db; color:white; padding:12px 25px; border-radius:6px; text-decoration:none; font-weight:600; margin-top:10px; transition: all 0.3s ease; }
        .meet-link:hover { background:#2980b9; transform:translateY(-2px); box-shadow:0 5px 15px rgba(52,152,219,0.3); }
        .note { background:#fff9e6; border-left:4px solid #f1c40f; padding:15px; border-radius:8px; margin:25px 0; font-size:14px; }
        .footer { background:#2c3e50; color:white; padding:30px; text-align:center; }
        .signature { display:flex; align-items:center; justify-content:center; margin-bottom:20px; }
        .signature-logo { width:80px; height:auto; margin-right:20px; filter:brightness(0) invert(1); }
        .signature-text { text-align:left; }
        .signature-text strong { font-family:'Montserrat',sans-serif; font-size:18px; }
        .contact-info { font-size:14px; opacity:0.8; margin-top:5px; }
        .copyright { font-size:12px; opacity:0.7; margin-top:20px; padding-top:20px; border-top:1px solid rgba(255,255,255,0.2); }

        @media (max-width:600px) {
            .content { padding:25px 20px; }
            .info-item { flex-direction:column; }
            .info-label { min-width:auto; margin-bottom:5px; }
            .signature { flex-direction:column; text-align:center; }
            .signature-logo { margin-right:0; margin-bottom:15px; }
            .signature-text { text-align:center; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo-container">
                <img src="https://tuservidor.com/logo.png" alt="Logo de Smile At Work" class="logo">
            </div>
            <h1>Confirmación de Cita Agendada</h1>
            <p>Su cita ha sido programada exitosamente</p>
        </div>

        <div class="content">
            <div class="greeting">
                Hola <strong>{{ $data['nombre'] ?? 'Cliente' }}</strong>,
            </div>

            <div class="info-box">
                <h3>{{ $data['tipo_usuario'] === 'cliente' ? 'Detalles de su cita' : 'Nueva cita programada' }}</h3>

                @foreach ([
                    'Empresa' => $data['empresa'] ?? null,
                    'Fecha' => $data['fecha'] ?? null,
                    'Hora' => $data['hora'] ?? null,
                    'Persona de contacto' => $data['persona_contacto'] ?? null,
                    'Teléfono' => $data['telefono'] ?? null,
                    'Email' => $data['email'] ?? null,
                    'Cargo' => $data['cargo'] ?? null,
                    'Tipo de servicio' => $data['tipo_servicio'] ?? null,
                    'Número de colaboradores' => $data['num_colaboradores'] ?? null,
                    'Detalles' => $data['detalle'] ?? $data['mensaje_adicional'] ?? null
                ] as $label => $value)
                    @if($value)
                        <div class="info-item">
                            <span class="info-label">{{ $label }}:</span>
                            <span class="info-value">{{ $value }}</span>
                        </div>
                    @endif
                @endforeach
            </div>

            @if($data['tipo_usuario'] === 'admin' && !empty($data['meetLink']))
                <div class="info-box">
                    <h3>Enlace de la reunión</h3>
                    <p>Utilice el siguiente enlace para iniciar la reunión de Google Meet:</p>
                    <a href="{{ $data['meetLink'] }}" class="meet-link">Unirse a la reunión</a>
                </div>
            @elseif($data['tipo_usuario'] === 'cliente')
                <div class="note">
                    <strong>Nota importante:</strong> El enlace de Google Meet será proporcionado por nuestro administrador antes de la reunión.
                </div>
            @endif

            <div class="note">
                <strong>Recordatorio:</strong> Si necesita reprogramar o cancelar la cita, puede contactarnos directamente por correo o WhatsApp.
            </div>
        </div>

        <div class="footer">
            <div class="signature">
                <img src="https://tuservidor.com/logo.png" alt="Logo de Smile At Work" class="signature-logo">
                <div class="signature-text">
                    <strong>Equipo Smile At Work</strong><br>
                    <span class="contact-info">
                        Smile At Work S.A.<br>
                        contacto@smileatwork.com
                    </span>
                </div>
            </div>
            <div class="copyright">
                © 2025 Smile At Work S.A. Todos los derechos reservados.
            </div>
        </div>
    </div>
</body>
</html>
