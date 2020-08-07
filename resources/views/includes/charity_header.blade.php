<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth dashboard-header not-sticky">
	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="/charity/"><img src="/assets/images/logo.png" alt=""></a>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation">
					<ul id="responsive">

						@if (Request::url() == route('charity.donors'))
							<li><a href="{{route('charity.donors')}}" class="current">Find Donors</a></li>	
						@else
							<li><a href="{{route('charity.donors')}}">Find Donors</a></li>
						@endif

						@if (Request::url() == route('project.list'))
							<li><a href="{{route('project.list')}}" class="current">Find Projects</a></li>
						@else
							<li><a href="{{route('project.list')}}">Find Projects</a></li>
						@endif
						
						@if (Request::url() == route('charity.dashboard'))
							<li><a href="{{route('charity.dashboard')}}" class="current">Dashboard</a></li>
						@else
							<li><a href="{{route('charity.dashboard')}}">Dashboard</a></li>
						@endif

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">
	
				@if (Auth::guard('charity')->check())

				@php
					$charity_user = Auth::guard('charity')->user();
				@endphp

					<!-- User Menu -->
				<div class="header-widget">

					<!-- Messages -->
					<div class="header-notifications user-menu">
						<div class="header-notifications-trigger">
							<a href="#">
								<div class="user-avatar status-online">
									{{$charity_user->printCharityImage()}}
								</div>
								{{ $charity_user->organization_name }}
							</a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<!-- User Status -->
							<div class="user-status">

								<!-- User Name / Avatar -->
								<div class="user-details">
									<div class="user-avatar status-online">
										{{$charity_user->printCharityImage()}}
									</div>
									<div class="user-name">
										{{ $charity_user->organization_name }}
									</div>
								</div>
						</div>
						
						<ul class="user-menu-small-nav">
							<li><a href="{{ route('charity.profile') }}"><i class="icon-material-outline-settings"></i>Edit Profile</a></li>
							<li>
								<a href="{{ route('charity.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header1').submit();"><i class="icon-material-outline-power-settings-new"></i>{{__('Logout')}}</a> 
							</li>
							<form id="logout-form-header1" action="{{ route('charity.logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</ul>

						</div>
					</div>

				</div>
				<!-- User Menu / End -->
				@endif

				<!-- Mobile Navigation Button -->
				<span class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</span>

			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->