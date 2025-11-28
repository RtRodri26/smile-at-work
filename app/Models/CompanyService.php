<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyService extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_empresa',
        'num_colaboradores',
        'persona_contacto',
        'cargo',
        'email',
        'telefono',
        'tipo_servicio',
        'mensaje_adicional',
        'user_id'
    ];

    /**
     * Relación con las citas
     */
  public function appointments()
{
    return $this->hasMany(Appointment::class);
}

    
}