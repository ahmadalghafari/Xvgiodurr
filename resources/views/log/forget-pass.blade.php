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

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/css/style.css')}}">
	 
</head>

<body>

<!-- **************** MAIN CONTENT START **************** -->
<main>
  
  <!-- Container START -->
  <div class="container">
    <div class="row justify-content-center align-items-center vh-100 py-5">
      <!-- Main content START -->
      <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
        <!-- Forgot password START -->
        <div class="card card-body rounded-3 text-center p-4 p-sm-5">
          <!-- Title -->
          <h1 class="mb-2">Forgot password?</h1>
          <p>Enter the email address associated with account.</p><br>
		  <p>Check Your Eamil To change Your Password</p>
          <!-- form START -->
          <form class="mt-3" method="POST" action="{{ route('password.email') }}">
            @csrf
            <!-- email -->
            <div class="mb-3 input-group-lg">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="test@email.com">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
            </div>
            <!-- Button -->
            <div class="d-grid"><button type="submit" class="btn btn-lg btn-primary">Reset password</button></div>
            <!-- Back to sign in -->
            <div class="mb-3">
              <p>Back to <a href="sign-in.html">Sign in</a></p>
            </div>
            <!-- Copyright -->
            <p class="mb-0 mt-3">©2023 <a target="_blank" href="https://www.webestica.com/">Webestica.</a> All rights reserved</p>
          </form>
          <!-- form END -->
        </div>
        <!-- Forgot password END -->
      </div>
    </div> <!-- Row END -->
  </div>
  <!-- Container END -->

</main>

<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{asset('import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Vendors -->
<script src="{{asset('import/assets/vendor/pswmeter/pswmeter.min.js')}}"></script>

<!-- Theme Functions -->
<script src="{{asset('import/assets/js/functions.js')}}"></script>

</body>
</html>