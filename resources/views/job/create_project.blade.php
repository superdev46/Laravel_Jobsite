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
          <h3>Post Project</h3>
        </div>
    
        {!! Form::open(array('method' => 'post', 'route' => array('store.front.project'), 'class' => 'form')) !!}
        <!-- Row -->
        <div class="row padding-bottom-30">
          <!-- Dashboard Box -->
          <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">

              <!-- Headline -->
              <div class="headline">
                <h3><i class="icon-feather-folder-plus"></i> Edit Project</h3>
              </div>

              <div class="content with-padding padding-bottom-10">
                <div class="row">

                  <div class="col-xl-4">
                    <div class="submit-field {!! APFrmErrHelp::hasError($errors, 'title') !!}">
                      <h5>Project Title</h5>
                      {!! Form::text('title', null, array('class'=>'with-border', 'id'=>'title', 'placeholder'=>__('Job title'))) !!}
                      {!! APFrmErrHelp::showErrors($errors, 'title') !!} 
                    </div>
                  </div>

                  <div class="col-xl-4">
                    <div class="submit-field {!! APFrmErrHelp::hasError($errors, 'job_type_id') !!}">
                      <h5>Project Type</h5>
                      {!! Form::select('job_type_id', ['' => __('Select Job Type')]+$jobTypes, null, array('class'=>'selectpicker with-border', 'id'=>'job_type_id', 'data-live-search'=>"true")) !!}
                      {!! APFrmErrHelp::showErrors($errors, 'job_type_id') !!}
                    </div>
                  </div>

                  <div class="col-xl-4">
                    <div class="submit-field {!! APFrmErrHelp::hasError($errors, 'functional_area_id') !!}">
                      <h5>Project Category</h5>
                      {!! Form::select('functional_area_id', ['' => __('Select Functional Area')]+$functionalAreas, null, array('class'=>'selectpicker with-border', 'id'=>'functional_area_id', 'data-live-search'=>"true")) !!}
                      {!! APFrmErrHelp::showErrors($errors, 'functional_area_id') !!} 
                    </div>
                  </div>

                  <div class="col-xl-4">
                    <div class="submit-field {!! APFrmErrHelp::hasError($errors, 'country_id') !!}" id="country_id_div"> 
                      <h5>Country</h5>
                      <span>
                      {!! Form::select('country_id', ['' => __('Select Country')]+$countries, old('country_id', (isset($job))? $job->country_id:$siteSetting->default_country_id), array('class'=>'selectpicker with-border', 'id'=>'country_id', 'data-live-search'=>"true")) !!}
                      {!! APFrmErrHelp::showErrors($errors, 'country_id') !!} 
                      </span>
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="submit-field {!! APFrmErrHelp::hasError($errors, 'state_id') !!}" id="state_id_div"> 
                      <h5>State</h5>  
                      <span id="default_state_dd">
                        {!! Form::select('state_id', ['' => __('Select State')], null, array('class'=>'selectpicker with-border', 'id'=>'state_id', 'data-live-search'=>"true")) !!} 
                        {!! APFrmErrHelp::showErrors($errors, 'state_id') !!} 
                      </span>
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="submit-field {!! APFrmErrHelp::hasError($errors, 'city_id') !!}" id="city_id_div"> 
                      <h5>City</h5>  
                      <span id="default_city_dd">
                      {!! Form::select('city_id', ['' => __('Select City')], null, array('class'=>'selectpicker with-border', 'id'=>'city_id', 'data-live-search'=>"true")) !!} 
                      {!! APFrmErrHelp::showErrors($errors, 'city_id') !!} 
                      </span>
                    </div>
                  </div>

                  <div class="col-xl-4">
                    <div class="submit-field">
                      <h5>Required Skills</h5>
                      <div class="submit-field {!! APFrmErrHelp::hasError($errors, 'skills') !!}">
                        @php
                            $skills = old('skills', $jobSkillIds);
                        @endphp
                        {!! Form::select('skills[]', $jobSkills, $skills, array('class'=>'selectpicker default', 'id'=>'skills', 'multiple'=>'multiple', 'data-live-search'=>"true")) !!}
                        {!! APFrmErrHelp::showErrors($errors, 'skills') !!} 
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-4">
                    <div class="submit-field">
                      <h5>Salary</h5>
                      <div class="row">
                        <div class="col-xl-6">
                          <div class="input-with-icon">
                            {!! Form::number('salary_from', null, array('class'=>'with-border', 'id'=>'salary_from', 'placeholder'=>__('Salary from'))) !!}
                            {!! APFrmErrHelp::showErrors($errors, 'salary_from') !!} 
                            <i class="currency">USD</i>
                          </div>
                        </div>
                        <div class="col-xl-6">
                          <div class="input-with-icon">
                            {!! Form::number('salary_to', null, array('class'=>'with-border', 'id'=>'salary_to', 'placeholder'=>__('Salary to'))) !!}
                            {!! APFrmErrHelp::showErrors($errors, 'salary_to') !!} 
                            <i class="currency">USD</i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                <div class="col-xl-4">
                  <div class="submit-field {!! APFrmErrHelp::hasError($errors, 'expiry_date') !!}">
                  <h5>Project expiry date</h5>
                  {!! Form::text('expiry_date', null, array('class'=>'with-border datepicker', 'id'=>'expiry_date', 'placeholder'=>__('Campaign expiry date'), 'autocomplete'=>'off')) !!}
                  {!! APFrmErrHelp::showErrors($errors, 'expiry_date') !!} </div>
                </div>

                <div class="col-xl-12">
                  <div class="submit-field">
                    <h5>Short Description</h5>
                    {!! Form::textarea('short_description', null, array('class'=>'with-border', 'cols'=>"30", 'rows'=>"2", 'maxlength'=>"200", 'id'=>'short_description', 'placeholder'=>__('Short description'))) !!}
                    {!! APFrmErrHelp::showErrors($errors, 'short_description') !!} 

                    <h5 class="margin-top-30">Long Description</h5>
                    {!! Form::textarea('description', null, array('class'=>'with-border', 'cols'=>"30", 'rows'=>"8", 'maxlength'=>"2000", 'id'=>'long_description', 'placeholder'=>__('Long description'))) !!}
                    {!! APFrmErrHelp::showErrors($errors, 'description') !!} 


                    <div class="uploadButton margin-top-30">
                      <input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" multiple/>
                      <label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
                      <span class="uploadButton-file-name">Images or documents that might be helpful in describing your project</span>
                    </div>
                  </div>
                </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-12">
            <button type="submit" class="button ripple-effect big margin-top-30 right-side"><i class="icon-feather-plus"></i> Post Project </button>
          </div>

        </div>
        <!-- Row / End -->
        {!! Form::close() !!}
        
        @include('includes.dashboard_footer')

      </div>
    </div>
    <!-- Dashboard Content / End -->
  </div>

</div>

@endsection

@push('styles')
<style type="text/css">
.userccount p{ text-align:left !important;}
</style>
@endpush

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

  filterLangStates(<?php echo old('state_id', (isset($job))? $job->state_id:0); ?>);
  });

  function filterLangStates(state_id)
  {
    var country_id = $('#country_id').val();
    var select_obj = $('#default_state_dd').find('#state_id');
    select_obj.html('');
    var drop_obj = $('#default_state_dd').find('.dropdown-menu.inner');
    drop_obj.html('');
    if (country_id != ''){
    $.post("{{ route('filter.lang.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _dataType: 'json', _token: '{{ csrf_token() }}'})
          .done(function (response) {
            var opt_arr = JSON.parse(response);
            const keys = Object.keys(JSON.parse(response));
            var opthtml = '<option value>Select State</option>';
            var drophtml = '<li data-original-index="0" class=""><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Select State</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>';
            for(var i = 0; i < keys.length; i++)
            {
              opthtml += '<option value="'+keys[i]+'">'+opt_arr[keys[i]]+'</option>';
              drophtml += '<li data-original-index="'+(i+1)+'"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">'+opt_arr[keys[i]]+'</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>';
            }
            
          select_obj.html(opthtml);
          drop_obj.html(drophtml);
          filterLangCities(<?php echo old('city_id', (isset($job))? $job->city_id:0); ?>);
          });
    }
  }

  function filterLangCities(city_id)
  {
    var state_id = $('#state_id').val();
    var select_obj = $('#default_city_dd').find('#city_id');
    select_obj.html('');
    var drop_obj = $('#default_city_dd').find('.dropdown-menu.inner');
    drop_obj.html('');
    if (state_id != ''){
    $.post("{{ route('filter.lang.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _dataType: 'JSON' , _token: '{{ csrf_token() }}'})
            .done(function (response) {
              
        var opt_arr = JSON.parse(response);
        const keys = Object.keys(JSON.parse(response));
        var opthtml = '<option value>Select State</option>';
        var drophtml = '<li data-original-index="0" class=""><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Select State</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>';
        for(var i = 0; i < keys.length; i++)
        {
          opthtml += '<option value="'+keys[i]+'">'+opt_arr[keys[i]]+'</option>';
          drophtml += '<li data-original-index="'+(i+1)+'"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">'+opt_arr[keys[i]]+'</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>';
        }
            
        select_obj.html(opthtml);
        drop_obj.html(drophtml);

      });
    }
  }
</script> 
@endpush