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
<link rel="shortcut icon" href="{{asset('/')}}favicon.ico">
<!-- Main Style -->
<link href="{{asset('/')}}assets/css/style.css" rel="stylesheet">
<link href="{{asset('/')}}assets/css/colors/blue.css" rel="stylesheet">

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

				<h2>Register</h2>

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
					<h3 style="font-size: 26px;">Let's create your account!</h3>
					<span>Already have an account? <a href="index.php">Log In!</a></span>
				</div>

				<!-- Account Type -->
				<div class="account-type">
					<div>
						<input type="radio" name="type" id="charity-radio" class="account-type-radio" value="charity" checked/>
						<label for="charity-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Charity</label>
					</div>

					<div>
						<input type="radio" name="type" id="donor-radio" value="donor" class="account-type-radio"/>
						<label for="donor-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Donor</label>
					</div>
        		</div>
        
        <div class="charity-form-group" style="display:block">
        <!-- Form -->
        <form method="post" id="register-account-form" method="POST" action="{{ route('charity.register') }}">
          {{ csrf_field() }}
          <div class="input-with-icon-left {{ $errors->has('email') ? ' has-error' : '' }} ">
						<i class="icon-material-baseline-mail-outline"></i>
            <input type="text" class="input-text with-border" name="email" id="emailaddress-register" placeholder="Email Address" required/>
            @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif
					</div>

					<div class="input-with-icon-left{{ $errors->has('password') ? ' has-error' : '' }}" title="Should be at least 8 characters long" data-tippy-placement="bottom">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password-register" placeholder="Password" required/>
            @if ($errors->has('password')) <span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span> @endif
          </div>

					<div class="input-with-icon-left{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password_confirmation" id="password-repeat-register" placeholder="Repeat Password" required/>
            @if ($errors->has('password_confirmation')) <span class="help-block"> <strong>{{ $errors->first('password_confirmation') }}</strong> </span> @endif
          </div>
				
				  <!-- Button -->
				  <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" >Charity Register <i class="icon-material-outline-arrow-right-alt"></i></button>
			  </form>
        </div>

        <div class="donor-form-group" style="display: none">
        <!-- Form -->
        <form method="post" id="register-account-form" method="POST" action="{{ route('donor.register') }}">
          {{ csrf_field() }}
          <div class="input-with-icon-left">
						<i class="icon-material-baseline-mail-outline"></i>
						<input type="text" class="input-text with-border" name="email" id="emailaddress-register" placeholder="Email Address" required/>
					</div>

					<div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password" id="password-register" placeholder="Password" required/>
					</div>

					<div class="input-with-icon-left">
						<i class="icon-material-outline-lock"></i>
						<input type="password" class="input-text with-border" name="password_confirmation" id="password-repeat-register" placeholder="Repeat Password" required/>
					</div>
				
				  <!-- Button -->
          <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" >Donor Register <i class="icon-material-outline-arrow-right-alt"></i></button>
			  </form>
        </div>
      
				<!-- Social Login -->
				<div class="social-login-separator"><span>or</span></div>
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Register via Facebook</button>
					<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Register via Google+</button>
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
@stack('scripts') 
<script>

$(".ripple-effect-dark").click(function(){

  if ($("#charity-radio").is(":checked")) {
    $(".donor-form-group").css('display', 'block');
    $(".charity-form-group").css('display', 'none');
  };
  
  if ($("#donor-radio").is(":checked")) {
    $(".donor-form-group").css('display', 'none');
    $(".charity-form-group").css('display', 'block');
  };

});

</script>

</body>
</html>