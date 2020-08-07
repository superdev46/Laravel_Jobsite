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
				<a href="{{route('donor.home')}}"><img src="/assets/images/logo.png" alt=""></a>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation">
					<ul id="responsive">
						@if (Request::url() == route('donor.browse_cahrities'))
							<li><a href="{{route('donor.browse_cahrities')}}" class="current">Find Charities</a></li>	
						@else
							<li><a href="{{route('donor.browse_cahrities')}}">Find Charities</a></li>
						@endif

						@if (Request::url() == route('campaign.list'))
							<li><a href="{{route('campaign.list')}}" class="current">Find Campaigns</a></li>
						@else
							<li><a href="{{route('campaign.list')}}">Find Campaigns</a></li>
						@endif
						
						@if (Request::url() == route('donor.dashboard'))
							<li><a href="{{route('donor.dashboard')}}" class="current">Dashboard</a></li>
						@else
							<li><a href="{{route('donor.dashboard')}}">Dashboard</a></li>
						@endif
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">
				@if (Auth::guard('donor')->check())
					@php
						$donor_user = Auth::guard('donor')->user();
					@endphp
					
				@endif
				<!-- User Menu -->
				<div class="header-widget">

					<!-- Messages -->
					<div class="header-notifications user-menu">
						<div class="header-notifications-trigger">
							<a href="#">
								<div class="user-avatar status-online">
									{{$donor_user->printUserImage()}}
								</div>
								{{$donor_user->name}}
							</a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<!-- User Status -->
							<div class="user-status">

								<!-- User Name / Avatar -->
								<div class="user-details">
									<div class="user-avatar status-online">{{$donor_user->printUserImage()}}</div>
									<div class="user-name">
										{{$donor_user->name}}
									</div>
								</div>
						</div>
						
						<ul class="user-menu-small-nav">
							<li><a href="{{route('donor.profile')}}"><i class="icon-material-outline-settings"></i>Edit Profile</a></li>
							<li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header1').submit();">
									<i class="icon-material-outline-power-settings-new"></i>
									{{__('Logout')}}
								</a> 
							</li>
							<form id="logout-form-header1" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</ul>

						</div>
					</div>

				</div>
				<!-- User Menu / End -->

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