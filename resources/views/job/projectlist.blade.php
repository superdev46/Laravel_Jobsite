@extends('layouts.template')



@section('content') 



<!-- Wrapper -->
<div id="wrapper">

  @include('includes.charity_header')
  
  <!-- Spacer -->
  <div class="margin-top-90"></div>
  <!-- Spacer / End-->
  
  <!-- Page Content
  ================================================== -->
  <div class="container">
    <div class="row">
      <div class="col-xl-3 col-lg-4">
        <div class="sidebar-container">
          
          <!-- Location -->
          <div class="sidebar-widget">
            <h3>Location</h3>
            <div class="input-with-icon">
              <div id="autocomplete-container">
                <input id="autocomplete-input" type="text" placeholder="Location">
              </div>
              <i class="icon-material-outline-location-on"></i>
            </div>
          </div>
  
          <!-- Category -->
          <div class="sidebar-widget">
            <h3>Category</h3>
            <select class="selectpicker default" multiple data-selected-text-format="count" data-size="7" title="All Categories" >
              <option>Arts</option>
              <option>Health & Life Skills</option>
              <option>Character & Leadership Development</option>
              <option>Education & Career Development</option>
              <option>Sports</option>
              <option>Software Developing</option>
              <option>Fitness & Recreation</option>
              <option>Critical Services</option>
              <option>Artists For Humanity (AFH)</option>
              <option>Education & Training</option>
            </select>
          </div>
  
          <!-- Keywords -->
          <div class="sidebar-widget">
            <h3>Keywords</h3>
            <div class="keywords-container">
              <div class="keyword-input-container">
                <input type="text" class="keyword-input" placeholder="e.g. task title"/>
                <button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
              </div>
              <div class="keywords-list"><!-- keywords go here --></div>
              <div class="clearfix"></div>
            </div>
          </div>
  
          <!-- Budget -->
          <div class="sidebar-widget">
            <h3>Fixed Price</h3>
            <div class="margin-top-55"></div>
  
            <!-- Range Slider -->
            <input class="range-slider" type="text" value="" data-slider-currency="$" data-slider-min="10" data-slider-max="2500" data-slider-step="25" data-slider-value="[10,2500]"/>
          </div>
  
          <!-- Hourly Rate -->
          <div class="sidebar-widget">
            <h3>Hourly Rate</h3>
            <div class="margin-top-55"></div>
  
            <!-- Range Slider -->
            <input class="range-slider" type="text" value="" data-slider-currency="$" data-slider-min="10" data-slider-max="150" data-slider-step="5" data-slider-value="[10,200]"/>
          </div>
  
        </div>
      </div>
      <div class="col-xl-9 col-lg-8 content-left-offset">
  
        <h3 class="page-title">Search Results</h3>
  
        <div class="notify-box margin-top-15">
          <div class="switch-container">
            <label class="switch"><input type="checkbox"><span class="switch-button"></span><span class="switch-text">Turn on email alerts for this search</span></label>
          </div>
  
          <div class="sort-by">
            <span>Sort by:</span>
            <select class="selectpicker hide-tick">
              <option>Relevance</option>
              <option>Newest</option>
              <option>Oldest</option>
              <option>Random</option>
            </select>
          </div>
        </div>
        
        <!-- Tasks Container -->
        <div class="tasks-list-container compact-list margin-top-35">

          @if(isset($jobs) && count($jobs))

         
          @foreach($jobs as $job)
            @php 
              $donor = $job->getDonor(); 
            @endphp

            @if(null !== $donor)
              <!-- Task -->
              <a href="{{route('job.detail', [$job->slug])}}" class="task-listing">
                <!-- Job Listing Details -->
                <div class="task-listing-details">
                  <!-- Details -->
                  <div class="task-listing-description">
                  <h3 class="task-listing-title">{{$job->title}}</h3>
                    <ul class="task-icons">
                      <li><i class="icon-material-outline-location-on"></i> {{$job->getlocation()}}</li>
                      <li><i class="icon-material-outline-access-time"></i> 2 minutes ago</li>
                    </ul>
                  <p class="task-listing-text">{{$job->short_description}}</p>
                    <div class="task-tags">
                      <span>{{$job->getJobType('job_type')}}</span>
                    </div>
                  </div>
      
                </div>
      
                <div class="task-listing-bid">
                  <div class="task-listing-bid-inner">
                    <div class="task-offers">
                    <strong>${{$job->salary_from}} - ${{$job->salary_to}}</strong>
                      <span>Fixed Price</span>
                    </div>
                    <span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
                  </div>
                </div>
              </a>
            @endif
          @endforeach

          @endif

        </div>
        <!-- Tasks Container / End -->
        
        <!-- Pagination -->
        <div class="clearfix"></div>
        <div class="pagination-container margin-top-20 margin-bottom-20">
          <nav class="pagination">
            @if(isset($jobs) && count($job))
              {{ $jobs->appends(request()->query())->links() }}
            @endif
          </nav>
        </div>
        <div class="clearfix"></div>
        <!-- Pagination / End -->
  
      </div>
    </div>
  </div>
  
  
  @include('includes.charity_footer')
  
  </div>
  <!-- Wrapper / End -->


@endsection

@push('styles')

<style type="text/css">

.searchList li .jobimg {

    min-height: 80px;

}

.hide_vm_ul{

	height:100px;

	overflow:hidden;

}

.hide_vm{

	display:none !important;

}

.view_more{

	cursor:pointer;

}

</style>

@endpush

@push('scripts') 

<script>

    $(document).ready(function ($) {

        $("form").submit(function () {

            $(this).find(":input").filter(function () {

                return !this.value;

            }).attr("disabled", "disabled");

            return true;

        });

        $("form").find(":input").prop("disabled", false);

				

		$( ".view_more_ul" ).each(function() {

		  	if($( this ).height() > 100)

			{

				$( this ).addClass('hide_vm_ul');

				$( this ).next().removeClass('hide_vm');

			}

		});



		$('.view_more').on('click', function(e){

			e.preventDefault();

			$( this ).prev().removeClass('hide_vm_ul');

			$( this ).addClass('hide_vm');

		});

	

	});

</script>

@include('includes.country_state_city_js')

@endpush