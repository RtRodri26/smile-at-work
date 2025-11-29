<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Muestra todos los posts.
     *
     * @return \Illuminate\View\View
     */
  public function index()
{
    $posts = Post::with('user', 'likes', 'comments.user')->latest()->get();
    
    // Debug: Verifica que los datos de los posts están bien cargados
    dd($posts); // Esto detendrá la ejecución y mostrará los datos

    return view('community.index', compact('posts'));
}


    /**
     * Almacena un nuevo post.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Si se sube una imagen, valida su tamaño y tipo
        ]);

        // Crear el nuevo post
        $post = new Post();
        $post->content = $request->input('content');
        $post->user_id = auth()->id(); // Asignar el ID del usuario autenticado

        // Si se sube una imagen, guardarla
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts_images', 'public');
            $post->image = $imagePath;
        }

        // Guardar el post
        $post->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('community.index')->with('success', 'Post creado con éxito!');
    }

    /**
     * Dale like a un post.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $postId
     * @return \Illuminate\Http\JsonResponse
     */
    public function likePost(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);

        // Verificar si el usuario ya ha dado like a este post
        if ($post->likes()->where('user_id', auth()->id())->exists()) {
            // Si ya dio like, eliminarlo
            $post->likes()->where('user_id', auth()->id())->delete();
            $liked = false;
        } else {
            // Si no ha dado like, agregarlo
            $post->likes()->create(['user_id' => auth()->id()]);
            $liked = true;
        }

        // Retornar la cantidad de likes y si el usuario ha dado like
        return response()->json([
            'liked' => $liked,
            'likes_count' => $post->likes()->count(),
        ]);
    }

    /**
     * Comentar un post.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $postId
     * @return \Illuminate\Http\JsonResponse
     */
    public function commentPost(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);

        // Validación del contenido del comentario
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        // Crear el nuevo comentario
        $comment = $post->comments()->create([
            'content' => $request->input('content'),
            'user_id' => auth()->id(), // Asignar el ID del usuario autenticado
        ]);

        // Retornar el comentario y la cantidad de comentarios
        return response()->json([
            'success' => true,
            'comment' => $comment,
            'comments_count' => $post->comments()->count(),
        ]);
    }
}
