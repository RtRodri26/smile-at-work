<!-- Card de Publicación -->
<article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all" 
         data-post-id="{{ $post->id_publicacion }}">
    
    <!-- Header del Post -->
    <div class="p-4 flex items-center justify-between">
        <a href="{{ route('user.perfil.ver', $post->user->id_user) }}" class="flex items-center space-x-3 group">
            @if($post->user->foto_perfil)
                <img src="{{ asset('storage/' . $post->user->foto_perfil) }}" 
                     alt="{{ $post->user->nombres }}" 
                     class="w-11 h-11 rounded-full object-cover border-2 border-smile-yellow group-hover:border-smile-orange transition-colors">
            @else
                <div class="w-11 h-11 rounded-full bg-gradient-to-br from-smile-yellow to-smile-orange flex items-center justify-center text-white font-bold">
                    {{ strtoupper(substr($post->user->nombres, 0, 1)) }}
                </div>
            @endif
            <div>
                <p class="font-semibold text-gray-800 group-hover:text-smile-orange transition-colors">
                    {{ $post->user->nombres }} {{ $post->user->apellido_paterno }}
                </p>
                <p class="text-xs text-gray-500 flex items-center">
                    <i class="far fa-clock mr-1"></i>
                    {{ $post->fecha_publicacion->diffForHumans() }}
                    @if($post->editado)
                        <span class="ml-2 text-gray-400">• Editado</span>
                    @endif
                </p>
            </div>
        </a>
        
        <!-- Menú opciones -->
        @if($post->id_user == auth()->id())
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-full transition-all">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
                
                <div x-show="open" 
                     @click.away="open = false"
                     x-transition
                     class="absolute right-0 mt-1 w-40 bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden z-10">
                    <button onclick="eliminarPost({{ $post->id_publicacion }})" 
                            class="w-full px-4 py-2.5 text-left text-smile-red hover:bg-smile-red/10 transition-colors flex items-center">
                        <i class="fas fa-trash mr-2"></i>
                        Eliminar
                    </button>
                </div>
            </div>
        @endif
    </div>
    
    <!-- Contenido del Post -->
    @if($post->contenido)
        <div class="px-4 pb-3">
            <p class="text-gray-700 whitespace-pre-line">{{ $post->contenido }}</p>
        </div>
    @endif
    
    <!-- Imagen del Post -->
    @if($post->imagen_url)
        <div class="relative">
            <img src="{{ asset('storage/' . $post->imagen_url) }}" 
                 alt="Imagen de publicación" 
                 class="w-full max-h-[500px] object-cover cursor-pointer hover:opacity-95 transition-opacity"
                 onclick="abrirImagenCompleta('{{ asset('storage/' . $post->imagen_url) }}')">
        </div>
    @endif
    
    <!-- Stats -->
    <div class="px-4 py-2 flex items-center justify-between text-sm text-gray-500 border-t border-gray-50">
        <div class="flex items-center space-x-1">
            @if($post->cantidad_likes > 0)
                <span class="w-5 h-5 bg-smile-red rounded-full flex items-center justify-center">
                    <i class="fas fa-heart text-white text-xs"></i>
                </span>
                <span>{{ $post->cantidad_likes }} {{ $post->cantidad_likes == 1 ? 'like' : 'likes' }}</span>
            @endif
        </div>
        <div>
            @if($post->cantidad_comentarios > 0)
                <span>{{ $post->cantidad_comentarios }} {{ $post->cantidad_comentarios == 1 ? 'comentario' : 'comentarios' }}</span>
            @endif
        </div>
    </div>
    
    <!-- Acciones -->
    <div class="px-4 py-3 border-t border-gray-100 flex items-center justify-around">
        
        <!-- Like -->
        @php
            $liked = $post->reacciones->where('id_user', auth()->id())->count() > 0;
        @endphp
        <button onclick="toggleLike({{ $post->id_publicacion }}, this)" 
                class="flex-1 flex items-center justify-center space-x-2 py-2 rounded-xl hover:bg-gray-50 transition-all group {{ $liked ? 'text-smile-red' : 'text-gray-500' }}">
            <i class="{{ $liked ? 'fas' : 'far' }} fa-heart text-lg group-hover:scale-110 transition-transform {{ $liked ? 'text-smile-red' : '' }}"></i>
            <span class="font-medium">{{ $post->cantidad_likes }}</span>
        </button>
        
        <!-- Comentar -->
        <button onclick="abrirComentarios({{ $post->id_publicacion }})" 
                class="btn-comentarios flex-1 flex items-center justify-center space-x-2 py-2 rounded-xl hover:bg-gray-50 transition-all text-gray-500 group">
            <i class="far fa-comment text-lg group-hover:scale-110 transition-transform"></i>
            <span class="font-medium">{{ $post->cantidad_comentarios }}</span>
        </button>
        
        <!-- Compartir -->
        <button onclick="compartirPost({{ $post->id_publicacion }})" 
                class="flex-1 flex items-center justify-center space-x-2 py-2 rounded-xl hover:bg-gray-50 transition-all text-gray-500 group">
            <i class="far fa-share-square text-lg group-hover:scale-110 transition-transform"></i>
            <span class="font-medium hidden sm:inline">Compartir</span>
        </button>
        
    </div>
    
    <!-- Preview de comentarios recientes -->
    @if($post->comentarios->count() > 0)
        <div class="px-4 pb-4 space-y-2">
            @foreach($post->comentarios->take(2) as $comentario)
                <div class="flex items-start space-x-2">
                    @if($comentario->user->foto_perfil)
                        <img src="{{ asset('storage/' . $comentario->user->foto_perfil) }}" 
                             alt="{{ $comentario->user->nombres }}" 
                             class="w-7 h-7 rounded-full object-cover">
                    @else
                        <div class="w-7 h-7 rounded-full bg-gradient-to-br from-smile-yellow to-smile-orange flex items-center justify-center text-white text-xs font-bold">
                            {{ strtoupper(substr($comentario->user->nombres, 0, 1)) }}
                        </div>
                    @endif
                    <div class="flex-1 bg-gray-50 rounded-xl px-3 py-2">
                        <p class="text-sm">
                            <span class="font-semibold text-gray-800">{{ $comentario->user->nombres }}</span>
                            <span class="text-gray-600">{{ $comentario->contenido }}</span>
                        </p>
                    </div>
                </div>
            @endforeach
            
            @if($post->cantidad_comentarios > 2)
                <button onclick="abrirComentarios({{ $post->id_publicacion }})" 
                        class="text-sm text-gray-500 hover:text-smile-blue ml-9">
                    Ver los {{ $post->cantidad_comentarios }} comentarios
                </button>
            @endif
        </div>
    @endif
    
</article>

<!-- Script para compartir y ver imagen -->
<script>
    function compartirPost(postId) {
        const url = window.location.origin + '/app/comunidad/post/' + postId;
        
        if (navigator.share) {
            navigator.share({
                title: 'Publicación en Smile At Work',
                url: url
            }).catch(console.error);
        } else {
            // Fallback: copiar al portapapeles
            navigator.clipboard.writeText(url).then(() => {
                alert('¡Enlace copiado al portapapeles!');
            });
        }
    }
    
    function abrirImagenCompleta(src) {
        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 z-50 bg-black/90 flex items-center justify-center p-4';
        modal.onclick = () => modal.remove();
        modal.innerHTML = `
            <img src="${src}" class="max-w-full max-h-full object-contain rounded-lg">
            <button class="absolute top-4 right-4 text-white text-2xl hover:text-smile-yellow">
                <i class="fas fa-times"></i>
            </button>
        `;
        document.body.appendChild(modal);
    }
</script>