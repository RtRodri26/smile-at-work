// community.js

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
            likeButton.classList.add('text-red-500');  // Cambia el color cuando liked
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
            const commentsContainer = document.querySelector(`#comments-${postId}`);
            const newComment = document.createElement('div');
            newComment.classList.add('mb-2');
            newComment.innerHTML = `
                <div class="flex items-start space-x-2">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                        ${data.comment.user.name[0]}
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-sm">${data.comment.user.name}</p>
                        <p class="text-gray-700">${data.comment.content}</p>
                        <p class="text-xs text-gray-500">${new Date(data.comment.created_at).toLocaleString()}</p>
                    </div>
                </div>
            `;
            commentsContainer.appendChild(newComment);
            document.querySelector(`#comment-input-${postId}`).value = '';  // Limpiar el input
            document.querySelector(`#comments-count-${postId}`).textContent = data.comments_count;
        }
    })
    .catch(error => console.error('Error:', error));
}
