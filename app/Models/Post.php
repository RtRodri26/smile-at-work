<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Verifica si el usuario actual dio like al post
     */
    public function isLikedByUser()
    {
        if (!auth()->check()) {
            return false;
        }
        
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    /**
     * Obtiene el contenido seguro (escapado)
     */
    public function getSafeContentAttribute()
    {
        return nl2br(e($this->content));
    }

    public function index()
{
    $posts = Post::with('user', 'comments.user')->get(); // Cargar la relación de 'user' para cada post

    return view('community.index', compact('posts'));
}



}