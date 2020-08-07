<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>PhilanthropEX</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{asset('/')}}assets/css/style.css">
<link rel="stylesheet" href="{{asset('/')}}assets/css/colors/blue.css">

</head>
<body>

<!-- Wrapper -->
<div id="">

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Log In</h2>

			</div>
		</div>
	</div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-xl-5 offset-xl-3">


			<div class="login-register-page">
				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>We're glad to see you again!</h3>
					<span>Don't have an account? <a href="{{ route('register') }}">Sign Up!</a></span>
				</div>

				<!-- Account Type -->
				<div class="account-type">
					<div>
						<a href="{{ route('charity.login') }}" class="button full-width btn-account-login active"><i class="icon-material-outline-business-center"></i> Charity</a>
					</div>

					<div>

						<a href="{{ route('login') }}" class="button full-width btn-account-login"><i class="icon-material-outline-account-circle"></i> Donor</a>
					</div>
        		</div>
					
				<!-- Form -->
        <form method="post" id="login-form" action="{{ route('login') }}">
          {{ csrf_field() }}
					<div class="input-with-icon-left{{ $errors->has('email') ? ' has-error' : '' }}">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" name="email" id="emailaddress" placeholder="Email Address" value="charity@test.com" required/>
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>

					<div class="margin-top-30 input-with-icon-left{{ $errors->has('password') ? ' has-error' : '' }}">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password" placeholder="Password" value="123456" required/>
            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>
					<a href="#" class="forgot-password">Forgot Password?</a>
				</form>
				
				<!-- Button -->
				<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form">Log In <i class="icon-material-outline-arrow-right-alt"></i></button>
				
				<!-- Social Login -->
				<div class="social-login-separator"><span>or</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Log In via Facebook</button>
					<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Log In via Google+</button>
				</div>
			</div>

		</div>
	</div>
</div>


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->


</div>
<!-- Wrapper / End -->

<!-- Scripts
================================================== -->
<script src="{{asset('/')}}assets/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('/')}}assets/js/jquery-migrate-3.0.0.min.js"></script>
<script src="{{asset('/')}}assets/js/mmenu.min.js"></script>
<script src="{{asset('/')}}assets/js/tippy.all.min.js"></script>
<script src="{{asset('/')}}assets/js/simplebar.min.js"></script>
<script src="{{asset('/')}}assets/js/bootstrap-slider.min.js"></script>
<script src="{{asset('/')}}assets/js/bootstrap-select.min.js"></script>
<script src="{{asset('/')}}assets/js/snackbar.js"></script>
<script src="{{asset('/')}}assets/js/clipboard.min.js"></script>
<script src="{{asset('/')}}assets/js/counterup.min.js"></script>
<script src="{{asset('/')}}assets/js/magnific-popup.min.js"></script>
<script src="{{asset('/')}}assets/js/slick.min.js"></script>
<script src="{{asset('/')}}assets/js/custom.js"></script>

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
// Snackbar for user status switcher
$('#snackbar-user-status label').click(function() { 
	Snackbar.show({
		text: 'Your status has been changed!',
		pos: 'bottom-center',
		showAction: false,
		actionText: "Dismiss",
		duration: 3000,
		textColor: '#fff',
		backgroundColor: '#383838'
	}); 
}); 
</script>

</body>
</html>