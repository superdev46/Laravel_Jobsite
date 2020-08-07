@extends('layouts.template')

@section('content') 
<!-- Wrapper -->
<div id="wrapper">

  <!-- Header start --> 
  @include('includes.charity_header') 
  <!-- Header end --> 
  
  <!-- Dashboard Container -->
  <div class="dashboard-container">
  
    @include('includes.charity_dashboard_menu') 
  
    <!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Edit Charity Profile</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Edit Profile</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

        {!! Form::model($charity, array('method' => 'put', 'route' => array('update.charity.profile'), 'class' => 'form', 'files'=>true)) !!}

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
						</div>

						<div class="content with-padding padding-bottom-0">

							<div class="row">

								<div class="col-auto">
									<div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
                    					{{ ImgUploader::print_image("company_logos/$charity->logo",0, 0, '' ,'logo', 'profile-pic') }}
										<div class="upload-button"></div>
										<input class="file-upload" name="logo" type="file" accept="image/*"/>
									</div>
								</div>

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
                        <h5>Organization name</h5>
                        {!! Form::text('organization_name', null, array('class'=>'with-border', 'id'=>'organization_name', 'placeholder'=>__('Organization Name'))) !!}
                        {!! APFrmErrHelp::showErrors($errors, 'organization_name') !!}
											</div>
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
                        <h5>Category</h5>                      
                        {!! Form::select('industry_id', ['' => __('Select Category')]+$industries, null, array('class'=>'selectpicker with-border', 'id'=>'industry_id')) !!}
                        {!! APFrmErrHelp::showErrors($errors, 'industry_id') !!}
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
                        <h5>Website URL </h5>
                        {!! Form::text('website', null, array('class'=>'with-border', 'id'=>'website', 'value'=>__('http://afhboston.org/'), 'placeholder'=>__('http://afhboston.org/'))) !!}
                        {!! APFrmErrHelp::showErrors($errors, 'website') !!}
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Physical Address</h5>
												<div class="input-with-icon">
													<div id="autocomplete-container">
                            {!! Form::text('location', null, array('class'=>'with-border', 'id'=>'autocomplete-input', 'placeholder'=>__('Physical Address'))) !!}
                            {!! APFrmErrHelp::showErrors($errors, 'location') !!}
													</div>
													<i class="icon-material-outline-location-on"></i>
												</div>
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Organization Phone</h5>
												{!! Form::text('phone_number', null, array('class'=>'with-border', 'id'=>'phone_number', 'placeholder'=>__('Physical Address'))) !!}
                        {!! APFrmErrHelp::showErrors($errors, 'phone_number') !!}
											</div>
										</div>

										<div class="col-xl-12">
											<div class="submit-field">
                        <h5>Description</h5>
                        
                        {!! Form::textarea('short_description', null, array('class'=>'with-border margin-bottom-20', 'id'=>'short_description', 'maxlength'=>'200' , 'cols'=>'30' , 'rows'=>'2', 'placeholder'=>__('Fax'))) !!}
                        {!! APFrmErrHelp::showErrors($errors, 'short_description') !!} 


                        {!! Form::textarea('description', null, array('class'=>'with-border', 'id'=>'description', 'maxlength'=>'2000' , 'cols'=>'30' , 'rows'=>'8',  'placeholder'=>__('Fax'))) !!}
                        {!! APFrmErrHelp::showErrors($errors, 'description') !!} 
                      </div>
										</div>


										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Contact Name</h5>
                        {!! Form::text('contact_name', null, array('class'=>'with-border', 'id'=>'contact_name', 'placeholder'=>__('Contact Name'))) !!}
                        {!! APFrmErrHelp::showErrors($errors, 'contact_name') !!}
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Job Title</h5>
                        {!! Form::text('job_title', null, array('class'=>'with-border', 'id'=>'job_title', 'placeholder'=>__('Job Title'))) !!}
                        {!! APFrmErrHelp::showErrors($errors, 'job_title') !!}
											</div>
										</div>
			
										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Email</h5>
                        {!! Form::text('email', null, array('class'=>'with-border', 'id'=>'email', 'placeholder'=>__('Email'))) !!}
                        {!! APFrmErrHelp::showErrors($errors, 'email') !!}
											</div>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div id="test1" class="dashboard-box">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-lock"></i> Password & Security</h3>
						</div>

						<div class="content with-padding">
							<div class="row">
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Current Password</h5>
										<input type="password" class="with-border">
									</div>
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>New Password</h5>
										<input type="password" class="with-border">
									</div>
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Repeat New Password</h5>
										<input type="password" class="with-border">
									</div>
								</div>

								<div class="col-xl-12">
									<div class="checkbox">
										<input type="checkbox" id="two-step" checked>
										<label for="two-step"><span class="checkbox-icon"></span> Enable Two-Step Verification via Email</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Button -->
				<div class="col-xl-12">
					<button type="submit" class="button ripple-effect big margin-top-30">Save Changes</button>
        </div>
        
        {!! Form::close() !!}

			</div>
			<!-- Row / End -->

			@include('includes.dashboard_footer')

		</div>
	</div>
	<!-- Dashboard Content / End -->
  
  </div>
  <!-- Dashboard Container / End -->
  
  </div>
  <!-- Wrapper / End -->
  @endsection