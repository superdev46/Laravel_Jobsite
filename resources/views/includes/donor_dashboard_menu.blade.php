<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Dashboard Navigation</span>
				</a>
				
				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">
						<ul >

							@if (Request::url() == route('donor.dashboard'))
								<li class="active"><a href="{{route('donor.dashboard')}}" ><i class="icon-material-outline-dashboard"></i>Dashboard</a></li>
							@else
								<li><a href="{{route('donor.dashboard')}}"><i class="icon-material-outline-dashboard"></i>Dashboard</a></li>
							@endif

							@if (Request::url() == route('post.project'))
								<li class="active"><a href="{{route('post.project')}}" ><i class="icon-material-outline-business-center"></i>Post a Project</a></li>
							@else
								<li><a href="{{route('post.project')}}"><i class="icon-material-outline-business-center"></i>Post a Project</a></li>
							@endif

							@if (Request::url() == route('donor.profile'))
								<li class="active"><a href="{{route('donor.profile')}}" ><i class="icon-material-outline-settings"></i>Edit Profile</a></li>
							@else
								<li><a href="{{route('donor.profile')}}"><i class="icon-material-outline-settings"></i>Edit Profile</a></li>
							@endif

							<li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header1').submit();">
									<i class="icon-material-outline-power-settings-new"></i>
									{{__('Logout')}}
								</a> 
							</li>

						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->