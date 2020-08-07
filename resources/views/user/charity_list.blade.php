@extends('layouts.template')

@section('content') 
<!-- Wrapper -->
<div id="wrapper">

  @include('includes.donor_header')
  
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
  
          <!-- Hourly Rate -->
          <div class="sidebar-widget">
            <h3>Hourly Rate</h3>
            <div class="margin-top-55"></div>
  
            <!-- Range Slider -->
            <input class="range-slider" type="text" value="" data-slider-currency="$" data-slider-min="10" data-slider-max="250" data-slider-step="5" data-slider-value="[10,250]"/>
          </div>
  
          <!-- Tags -->
          <div class="sidebar-widget">
            <h3>Skills</h3>
  
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
                <label for="tag4">Arts</label>
              </div>
              <div class="tag">
                <input type="checkbox" id="tag5"/>
                <label for="tag5">Health & Life Skills</label>
              </div>
              <div class="tag">
                <input type="checkbox" id="tag6"/>
                <label for="tag6">Sports</label>
              </div>
              <div class="tag">
                <input type="checkbox" id="tag7"/>
                <label for="tag7">Education & Career development</label>
              </div>
            </div>
            <div class="clearfix"></div>
  
            <!-- More Skills -->
            <div class="keywords-container margin-top-20">
              <div class="keyword-input-container">
                <input type="text" class="keyword-input" placeholder="add more skills"/>
                <button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
              </div>
              <div class="keywords-list"><!-- keywords go here --></div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="clearfix"></div>
  
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
        
        <!-- Freelancers List Container -->
        <div class="freelancers-container freelancers-list-layout compact-list margin-top-35">
          @foreach ($charities as $charity)
              <!--Freelancer -->
          <div class="freelancer">
  
            <!-- Overview -->
            <div class="freelancer-overview">
              <div class="freelancer-overview-inner">
                
                <!-- Bookmark Icon -->
                <span class="bookmark-icon"></span>
                
                <!-- Avatar -->
                <div class="freelancer-avatar">
                  <div class="verified-badge"></div>
                  <a>{{$charity->printCharityImage()}}</a>
                </div>
  
                <!-- Name -->
                <div class="freelancer-name">
                  <h4><a>{{ $charity->organization_name }} <img class="flag" src="/assets/images/flags/gb.svg" alt="" title="United Kingdom" data-tippy-placement="top"></a></h4>
                  <span>{{$charity->getIndustry("industry")}}</span>
                  <!-- Rating -->
                  <div class="freelancer-rating">
                    <div class="star-rating" data-rating="4.9"></div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Details -->
            <div class="freelancer-details">
              <div class="freelancer-details-list">
                <ul>
                  <li>Location <strong><i class="icon-material-outline-location-on"></i> London</strong></li>
                  <li>Rate <strong>$60 / hr</strong></li>
                  <li>Job Success <strong>95%</strong></li>
                </ul>
              </div>
              <a href="{{route('donor.charity.detail', [$charity->slug])}}" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
            </div>
          </div>
          <!-- Freelancer / End -->
          @endforeach
        </div>
        <!-- Freelancers Container / End -->
  
  
        <!-- Pagination -->
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12">
            <!-- Pagination -->
            <div class="pagination-container margin-top-40 margin-bottom-60">
              <nav class="pagination">
                @if(isset($charities) && count($charities))
                  {{ $charities->appends(request()->query())->links() }}
                @endif
              </nav>
            </div>
          </div>
        </div>
        <!-- Pagination / End -->
  
      </div>
    </div>
  </div>
  
  @include('includes.donor_footer')
  
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