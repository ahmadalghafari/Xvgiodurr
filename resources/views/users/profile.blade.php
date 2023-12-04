<!DOCTYPE html>
<html lang="en">
<head>
    <title>Social - Network, Ce</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">


    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if(el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })

    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('import/assets/images/favicon.ico')}}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/dropzone/dist/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/glightbox-master/dist/css/glightbox.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/choices.js/public/assets/styles/choices.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/flatpickr/dist/flatpickr.min.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/css/style.css')}}">

</head>

<body>

<!-- =======================
Header START -->
<header class="navbar-light fixed-top header-static bg-mode">

    <!-- Logo Nav START -->
    @include('layouts.nav')
    <!-- Logo Nav END -->
</header>
<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- Container START -->
    <div class="container">
        <div class="row g-4">

            <!-- Main content START -->
            <div class="col-lg-8 vstack gap-4">
                <!-- My profile START -->
                <div class="card">
                    <!-- Cover image -->
                    <div class="h-200px rounded-top" style="background-image:url({{asset('import/assets/images/bg/05.jpg')}}); background-position: center; background-size: cover; background-repeat: no-repeat;">

                    </div>

                    <!-- Card body START -->
                    <div class="card-body py-0">
                        <div class="d-sm-flex align-items-start text-center text-sm-start">
                            <div>
                                <!-- Avatar -->
                                <div class="avatar avatar-xxl mt-n5 mb-3">
                                    <a href="#!"><img class="avatar-img rounded-circle border border-white border-3" alt=" "
                                                      @if(Auth::user()->pphoto_id != null)
                                                          src="{{asset(Auth::user()->photo->path)}}"
                                                      @else
                                                          src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                            @endif
                                        ></a>
                                </div>
                            </div>
                            <div class="ms-sm-4 mt-sm-3">
                                <!-- Info -->
                                <h1 class="mb-0 h5">{{Auth::user()->name}}<i class="bi bi-patch-check-fill text-success small"></i></h1>
                                <p>250 connections</p>
                            </div>
                            <!-- Button -->
                            <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                                <button class="btn btn-danger-soft me-2" type="button"> <i class="bi bi-pencil-fill pe-1"></i> Edit profile </button>
                                <div class="dropdown">
                                    <!-- Card share action menu -->
                                    <button class="icon-md btn btn-light" type="button" id="profileAction2" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <!-- Card share action dropdown menu -->
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileAction2">
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Share profile in a message</a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-file-earmark-pdf fa-fw pe-2"></i>Save your profile to PDF</a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-lock fa-fw pe-2"></i>Lock profile</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Profile settings</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- List profile -->
                        <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
                            <li class="list-inline-item"><i class="bi bi-briefcase me-1"></i> Lead Developer</li>
                            <li class="list-inline-item"><i class="bi bi-geo-alt me-1"></i> New Hampshire</li>
                            <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> Joined on Nov 26, 2019</li>
                        </ul>
                    </div>
                    <!-- Card body END -->
                    <div class="card-footer mt-3 pt-2 pb-0">
                        <!-- Nav profile pages -->
                        <ul class="nav nav-bottom-line align-items-center justify-content-center justify-content-md-start mb-0 border-0">
                            <li class="nav-item"> <a class="nav-link active" href={{route('home.posts.index')}}> Posts </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="my-profile-about.html"> About </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="my-profile-connections.html"> Connections <span class="badge bg-success bg-opacity-10 text-success small"> 230</span> </a> </li>
                            <li class="nav-item"> <a class="nav-link" href="my-profile-media.html"> Media</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="my-profile-videos.html"> Videos</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="my-profile-events.html"> Events</a> </li>
                            <li class="nav-item"> <a class="nav-link" href="my-profile-activity.html"> Activity</a> </li>
                        </ul>
                    </div>
                </div>
                <!-- My profile END -->

                <!-- Share feed START -->
                @include('layouts.place-posting')
                <!-- Share feed END -->

                @foreach($posts as $post)
                    <div class="card">
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
{{--                                        <li><a href="#" class="dropdown-item"><i class="bi bi-x-circle fa-fw pe-2"></i>Delete post</a></li>--}}
                                        <li><form action="{{route('home.posts.destroy' , $post)}}" method="POST">@csrf @method('DELETE')<button class="dropdown-item" type="submit"><i class="bi bi-x-circle fa-fw pe-2"></i>Delete post</button></form></li>
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
                                                                <a class="h-100" href="{{asset($files->file_path)}}" data-glightbox data-gallery="image-popup{{$post->id}}">
                                                                    <img class="rounded img-fluid" src="{{asset($files->file_path)}}" alt="Image">
                                                                </a>
                                                            </div>
                                                        @elseif($files->file_type == 'videos')
                                                            <div class="col-6">
                                                                <!-- Grid video -->
                                                                <a class="h-100" href="{{asset($files->file_path)}}" data-glightbox data-gallery="image-popup{{$post->id}}">
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
                                                                    <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup{{$post->id}}" >
                                                                        <img class="rounded img-fluid" src="{{asset($file->file_path)}}" alt="Image">
                                                                    </a>

                                                                </div>
                                                            @elseif($file->file_type == 'videos')
                                                                <div class="col-6">
                                                                    <!-- Grid video -->
                                                                    <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup{{$post->id}}">
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
                                                                    <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup{{$post->id}}" >
                                                                        <img class="rounded img-fluid" src="{{asset($file->file_path)}}" alt="Image">
                                                                    </a>
                                                                </div>
                                                            @elseif($file->file_type == 'videos')
                                                                <div class="col-6" style="display: none">
                                                                    <!-- Grid video -->
                                                                    <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup{{$post->id}}">
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
                                                                        <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup{{$post->id}}">
                                                                            <img class="img-fluid opacity-50 rounded" src="{{asset($file->file_path)}}" alt="Image">
                                                                        </a>
                                                                    </div>
                                                                @elseif($file->file_type == 'videos')
                                                                    <div class="position-relative bg-dark  rounded">
                                                                        <div class="hover-actions-item position-absolute top-50 start-50 translate-middle z-index-9">
                                                                            <a class="btn btn-link text-white" href="#"> View all </a>
                                                                        </div>
                                                                        <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup{{$post->id}}">
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

            </div>
            <!-- Main content END -->

            <!-- Right sidebar START -->
            <div class="col-lg-4">

                <div class="row g-4">

                    <!-- Card START -->
                    <div class="col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">About</h5>
                                <!-- Button modal -->
                            </div>
                            <!-- Card body START -->
                            <div class="card-body position-relative pt-0">
                                <p>He moonlights difficult engrossed it, sportsmen. Interested has all Devonshire difficulty gay assistance joy.</p>
                                <!-- Date time -->
                                <ul class="list-unstyled mt-3 mb-0">
                                    <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> Born: <strong> October 20, 1990 </strong> </li>
                                    <li class="mb-2"> <i class="bi bi-heart fa-fw pe-1"></i> Status: <strong> Single </strong> </li>
                                    <li> <i class="bi bi-envelope fa-fw pe-1"></i> Email: <strong> webestica@gmail.com </strong> </li>
                                </ul>
                            </div>
                            <!-- Card body END -->
                        </div>
                    </div>
                    <!-- Card END -->

                    <!-- Card START -->
                    <div class="col-md-6 col-lg-12">
                        <div class="card">
                            <!-- Card header START -->
                            <div class="card-header d-flex justify-content-between border-0">
                                <h5 class="card-title">Experience</h5>
                                <a class="btn btn-primary-soft btn-sm" href="#!"> <i class="fa-solid fa-plus"></i> </a>
                            </div>
                            <!-- Card header END -->
                            <!-- Card body START -->
                            <div class="card-body position-relative pt-0">
                                <!-- Experience item START -->
                                <div class="d-flex">
                                    <!-- Avatar -->
                                    <div class="avatar me-3">
                                        <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/logo/08.svg')}}" alt=""> </a>
                                    </div>
                                    <!-- Info -->
                                    <div>
                                        <h6 class="card-title mb-0"><a href="#!"> Apple Computer, Inc. </a></h6>
                                        <p class="small">May 2015 – Present Employment Duration 8 mos <a class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                                    </div>
                                </div>
                                <!-- Experience item END -->

                                <!-- Experience item START -->
                                <div class="d-flex">
                                    <!-- Avatar -->
                                    <div class="avatar me-3">
                                        <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/logo/09.svg')}}" alt=""> </a>
                                    </div>
                                    <!-- Info -->
                                    <div>
                                        <h6 class="card-title mb-0"><a href="#!"> Microsoft Corporation </a></h6>
                                        <p class="small">May 2017 – Present Employment Duration 1 yrs 5 mos <a class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                                    </div>
                                </div>
                                <!-- Experience item END -->

                                <!-- Experience item START -->
                                <div class="d-flex">
                                    <!-- Avatar -->
                                    <div class="avatar me-3">
                                        <a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/logo/10.svg')}}" alt=""> </a>
                                    </div>
                                    <!-- Info -->
                                    <div>
                                        <h6 class="card-title mb-0"><a href="#!"> Tata Consultancy Services. </a></h6>
                                        <p class="small mb-0">May 2022 – Present Employment Duration 6 yrs 10 mos <a class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                                    </div>
                                </div>
                                <!-- Experience item END -->

                            </div>
                            <!-- Card body END -->
                        </div>
                    </div>
                    <!-- Card END -->

                    <!-- Card START -->
                    <div class="col-md-6 col-lg-12">
                        <div class="card">
                            <!-- Card header START -->
                            <div class="card-header d-sm-flex justify-content-between border-0">
                                <h5 class="card-title">Photos</h5>
                                <a class="btn btn-primary-soft btn-sm" href="#!"> See all photo</a>
                            </div>
                            <!-- Card header END -->
                            <!-- Card body START -->
                            <div class="card-body position-relative pt-0">
                                <div class="row g-2">
                                    <!-- Photos item -->
                                    <div class="col-6">
                                        <a href="{{asset('import/assets/images/albums/01.jpg')}}" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="{{asset('import/assets/images/albums/01.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <!-- Photos item -->
                                    <div class="col-6">
                                        <a href="{{asset('import/assets/images/albums/02.jpg')}}" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="{{asset('import/assets/images/albums/02.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <!-- Photos item -->
                                    <div class="col-4">
                                        <a href="{{asset('import/assets/images/albums/03.jpg')}}" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="{{asset('import/assets/images/albums/03.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <!-- Photos item -->
                                    <div class="col-4">
                                        <a href="{{asset('import/assets/images/albums/04.jpg')}}" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="{{asset('import/assets/images/albums/04.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <!-- Photos item -->
                                    <div class="col-4">
                                        <a href="{{asset('import/assets/images/albums/05.jpg')}}" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="{{asset('import/assets/images/albums/05.jpg')}}" alt="">
                                        </a>
                                        <!-- glightbox Albums left bar END  -->
                                    </div>
                                </div>
                            </div>
                            <!-- Card body END -->
                        </div>
                    </div>
                    <!-- Card END -->

                    <!-- Card START -->
                    <div class="col-md-6 col-lg-12">
                        <div class="card">
                            <!-- Card header START -->
                            <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
                                <h5 class="card-title">Friends <span class="badge bg-danger bg-opacity-10 text-danger">230</span></h5>
                                <a class="btn btn-primary-soft btn-sm" href="#!"> See all friends</a>
                            </div>
                            <!-- Card header END -->
                            <!-- Card body START -->
                            <div class="card-body position-relative pt-0">
                                <div class="row g-3">

                                    <div class="col-6">
                                        <!-- Friends item START -->
                                        <div class="card shadow-none text-center h-100">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-story avatar-xl">
                                                    <a href="#!"><img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/02.jpg')}}" alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!"> Amanda Reed </a></h6>
                                                <p class="mb-0 small lh-sm">16 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove friend"> <i class="bi bi-person-x"></i> </button>
                                            </div>
                                        </div>
                                        <!-- Friends item END -->
                                    </div>

                                    <div class="col-6">
                                        <!-- Friends item START -->
                                        <div class="card shadow-none text-center h-100">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/03.jpg')}}" alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!"> Samuel Bishop </a></h6>
                                                <p class="mb-0 small lh-sm">22 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove friend"> <i class="bi bi-person-x"></i> </button>
                                            </div>
                                        </div>
                                        <!-- Friends item END -->
                                    </div>

                                    <div class="col-6">
                                        <!-- Friends item START -->
                                        <div class="card shadow-none text-center h-100">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/04.jpg')}}" alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#"> Bryan Knight </a></h6>
                                                <p class="mb-0 small lh-sm">1 mutual connection</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove friend"> <i class="bi bi-person-x"></i> </button>
                                            </div>
                                        </div>
                                        <!-- Friends item END -->
                                    </div>

                                    <div class="col-6">
                                        <!-- Friends item START -->
                                        <div class="card shadow-none text-center h-100">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/05.jpg')}}" alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!"> Amanda Reed </a></h6>
                                                <p class="mb-0 small lh-sm">15 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Send message"> <i class="bi bi-chat-left-text"></i> </button>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove friend"> <i class="bi bi-person-x"></i> </button>
                                            </div>
                                        </div>
                                        <!-- Friends item END -->
                                    </div>

                                </div>
                            </div>
                            <!-- Card body END -->
                        </div>
                    </div>
                    <!-- Card END -->
                </div>

            </div>
            <!-- Right sidebar END -->

        </div> <!-- Row END -->
    </div>
    <!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->



<!-- Bootstrap JS -->
<script src="{{asset('import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Vendors -->
<script src="{{asset('import/assets/vendor/dropzone/dist/dropzone.js')}}"></script>
<script src="{{asset('import/assets/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{asset('import/assets/vendor/glightbox-master/dist/js/glightbox.min.js')}}"></script>
<script src="{{asset('import/assets/vendor/flatpickr/dist/flatpickr.min.js')}}"></script>

<!-- Theme Functions -->
<script src="{{asset('import/assets/js/functions.js')}}"></script>

</body>
</html>
