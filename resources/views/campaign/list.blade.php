@extends('layouts.template')



@section('content') 

<!-- Wrapper -->
<div id="wrapper">

<!-- Header start --> 
@include('includes.donor_header') 
<!-- Header end --> 
  
  <!-- Page Content
  ================================================== -->
  <div class="full-page-container">
  
    <div class="full-page-sidebar">
      <div class="full-page-sidebar-inner" data-simplebar>
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
  
          
          <!-- Keywords -->
          <div class="sidebar-widget">
            <h3>Keywords</h3>
            <div class="keywords-container">
              <div class="keyword-input-container">
                <input type="text" class="keyword-input" placeholder="e.g. campaign title"/>
                <button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
              </div>
              <div class="keywords-list"><!-- keywords go here --></div>
              <div class="clearfix"></div>
            </div>
          </div>
          
          <!-- Category -->
          <div class="sidebar-widget">
            <h3>Category</h3>
            <select class="selectpicker default" multiple data-selected-text-format="count" data-size="7" title="All Categories" >
              <option>Admin Support</option>
              <option>Customer Service</option>
              <option>Data Analytics</option>
              <option>Design & Creative</option>
              <option>Legal</option>
              <option>Software Developing</option>
              <option>IT & Networking</option>
              <option>Writing</option>
              <option>Translation</option>
              <option>Sales & Marketing</option>
            </select>
          </div>
  
          <!-- Salary -->
          <div class="sidebar-widget">
            <h3>Budget</h3>
            <div class="margin-top-55"></div>
  
            <!-- Range Slider -->
            <input class="range-slider" type="text" value="" data-slider-currency="$" data-slider-min="100" data-slider-max="15000" data-slider-step="100" data-slider-value="[100,15000]"/>
          </div>
  
          <!-- Tags -->
          <div class="sidebar-widget">
            <h3>Tags</h3>
  
            <div class="tags-container">
              <div class="tag">
                <input type="checkbox" id="tag1"/>
                <label for="tag1">Artists For Humanity (AFH)</label>
              </div>
              <div class="tag">
                <input type="checkbox" id="tag2"/>
                <label for="tag2">Education & Training</label>
              </div>
              <div class="tag">
                <input type="checkbox" id="tag3"/>
                <label for="tag3">Health Service</label>
              </div>
              <div class="tag">
                <input type="checkbox" id="tag4"/>
                <label for="tag4">fitness & recreation</label>
              </div>
              <div class="tag">
                <input type="checkbox" id="tag5"/>
                <label for="tag5">family-centered programs and services</label>
              </div>
              <div class="tag">
                <input type="checkbox" id="tag6"/>
                <label for="tag6">design</label>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
  
        </div>
        <!-- Sidebar Container / End -->
  
        <!-- Search Button -->
        <div class="sidebar-search-button-container">
          <button class="button ripple-effect">Search</button>
        </div>
        <!-- Search Button / End-->
  
      </div>
    </div>
    <!-- Full Page Sidebar / End -->
    
    <!-- Full Page Content -->
    <div class="full-page-content-container" data-simplebar>
      <div class="full-page-content-inner">
  
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
  
        <div class="listings-container grid-layout margin-top-35">

          @if(isset($campaigns) && count($campaigns))

            @foreach($campaigns as $campaign)
            @php $charity = $campaign->getCharity(); @endphp
            @if(null !== $charity)

              <!-- Job Listing -->
              <a href="{{route('campaign.detail', [$campaign->slug])}}" class="job-listing">
      
                <!-- Job Listing Details -->
                <div class="job-listing-details">
                  <!-- Logo -->
                  <div class="job-listing-company-logo">
                    {{$charity->printCharityImage()}}
                  </div>
      
                  <!-- Details -->
                  <div class="job-listing-description">
                    <h4 class="job-listing-company">{{$charity->contact_name}} <span class="verified-badge" title="Verified Employer" data-tippy-placement="top"></span></h4>
                    <h3 class="job-listing-title">{{$campaign->title}}</h3>
                  </div>
                </div>
      
                <!-- Job Listing Footer -->
                <div class="job-listing-footer">
                  <span class="bookmark-icon"></span>
                  <ul>
                    <li><i class="icon-material-outline-location-on"></i> {{$campaign->getCity('city')}} </li>
                    <li><i class="icon-material-outline-business-center"></i> {{$campaign->getJobType('job_type')}}</li>
                    <li><i class="icon-material-outline-account-balance-wallet"></i> ${{$campaign->salary_from}}-${{$campaign->salary_to}}</li>
                    <li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
                  </ul>
                </div>
              </a>	

            @endif
            @endforeach
            @endif

        </div>

  
        <!-- Pagination -->
        <div class="clearfix"></div>
        <div class="pagination-container margin-top-20 margin-bottom-20">
          <nav class="pagination">
            @if(isset($campaigns) && count($campaigns))
              {{ $campaigns->appends(request()->query())->links() }}
            @endif
          </nav>
        </div>
        <div class="clearfix"></div>
        <!-- Pagination / End -->
  
        <!-- Footer -->
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
    <!-- Full Page Content / End -->
  
  </div>
  
  
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