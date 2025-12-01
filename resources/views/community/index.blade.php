@extends('layouts.app')

@section('title', 'Comunidad')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <!-- Formulario para crear post -->
        @auth
        <div class="bg-white rounded-2xl shadow-xl p-6 mb-8 transition-all duration-300 hover:shadow-2xl border border-gray-100">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-yellow-400 to-orange-400 flex items-center justify-center text-white font-bold text-lg shadow-md">
                    @if(auth()->user()->profile && auth()->user()->profile->profile_photo)
                        <img src="{{ Storage::url(auth()->user()->profile->profile_photo) }}" alt="Imagen de perfil" class="rounded-full w-full h-full object-cover">
                    @else
                        {{ substr(auth()->user()->nombres, 0, 1) }}
                    @endif
                </div>
                <div>
                    <p class="font-bold text-gray-800">{{ auth()->user()->nombres }}</p>
                    <p class="text-sm text-gray-500">Comparte con la comunidad</p>
                </div>
            </div>
            
            <form action="{{ route('community.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <textarea name="content" rows="3" class="w-full border border-gray-200 rounded-xl p-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none" placeholder="¿Qué está pasando en tu mundo? ¡Compártelo con la comunidad! 🌟"></textarea>
                
                <div class="mt-4 flex justify-between items-center">
                    <!-- Input de archivo para imagen -->
                    <input type="file" name="image" accept="image/*" class="hidden" id="image-upload">
                    
                    <!-- Botones de acción -->
                    <div class="flex items-center space-x-4">
                        <!-- Label para el input de imagen -->
                        <label for="image-upload" class="cursor-pointer text-gray-500 hover:text-blue-600 transition-colors duration-200 p-2 rounded-full hover:bg-blue-50">
                            <i class="fas fa-image text-lg"></i>
                        </label>
                        
                        <!-- Otros íconos de acciones -->
                        <button type="button" class="text-gray-500 hover:text-green-600 transition-colors duration-200 p-2 rounded-full hover:bg-green-50">
                            <i class="fas fa-smile text-lg"></i>
                        </button>
                        
                        <button type="button" class="text-gray-500 hover:text-yellow-600 transition-colors duration-200 p-2 rounded-full hover:bg-yellow-50">
                            <i class="fas fa-map-marker-alt text-lg"></i>
                        </button>
                    </div>
                    
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-2 rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105 font-medium">
                        <i class="fas fa-paper-plane mr-2"></i>Publicar
                    </button>
                </div>
                
                <!-- Contenedor para la previsualización de la imagen -->
                <div class="mt-4" id="image-preview-container" style="display: none;">
                    <div class="relative">
                        <img id="image-preview" src="#" alt="Previsualización de imagen" class="rounded-xl w-full max-h-96 object-cover shadow-md">
                        <button type="button" onclick="removeImagePreview()" class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-red-600 transition-colors duration-200">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @endauth

        <!-- Lista de posts -->
        <div id="posts-container" class="space-y-6">
            @foreach($posts as $post)
                <div class="bg-white rounded-2xl shadow-lg transition-all duration-300 hover:shadow-xl border border-gray-100" id="post-{{ $post->id }}">
                    <!-- Header del post -->
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <!-- Imagen de perfil del usuario -->
                                <div class="relative">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-yellow-400 to-orange-400 flex items-center justify-center text-white font-bold shadow-md">
                                        @if($post->user->profile && $post->user->profile->profile_photo)
                                            <img src="{{ Storage::url($post->user->profile->profile_photo) }}" alt="Imagen de perfil" class="rounded-full w-full h-full object-cover">
                                        @else
                                            {{ substr($post->user->nombres, 0, 1) }}
                                        @endif
                                    </div>
                                    <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></div>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800">{{ $post->user->nombres }}</p>
                                    <p class="text-sm text-gray-500 flex items-center">
                                        <i class="fas fa-clock mr-1 text-xs"></i>
                                        {{ $post->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600 transition-colors duration-200 p-2 rounded-full hover:bg-gray-100">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Contenido del post -->
                    <div class="p-6">
                        <p class="text-gray-800 mb-4 text-lg leading-relaxed">{{ $post->content }}</p>
                        
                        @if($post->image)
                            <div class="rounded-xl overflow-hidden mb-4 shadow-md">
                                <img src="{{ Storage::url($post->image) }}" alt="Post image" class="w-full h-auto max-h-96 object-cover">
                            </div>
                        @endif

                        <!-- Stats -->
                        <div class="flex items-center space-x-6 text-gray-500 text-sm pt-4 border-t border-gray-100">
                            <button id="like-button-{{ $post->id }}" 
                                    onclick="likePost({{ $post->id }})"
                                    class="flex items-center space-x-2 px-3 py-2 rounded-full transition-all duration-200 {{ $post->isLikedByUser() ? 'bg-red-50 text-red-500' : 'hover:bg-gray-100 text-gray-500' }}">
                                <i class="fas fa-heart {{ $post->isLikedByUser() ? 'text-red-500' : '' }}"></i>
                                <span id="likes-count-{{ $post->id }}" class="font-medium">{{ $post->likes->count() }}</span>
                            </button>
                            
                            <button onclick="document.getElementById('comment-input-{{ $post->id }}').focus()" 
                                    class="flex items-center space-x-2 px-3 py-2 rounded-full hover:bg-gray-100 transition-all duration-200">
                                <i class="fas fa-comment"></i>
                                <span id="comments-count-{{ $post->id }}" class="font-medium">{{ $post->comments->count() }}</span>
                            </button>
                            
                            <button class="flex items-center space-x-2 px-3 py-2 rounded-full hover:bg-gray-100 transition-all duration-200">
                                <i class="fas fa-share"></i>
                                <span class="font-medium">Compartir</span>
                            </button>
                        </div>
                    </div>

                    <!-- Comentarios -->
                    <div class="border-t border-gray-100 p-6 bg-gray-50 rounded-b-2xl">
                        <div id="comments-{{ $post->id }}" class="space-y-4 mb-4">
                            @foreach($post->comments as $comment)
                                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                                    <div class="flex items-start space-x-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center text-white text-sm font-bold shadow-sm">
                                            @if($comment->user->profile && $comment->user->profile->profile_photo)
                                                <img src="{{ Storage::url($comment->user->profile->profile_photo) }}" alt="Imagen de perfil" class="rounded-full w-full h-full object-cover">
                                            @else
                                                {{ substr($comment->user->nombres, 0, 1) }}
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-2 mb-1">
                                                <p class="font-semibold text-gray-800 text-sm">{{ $comment->user->nombres }}</p>
                                                <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                            </div>
                                            <p class="text-gray-700 text-sm">{{ $comment->content }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Input para comentar -->
                        @auth
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-yellow-400 to-orange-400 flex items-center justify-center text-white font-bold text-sm shadow-sm flex-shrink-0">
                                @if(auth()->user()->profile && auth()->user()->profile->profile_photo)
                                    <img src="{{ Storage::url(auth()->user()->profile->profile_photo) }}" alt="Imagen de perfil" class="rounded-full w-full h-full object-cover">
                                @else
                                    {{ substr(auth()->user()->nombres, 0, 1) }}
                                @endif
                            </div>
                            <div class="flex-1 relative">
                                <input type="text" 
                                    id="comment-input-{{ $post->id }}"
                                    placeholder="Escribe un comentario..." 
                                    class="w-full border border-gray-200 rounded-full px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                <button onclick="commentPost({{ $post->id }})" 
                                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors duration-200 shadow-sm">
                                    <i class="fas fa-paper-plane text-xs"></i>
                                </button>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Mensaje cuando no hay posts -->
        @if($posts->isEmpty())
        <div class="text-center py-12">
            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-users text-3xl text-gray-400"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-700 mb-2">¡Sé el primero en publicar!</h3>
            <p class="text-gray-500 mb-6">Comparte tus experiencias y conecta con la comunidad</p>
            @auth
            <a href="#image-upload" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-xl hover:shadow-lg transition-all duration-300 inline-flex items-center font-medium">
                <i class="fas fa-plus mr-2"></i>Crear primera publicación
            </a>
            @else
            <a href="{{ route('login') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-xl hover:shadow-lg transition-all duration-300 inline-flex items-center font-medium">
                <i class="fas fa-sign-in-alt mr-2"></i>Iniciar sesión para publicar
            </a>
            @endauth
        </div>
        @endif
    </div>
</div>

<style>
    .comic-font {
        font-family: 'Comic Neue', cursive;
    }
    
    .shadow-lg {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .shadow-xl {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
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
                likeButton.classList.add('bg-red-50', 'text-red-500');
                likeButton.classList.remove('text-gray-500');
                likeButton.querySelector('i').classList.add('text-red-500');
                
                // Animación de like
                likeButton.querySelector('i').classList.add('animate-pulse');
                setTimeout(() => {
                    likeButton.querySelector('i').classList.remove('animate-pulse');
                }, 300);
            } else {
                likeButton.classList.remove('bg-red-50', 'text-red-500');
                likeButton.classList.add('text-gray-500');
                likeButton.querySelector('i').classList.remove('text-red-500');
            }
            
            likesCount.textContent = data.likes_count;
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
                const commentsContainer = document.querySelector(`#comments-${postId}`);
                const newComment = document.createElement('div');
                newComment.classList.add('bg-white', 'rounded-xl', 'p-4', 'shadow-sm', 'border', 'border-gray-100', 'fade-in');
                
                newComment.innerHTML = ` 
                    <div class="flex items-start space-x-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center text-white text-sm font-bold shadow-sm">
                            ${data.comment.user.nombres[0]}
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-1">
                                <p class="font-semibold text-gray-800 text-sm">${data.comment.user.nombres}</p>
                                <p class="text-xs text-gray-500">Ahora mismo</p>
                            </div>
                            <p class="text-gray-700 text-sm">${data.comment.content}</p>
                        </div>
                    </div>
                `;
                
                commentsContainer.appendChild(newComment);
                document.querySelector(`#comment-input-${postId}`).value = '';
                document.querySelector(`#comments-count-${postId}`).textContent = data.comments_count;
                
                // Animación de éxito
                const commentButton = document.querySelector(`#comment-input-${postId}`).nextElementSibling;
                commentButton.classList.add('bg-green-500');
                setTimeout(() => {
                    commentButton.classList.remove('bg-green-500');
                    commentButton.classList.add('bg-blue-500');
                }, 500);
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Función para previsualizar imagen
    function previewImage(event) {
        var file = event.target.files[0];
        if (!file) return;
        
        var reader = new FileReader();
        
        reader.onload = function(e) {
            var preview = document.getElementById('image-preview');
            var container = document.getElementById('image-preview-container');
            preview.src = e.target.result;
            container.style.display = 'block';
            
            // Animación de entrada
            container.classList.add('fade-in');
        }
        
        reader.readAsDataURL(file);
    }

    // Función para eliminar previsualización
    function removeImagePreview() {
        var container = document.getElementById('image-preview-container');
        var input = document.getElementById('image-upload');
        
        container.style.display = 'none';
        input.value = '';
    }

    // Event listeners
    document.addEventListener('DOMContentLoaded', function() {
        // Previsualización de imagen
        document.getElementById('image-upload').addEventListener('change', previewImage);
        
        // Permitir enviar comentarios con Enter
        document.querySelectorAll('input[id^="comment-input-"]').forEach(input => {
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    const postId = this.id.split('-')[2];
                    commentPost(postId);
                }
            });
        });
        
        // Efectos de hover en posts
        document.querySelectorAll('#posts-container > div').forEach(post => {
            post.addEventListener('mouseenter', function() {
                this.classList.add('transform', 'scale-[1.01]');
            });
            
            post.addEventListener('mouseleave', function() {
                this.classList.remove('transform', 'scale-[1.01]');
            });
        });
    });
</script>
@endpush