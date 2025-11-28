<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre_completo',
        'edad',
        'distrito',
        'cargo',
        'disponibilidad',
        'experiencia',
        'cv_path',
        'telefono',
        'email',
        'fecha_entrevista',
        'link_entrevista',
        'estado',
        'comentarios_admin'
    ];

    protected $casts = [
        'fecha_entrevista' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}