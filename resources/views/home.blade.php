<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Social - Network, Community and Event Theme</title>

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
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/tiny-slider/dist/tiny-slider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/choices.js/public/assets/styles/choices.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/glightbox-master/dist/css/glightbox.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/dropzone/dist/dropzone.css"')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/flatpickr/dist/flatpickr.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/plyr/plyr.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/zuck.js/dist/zuck.min.css')}}">

	<!-- Theme CSS -->
	    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/css/style.css')}}">
{{--        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>--}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        @livewireStyles
</head>
<body>

<!-- =======================
Header START nav-->
<header class="navbar-light fixed-top header-static bg-mode">

	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand" href="index.html">
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
                        <div class="dropdown">
						    <form class="rounded position-relative">

                                <input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search" data-toggle="dropdown">
                                <button class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
                                    <ul class="dropdown-menu mt-2">
                                        <!-- Your search results will go here -->
                                        <li><a class="dropdown-item" href="#">Result 1</a></li>
                                        <li><a class="dropdown-item" href="#">Result 2</a></li>
                                        <li><a class="dropdown-item" href="#">Result 3</a></li>
                                        <!-- Add more result items as needed -->
                                    </ul>

						    </form>
                        </div>
					</div>
				</div>
                <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="#">Result 3</a><</li>
                    </ul>

				<!-- Nav Search END -->

				<ul class="navbar-nav navbar-nav-scroll ms-auto">
					<!-- Nav item 1 Demos -->
					<li class="nav-item dropdown">
						<a class="nav-link active dropdown-toggle" href="#" id="homeMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Demo</a>
						<ul class="dropdown-menu" aria-labelledby="homeMenu">
							<li> <a class="dropdown-item active" href="index.html">Home default</a></li>
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
							<li> <a class="dropdown-item" href="settings.html">Settings</a> </li>
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
												<img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/02.jpg')}}" alt="">
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
												<img class="avatar-img rounded-circle" src="{{asset('import/assets/images/logo/12.svg')}}" alt="">
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
						<img class="avatar-img rounded-2"
                             @if(Auth::user()->pphoto_id != null)
                                 src="{{asset(Auth::user()->photo->path)}}"
                             @else
                                 src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                             @endif
                             alt="">
					</a>
					<ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3">
							<div class="d-flex align-items-center position-relative">
								<!-- Avatar -->
								<div class="avatar me-3">
									<img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/07.jpg')}}" alt="avatar">
								</div>
								<div>
									<a class="h6 stretched-link" href="#">Lori Ferguson</a>
									<p class="small m-0">Web Developer</p>
								</div>
							</div>
							<a class="dropdown-item btn btn-primary-soft btn-sm my-2 text-center" href="my-profile.html">View profile</a>
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
						<li>
                                <a class="dropdown-item bg-danger-soft-hover" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="bi bi-power fa-fw me-2"></i>Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </li>
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

			<!-- Sidenav START -->
			<div class="col-lg-3">

				<!-- Advanced filter responsive toggler START -->
				<div class="d-flex align-items-center d-lg-none">
					<button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
						<span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
						<span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
					</button>
				</div>
				<!-- Advanced filter responsive toggler END -->

				<!-- Navbar START-->
				<nav class="navbar navbar-expand-lg mx-0">
					<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
						<!-- Offcanvas header -->
						<div class="offcanvas-header">
							<button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>

						<!-- Offcanvas body -->
						<div class="offcanvas-body d-block px-2 px-lg-0">
							<!-- Card START -->
							<div class="card overflow-hidden">
								<!-- Cover image -->
								<div class="h-50px" style="background-image:url({{asset('import/assets/images/bg/01.jpg')}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
									<!-- Card body START -->
									<div class="card-body pt-0">
										<div class="text-center">
										<!-- Avatar -->
										<div class="avatar avatar-lg mt-n5 mb-3">
											<a href="#!"><img class="avatar-img rounded border border-white border-3"
                                                              @if(Auth::user()->pphoto_id != null)
                                                              src="{{asset(Auth::user()->photo->path)}}"
                                                              @else
                                                              src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                                              @endif
                                                              alt="your personal photo "></a>
										</div>
										<!-- Info -->
										<h5 class="mb-0"> <a href="#!">{{Auth::user()->name}}</a> </h5>
										<small>Web Developer at Webestica</small>
										<p class="mt-3">I'd love to change the world, but they won’t give me the source code.</p>

										<!-- User stat START -->
										<div class="hstack gap-2 gap-xl-3 justify-content-center">
											<!-- User stat item -->
											<div>
												<h6 class="mb-0">{{Auth::user()->post->count()}}</h6>
												<small>Post</small>
											</div>
											<!-- Divider -->
											<div class="vr"></div>
											<!-- User stat item -->
											@livewire('following')
                                            <!-- Divider -->
                                            <div class="vr"></div>
                                            <!-- User stat item -->
                                            <div>
                                                <h6 class="mb-0">{{Auth::user()->follow->count()}}</h6>
                                                <small>Following</small>
                                            </div>
										</div>
										<!-- User stat END -->
									</div>

									<!-- Divider -->
									<hr>

									<!-- Side Nav START -->
									<ul class="nav nav-link-secondary flex-column fw-bold gap-2">
										<li class="nav-item">
											<a class="nav-link" href="my-profile.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/home-outline-filled.svg')}}" alt=""><span>Feed </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="my-profile-connections.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/person-outline-filled.svg')}}" alt=""><span>Connections </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="blog.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/earth-outline-filled.svg')}}" alt=""><span>Latest News </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="events.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/calendar-outline-filled.svg')}}" alt=""><span>Events </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="groups.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/chat-outline-filled.svg')}}" alt=""><span>Groups </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="notifications.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/notification-outlined-filled.svg')}}" alt=""><span>Notifications </span></a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="settings.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/cog-outline-filled.svg')}}" alt=""><span>Settings </span></a>
										</li>
									</ul>
									<!-- Side Nav END -->


								</div>
								<!-- Card body END -->
								<!-- Card footer -->
								<div class="card-footer text-center py-2">
									<a class="btn btn-link btn-sm" href="my-profile.html">View Profile </a>
								</div>
							</div>
							<!-- Card END -->

							<!-- Helper link START -->
							<ul class="nav small mt-4 justify-content-center lh-1">
								<li class="nav-item">
									<a class="nav-link" href="my-profile-about.html">About</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="settings.html">Settings</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" target="_blank" href="https://support.webestica.com/login">Support </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" target="_blank" href="docs/index.html">Docs </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="help.html">Help</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="privacy-and-terms.html">Privacy & terms</a>
								</li>
							</ul>
							<!-- Helper link END -->
							<!-- Copyright -->
							<p class="small text-center mt-1">©2023 <a class="text-reset" target="_blank" href="https://www.webestica.com/"> Webestica </a></p>
						</div>
					</div>
				</nav>
				<!-- Navbar END-->
			</div>
			<!-- Sidenav END -->

			<!-- Main content START -->
			<div class="col-md-8 col-lg-6 vstack gap-4" id="posts-container">

				<!-- Story START -->
                    {{--        <div class="d-flex gap-2 mb-n3">--}}
{{--					<div class="position-relative">--}}
{{--						<div class="card border border-2 border-dashed h-150px px-4 px-sm-5 shadow-none d-flex align-items-center justify-content-center text-center">--}}
{{--							<div>--}}
{{--								<a class="stretched-link btn btn-light rounded-circle icon-md" href="#!"><i class="fa-solid fa-plus"></i></a>--}}
{{--								<h6 class="mt-2 mb-0 small">Post a Story</h6>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}

{{--					<!-- Stories -->--}}
{{--					<div id="stories" class="storiesWrapper stories-square stories user-icon carousel scroll-enable"></div>--}}
{{--				</div>--}}


				<!-- Share feed START -->
                <!-- Story END -->

                <!--مكان نشر البوست يبدأ -->
				<div class="card card-body">
					<div class="d-flex mb-3">
						<!-- Avatar -->
						<div class="avatar avatar-xs me-2">
							<a href="#"> <img class="avatar-img rounded-circle" @if(Auth::user()->pphoto_id != null)
                                    src="{{asset(Auth::user()->photo->path)}}"
                                              @else
                                                  src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                              @endif alt=""> </a>
						</div>
						<!-- Post input -->
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
                                        <a href="#" class="nav-link bg-light py-1 px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalCreateEvents"> <i class="bi bi-calendar2-event-fill text-danger pe-2"></i>Event </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#modalCreateFeed"> <i class="bi bi-emoji-smile-fill text-warning pe-2"></i>Feeling /Activity</a>
                                    </li>


                                    <li class="nav-item">
                                        <input type="submit" name="submit" value="Post" >
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
                                    <!-- بداية المودلات-->
                                    <!-- Modal create Feed photo START -->
                                    <div class="modal fade" id="feedActionPhoto" tabindex="-1" aria-labelledby="feedActionPhotoLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <!-- Modal feed header START -->
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="feedActionPhotoLabel">Add post photo</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- Modal feed header END -->

                                                <!-- Modal feed body START -->
                                                <div class="modal-body">
                                                    <div class="modal-body text-bg-dark">
                                                            photo : <input type="file" name="images[]" multiple id="photo" class="form-control">
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
                                                    <h5 class="modal-title" id="feedActionVideoLabel">Add post video</h5>
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
                                                        video : <input type="file" name="videos[]" multiple id="video" class="form-control">
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

                                    <!-- Modal create events START -->
                                    <div class="modal fade" id="modalCreateEvents" tabindex="-1" aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <!-- Modal feed header START -->
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabelCreateAlbum">Create event</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- Modal feed header END -->


                                                <!-- Modal feed body START -->
                                                <div class="modal-body">
                                                    <!-- Form START -->
                                                    <form class="row g-4">
                                                        <!-- Title -->
                                                        <div class="col-12">
                                                            <label class="form-label">Title</label>
                                                            <input type="email" class="form-control" placeholder="Event name here">
                                                        </div>
                                                        <!-- Description -->
                                                        <div class="col-12">
                                                            <label class="form-label">Description</label>
                                                            <textarea class="form-control" rows="2" placeholder="Ex: topics, schedule, etc."></textarea>
                                                        </div>
                                                        <!-- Date -->
                                                        <div class="col-sm-4">
                                                            <label class="form-label">Date</label>
                                                            <input type="text" class="form-control flatpickr" placeholder="Select date">
                                                        </div>
                                                        <!-- Time -->
                                                        <div class="col-sm-4">
                                                            <label class="form-label">Time</label>
                                                            <input type="text" class="form-control flatpickr" data-enableTime="true" data-noCalendar="true" placeholder="Select time">
                                                        </div>
                                                        <!-- Duration -->
                                                        <div class="col-sm-4">
                                                            <label class="form-label">Duration</label>
                                                            <input type="email" class="form-control" placeholder="1hr 23m">
                                                        </div>
                                                        <!-- Location -->
                                                        <div class="col-12">
                                                            <label class="form-label">Location</label>
                                                            <input type="email" class="form-control" placeholder="Logansport, IN 46947">
                                                        </div>
                                                        <!-- Add guests -->
                                                        <div class="col-12">
                                                            <label class="form-label">Add guests</label>
                                                            <input type="email" class="form-control" placeholder="Guest email">
                                                        </div>
                                                        <!-- Avatar group START -->
                                                        <div class="col-12 mt-3">
                                                            <ul class="avatar-group list-unstyled align-items-center mb-0">
                                                                <li class="avatar avatar-xs">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/01.jpg')}}" alt="avatar">
                                                                </li>
                                                                <li class="avatar avatar-xs">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/02.jpg')}}" alt="avatar">
                                                                </li>
                                                                <li class="avatar avatar-xs">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/03.jpg')}}" alt="avatar">
                                                                </li>
                                                                <li class="avatar avatar-xs">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/04.jpg')}}" alt="avatar">
                                                                </li>
                                                                <li class="avatar avatar-xs">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/05.jpg')}}" alt="avatar">
                                                                </li>
                                                                <li class="avatar avatar-xs">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/06.jpg')}}" alt="avatar">
                                                                </li>
                                                                <li class="avatar avatar-xs">
                                                                    <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/07.jpg')}}" alt="avatar">
                                                                </li>
                                                                <li class="ms-3">
                                                                    <small> +50 </small>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- Upload Photos or Videos -->
                                                        <!-- Dropzone photo START -->
                                                        <div>
                                                            <label class="form-label">Upload attachment</label>
                                                            <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
                                                                <div class="dz-message">
                                                                    <i class="bi bi-file-earmark-text display-3"></i>
                                                                    <p>Drop presentation and document here or click to upload.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Dropzone photo END -->
                                                    </form>
                                                    <!-- Form END -->
                                                </div>
                                                <!-- Modal feed body END -->


                                                <!-- Modal footer -->
                                                <!-- Button -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal"> Cancel</button>
                                                    <button type="button" class="btn btn-success-soft">Create now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal create events END -->

                                    <!-- Modal create Feed START -->
                                    <div class="modal fade" id="modalCreateFeed" tabindex="-1" aria-labelledby="modalLabelCreateFeed" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <!-- Modal feed header START -->
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabelCreateFeed">Create post</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- Modal feed header END -->

                                                <!-- Modal feed body START -->
                                                <div class="modal-body">
                                                    <!-- Add Feed -->
                                                    <div class="d-flex mb-3">
                                                        <!-- Avatar -->
                                                        <div class="avatar avatar-xs me-2">
                                                            <img class="avatar-img rounded-circle" src="{{assert('import/assets/images/avatar/03.jpg')}}" alt="">
                                                        </div>
                                                        <!-- Feed box  -->
                                                        <form class="w-100">
                                                            <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="4" placeholder="Share your thoughts..." autofocus></textarea>
                                                            <div class="hstack gap-2">
                                                                <a class="icon-md bg-success bg-opacity-10 text-success rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Photo"> <i class="bi bi-image-fill"></i> </a>
                                                                <a class="icon-md bg-info bg-opacity-10 text-info rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Video"> <i class="bi bi-camera-reels-fill"></i> </a>
                                                                <a class="icon-md bg-danger bg-opacity-10 text-danger rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Events"> <i class="bi bi-calendar2-event-fill"></i> </a>
                                                                <a class="icon-md bg-warning bg-opacity-10 text-warning rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Feeling/Activity"> <i class="bi bi-emoji-smile-fill"></i> </a>
                                                                <a class="icon-md bg-light text-secondary rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Check in"> <i class="bi bi-geo-alt-fill"></i> </a>
                                                                <a class="icon-md bg-primary bg-opacity-10 text-primary rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Tag people on top"> <i class="bi bi-tag-fill"></i> </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- Feed rect START -->

                                                    <!-- Feed rect END -->
                                                </div>
                                                <!-- Modal feed body END -->

                                                <!-- Modal feed footer -->
                                                <div class="modal-footer row justify-content-between">
                                                    <!-- Select -->
                                                    <div class="col-lg-3">
                                                        <select class="form-select js-choice choice-select-text-none" data-position="top" data-search-enabled="false">
                                                            <option value="PB">Public</option>
                                                            <option value="PV">Friends</option>
                                                            <option value="PV">Only me</option>
                                                            <option value="PV">Custom</option>
                                                        </select>
                                                        <!-- Button -->
                                                    </div>
                                                    <div class="col-lg-8 text-sm-end">
                                                        <button type="button" class="btn btn-danger-soft me-2"> <i class="bi bi-camera-video-fill pe-1"></i> Live video</button>
                                                        <button type="button" class="btn btn-success-soft">Post</button>
                                                    </div>
                                                </div>
                                                <!-- Modal feed footer -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal create feed END -->
                                    <!-- نهاية المودلات-->

					            <!-- Share feed toolbar END -->
                            </form>
                        </div>
				</div>
				<!-- مكان نشر البوست ينتهي -->


{{--                <div id="posts-container">--}}
                    @include('posts.load')
{{--                </div>--}}




            </div>
            {{--                <!-- Load more button START -->--}}
{{--                <a href="#!" role="button" class="btn btn-loader btn-primary-soft" data-bs-toggle="button" aria-pressed="true">--}}
{{--						<span class="load-text"> Load more </span>--}}
{{--						<div class="load-icon">--}}
{{--							<div class="spinner-grow spinner-grow-sm" role="status">--}}
{{--								<span class="visually-hidden">Loading...</span>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</a>--}}
{{--                <!-- Load more button END -->--}}


			<!-- Main content END -->

			<!-- Right sidebar START -->
			<div class="col-lg-3">
				<div class="row g-4">
					<!-- Card follow START -->
					<div class="col-sm-6 col-lg-12">
						<div class="card">
							<!-- Card header START -->
							<div class="card-header pb-0 border-0">
								<h5 class="card-title mb-0">Who to follow</h5>
							</div>
							<!-- Card header END -->
							<!-- Card body START -->
							<div class="card-body">
								<!-- Connection item START -->
								<div class="hstack gap-2 mb-3">
									<!-- Avatar -->
									<div class="avatar">
										<a href="#!"><img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/04.jpg')}}" alt=""></a>
									</div>
									<!-- Title -->
									<div class="overflow-hidden">
										<a class="h6 mb-0" href="#!">Judy Nguyen </a>
										<p class="mb-0 small text-truncate">News anchor</p>
									</div>
									<!-- Button -->
									<a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i class="fa-solid fa-plus"> </i></a>
								</div>
								<!-- Connection item END -->
								<!-- Connection item START -->
									<div class="hstack gap-2 mb-3">
										<!-- Avatar -->
										<div class="avatar avatar-story">
											<a href="#!"> <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/05.jpg')}}" alt=""> </a>
										</div>
										<!-- Title -->
										<div class="overflow-hidden">
											<a class="h6 mb-0" href="#!">Amanda Reed </a>
											<p class="mb-0 small text-truncate">Web Developer</p>
										</div>
										<!-- Button -->
										<a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i class="fa-solid fa-plus"> </i></a>
								</div>
								<!-- Connection item END -->

								<!-- Connection item START -->
								<div class="hstack gap-2 mb-3">
									<!-- Avatar -->
									<div class="avatar">
										<a href="#"> <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/11.jpg')}}" alt=""> </a>
									</div>
									<!-- Title -->
									<div class="overflow-hidden">
										<a class="h6 mb-0" href="#!">Billy Vasquez </a>
										<p class="mb-0 small text-truncate">News anchor</p>
									</div>
									<!-- Button -->
									<a class="btn btn-primary rounded-circle icon-md ms-auto" href="#"><i class="bi bi-person-check-fill"> </i></a>
								</div>
								<!-- Connection item END -->

								<!-- Connection item START -->
								<div class="hstack gap-2 mb-3">
									<!-- Avatar -->
									<div class="avatar">
										<a href="#"> <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/01.jpg')}}" alt=""> </a>
									</div>
									<!-- Title -->
									<div class="overflow-hidden">
										<a class="h6 mb-0" href="#!">Lori Ferguson </a>
										<p class="mb-0 small text-truncate">Web Developer at Webestica</p>
									</div>
									<!-- Button -->
									<a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i class="fa-solid fa-plus"> </i></a>
								</div>
								<!-- Connection item END -->

								<!-- Connection item START -->
								<div class="hstack gap-2 mb-3">
									<!-- Avatar -->
									<div class="avatar">
										<a href="#"> <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/placeholder.jpg')}}" alt=""> </a>
									</div>
									<!-- Title -->
									<div class="overflow-hidden">
										<a class="h6 mb-0" href="#!">Carolyn Ortiz </a>
										<p class="mb-0 small text-truncate">News anchor</p>
									</div>
									<!-- Button -->
									<a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i class="fa-solid fa-plus"> </i></a>
								</div>
								<!-- Connection item END -->

								<!-- View more button -->
								<div class="d-grid mt-3">
									<a class="btn btn-sm btn-primary-soft" href="#!">View more</a>
								</div>
							</div>
							<!-- Card body END -->
						</div>
					</div>
					<!-- Card follow START -->

					<!-- Card News START -->
					<div class="col-sm-6 col-lg-12">
						<div class="card">
							<!-- Card header START -->
							<div class="card-header pb-0 border-0">
								<h5 class="card-title mb-0">Today’s news</h5>
							</div>
							<!-- Card header END -->
							<!-- Card body START -->
							<div class="card-body">
								<!-- News item -->
								<div class="mb-3">
									<h6 class="mb-0"><a href="blog-details.html">Ten questions you should answer truthfully</a></h6>
									<small>2hr</small>
								</div>
								<!-- News item -->
								<div class="mb-3">
									<h6 class="mb-0"><a href="blog-details.html">Five unbelievable facts about money</a></h6>
									<small>3hr</small>
								</div>
								<!-- News item -->
								<div class="mb-3">
									<h6 class="mb-0"><a href="blog-details.html">Best Pinterest Boards for learning about business</a></h6>
									<small>4hr</small>
								</div>
								<!-- News item -->
								<div class="mb-3">
									<h6 class="mb-0"><a href="blog-details.html">Skills that you can learn from business</a></h6>
									<small>6hr</small>
								</div>
								<!-- Load more comments -->
								<a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center" data-bs-toggle="button" aria-pressed="true">
									<div class="spinner-dots me-2">
										<span class="spinner-dot"></span>
										<span class="spinner-dot"></span>
										<span class="spinner-dot"></span>
									</div>
									View all latest news
								</a>
							</div>
							<!-- Card body END -->
						</div>
					</div>
					<!-- Card News END -->
				</div>
			</div>
			<!-- Right sidebar END -->

		</div> <!-- Row END -->
	</div>
	<!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- Main Chat START -->
<div class="d-none d-lg-block">
	<!-- Button -->
	<a class="icon-md btn btn-primary position-fixed end-0 bottom-0 me-5 mb-5" data-bs-toggle="offcanvas" href="#offcanvasChat" role="button" aria-controls="offcanvasChat">
		<i class="bi bi-chat-left-text-fill"></i>
	</a>
	<!-- Chat sidebar START -->
	<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasChat">
		<!-- Offcanvas header -->
		<div class="offcanvas-header d-flex justify-content-between">
			<h5 class="offcanvas-title">Messaging</h5>
			<div class="d-flex">
				<!-- New chat box open button -->
				<a href="#" class="btn btn-secondary-soft-hover py-1 px-2">
					<i class="bi bi-pencil-square"></i>
				</a>
				<!-- Chat action START -->
				<div class="dropdown">
					<a href="#" class="btn btn-secondary-soft-hover py-1 px-2" id="chatAction" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-three-dots"></i>
					</a>
					<!-- Chat action menu -->
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatAction">
						<li><a class="dropdown-item" href="#"> <i class="bi bi-check-square fa-fw pe-2"></i>Mark all as read</a></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Chat setting </a></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-bell fa-fw pe-2"></i>Disable notifications</a></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-volume-up-fill fa-fw pe-2"></i>Message sounds</a></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block setting</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="#"> <i class="bi bi-people fa-fw pe-2"></i>Create a group chat</a></li>
					</ul>
				</div>
				<!-- Chat action END -->

				<!-- Close  -->
				<a href="#" class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="offcanvas" aria-label="Close">
					<i class="fa-solid fa-xmark"></i>
				</a>

			</div>
		</div>
		<!-- Offcanvas body START -->
		<div class="offcanvas-body pt-0 custom-scrollbar">
			<!-- Search contact START -->
			<form class="rounded position-relative">
				<input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search">
				<button class="btn bg-transparent px-3 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
			</form>
			<!-- Search contact END -->
			<ul class="list-unstyled">

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Frances Guerrero </a>
						<div class="small text-secondary text-truncate">Frances sent a photo.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> Just now </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative toast-btn" data-target="chatToast2">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Lori Ferguson </a>
						<div class="small text-secondary text-truncate">You missed a call form Carolyn🤙</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 1min </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-offline">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/placeholder.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Samuel Bishop </a>
						<div class="small text-secondary text-truncate">Day sweetness why cordially 😊</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 2min </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Dennis Barrett </a>
						<div class="small text-secondary text-truncate">Happy birthday🎂</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 10min </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar avatar-story status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Judy Nguyen </a>
						<div class="small text-secondary text-truncate">Thank you!</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 2hrs </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Carolyn Ortiz </a>
						<div class="small text-secondary text-truncate">Greetings from Webestica.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 1 day </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="flex-shrink-0 avatar">
						<ul class="avatar-group avatar-group-four">
							<li class="avatar avatar-xxs">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
							</li>
							<li class="avatar avatar-xxs">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">
							</li>
							<li class="avatar avatar-xxs">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="avatar">
							</li>
							<li class="avatar avatar-xxs">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="avatar">
							</li>
						</ul>
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link text-truncate d-inline-block" href="#!">Frances, Lori, Amanda, Lawson </a>
						<div class="small text-secondary text-truncate">Btw are you looking for job change?</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 4 day </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-offline">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/08.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Bryan Knight </a>
						<div class="small text-secondary text-truncate">if you are available to discuss🙄</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 6 day </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/09.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Louis Crawford </a>
						<div class="small text-secondary text-truncate">🙌Congrats on your work anniversary!</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 1 day </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/10.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Jacqueline Miller </a>
						<div class="small text-secondary text-truncate">No sorry, Thanks.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 15, dec </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/11.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Amanda Reed </a>
						<div class="small text-secondary text-truncate">Interested can share CV at.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 18, dec </div>
				</li>

				<!-- Contact item -->
				<li class="mt-3 hstack gap-3 align-items-center position-relative">
					<!-- Avatar -->
					<div class="avatar status-online">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/12.jpg" alt="">
					</div>
					<!-- Info -->
					<div class="overflow-hidden">
						<a class="h6 mb-0 stretched-link" href="#!">Larry Lawson </a>
						<div class="small text-secondary text-truncate">Hope you're doing well and Safe.</div>
					</div>
					<!-- Chat time -->
					<div class="small ms-auto text-nowrap"> 20, dec </div>
				</li>
				<!-- Button -->
				<li class="mt-3 d-grid">
					<a class="btn btn-primary-soft" href="messaging.html"> See all in messaging </a>
				</li>

			</ul>
		</div>
		<!-- Offcanvas body END -->
	</div>
	<!-- Chat sidebar END -->

	<!-- Chat END -->

	<!-- Chat START -->
	<div aria-live="polite" aria-atomic="true" class="position-relative">
		<div class="toast-container toast-chat d-flex gap-3 align-items-end">

			<!-- Chat toast START -->
			<div id="chatToast" class="toast mb-0 bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
				<div class="toast-header bg-mode">
					<!-- Top avatar and status START -->
					<div class="d-flex justify-content-between align-items-center w-100">
						<div class="d-flex">
							<div class="flex-shrink-0 avatar me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<h6 class="mb-0 mt-1">Frances Guerrero</h6>
								<div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
							</div>
						</div>
						<div class="d-flex">
						<!-- Call button -->
						<div class="dropdown">
							<a class="btn btn-secondary-soft-hover py-1 px-2" href="#" id="chatcoversationDropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown">
								<li><a class="dropdown-item" href="#"><i class="bi bi-camera-video me-2 fw-icon"></i>Video call</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-telephone me-2 fw-icon"></i>Audio call</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2 fw-icon"></i>Delete </a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-chat-square-text me-2 fw-icon"></i>Mark as unread</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-volume-up me-2 fw-icon"></i>Muted</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-archive me-2 fw-icon"></i>Archive</a></li>
								<li class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-flag me-2 fw-icon"></i>Report</a></li>
							</ul>
						</div>
						<!-- Card action END -->
						<a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse" href="#collapseChat" aria-expanded="false" aria-controls="collapseChat"><i class="bi bi-dash-lg"></i></a>
						<button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
					</div>
				</div>
				<!-- Top avatar and status END -->

				</div>
				<div class="toast-body collapse show" id="collapseChat">
					<!-- Chat conversation START -->
					<div class="chat-conversation-content custom-scrollbar h-200px">
						<!-- Chat time -->
						<div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
										<div class="small my-2">6:15 AM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message right -->
						<div class="d-flex justify-content-end text-end mb-1">
							<div class="w-100">
								<div class="d-flex flex-column align-items-end">
									<div class="bg-primary text-white p-2 px-3 rounded-2">With pleasure</div>
								</div>
							</div>
						</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the attached</div>
										<!-- Files START -->
										<!-- Files END -->
										<div class="small my-2">12:16 PM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion excellent curiosity😮</div>
										<div class="small my-2">3:22 PM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message right -->
						<div class="d-flex justify-content-end text-end mb-1">
							<div class="w-100">
								<div class="d-flex flex-column align-items-end">
									<div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
									<!-- Images -->
									<div class="d-flex my-2">
										<div class="small text-secondary">5:35 PM</div>
										<div class="small ms-2"><i class="fa-solid fa-check"></i></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat time -->
						<div class="text-center small my-2">2 New Messages</div>
						<!-- Chat Typing -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-3 rounded-2">
											<div class="typing d-flex align-items-center">
												<div class="dot"></div>
												<div class="dot"></div>
												<div class="dot"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Chat conversation END -->
					<!-- Chat bottom START -->
					<div class="mt-2">
						<!-- Chat textarea -->
						<textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
						<!-- Button -->
						<div class="d-sm-flex align-items-end mt-2">
							<button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
							<button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
							<button class="btn btn-sm btn-success-soft me-2"> Gif </button>
							<button class="btn btn-sm btn-primary ms-auto"> Send </button>
						</div>
					</div>
					<!-- Chat bottom START -->
				</div>
			</div>
			<!-- Chat toast END -->

			<!-- Chat toast 2 START -->
			<div id="chatToast2" class="toast mb-0 bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
				<div class="toast-header bg-mode">
					<!-- Top avatar and status START -->
					<div class="d-flex justify-content-between align-items-center w-100">
						<div class="d-flex">
							<div class="flex-shrink-0 avatar me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<h6 class="mb-0 mt-1">Lori Ferguson</h6>
								<div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
							</div>
						</div>
						<div class="d-flex">
						<!-- Call button -->
						<div class="dropdown">
							<a class="btn btn-secondary-soft-hover py-1 px-2" href="#" id="chatcoversationDropdown2" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
							<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown2">
								<li><a class="dropdown-item" href="#"><i class="bi bi-camera-video me-2 fw-icon"></i>Video call</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-telephone me-2 fw-icon"></i>Audio call</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-trash me-2 fw-icon"></i>Delete </a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-chat-square-text me-2 fw-icon"></i>Mark as unread</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-volume-up me-2 fw-icon"></i>Muted</a></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-archive me-2 fw-icon"></i>Archive</a></li>
								<li class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#"><i class="bi bi-flag me-2 fw-icon"></i>Report</a></li>
							</ul>
						</div>
						<!-- Card action END -->
						<a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse" href="#collapseChat2" role="button" aria-expanded="false" aria-controls="collapseChat2"><i class="bi bi-dash-lg"></i></a>
						<button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
					</div>
				</div>
				<!-- Top avatar and status END -->

				</div>
				<div class="toast-body collapse show" id="collapseChat2">
					<!-- Chat conversation START -->
					<div class="chat-conversation-content custom-scrollbar h-200px">
						<!-- Chat time -->
						<div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
										<div class="small my-2">6:15 AM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message right -->
						<div class="d-flex justify-content-end text-end mb-1">
							<div class="w-100">
								<div class="d-flex flex-column align-items-end">
									<div class="bg-primary text-white p-2 px-3 rounded-2">With pleasure</div>
								</div>
							</div>
						</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the attached</div>
										<!-- Files START -->
										<!-- Files END -->
										<div class="small my-2">12:16 PM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message left -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion excellent curiosity😮</div>
										<div class="small my-2">3:22 PM</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat message right -->
						<div class="d-flex justify-content-end text-end mb-1">
							<div class="w-100">
								<div class="d-flex flex-column align-items-end">
									<div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
									<!-- Images -->
									<div class="d-flex my-2">
										<div class="small text-secondary">5:35 PM</div>
										<div class="small ms-2"><i class="fa-solid fa-check"></i></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Chat time -->
						<div class="text-center small my-2">2 New Messages</div>
						<!-- Chat Typing -->
						<div class="d-flex mb-1">
							<div class="flex-shrink-0 avatar avatar-xs me-2">
								<img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
							</div>
							<div class="flex-grow-1">
								<div class="w-100">
									<div class="d-flex flex-column align-items-start">
										<div class="bg-light text-secondary p-3 rounded-2">
											<div class="typing d-flex align-items-center">
												<div class="dot"></div>
												<div class="dot"></div>
												<div class="dot"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Chat conversation END -->
					<!-- Chat bottom START -->
					<div class="mt-2">
						<!-- Chat textarea -->
						<textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
						<!-- Button -->
						<div class="d-sm-flex align-items-end mt-2">
							<button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
							<button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
							<button class="btn btn-sm btn-success-soft me-2"> Gif </button>
							<button class="btn btn-sm btn-primary ms-auto"> Send </button>
						</div>
					</div>
					<!-- Chat bottom START -->
				</div>
			</div>
			<!-- Chat toast 2 END -->

		</div>
	</div>
	<!-- Chat END -->

</div>
 <!-- Main Chat END -->





<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{asset('import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Vendors -->
<script src="{{asset('import/assets/vendor/tiny-slider/dist/tiny-slider.js')}}"></script>
<script src="{{asset('import/assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js')}}"></script>
<script src="{{asset('import/assets/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{asset('import/assets/vendor/glightbox-master/dist/js/glightbox.min.js')}}"></script>
<script src="{{asset('import/assets/vendor/flatpickr/dist/flatpickr.min.js')}}"></script>
<script src="{{asset('import/assets/vendor/plyr/plyr.js')}}"></script>
<script src="{{asset('import/assets/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
<script src="{{asset('import/assets/vendor/zuck.js/dist/zuck.min.js')}}"></script>
<script src="{{asset('import/assets/js/zuck-stories.js')}}"></script>
<!-- Theme Functions -->
<script src="{{asset('import/assets/js/functions.js')}}"></script>

<script>
    $(document).ready(function () {

        let nextPageUrl = '{{ $posts->nextPageUrl() }}';
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                if (nextPageUrl) {
                    loadMorePosts();
                }
            }
        });
        function loadMorePosts() {
            $.ajax({
                url: nextPageUrl,
                type: 'get',
                beforeSend: function () {
                    nextPageUrl = '';
                },
                success: function (data) {
                    nextPageUrl = data.nextPageUrl;
                    $("#posts-container").append(data.view);
                },
                error: function (xhr, status, error) {
                    console.error("Error loading more posts:", error);
                }
            });
        }
    });
</script>

@livewireScripts
</body>
</html>
