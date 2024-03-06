
<button wire:click="toggleLike" class="nav-link
@if(Auth::user()->like()->where('post_id',$post->id)->exists())
active
@endif
" href="#!" type="button" data-bs-container="body" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" data-bs-custom-class="tooltip-text-start" data-bs-title="">
    @if(Auth::user()->like()->where('post_id',$post->id)->exists())
        <i class="bi bi-hand-thumbs-up-fill pe-1"></i>
        Liked
    @else
        <i class="bi bi-hand-thumbs-up pe-1"></i>
        Like
    @endif
         ({{$post->likes_number}})
</button>
