@extends('layouts.app')

@section('title', 'Comunidad')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <!-- Formulario para crear post -->
        @auth
        <div class="bg-white rounded-lg shadow p-4 mb-6">
            <form action="{{ route('community.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <textarea name="content" rows="3" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="¿Qué está pasando?"></textarea>
                
                <div class="mt-2 flex justify-between items-center">
                    <!-- Input de archivo para imagen -->
                    <input type="file" name="image" accept="image/*" class="hidden" id="image-upload">
                    
                    <!-- Label para el input de imagen -->
                    <label for="image-upload" class="cursor-pointer text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </label>
                    
                    <!-- Contenedor para la previsualización de la imagen -->
                    <div class="mt-2" id="image-preview-container" style="display: none;">
                        <img id="image-preview" src="#" alt="Previsualización de imagen" style="width: 100%; max-height: 400px; object-fit: cover;" class="rounded-lg">
                    </div>
                    
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Publicar</button>
                </div>
            </form>
        </div>
        @endauth

        <!-- Lista de posts -->
        <div id="posts-container">
            @foreach($posts as $post)
                <div class="bg-white rounded-lg shadow mb-6" id="post-{{ $post->id }}">
                    <!-- Header del post -->
                    <div class="p-4 border-b">
                        <div class="flex items-center space-x-3">
                            <!-- Imagen de perfil del usuario -->
                            <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-purple-700 rounded-full flex items-center justify-center text-white font-bold">
                                @if($post->user->profile_photo)
                                    <img src="{{ Storage::url($post->user->profile_photo) }}" alt="Imagen de perfil" class="rounded-full w-full h-full object-cover">
                                @else
                                    {{ substr($post->user->name, 0, 1) }} <!-- Inicial del nombre -->
                                @endif
                            </div>
                            <div>
                                <p class="font-semibold">{{ $post->user->name }}</p> <!-- Nombre del usuario -->
                                <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p> <!-- Fecha -->
                            </div>
                        </div>
                    </div>

                    <!-- Contenido del post -->
                    <div class="p-4">
                        <p class="text-gray-800 mb-3">{{ $post->content }}</p>
                        
                        @if($post->image)
                            <img src="{{ Storage::url($post->image) }}" alt="Post image" class="rounded-lg mb-3 w-full">
                        @endif

                        <!-- Stats -->
                        <div class="flex items-center space-x-4 text-gray-500 text-sm">
                            <button id="like-button-{{ $post->id }}" 
                                    onclick="likePost({{ $post->id }})"
                                    class="flex items-center space-x-1 {{ $post->isLikedByUser() ? 'text-red-500' : 'text-gray-500' }}">
                                ❤️ <span id="likes-count-{{ $post->id }}">{{ $post->likes->count() }}</span>
                            </button>
                            
                            <div class="flex items-center space-x-1">
                                💬 <span id="comments-count-{{ $post->id }}">{{ $post->comments->count() }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Comentarios -->
                    <div class="border-t p-4">
                        <div id="comments-{{ $post->id }}">
                            @foreach($post->comments as $comment)
                                <div class="mb-2 p-2 bg-gray-50 rounded">
                                    <div class="flex items-start space-x-2">
                                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                            @if($comment->user->profile_photo)
                                                <img src="{{ Storage::url($comment->user->profile_photo) }}" alt="Imagen de perfil" class="rounded-full w-full h-full object-cover">
                                            @else
                                                {{ substr($comment->user->name, 0, 1) }}
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-semibold text-sm">{{ $comment->user->name }}</p>
                                            <p class="text-gray-700">{{ $comment->content }}</p>
                                            <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Input para comentar -->
                        @auth
                        <div class="mt-3 flex space-x-2">
                            <input type="text" 
                                id="comment-input-{{ $post->id }}"
                                placeholder="Escribe un comentario..." 
                                class="flex-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button onclick="commentPost({{ $post->id }})" 
                                    class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">
                                ➤
                            </button>
                        </div>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Función para dar like
    function likePost(postId) {
        fetch(`/community/posts/${postId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            const likeButton = document.querySelector(`#like-button-${postId}`);
            const likesCount = document.querySelector(`#likes-count-${postId}`);
            if (data.liked) {
                likeButton.classList.add('text-red-500');  // Cambia color si es un "like"
            } else {
                likeButton.classList.remove('text-red-500');
            }
            likesCount.textContent = data.likes_count;  // Actualiza el contador de likes
        })
        .catch(error => console.error('Error:', error));
    }

    // Función para comentar
    function commentPost(postId) {
        const content = document.querySelector(`#comment-input-${postId}`).value;
        if (!content) return;

        fetch(`/community/posts/${postId}/comment`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ content: content })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const commentsContainer = document.querySelector(`#comments-container-${postId}`);
                const newComment = document.createElement('div');
                newComment.classList.add('mb-2');
                newComment.innerHTML = ` 
                    <div class="flex items-start space-x-2">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                            ${data.comment.user.name[0]}
                        </div>
                        <div>
                            <p class="font-semibold">${data.comment.user.name}</p>
                            <p class="text-gray-700">${data.comment.content}</p>
                            <p class="text-xs text-gray-500">${new Date(data.comment.created_at).toLocaleString()}</p>
                        </div>
                    </div>
                `;
                commentsContainer.appendChild(newComment);
                document.querySelector(`#comment-input-${postId}`).value = '';  // Limpiar el input
                document.querySelector(`#comments-count-${postId}`).textContent = data.comments_count;  // Actualiza el contador de comentarios
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Función para previsualizar imagen
    function previewImage(event) {
        var file = event.target.files[0]; // Obtener el archivo seleccionado
        var reader = new FileReader(); // Crear un objeto FileReader para leer el archivo
        
        reader.onload = function(e) {
            var preview = document.getElementById('image-preview');
            var container = document.getElementById('image-preview-container');
            preview.src = e.target.result; // Establecer la imagen cargada
            container.style.display = 'block'; // Mostrar la imagen
        }
        
        reader.readAsDataURL(file); // Leer el archivo como URL
    }

    // Obtener el input de archivo y asociar el evento
    document.getElementById('image-upload').addEventListener('change', previewImage);
</script>
@endpush
