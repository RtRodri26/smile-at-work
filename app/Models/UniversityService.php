<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityService extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre_universidad',
        'area_facultad',
        'persona_contacto',
        'email',
        'telefono',
        'tipo_servicio',
        'fecha_estimada',
        'comentarios',
        'fecha_cita',
        'link_meet',
        'estado',
        'comentarios_admin'
    ];

    protected $casts = [
        'fecha_estimada' => 'date',
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