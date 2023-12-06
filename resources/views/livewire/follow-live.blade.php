<button wire:click="toggleFollow"
        @if(Auth::user()->follow()->where('user_follower',$user->id)->exists())
        class="btn btn-secondary me-2"
        @else
            class="btn btn-primary-soft me-2"
        @endif
        type="button" href="#!">
    @if(Auth::user()->follow()->where('user_follower',$user->id)->exists())
        Following
    @else
        Follow
    @endif
</button>
