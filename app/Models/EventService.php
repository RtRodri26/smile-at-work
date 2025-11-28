<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventService extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre_evento',
        'tipo_evento',
        'fecha_evento',
        'duracion',
        'lugar',
        'cantidad_ninos',
        'persona_contacto',
        'telefono',
        'email',
        'necesidades_especiales',
        'fecha_cita',
        'link_meet',
        'estado',
        'comentarios_admin'
    ];

    protected $casts = [
        'fecha_evento' => 'date',
        'fecha_cita' => 'datetime',
    ];


    public function appointments()
{
    return $this->morphMany(Appointment::class, 'service');
}

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
