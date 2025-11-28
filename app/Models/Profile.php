<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile_photo',
        'followers_count',
        'following_count'
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