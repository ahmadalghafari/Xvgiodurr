@foreach($posts as $post)
    <div class="card" >
        <!-- Card header START -->
        <div class="card-header border-0 pb-0">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <!-- Avatar -->
                    <div class="avatar avatar-story me-2">
                        <a href="#!"> <img class="avatar-img rounded-circle" \
                                           @if($post->user->pphoto_id != null)
                                               src="{{asset($post->user->photo->path)}}"
                                           @else
                                               src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                @endif > </a>
                    </div>
                    <!-- Info -->
                    <div>
                        <div class="nav nav-divider">
                            <h6 class="nav-item card-title mb-0"> <a href="#!">{{$post->user->name}}</a></h6>
                            <span class="nav-item small"> {{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="mb-0 small">Web Developer at Webestica</p>
                    </div>
                </div>
                <!-- Card feed action dropdown START -->
                <div class="dropdown">
                    <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </a>
                    <!-- Card feed action dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
                    </ul>
                </div>
                <!-- Card feed action dropdown END -->
            </div>
        </div>
        <!-- Card header END -->

        <!-- Card body START --- the post content -->
        <div class="card-body">
            <p>{{$post->text}}</p>
            <!-- Card img -->

            @if($post->file->count() == 1)
                @if($post->file[0]->file_type == 'images')
                    <a class="" href="{{asset($post->file[0]->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
                        <img class="card-img" src="{{asset($post->file[0]->file_path)}}" alt="Post">
                    </a>

                @elseif($post->file[0]->file_type == 'videos')

                        <div class="overflow-hidden fullscreen-video w-100">
                            <div class="player-wrapper overflow-hidden">
                                <video class="player-html" controls crossorigin="anonymous"
    {{--                                   poster="assets/images/videos/poster.jpg"--}}
                                >
                                    <source src="{{asset($post->file[0]->file_path)}}" type="video/mp4">
                                </video>
                            </div>
                        </div>

                @elseif($post->file[0]->file_type == 'files')
                    <div class="card-footer border-0 d-flex justify-content-between align-items-center">
                        <p class="mb-0">{{$post->user->name}}.file.{{$post->file[0]->prefix}}</p>
                        <a class="btn btn-primary-soft btn-sm" href="{{asset($post->file[0]->file_path)}}" download> Download now </a>
                    </div>
                @elseif($post->file[0]->file_type == 'voice')
                    <audio controls class="w-100">
                        <source src="{{asset($post->file[0]->file_path)}}" type="audio/ogg">
                        <source src="{{asset($post->file[0]->file_path)}}" type="audio/mp3">
                        <source src="{{asset($post->file[0]->file_path)}}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                @endif
            @else
                @if($post->file->where('file_type','images')->count() + $post->file->where('file_type','videos')->count() > 0)
                    @switch($post->file->where('file_type','images')->count() + $post->file->where('file_type','videos')->count())
                        @case(1)
                            @if($post->file->where('file_type','images')->count() == 1)
                                <a class="" href="{{asset($post->file[0]->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
                                    <img class="card-img" src="{{asset($post->file[0]->file_path)}}" alt="Post">
                                </a>

                            @else
                                <div class="overflow-hidden fullscreen-video w-100">
                                    <div class="player-wrapper overflow-hidden">
                                        <video class="player-html" controls crossorigin="anonymous"
                                            {{--                                   poster="assets/images/videos/poster.jpg"--}}
                                        >
                                            <source src="{{asset($post->file[0]->file_path)}}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            @endif
                        @break

                        @case(2)
                            <div class="d-flex justify-content-between">
                                <div class="row g-3">
                                    @foreach($post->file as $files)
                                        @if($files->file_type == 'images')
                                            <div class="col-6">
                                                <!-- Grid img -->
                                                <a class="" href="{{asset($files->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
                                                    <img class="rounded img-fluid" src="{{asset($files->file_path)}}" alt="Image">
                                                </a>
                                            </div>
                                        @elseif($files->file_type == 'videos')
                                            <div class="col-6">
                                                <!-- Grid video -->
                                                <a class="" href="{{asset($files->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
                                                    <div class="overflow-hidden fullscreen-video w-100">
                                                        <div class="player-wrapper overflow-hidden">
                                                            <video class="player-html" controls crossorigin="anonymous"
                                                                {{--                                   poster="assets/images/videos/poster.jpg"--}}
                                                            >
                                                                <source src="{{asset($files->file_path)}}" type="video/mp4">
                                                            </video>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @break

                        @default
                            <div class="d-flex justify-content-between">
                                <div class="row g-3">
                                        @foreach($post->file as $key => $file)
                                            @if($loop->first)
                                                @if($file->file_type == 'images')
                                                    <div class="col-6">
                                                        <a class="" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}" >
                                                            <img class="rounded img-fluid" src="{{asset($file->file_path)}}" alt="Image">
                                                        </a>

                                                    </div>
                                                @elseif($file->file_type == 'videos')
                                                    <div class="col-6">
                                                        <!-- Grid video -->
                                                        <a class="" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
                                                            <div class="overflow-hidden fullscreen-video w-100">
                                                                <div class="player-wrapper overflow-hidden">
                                                                    <video class="player-html" controls crossorigin="anonymous"
                                                                        {{--                                   poster="assets/images/videos/poster.jpg"--}}
                                                                    >
                                                                        <source src="{{asset($file->file_path)}}" type="video/mp4">
                                                                    </video>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endif
                                                @continue
                                            @elseif($key < count($post->file) - 1)
                                                @if($file->file_type == 'images')
                                                    <div class="col-6" style="display: none">
                                                        <a class="" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}" >
                                                            <img class="rounded img-fluid" src="{{asset($file->file_path)}}" alt="Image">
                                                        </a>
                                                    </div>
                                                @elseif($file->file_type == 'videos')
                                                    <div class="col-6" style="display: none">
                                                        <!-- Grid video -->
                                                        <a class="" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
                                                            <div class="overflow-hidden fullscreen-video w-100">
                                                                <div class="player-wrapper overflow-hidden">
                                                                    <video class="player-html" controls crossorigin="anonymous"
                                                                        {{--                                   poster="assets/images/videos/poster.jpg"--}}
                                                                    >
                                                                        <source src="{{asset($file->file_path)}}" type="video/mp4">
                                                                    </video>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endif
                                                @continue
                                            @else
                                                <div class="col-6">
                                                    @if($file->file_type == 'images')
                                                        <div class="position-relative bg-dark  rounded">
                                                            <div class="hover-actions-item position-absolute top-50 start-50 translate-middle z-index-9">
                                                                <a class="btn btn-link text-white" href="#"> View all </a>
                                                            </div>
                                                            <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
                                                                <img class="img-fluid opacity-50 rounded" src="{{asset($file->file_path)}}" alt="Image">
                                                            </a>
                                                        </div>
                                                    @elseif($file->file_type == 'videos')
                                                        <div class="position-relative bg-dark  rounded">
                                                            <div class="hover-actions-item position-absolute top-50 start-50 translate-middle z-index-9">
                                                                <a class="btn btn-link text-white" href="#"> View all </a>
                                                            </div>
                                                            <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox="post-gallery" data-gallery="image-popup{{$post->id}}">
                                                                <div class="overflow-hidden fullscreen-video w-100">
                                                                    <div class="player-wrapper overflow-hidden">
                                                                        <video class="player-html" controls crossorigin="anonymous"
                                                                            {{--                                   poster="assets/images/videos/poster.jpg"--}}
                                                                        >
                                                                            <source src="{{asset($file->file_path)}}" type="video/mp4">
                                                                        </video>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach

                                </div>
                            </div>
                    @endswitch
                @endif
                @forelse($post->file->where('file_type','voice') as $voice)
                        <audio controls class="w-100">
                            <source src="{{asset($voice->file_path)}}" type="audio/ogg">
                            <source src="{{asset($voice->file_path)}}" type="audio/mp3">
                            <source src="{{asset($voice->file_path)}}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    @empty
                @endforelse
                @forelse($post->file->where('file_type','files') as $file)
                        <div class="card-footer border-0 d-flex justify-content-between align-items-center">
                            <p class="mb-0">{{$post->user->name}}.file.{{$file->prefix}}</p>
                            <a class="btn btn-primary-soft btn-sm" href="{{asset($file->file_path)}}" download> Download now </a>
                        </div>
                    @empty
                @endforelse
            @endif

            <!-- Feed react START -->
            <ul class="nav nav-stack py-3 small">
                <li class="nav-item">
                    @livewire('like-live' , ['post' => $post])
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments ({{$post->comment()->count()}})</a>
                </li>
                <!-- Card share action START -->
                <li class="nav-item dropdown ms-sm-auto">
                    <a class="nav-link mb-0" href="#" id="cardShareAction" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                    </a>
                    <!-- Card share action dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                    </ul>
                </li>
                <!-- Card share action END -->
            </ul>
            <!-- Feed react END -->

            <!-- Add wcomment -->
            <div class="d-flex mb-3">
                <!-- Avatar -->
                <div class="avatar avatar-xs me-2">
                    <a href="#!"> <img class="avatar-img rounded-circle"
                                       @if(Auth::user()->pphoto_id != null)
                                        src="{{asset(Auth::user()->photo->path)}}"
                                       @else
                                           src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                       @endif > </a>
                </div>
                <!-- Comment box  -->
                <form class="nav nav-item w-100 position-relative">
                    <textarea data-autoresize class="form-control pe-5 bg-light" rows="1" placeholder="Add a comment..."></textarea>
                    <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0" type="submit">
                        <i class="bi bi-send-fill"> </i>
                    </button>
                </form>
            </div>

            <!-- Comment wrap START -->
{{--                        <ul class="comment-wrap list-unstyled">--}}
{{--                <!-- Comment item START -->--}}
{{--                <li class="comment-item">--}}
{{--                    <div class="d-flex position-relative">--}}
{{--                        <!-- Avatar -->--}}
{{--                        <div class="avatar avatar-xs">--}}
{{--                            <a href="#!"><img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/05.jpg')}}" alt=""></a>--}}
{{--                        </div>--}}
{{--                        <div class="ms-2">--}}
{{--                            <!-- Comment by -->--}}
{{--                            <div class="bg-light rounded-start-top-0 p-3 rounded">--}}
{{--                                <div class="d-flex justify-content-between">--}}
{{--                                    <h6 class="mb-1"> <a href="#!"> Frances Guerrero </a></h6>--}}
{{--                                    <small class="ms-2">5hr</small>--}}
{{--                                </div>--}}
{{--                                <p class="small mb-0">Removed demands expense account in outward tedious do. Particular way thoroughly unaffected projection.</p>--}}
{{--                            </div>--}}
{{--                            <!-- Comment react -->--}}
{{--                            <ul class="nav nav-divider py-2 small">--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="#!"> Like (3)</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="#!"> Reply</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="#!"> View 5 replies</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Comment item nested START -->--}}
{{--                    <ul class="comment-item-nested list-unstyled">--}}
{{--                        <!-- Comment item START -->--}}
{{--                        <li class="comment-item">--}}
{{--                            <div class="d-flex">--}}
{{--                                <!-- Avatar -->--}}
{{--                                <div class="avatar avatar-xs">--}}
{{--                                    <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt=""></a>--}}
{{--                                </div>--}}
{{--                                <!-- Comment by -->--}}
{{--                                <div class="ms-2">--}}
{{--                                    <div class="bg-light p-3 rounded">--}}
{{--                                        <div class="d-flex justify-content-between">--}}
{{--                                            <h6 class="mb-1"> <a href="#!"> Lori Stevens </a> </h6>--}}
{{--                                            <small class="ms-2">2hr</small>--}}
{{--                                        </div>--}}
{{--                                        <p class="small mb-0">See resolved goodness felicity shy civility domestic had but Drawings offended yet answered Jennings perceive.</p>--}}
{{--                                    </div>--}}
{{--                                    <!-- Comment react -->--}}
{{--                                    <ul class="nav nav-divider py-2 small">--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="#!"> Like (5)</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="#!"> Reply</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <!-- Comment item END -->--}}
{{--                        <!-- Comment item START -->--}}
{{--                        <li class="comment-item">--}}
{{--                            <div class="d-flex">--}}
{{--                                <!-- Avatar -->--}}
{{--                                <div class="avatar avatar-story avatar-xs">--}}
{{--                                    <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt=""></a>--}}
{{--                                </div>--}}
{{--                                <!-- Comment by -->--}}
{{--                                <div class="ms-2">--}}
{{--                                    <div class="bg-light p-3 rounded">--}}
{{--                                        <div class="d-flex justify-content-between">--}}
{{--                                            <h6 class="mb-1"> <a href="#!"> Billy Vasquez </a> </h6>--}}
{{--                                            <small class="ms-2">15min</small>--}}
{{--                                        </div>--}}
{{--                                        <p class="small mb-0">Wishing calling is warrant settled was lucky.</p>--}}
{{--                                    </div>--}}
{{--                                    <!-- Comment react -->--}}
{{--                                    <ul class="nav nav-divider py-2 small">--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="#!"> Like</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="#!"> Reply</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <!-- Comment item END -->--}}
{{--                    </ul>--}}
{{--                    <!-- Load more replies -->--}}
{{--                    <a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center mb-3 ms-5" data-bs-toggle="button" aria-pressed="true">--}}
{{--                        <div class="spinner-dots me-2">--}}
{{--                            <span class="spinner-dot"></span>--}}
{{--                            <span class="spinner-dot"></span>--}}
{{--                            <span class="spinner-dot"></span>--}}
{{--                        </div>--}}
{{--                        Load more replies--}}
{{--                    </a>--}}
{{--                    <!-- Comment item nested END -->--}}
{{--                </li>--}}
{{--                <!-- Comment item END -->--}}

{{--                <!-- Comment item START -->--}}
{{--                <li class="comment-item">--}}
{{--                    <div class="d-flex">--}}
{{--                        <!-- Avatar -->--}}
{{--                        <div class="avatar avatar-xs">--}}
{{--                            <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt=""></a>--}}
{{--                        </div>--}}
{{--                        <!-- Comment by -->--}}
{{--                        <div class="ms-2">--}}
{{--                            <div class="bg-light p-3 rounded">--}}
{{--                                <div class="d-flex justify-content-between">--}}
{{--                                    <h6 class="mb-1"> <a href="#!"> Frances Guerrero </a> </h6>--}}
{{--                                    <small class="ms-2">4min</small>--}}
{{--                                </div>--}}
{{--                                <p class="small mb-0">Removed demands expense account in outward tedious do. Particular way thoroughly unaffected projection.</p>--}}
{{--                            </div>--}}
{{--                            <!-- Comment react -->--}}
{{--                            <ul class="nav nav-divider pt-2 small">--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="#!"> Like (1)</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="#!"> Reply</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="#!"> View 6 replies</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <!-- Comment item END -->--}}
{{--            </ul>--}}
            <!-- Comment wrap END -->
        </div>
        <!-- Card body END -->

        <!-- Card footer START -->
{{--                <div class="card-footer border-0 pt-0">--}}
{{--            <!-- Load more comments -->--}}
{{--            <a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center" data-bs-toggle="button" aria-pressed="true">--}}
{{--                <div class="spinner-dots me-2">--}}
{{--                    <span class="spinner-dot"></span>--}}
{{--                    <span class="spinner-dot"></span>--}}
{{--                    <span class="spinner-dot"></span>--}}
{{--                </div>--}}
{{--                Load more comments--}}
{{--            </a>--}}
{{--        </div>--}}
        <!-- Card footer END -->

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const postGallery = GLightbox({
                selector: '[data-gallery="image-popup{{$post->id}}"]',
            });
        });
    </script>
@endforeach

