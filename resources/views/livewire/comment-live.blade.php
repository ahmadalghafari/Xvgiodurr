<!-- Add comment -->
<div>
    <div class="d-flex mb-3">
        <!-- Avatar -->
        <div class="avatar avatar-xs me-2">
            <a href="#!"> <img class="avatar-img rounded-circle" @if(Auth::user()->photo != null) src="{{asset(Auth::user()->photo->path)}}" @else  src="{{asset('import/assets/images/avatar/placeholder.jpg')}}" @endif ></a>
        </div>
        <!-- Comment box  -->
        {{-- <form class="nav nav-item w-100 position-relative">
            <textarea data-autoresize class="form-control pe-5 bg-light" rows="1" placeholder="Add a comment..."></textarea>
            <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0" type="submit">
                <i class="bi bi-send-fill"> </i>
            </button>
            <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0" type="submit">
                <i class="bi bi-send-fill"> </i>
            </button>
        </form> --}}

        <form class="nav nav-item w-100 position-relative row">
            <div class="col-md-9">
                <textarea data-autoresize class="form-control pe-5 bg-light" rows="1" placeholder="Add a comment..."></textarea>
            </div>
            <div class="col-md-3 d-flex justify-content-end">
                <button class="nav-link bg-transparent px-3 border-0" type="submit">
                    <i class="bi bi-images"></i>
                </button>
                <button class="nav-link bg-transparent px-3 border-0" type="submit">
                    <i class="bi bi-send-fill"></i>
                </button>
            </div>
        </form>
        
        
    </div>

<!-- Comment START -->    
    @isset($comment)
        <ul class="comment-wrap list-unstyled">
            <!-- Comment item START -->
            <li class="comment-item">
                <div class="d-flex">
                    <!-- Avatar -->
                    <div class="avatar avatar-xs">
                        <a href="{{route('home.users.show' , $comment->user)}}"><img class="avatar-img rounded-circle" @if($comment->user->photo != null) src="{{asset($comment->user->photo->path)}}" @else src="{{asset('import/assets/images/avatar/placeholder.jpg')}}" @endif  ></a>
                     </div>
                    <!-- Comment by -->
                    <div class="ms-2">
                        <div class="bg-light p-3 rounded">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1"> <a href="#!"> {{$comment->user->name}} </a> </h6>
                                 <small class="ms-2">{{$comment->created_at->diffForHumans()}}</small>
                            </div>
                            <p class="small mb-0">{{$comment->text}}</p>
                         </div>
                         <!-- Comment react -->
                         <ul class="nav nav-divider pt-2 small">
                            <li class="nav-item">
                                 {{-- <a class="nav-link" href="#!"> Like (1)</a> --}}
                                 @livewire('like-comment-live' , ['comment' => $comment ])
                           </li>
                        </ul>
                    </div>
                </div>
            </li>
             <!-- Comment item END -->
        </ul>
    @endisset
    <!-- Comment END -->
</div>