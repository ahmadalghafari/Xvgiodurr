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
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo START -->
            <a class="navbar-brand" href={{route('home.posts.index')}}>
                <img class="light-mode-item navbar-brand-item" src="{{asset('import/assets/images/logo.svg')}}" alt="logo">
                <img class="dark-mode-item navbar-brand-item" src="{{asset('import/assets/images/logo.svg')}}" alt="logo">
            </a>
            <!-- Logo END -->

            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto icon-md btn btn-light p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-animation">
          <span></span>
          <span></span>
          <span></span>
        </span>
            </button>

            <!-- Main navbar START -->
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <!-- Nav Search START -->
                <div class="nav mt-3 mt-lg-0 flex-nowrap align-items-center px-4 px-lg-0">
                    <div class="nav-item w-100">
                        <form class="rounded position-relative">
                            <input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search">
                            <button class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
                        </form>
                    </div>
                </div>
                <!-- Nav Search END -->

                <ul class="navbar-nav navbar-nav-scroll ms-auto">
                    <!-- Nav item 1 Demos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="homeMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Demo</a>
                        <ul class="dropdown-menu" aria-labelledby="homeMenu">
                            <li> <a class="dropdown-item"  href={{route('home.posts.index')}}>Home default</a></li>
                            <li> <a class="dropdown-item" href="index-classic.html">Home classic</a></li>
                            <li> <a class="dropdown-item" href="index-post.html">Home post</a></li>
                            <li> <a class="dropdown-item" href="index-video.html">Home video</a></li>
                            <li> <a class="dropdown-item" href="index-event.html">Home event</a></li>
                            <li> <a class="dropdown-item" href="landing.html">Landing page</a></li>
                            <li> <a class="dropdown-item" href="app-download.html">App download</a></li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="https://themes.getbootstrap.com/store/webestica/" target="_blank">
                                    <i class="text-success fa-fw bi bi-cloud-download-fill me-2"></i>Buy Social!
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Nav item 2 Pages -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu" aria-labelledby="pagesMenu">
                            <li> <a class="dropdown-item" href="albums.html">Albums</a></li>
                            <li> <a class="dropdown-item" href="celebration.html">Celebration</a></li>
                            <li> <a class="dropdown-item" href="messaging.html">Messaging</a></li>
                            <!-- Dropdown submenu -->
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle" href="#!">Profile</a>
                                <ul class="dropdown-menu" data-bs-popper="none">
                                    <li> <a class="dropdown-item" href="my-profile.html">Feed</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-about.html">About</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-connections.html">Connections</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-media.html">Media</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-videos.html">Videos</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-events.html">Events</a> </li>
                                    <li> <a class="dropdown-item" href="my-profile-activity.html">Activity</a> </li>
                                </ul>
                            </li>
                            <li> <a class="dropdown-item" href="events.html">Events</a></li>
                            <li> <a class="dropdown-item" href="events-2.html">Events 2</a></li>
                            <li> <a class="dropdown-item" href="event-details.html">Event details</a></li>
                            <li> <a class="dropdown-item" href="event-details-2.html">Event details 2</a></li>
                            <li> <a class="dropdown-item" href="groups.html">Groups</a></li>
                            <li> <a class="dropdown-item" href="group-details.html">Group details</a></li>
                            <li> <a class="dropdown-item" href="post-videos.html">Post videos</a></li>
                            <li> <a class="dropdown-item" href="post-video-details.html">Post video details</a></li>
                            <li> <a class="dropdown-item" href="post-details.html">Post details</a></li>
                            <li> <a class="dropdown-item" href="video-details.html">Video details</a></li>
                            <li> <a class="dropdown-item" href="blog.html">Blog</a></li>
                            <li> <a class="dropdown-item" href="blog-details.html">Blog details</a></li>

                            <!-- Dropdown submenu levels -->
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle" href="#">Dropdown levels</a>
                                <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                                    <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                    <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                    <!-- dropdown submenu open left -->
                                    <li class="dropdown-submenu dropstart">
                                        <a class="dropdown-item dropdown-toggle" href="#">Dropdown (start)</a>
                                        <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                                            <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                            <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                        </ul>
                                    </li>
                                    <li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- Nav item 3 Post -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="postMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account </a>
                        <ul class="dropdown-menu" aria-labelledby="postMenu">
                            <li> <a class="dropdown-item" href="create-page.html">Create a page</a></li>
                            <li> <a class="dropdown-item" href={{route('home.settings')}} >Settings</a> </li>
                            <li> <a class="dropdown-item" href="notifications.html">Notifications</a> </li>
                            <li> <a class="dropdown-item" href="help.html">Help center</a> </li>
                            <li> <a class="dropdown-item" href="help-details.html">Help details</a> </li>
                            <!-- dropdown submenu open left -->
                            <li class="dropdown-submenu dropstart">
                                <a class="dropdown-item dropdown-toggle" href="#">Authentication</a>
                                <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                                    <li> <a class="dropdown-item" href="sign-in.html">Sign in</a> </li>
                                    <li> <a class="dropdown-item" href="sign-up.html">Sing up</a> </li>
                                    <li> <a class="dropdown-item" href="forgot-password.html">Forgot password</a> </li>
                                    <li class="dropdown-divider"></li>
                                    <li> <a class="dropdown-item" href="sign-in-advance.html">Sign in advance</a> </li>
                                    <li> <a class="dropdown-item" href="sign-up-advance.html">Sing up advance</a> </li>
                                    <li> <a class="dropdown-item" href="forgot-password-advance.html">Forgot password advance</a> </li>
                                </ul>
                            </li>
                            <li> <a class="dropdown-item" href="error-404.html">Error 404</a> </li>
                            <li> <a class="dropdown-item" href="offline.html">Offline</a> </li>
                            <li> <a class="dropdown-item" href="privacy-and-terms.html">Privacy & terms</a> </li>
                        </ul>
                    </li>

                    <!-- Nav item 4 Mega menu -->
                    <li class="nav-item">
                        <a class="nav-link" href="my-profile-connections.html">My network</a>
                    </li>
                </ul>
            </div>
            <!-- Main navbar END -->

            <!-- Nav right START -->
            <ul class="nav flex-nowrap align-items-center ms-sm-3 list-unstyled">
                <li class="nav-item ms-2">
                    <a class="nav-link bg-light icon-md btn btn-light p-0" href="messaging.html">
                        <i class="bi bi-chat-left-text-fill fs-6"> </i>
                    </a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link bg-light icon-md btn btn-light p-0" href="settings.html">
                        <i class="bi bi-gear-fill fs-6"> </i>
                    </a>
                </li>
                <li class="nav-item dropdown ms-2">
                    <a class="nav-link bg-light icon-md btn btn-light p-0" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                        <span class="badge-notif animation-blink"></span>
                        <i class="bi bi-bell-fill fs-6"> </i>
                    </a>
                    <div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0" aria-labelledby="notifDropdown">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="m-0">Notifications <span class="badge bg-danger bg-opacity-10 text-danger ms-2">4 new</span></h6>
                                <a class="small" href="#">Clear all</a>
                            </div>
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush list-unstyled p-2">
                                    <!-- Notif item -->
                                    <li>
                                        <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
                                            <div class="avatar text-center d-none d-sm-inline-block">
                                                <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/01.jpg')}}" alt="">
                                            </div>
                                            <div class="ms-sm-3">
                                                <div class=" d-flex">
                                                    <p class="small mb-2"><b>Judy Nguyen</b> sent you a friend request.</p>
                                                    <p class="small ms-3 text-nowrap">Just now</p>
                                                </div>
                                                <div class="d-flex">
                                                    <button class="btn btn-sm py-1 btn-primary me-2">Accept </button>
                                                    <button class="btn btn-sm py-1 btn-danger-soft">Delete </button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Notif item -->
                                    <li>
                                        <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3 position-relative">
                                            <div class="avatar text-center d-none d-sm-inline-block">
                                                <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
                                            </div>
                                            <div class="ms-sm-3 d-flex">
                                                <div>
                                                    <p class="small mb-2">Wish <b>Amanda Reed</b> a happy birthday (Nov 12)</p>
                                                    <button class="btn btn-sm btn-outline-light py-1 me-2">Say happy birthday 🎂</button>
                                                </div>
                                                <p class="small ms-3">2min</p>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Notif item -->
                                    <li>
                                        <a href="#" class="list-group-item list-group-item-action rounded d-flex border-0 mb-1 p-3">
                                            <div class="avatar text-center d-none d-sm-inline-block">
                                                <div class="avatar-img rounded-circle bg-success"><span class="text-white position-absolute top-50 start-50 translate-middle fw-bold">WB</span></div>
                                            </div>
                                            <div class="ms-sm-3">
                                                <div class="d-flex">
                                                    <p class="small mb-2">Webestica has 15 like and 1 new activity</p>
                                                    <p class="small ms-3">1hr</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- Notif item -->
                                    <li>
                                        <a href="#" class="list-group-item list-group-item-action rounded d-flex border-0 p-3 mb-1">
                                            <div class="avatar text-center d-none d-sm-inline-block">
                                                <img class="avatar-img rounded-circle" src="assets/images/logo/12.svg" alt="">
                                            </div>
                                            <div class="ms-sm-3 d-flex">
                                                <p class="small mb-2"><b>Bootstrap in the news:</b> The search giant’s parent company, Alphabet, just joined an exclusive club of tech stocks.</p>
                                                <p class="small ms-3">4hr</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#" class="btn btn-sm btn-primary-soft">See all incoming activity</a>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- Notification dropdown END -->

                <li class="nav-item ms-2 dropdown">
                    <a class="nav-link btn icon-md p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="avatar-img rounded-2" alt=""
                             @if(Auth::user()->pphoto_id != null)
                                 src="{{asset(Auth::user()->photo->path)}}"
                             @else
                                 src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                            @endif
                        >
                    </a>
                    <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
                        <!-- Profile info -->
                        <li class="px-3">
                            <div class="d-flex align-items-center position-relative">
                                <!-- Avatar -->
                                <div class="avatar me-3">
                                    <a href="#"><img class="avatar-img rounded-circle" alt=""
                                                      @if(Auth::user()->pphoto_id != null)
                                                          src="{{asset(Auth::user()->photo->path)}}"
                                                      @else
                                                          src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                            @endif
                                        ></a>
                                </div>
                                <div>
                                    <a class="h6 stretched-link" href="#">{{Auth::user()->name}}</a>
                                    <p class="small m-0">Web Developer</p>
                                </div>
                            </div>
                            <a class="dropdown-item btn btn-primary-soft btn-sm my-2 text-center" href={{route('home.users.show',Auth::user()->id)}}>View profile</a>
                        </li>
                        <!-- Links -->
                        <li><a class="dropdown-item" href="settings.html"><i class="bi bi-gear fa-fw me-2"></i>Settings & Privacy</a></li>
                        <li>
                            <a class="dropdown-item" href="https://support.webestica.com/" target="_blank">
                                <i class="fa-fw bi bi-life-preserver me-2"></i>Support
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="docs/index.html" target="_blank">
                                <i class="fa-fw bi bi-card-text me-2"></i>Documentation
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item bg-danger-soft-hover" href="sign-in-advance.html"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
                        <li> <hr class="dropdown-divider"></li>
                        <!-- Dark mode options START -->
                        <li>
                            <div class="modeswitch-item theme-icon-active d-flex justify-content-center gap-3 align-items-center p-2 pb-0">
                                <span>Mode:</span>
                                <button type="button" class="btn btn-modeswitch nav-link text-primary-hover mb-0" data-bs-theme-value="light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Light">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun fa-fw mode-switch" viewBox="0 0 16 16">
                                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                                        <use href="#"></use>
                                    </svg>
                                </button>
                                <button type="button" class="btn btn-modeswitch nav-link text-primary-hover mb-0" data-bs-theme-value="dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars fa-fw mode-switch" viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                                        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
                                        <use href="#"></use>
                                    </svg>
                                </button>
                                <button type="button" class="btn btn-modeswitch nav-link text-primary-hover mb-0 active" data-bs-theme-value="auto" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
                                        <use href="#"></use>
                                    </svg>
                                </button>
                            </div>
                        </li>
                        <!-- Dark mode options END-->
                    </ul>
                </li>
                <!-- Profile START -->

            </ul>
            <!-- Nav right END -->
        </div>
    </nav>
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
                    <div class="h-200px rounded-top" >
                        <a href="#!"><img class="h-200px rounded-top" alt="avatar"
                                          @if(Auth::user()->pphoto_id != null)
                                              src="{{asset(Auth::user()->photo->path)}}"
                                          @else
                                              src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                @endif
                            ></a>
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
                <div class="card card-body">
                    <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs me-2">
                            <a href="">
                                <img class="avatar-img rounded-circle"
                                     @if(Auth::user()->pphoto_id != null)
                                         src="{{asset(Auth::user()->photo->path)}}"
                                     @else
                                         src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                    @endif>
                            </a>
                        </div>
                        <!-- Form Start -->
                        <form class="w-100" action="{{route('home.posts.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @foreach($errors->all() as $error)
                                <div >{{ $error }}</div>
                            @endforeach
                            <textarea class="form-control pe-4 border-0"  name="text" id="post_text" rows="2" data-autoresize placeholder="Share your thoughts..."></textarea><br>

                            <!-- Share feed toolbar START -->
                            <ul class="nav nav-pills nav-stack small fw-normal">
                                <li class="nav-item">
                                    <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionPhoto"> <i class="bi bi-image-fill text-success pe-2"></i>Photo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionVideo"> <i class="bi bi-camera-reels-fill text-info pe-2"></i>Video</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link bg-light py-1 px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalCreateEvents"> <i class="bi bi-card-list text-danger pe-2 "></i>File </a>
                                </li>
                                <li class="nav-item">
                                    <button type="submit" name="submit" value="Post" class="nav-link bg-light py-1 px-2 mb-0">
                                        Post
                                    </button>
                                </li>
                                <li class="nav-item dropdown ms-lg-auto">
                                    <a class="nav-link bg-light py-1 px-2 mb-0" href="#" id="feedActionShare" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
                                    <!-- Dropdown menu -->
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare">
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Create a poll</a></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Ask a question </a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Help</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <!-- Modals start-->
                            <!-- Modal create Feed photo START -->
                            <div class="modal fade" id="feedActionPhoto" tabindex="-1" aria-labelledby="feedActionPhotoLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <!-- Modal feed header START -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="feedActionPhotoLabel">Add photo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <!-- Modal feed header END -->

                                        <!-- Modal feed body START -->
                                        <div class="modal-body">
                                            <div class="modal-body text-bg-dark">
                                                <input type="file" name="images[]" multiple id="photo" class="form-control " accept="image/*" >
                                            </div>
                                        </div>
                                        <!-- Modal feed body END -->

                                        <!-- Modal feed footer -->
                                        <div class="modal-footer ">
                                            <!-- Button -->
                                            <button type="button" class="btn btn-success-soft" data-bs-dismiss="modal">Done</button>
                                        </div>
                                        <!-- Modal feed footer -->

                                    </div>
                                </div>
                            </div>
                            <!-- Modal create Feed photo END -->

                            <!-- Modal create Feed video START -->
                            <div class="modal fade" id="feedActionVideo" tabindex="-1" aria-labelledby="feedActionVideoLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <!-- Modal feed header START -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="feedActionVideoLabel">Add video</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <!-- Modal feed header END -->

                                        <!-- Modal feed body START -->
                                        <div class="modal-body">
                                            <!-- Add Feed -->
                                            {{--                                                    <div class="d-flex mb-3">--}}
                                            {{--                                                        <!-- Avatar -->--}}
                                            {{--                                                        <div class="avatar avatar-xs me-2">--}}
                                            {{--                                                            <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/03.jpg')}}" alt="">--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                        <!-- Feed box  -->--}}
                                            {{--                                                        <form class="w-100">--}}
                                            {{--                                                            <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>--}}
                                            {{--                                                        </form>--}}
                                            {{--                                                    </div>--}}

                                            {{--                                                    <!-- Dropzone photo START -->--}}
                                            {{--                                                    <div>--}}
                                            {{--                                                        <label class="form-label">Upload attachment</label>--}}
                                            {{--                                                        <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>--}}
                                            {{--                                                            <div class="dz-message">--}}
                                            {{--                                                                <i class="bi bi-camera-reels display-3"></i>--}}
                                            {{--                                                                <p>Drag here or click to upload video.</p>--}}
                                            {{--                                                            </div>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            <!-- Dropzone photo END -->
                                            <div class="modal-body text-bg-dark">
                                                video : <input type="file" name="videos[]" multiple id="video" class="form-control" accept="video/*">
                                            </div>
                                        </div>
                                        <!-- Modal feed body END -->

                                        <!-- Modal feed footer -->
                                        <div class="modal-footer">
                                            <!-- Button -->
                                            {{--                                                    <button type="button" class="btn btn-danger-soft me-2"><i class="bi bi-camera-video-fill pe-1"></i> Live video</button>--}}
                                            <button type="button" class="btn btn-success-soft" data-bs-dismiss="modal" >Done</button>
                                        </div>
                                        <!-- Modal feed footer -->
                                    </div>
                                </div>
                            </div>
                            <!-- Modal create Feed video END -->

                            <!-- Modal create files START -->
                            <div class="modal fade" id="modalCreateEvents" tabindex="-1" aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <!-- Modal feed header START -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabelCreateAlbum">Add file</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <!-- Modal feed header END -->


                                        <!-- Modal feed body START -->
                                        <div class="modal-body">
                                            <div class="modal-body text-bg-dark">
                                                file : <input type="file" name="files[]" multiple id="file" class="form-control">
                                            </div>
                                        </div>
                                        <!-- Modal feed body END -->


                                        <!-- Modal footer -->
                                        <!-- Button -->
                                        <div class="modal-footer">
                                            {{--                                                    <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal"> Cancel</button>--}}
                                            {{--                                                    <button type="button" class="btn btn-success-soft">Create now</button>--}}
                                            <button type="button" class="btn btn-success-soft" data-bs-dismiss="modal" >Done</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal create files END -->
                            <!--  modals end-->

                        </form>
                        <!-- Form END -->
                    </div>
                </div>
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
                                    <img class="card-img" src="{{asset($post->file[0]->file_path)}}" alt="Post">
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
                                                <img class="card-img" src="{{asset($post->file[0]->file_path)}}" alt="Post">
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
                                                                    <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup" >
                                                                        <img class="rounded img-fluid" src="{{asset($file->file_path)}}" alt="Image">
                                                                    </a>

                                                                </div>
                                                            @elseif($file->file_type == 'videos')
                                                                <div class="col-6">
                                                                    <!-- Grid video -->
                                                                    <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup">
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
                                                                    <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup" >
                                                                        <img class="rounded img-fluid" src="{{asset($file->file_path)}}" alt="Image">
                                                                    </a>
                                                                </div>
                                                            @elseif($file->file_type == 'videos')
                                                                <div class="col-6" style="display: none">
                                                                    <!-- Grid video -->
                                                                    <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup">
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
                                                                        <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup">
                                                                            <img class="img-fluid opacity-50 rounded" src="{{asset($file->file_path)}}" alt="Image">
                                                                        </a>
                                                                    </div>
                                                                @elseif($file->file_type == 'videos')
                                                                    <div class="position-relative bg-dark  rounded">
                                                                        <div class="hover-actions-item position-absolute top-50 start-50 translate-middle z-index-9">
                                                                            <a class="btn btn-link text-white" href="#"> View all </a>
                                                                        </div>
                                                                        <a class="h-100" href="{{asset($file->file_path)}}" data-glightbox data-gallery="image-popup">
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
                                        <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/logo/08.svg" alt=""> </a>
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
                                        <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/logo/09.svg" alt=""> </a>
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
                                        <a href="#!"> <img class="avatar-img rounded-circle" src="assets/images/logo/10.svg" alt=""> </a>
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
                                        <a href="assets/images/albums/01.jpg" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="assets/images/albums/01.jpg" alt="">
                                        </a>
                                    </div>
                                    <!-- Photos item -->
                                    <div class="col-6">
                                        <a href="assets/images/albums/02.jpg" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="assets/images/albums/02.jpg" alt="">
                                        </a>
                                    </div>
                                    <!-- Photos item -->
                                    <div class="col-4">
                                        <a href="assets/images/albums/03.jpg" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="assets/images/albums/03.jpg" alt="">
                                        </a>
                                    </div>
                                    <!-- Photos item -->
                                    <div class="col-4">
                                        <a href="assets/images/albums/04.jpg" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="assets/images/albums/04.jpg" alt="">
                                        </a>
                                    </div>
                                    <!-- Photos item -->
                                    <div class="col-4">
                                        <a href="assets/images/albums/05.jpg" data-gallery="image-popup" data-glightbox="">
                                            <img class="rounded img-fluid" src="assets/images/albums/05.jpg" alt="">
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
                                                    <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt=""></a>
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
                                                    <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt=""></a>
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
                                                    <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt=""></a>
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
                                                    <a href="#!"><img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt=""></a>
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
