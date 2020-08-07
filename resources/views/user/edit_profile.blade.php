@extends('layouts.template')

@section('content') 
<!-- Wrapper -->
<div id="wrapper">

  <!-- Header start --> 
  @include('includes.donor_header') 
  <!-- Header end --> 
  
  <!-- Dashboard Container -->
  <div class="dashboard-container">
  
    @include('includes.donor_dashboard_menu') 
  
    <!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Edit Donor Profile</h3>

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

        {!! Form::model($user, array('method' => 'put', 'route' => array('my.profile'), 'class' => 'form', 'files'=>true)) !!}
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
                    					{{ ImgUploader::print_image("user_images/$user->image",0, 0, '' ,'image', 'profile-pic') }}
										<div class="upload-button"></div>
										<input class="file-upload" name="image" type="file" accept="image/*"/>
									</div>
								</div>

								<div class="col">
									<div class="row">
                    					<div class="col-xl-4">
											<div class="submit-field">
												<h5>Contact name</h5>
												{!! Form::text('name', null, array('class'=>'with-border', 'id'=>'name', 'placeholder'=>__('Contact Name'))) !!}
												{!! APFrmErrHelp::showErrors($errors, 'name') !!}
											</div>
                    					</div>
                    
										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Phone Number</h5>
												{!! Form::text('phone', null, array('class'=>'with-border', 'id'=>'phone', 'placeholder'=>__('Phone Number'))) !!}
												{!! APFrmErrHelp::showErrors($errors, 'phone') !!}
											</div>
										</div>
                    
										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Email</h5>
												{!! Form::text('email', null, array('class'=>'with-border', 'id'=>'email', 'placeholder'=>__('Email'))) !!}
												{!! APFrmErrHelp::showErrors($errors, 'email') !!}
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Nationality</h5>
												{!! Form::select('country_id', ['' => __('Select Country')]+$countries, old('country_id', $user->country_id) , array('class'=>'selectpicker with-border', 'id'=>'country_id', 'title'=>'Select Job Type', 'data-live-search'=>'true')) !!}
                      							{!! APFrmErrHelp::showErrors($errors, 'country_id') !!} 
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field {!! APFrmErrHelp::hasError($errors, 'state_id') !!}" id="state_id_div"> 
											  <h5>State</h5>  
											  <span id="default_state_dd">
												{!! Form::select('state_id', ['' => __('Select State')], old('state_id',  $user->state_id), array('class'=>'selectpicker with-border', 'id'=>'state_id', 'data-live-search'=>'true')) !!} 
												{!! APFrmErrHelp::showErrors($errors, 'state_id') !!} 
											  </span>
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field {!! APFrmErrHelp::hasError($errors, 'city_id') !!}" id="city_id_div"> 
											  <h5>City</h5>  
											  <span id="default_city_dd">
											  {!! Form::select('city_id', ['' => __('Select City')], old('city_id',  $user->city_id), array('class'=>'selectpicker with-border', 'id'=>'city_id', 'data-live-search'=>'true')) !!} 
											  {!! APFrmErrHelp::showErrors($errors, 'city_id') !!} 
											  </span>
											</div>
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>Street Address</h5>
												<div class="input-with-icon">
													<div id="autocomplete-container">
														{!! Form::text('street_address', null, array('class'=>'with-border', 'id'=>'street_address', 'placeholder'=>__('Type Street Address'))) !!}
														{!! APFrmErrHelp::showErrors($errors, 'street_address') !!}
													</div>
													<i class="icon-material-outline-location-on"></i>
												</div>
											</div>
										</div>

                    
										<div class="col-xl-6">
											<div class="submit-field">
											<h5>Category</h5>                      
											{!! Form::select('industry_id', ['' => __('Select Category')]+$industries, null, array('class'=>'selectpicker with-border', 'id'=>'industry_id')) !!}
											{!! APFrmErrHelp::showErrors($errors, 'industry_id') !!}
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

			<!-- Footer -->
			<div class="dashboard-footer-spacer"></div>
			<div class="small-footer margin-top-15">
				<div class="small-footer-copyrights">
					© 2020 <strong>PhilanthropEX</strong>. All Rights Reserved.
				</div>
				<ul class="footer-social-links">
					<li>
						<a href="#" title="Facebook" data-tippy-placement="top">
							<i class="icon-brand-facebook-f"></i>
						</a>
					</li>
					<li>
						<a href="#" title="Twitter" data-tippy-placement="top">
							<i class="icon-brand-twitter"></i>
						</a>
					</li>
					<li>
						<a href="#" title="Google Plus" data-tippy-placement="top">
							<i class="icon-brand-google-plus-g"></i>
						</a>
					</li>
					<li>
						<a href="#" title="LinkedIn" data-tippy-placement="top">
							<i class="icon-brand-linkedin-in"></i>
						</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<!-- Footer / End -->

		</div>
	</div>
	<!-- Dashboard Content / End -->
  
  </div>
  <!-- Dashboard Container / End -->
  
  </div>
  <!-- Wrapper / End -->
  @endsection


  @push('scripts')
<script type="text/javascript">
$(document).ready(function() {
  // $('.select2-multiple').select2({
  //   placeholder: "{{__('Select Required Skills')}}",
  //   allowClear: true
	// });

  $(".datepicker").datetimepicker({
    format: 'yyyy-MM-DD',
    minDate: new Date()
  });

  $('#country_id').on('change', function (e) {
    filterLangStates(0);
    e.preventDefault();
  });

  $(document).on('change', '#state_id', function (e) {
    e.preventDefault();
    filterLangCities(0);
  });

  filterLangStates(<?php echo old('state_id', (isset($user))? $user->state_id:0); ?>);
  });

  function filterLangStates(state_id)
  {
    var country_id = $('#country_id').val();
    var select_obj = $('#default_state_dd').find('#state_id');
    select_obj.html('');
    if (country_id != ''){
    $.post("{{ route('filter.lang.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _dataType: 'json', _token: '{{ csrf_token() }}'})
          .done(function (response) {
            var opt_arr = JSON.parse(response);
            const keys = Object.keys(JSON.parse(response));
            var opthtml = '<option value>Select State</option>';
            // var drophtml = '<li data-original-index="0" class=""><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Select State</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>';
            for(var i = 0; i < keys.length; i++)
            {
              opthtml += '<option value="'+keys[i]+'">'+opt_arr[keys[i]]+'</option>';
            //   drophtml += '<li data-original-index="'+(i+1)+'"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">'+opt_arr[keys[i]]+'</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>';
            }
            
          select_obj.html(opthtml);
		  $(select_obj).selectpicker('refresh');

          filterLangCities(<?php echo old('city_id', (isset($job))? $job->city_id:0); ?>);
          });
    }
  }

  function filterLangCities(city_id)
  {
    var state_id = $('#state_id').val();
    var select_obj = $('#default_city_dd').find('#city_id');
    select_obj.html('');
    if (state_id != ''){
    $.post("{{ route('filter.lang.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _dataType: 'JSON' , _token: '{{ csrf_token() }}'})
            .done(function (response) {
              
        var opt_arr = JSON.parse(response);
        const keys = Object.keys(JSON.parse(response));
        var opthtml = '<option value>Select City</option>';
        for(var i = 0; i < keys.length; i++)
        {
          opthtml += '<option value="'+keys[i]+'">'+opt_arr[keys[i]]+'</option>';  
        }
        select_obj.html(opthtml);
		$(select_obj).selectpicker('refresh');   
      });
    }
  }
</script> 
@endpush