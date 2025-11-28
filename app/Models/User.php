<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'dni',
        'nombres', 
        'apellido_paterno',
        'apellido_materno',
        'email',
        'password',
        'profile_photo',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getNombreCompletoAttribute()
{
    return $this->nombres . ' ' . $this->apellido_paterno . ' ' . $this->apellido_materno;
}

 // Nuevas relaciones
    public function profile()
    {
         return $this->hasOne(Profile::class);
    }

    public function followers()
    {
        return $this->hasMany(Follow::class, 'followed_id');
    }

    public function following()
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }

    public function companyServices()
    {
        return $this->hasMany(CompanyService::class);
    }

    public function universityServices()
    {
        return $this->hasMany(UniversityService::class);
    }

    public function eventServices()
    {
        return $this->hasMany(EventService::class);
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function appointments()
{
    return $this->morphMany(Appointment::class, 'service');
}


}
