<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'company_service_id',
        'user_id',
        'fecha_hora',
        'mensaje_adicional',
        'estado'
    ];

    protected $casts = [
        'fecha_hora' => 'datetime',
    ];

    /**
     * Relación con el servicio
     */
    public function companyService()
    {
        return $this->belongsTo(CompanyService::class);
    }

    /**
     * Relación con el usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}