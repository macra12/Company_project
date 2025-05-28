{{-- resources/views/partials/comment.blade.php --}}
   <div class="comment mb-3 {{ $comment->parent_id ? 'ms-4' : '' }}" id="comment-{{ $comment->id }}">
       <div class="d-flex">
           <img src="{{ $comment->user->avatar ? asset('storage/' . $comment->user->avatar) : asset('theme/assets/img/default-avatar.jpg') }}"
                class="rounded-circle me-3" style="width: 40px; height: 40px; object-fit: cover;" alt="{{ $comment->user->name }}">
           <div class="flex-grow-1">
               <h6 class="mb-1">{{ $comment->user->name }}</h6>
               <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
               <p class="mb-2">{{ $comment->content }}</p>
               @auth
                   <a href="#" class="reply-comment text-decoration-none small" data-comment-id="{{ $comment->id }}">Reply</a>
               @endauth
           </div>
       </div>
       @foreach($comment->replies as $reply)
           @include('partials.comment', ['comment' => $reply])
       @endforeach
   </div>
