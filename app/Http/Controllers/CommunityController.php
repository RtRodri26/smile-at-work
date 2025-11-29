<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CommunityController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'likes', 'comments.user'])
                    ->latest()
                    ->get();
        
        return view('community.index', compact('posts'));
    }

    public function storePost(Request $request)
{
    // Validación
    $validatedData = $request->validate([
        'content' => 'required|string|max:1000',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Crear el post
    $post = new Post();
    $post->user_id = Auth::id();
    $post->content = $validatedData['content'];

    // Manejar la imagen si existe
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts', 'public');
        $post->image = $imagePath;
    }

    $post->save();

    return redirect()->route('community.index')->with('success', 'Post publicado!');
}

    public function likePost(Post $post)
{
    // Verificar autenticación
    if (!Auth::check()) {
        return response()->json(['error' => 'No autenticado'], 401);
    }

    // Verificar si el usuario ya dio like
    $like = $post->likes()->where('user_id', Auth::id())->first();

    if ($like) {
        // Si ya dio like, lo eliminamos (quitar el like)
        $like->delete();
        $liked = false;
    } else {
        // Si no dio like, lo creamos (agregar el like)
        $post->likes()->create(['user_id' => Auth::id()]);
        $liked = true;
    }

    // Recargar la relación de likes para obtener el conteo actualizado
    $post->load('likes');

    // Responder con el estado del like y el conteo actualizado
    return response()->json([
        'liked' => $liked, 
        'likes_count' => $post->likes->count()
    ]);
}

    public function storeComment(Request $request, Post $post)
    {
        // Verificar autenticación
        if (!Auth::check()) {
            return response()->json(['error' => 'No autenticado'], 401);
        }

        $validatedData = $request->validate([
            'content' => 'required|string|max:500'
        ]);

        // Crear el comentario
        $comment = $post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $validatedData['content']
        ]);

        // Cargar la relación del usuario
        $comment->load('user');

        // Recargar la relación de comentarios para obtener el conteo actualizado
        $post->load('comments');

        return response()->json([
            'success' => true,
            'comment' => $comment,
            'comments_count' => $post->comments->count()
        ]);
    }
}