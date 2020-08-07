<?php
if (!isset($seo)) {
    $seo = (object) array('seo_title' => $siteSetting->site_name, 'seo_description' => $siteSetting->site_name, 'seo_keywords' => $siteSetting->site_name, 'seo_other' => '');
}
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="{{ (session('localeDir', 'ltr'))}}" dir="{{ (session('localeDir', 'ltr'))}}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $seo->seo_title }}</title>
<meta name="Description" content="{!! $seo->seo_description !!}">
<meta name="Keywords" content="{!! $seo->seo_keywords !!}">
{!! $seo->seo_other !!}

<!-- Fav Icon -->
<link rel="shortcut icon" href="{{asset('/')}}favicon.ico">
<!-- CSS
================================================== -->

<!-- Bootstrap -->
<link href="{{asset('/')}}css/bootstrap.min.css" rel="stylesheet">

<link href="{{ asset('/') }}assets/plugins/datetime/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="{{ asset('/') }}assets/css/style.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/css/colors/blue.css">


@stack('styles')
</head>
<body class="gray">
@yield('content') 

<!-- Scripts
================================================== -->
<script src="{{asset('/')}}assets/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('/')}}assets/js/jquery-migrate-3.0.0.min.js"></script>
<script src="{{asset('/')}}assets/js/moment.js"></script>

<!-- Owl carousel --> 
<script src="{{asset('/')}}js/owl.carousel.js"></script> 
<script src="{{ asset('/') }}assets/plugins/datetime/bootstrap-datetimepicker.min.js" type="text/javascript"></script> 
<!-- END PAGE LEVEL PLUGINS --> 
<script src="{{ asset('/') }}admin_assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script> 


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

@stack('scripts') 
<script type="text/JavaScript">
	$(document).ready(function(){
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
	});

</script>
</body>
</html>