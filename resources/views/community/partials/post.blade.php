<div class="bg-white rounded-lg shadow mb-6" id="post-{{ $post->id }}">
    <!-- Header del post -->
    <div class="p-4 border-b">
        <div class="flex items-center space-x-3">
            <!-- Imagen de perfil del usuario -->
            <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-purple-700 rounded-full flex items-center justify-center text-white font-bold">
                @if($post->user->profile_photo) <!-- Verifica si tiene foto de perfil -->
                    <img src="{{ Storage::url($post->user->profile_photo) }}" alt="Imagen de perfil" class="rounded-full w-full h-full object-cover">
                @else
                    {{ substr($post->user->name, 0, 1) }} <!-- Inicial del nombre si no tiene foto -->
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
