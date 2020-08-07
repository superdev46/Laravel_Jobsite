@extends('layouts.template')



@section('content') 

<!-- Wrapper -->
<div id="wrapper">

@include('includes.charity_header')

@php
  $donor = $job->getDonor();
@endphp
  
  <!-- Titlebar
  ================================================== -->
  <div class="single-page-header" data-background-image="/assets/images/single-task.jpg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="single-page-header-inner">
            <div class="left-side">
              <div class="header-image">
                <a href="{{route('charity.donor.profile', [$donor->id])}}">
                  {{$donor->printUserImage()}}
                </a>
              </div>
              <div class="header-details">
              <h3>{{$job->title}}</h3>
                <h5>About the Donor</h5>
                <ul>
                <li><a href="{{route('charity.donor.profile', [$donor->id])}}"><i class="icon-material-outline-business"></i>{{$donor->name}}</a></li>
                  <li><div class="star-rating" data-rating="5.0"></div></li>
                  <li><img class="flag" src="/assets/images/flags/de.svg" alt=""> Germany</li>
                  <li><div class="verified-badge-with-title">Verified</div></li>
                </ul>
              </div>
            </div>
            <div class="right-side">
              <div class="salary-box">
                <div class="salary-type">Project Budget</div>
              <div class="salary-amount">${{$job->salary_from}} - ${{$job->salary_to}}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  <!-- Page Content
  ================================================== -->
  <div class="container">
    <div class="row">
      
      <!-- Content -->
      <div class="col-xl-8 col-lg-8 content-right-offset">
        
        <!-- Description -->
        <div class="single-page-section">
          <h3 class="margin-bottom-25">Project Description</h3>
          <p>{{$job->short_description}}</p>
  
          <p>{{$job->description}}</p>
        </div>
  
        <!-- Atachments -->
        <div class="single-page-section">
          <h3>Attachments</h3>
          <div class="attachments-container">
            <a href="#" class="attachment-box ripple-effect"><span>Project Brief</span><i>PDF</i></a>
          </div>
        </div>
  
        <!-- Skills -->
        <div class="single-page-section">
          <h3>Skills Required</h3>
          <div class="task-tags">
            {!!$job->getJobSkillsList()!!}
            {{-- <span>Artists For Humanity</span> --}}
          </div>
        </div>
        <div class="clearfix"></div>
        
        <!-- Freelancers Bidding -->
        <div class="boxed-list margin-bottom-60">
          <div class="boxed-list-headline">
            <h3><i class="icon-material-outline-group"></i> Charities Bidding</h3>
          </div>
          <ul class="boxed-list-ul">
            @foreach ($applies as $apply)
              @php
                $charity = $apply->getCharity();
              @endphp
              <li>
                <div class="bid">
                  <!-- Avatar -->
                  <div class="bids-avatar">
                    <div class="freelancer-avatar">
                      <div class="verified-badge"></div>
                      <a href="/charity/charity_profile">
                        {{$charity->printCharityImage()}}
                      </a>
                    </div>
                  </div>
                  
                  <!-- Content -->
                  <div class="bids-content">
                    <!-- Name -->
                    <div class="freelancer-name">
                      <h4><a href="/charity/charity_profile">{{$charity->organization_name}}</a></h4>
                      <div class="star-rating" data-rating="4.9"></div>
                    </div>
                  </div>
                  
                  <!-- Bid -->
                  <div class="bids-bid">
                    <div class="bid-rate">
                      <div class="rate">${{$apply->current_salary}}</div>
                      <span>in {{$apply->period}} days</span>
                    </div>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
  
      </div>
      
  
      <!-- Sidebar -->
      <div class="col-xl-4 col-lg-4">
        <div class="sidebar-container">
  
          <div class="countdown green margin-bottom-35">6 days, 23 hours left</div>
  
          <div class="sidebar-widget">
            <div class="bidding-widget">
              <div class="bidding-headline"><h3>Bid on this project!</h3></div>
              <div class="bidding-inner">
  
                <!-- Headline -->
                <span class="bidding-detail">Set your <strong>minimal rate</strong></span>
  
                <!-- Price Slider -->
                <div class="bidding-value">$<span id="biddingVal"></span></div>
                <input class="bidding-slider current_salary" name="current_salary" type="text" value="" data-slider-handle="custom" data-slider-currency="$" data-slider-min="{{ $job->salary_from }}" data-slider-max="{{ $job->salary_to }}" data-slider-value="auto" data-slider-step="50" data-slider-tooltip="hide" />
                
                <!-- Headline -->
                <span class="bidding-detail margin-top-30">Set your <strong>delivery time</strong></span>
  
                <!-- Fields -->
                <div class="bidding-fields">
                  <div class="bidding-field">
                    <!-- Quantity Buttons -->
                    <div class="qtyButtons">
                      <div class="qtyDec"></div>
                      <input type="text" name="period" value="1" class="period">
                      <div class="qtyInc"></div>
                    </div>
                  </div>
                  <div class="bidding-field">
                    <select class="selectpicker default">
                      <option selected>Days</option>
                    </select>
                  </div>
                </div>
  
                @if ($applied_state == 0)
                  <a id="btn_project_bid" href="#small-dialog" class="apply-now-button popup-with-zoom-anim margin-top-25"><span>Place a Bid</span></a>
                @else
                  <a id="btn_project_bid" class="apply-now-button applied popup-with-zoom-anim margin-top-25"><span>Applied</span></a>
                @endif

                <!-- Button -->
                
  
              </div>
              <div class="bidding-signup">Don't have an account? <a href="#sign-in-dialog" class="register-tab sign-in popup-with-zoom-anim">Sign Up</a></div>
            </div>
          </div>
  
          <!-- Sidebar Widget -->
          <div class="sidebar-widget">
            <h3>Bookmark or Share</h3>
  
            <!-- Bookmark Button -->
            <button class="bookmark-button margin-bottom-25">
              <span class="bookmark-icon"></span>
              <span class="bookmark-text">Bookmark</span>
              <span class="bookmarked-text">Bookmarked</span>
            </button>
  
            <!-- Copy URL -->
            <div class="copy-url">
              <input id="copy-url" type="text" value="" class="with-border">
              <button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="Copy to Clipboard" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
            </div>
  
            <!-- Share Buttons -->
            <div class="share-buttons margin-top-25">
              <div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
              <div class="share-buttons-content">
                <span>Interesting? <strong>Share It!</strong></span>
                <ul class="share-buttons-icons">
                  <li><a href="#" data-button-color="#3b5998" title="Share on Facebook" data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
                  <li><a href="#" data-button-color="#1da1f2" title="Share on Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
                  <li><a href="#" data-button-color="#dd4b39" title="Share on Google Plus" data-tippy-placement="top"><i class="icon-brand-google-plus-g"></i></a></li>
                  <li><a href="#" data-button-color="#0077b5" title="Share on LinkedIn" data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
  
        </div>
      </div>
  
    </div>
  </div>
  
  
  <!-- Spacer -->
  <div class="margin-top-15"></div>
  <!-- Spacer / End-->
  @include('includes.charity_footer')
    
  </div>
  <!-- Wrapper / End -->
  
  <!-- Apply for a job popup
  ================================================== -->
  <div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
  
    <!--Tabs -->
    <div class="sign-in-form">
  
      <ul class="popup-tabs-nav">
        <li><a href="#tab">Apply Now</a></li>
      </ul>
  
      <div class="popup-tabs-container">
  
        <!-- Tab -->
        <div class="popup-tab-content" id="tab">
            
          <!-- Form -->
          {!! Form::open(array('method' => 'post', 'route' => array('post.apply.project', $job->slug), 'class' => 'form', 'id' => 'apply-now-form')) !!}
            <input type="hidden" name="period">
            <div class="col-xl-12">
              <div class="submit-field">
                <h5>Budget</h5>
                <input class="dlg_salary" type="number" name="current_salary">
              </div>

              <div class="submit-field">
                <h5>Peroid</h5>
                <input class="dlg_period" type="number" name="period">
              </div>

              <div class="submit-field">
                <h5>Description</h5>
                <textarea cols="30" rows="5" name="description" class="with-border dlg_description"></textarea>
              </div>
  
              <!-- Button -->
              <button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit" form="apply-now-form">Apply Now <i class="icon-material-outline-arrow-right-alt"></i></button>
            </div>
          {!! Form::close() !!}
        </div>
  
      </div>
    </div>
  </div>
  <!-- Apply for a job popup / End -->
  

@endsection

@push('styles')

<style type="text/css">

.view_more{display:none !important;}

</style>

@endpush

@push('scripts') 

<script>

  $(document).ready(function ($) {
    $("#btn_project_bid").click(function(){
      var salary = $(".current_salary").val();
      var period = $(".period").val();
      $(".dlg_salary").val(salary);
      $(".dlg_period").val(period);
    });
	});

</script> 

@endpush