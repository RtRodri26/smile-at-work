<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Empleo - Smile At Work</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap');

        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Open Sans', sans-serif; background: linear-gradient(135deg,#f8fafc 0%,#e2e8f0 100%); padding:20px; color:#333; line-height:1.6; }
        .container { max-width:650px; margin:0 auto; background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg,#0077B6 0%,#BBC34A 100%); padding:30px 30px 20px; text-align:center; color:white; }
        .logo-container { display:flex; align-items:center; justify-content:center; margin-bottom:15px; }
        .logo { width:180px; height:auto; filter:brightness(0) invert(1); }
        .header h1 { font-family:'Montserrat',sans-serif; font-weight:700; font-size:28px; margin-bottom:10px; letter-spacing:0.5px; }
        .header p { font-size:16px; opacity:0.9; }
        .content { padding:35px; }
        .greeting { margin-bottom:25px; font-size:18px; }
        .greeting strong { color:#2c3e50; }
        .info-box { background:#f8f9fa; border-radius:8px; padding:20px; margin-bottom:25px; border-left:4px solid #F28C38; }
        .info-box h3 { font-family:'Montserrat',sans-serif; color:#2c3e50; margin-bottom:15px; font-size:18px; }
        .info-item { display:flex; margin-bottom:10px; }
        .info-label { font-weight:600; min-width:180px; color:#2c3e50; }
        .info-value { flex:1; }
        .meet-link { display:inline-block; background: linear-gradient(135deg, #F28C38 0%, #F7C948 100%); color:white; padding:12px 25px; border-radius:6px; text-decoration:none; font-weight:600; margin-top:10px; transition: all 0.3s ease; }
        .meet-link:hover { background: linear-gradient(135deg, #e67e22 0%, #f1c40f 100%); transform:translateY(-2px); box-shadow:0 5px 15px rgba(242, 140, 56, 0.3); }
        .note { background:#fff9e6; border-left:4px solid #F7C948; padding:15px; border-radius:8px; margin:25px 0; font-size:14px; }
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
            
            </div>
            <h1>Solicitud de Empleo Confirmada</h1>
            <p>Proceso de postulación iniciado</p>
        </div>

        <div class="content">
            @if($data['tipo_usuario'] === 'cliente')
                <!-- Vista para el postulante -->
                <div class="greeting">
                    Hola <strong>{{ $data['nombre'] }}</strong>,
                </div>
                <p>Hemos recibido tu postulación para el cargo de <strong>{{ $data['cargo'] }}</strong>.</p>
                <br>
                <div class="info-box">
                    <h3>Detalles de tu postulación</h3>
                    <div class="info-item"><span class="info-label">Edad:</span> <span class="info-value">{{ $data['edad'] ?? '-' }}</span></div>
                    <div class="info-item"><span class="info-label">Distrito:</span> <span class="info-value">{{ $data['distrito'] ?? '-' }}</span></div>
                    <div class="info-item"><span class="info-label">Disponibilidad:</span> <span class="info-value">{{ $data['disponibilidad'] ?? '-' }}</span></div>
                    <div class="info-item"><span class="info-label">Experiencia:</span> <span class="info-value">{{ $data['detalle'] ?? '-' }}</span></div>
                    <div class="info-item"><span class="info-label">Teléfono:</span> <span class="info-value">{{ $data['telefono'] }}</span></div>
                    <div class="info-item"><span class="info-label">Correo:</span> <span class="info-value">{{ $data['email'] }}</span></div>
                    <div class="info-item"><span class="info-label">CV:</span> <span class="info-value"><a href="{{ $data['cv'] }}" target="_blank">Ver PDF</a></span></div>
                    
                    @if($data['fecha_entrevista'])
                        <div class="info-item"><span class="info-label">Fecha de entrevista:</span> <span class="info-value">{{ $data['fecha_entrevista'] }}</span></div>
                        
                    @endif
                </div>

                <div class="note">
                    <strong>Próximos pasos:</strong> Revisaremos tu postulación y nos contactaremos contigo en un plazo máximo de 48 horas. Si tienes alguna pregunta, no dudes en contactarnos.
                </div>

                <div class="note">
                    El enlace de la entrevista será enviado al <strong>correo electrónico</strong> proporcionado o al <strong>número de teléfono</strong> proporcionado antes de la <strong>fecha de la entrevista</strong>.</div>

            @elseif($data['tipo_usuario'] === 'admin')
                <!-- Vista para el administrador -->
                <div class="greeting">
                    Se ha recibido una nueva postulación laboral:
                </div>

                <div class="info-box">
                    <h3>Detalles del postulante</h3>
                    <div class="info-item"><span class="info-label">Nombre:</span> <span class="info-value">{{ $data['persona_contacto'] }}</span></div>
                    <div class="info-item"><span class="info-label">Edad:</span> <span class="info-value">{{ $data['edad'] }}</span></div>
                    <div class="info-item"><span class="info-label">Distrito:</span> <span class="info-value">{{ $data['distrito'] }}</span></div>
                    <div class="info-item"><span class="info-label">Cargo:</span> <span class="info-value">{{ $data['cargo'] }}</span></div>
                    <div class="info-item"><span class="info-label">Disponibilidad:</span> <span class="info-value">{{ $data['disponibilidad'] }}</span></div>
                    <div class="info-item"><span class="info-label">Experiencia:</span> <span class="info-value">{{ $data['experiencia'] }}</span></div>
                    <div class="info-item"><span class="info-label">Teléfono:</span> <span class="info-value">{{ $data['telefono'] }}</span></div>
                    <div class="info-item"><span class="info-label">Correo:</span> <span class="info-value">{{ $data['email'] }}</span></div>
                    <div class="info-item"><span class="info-label">CV:</span> <span class="info-value"><a href="{{ $data['cv'] }}" target="_blank">Ver PDF</a></span></div>
                    
                    @if($data['fecha_entrevista'])
                        <div class="info-item"><span class="info-label">Fecha de entrevista:</span> <span class="info-value">{{ $data['fecha_entrevista'] }}</span></div>
                        <div class="info-item"><span class="info-label">Enlace Meet:</span> <span class="info-value"><a href="{{ $data['meetLink'] }}" class="meet-link">Unirse a la entrevista</a></span></div>
                    @endif
                </div>

                <div class="note">
                    <strong>Acción requerida:</strong> Por favor, revisa la postulación y contacta al candidato dentro de las próximas 48 horas.
                </div>
            @endif
        </div>

        <div class="footer">
            <div class="signature">
                <img src="https://i.postimg.cc/rpLtKHwF/3.jpg" alt="Logo de Smile At Work" class="signature-logo">
                <div class="signature-text">
                    <strong>Equipo Smile At Work</strong><br>
                    <span class="contact-info">
                        Smile At Work S.A.<br>
                        smileatwork292517@gmail.com
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