@extends('layouts.template')
@section('content') 

@php

  $charity = $campaign->getCharity();

@endphp

<!-- Wrapper -->
<div id="wrapper">

  @include('includes.donor_header') 
  
  <!-- Titlebar
  ================================================== -->
  <div class="single-page-header" data-background-image="/assets/images/single-job.jpg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="single-page-header-inner">
            <div class="left-side">
              <div class="header-image"><a href="/donor/charity_profile"><img src="/assets/images/company-logo-01.png" alt=""></a></div>
              <div class="header-details">
                <h3>{{$campaign->title}}</h3>
                <h5>About the Charity</h5>
                <ul>
                  
                  <li><a href="{{route('charity.detail',$charity->slug)}}"><i class="icon-material-outline-business"></i> {{$charity->contact_name}}</a></li>
                  <li><div class="star-rating" data-rating="4.9"></div></li>
                  <li><img class="flag" src="/assets/images/flags/gb.svg" alt=""> United Kingdom</li>
                  <li><div class="verified-badge-with-title">Verified</div></li>
                </ul>
              </div>
            </div>
            <div class="right-side">
              <div class="salary-box">
                <div class="salary-type"> Budget</div>
                <div class="salary-amount">${{$campaign->salary_from}} - ${{$campaign->salary_to}}</div>
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
  
        <div class="single-page-section">
          <h3 class="margin-bottom-25">Campaign Description</h3>
          <p>
            {{$campaign->short_description}}
          </p>
  
        <p>{{$campaign->description}}</p>
        </div>
  
        <div class="single-page-section">
          <h3 class="margin-bottom-30">Location</h3>
          <div id="single-job-map-container">
            <div id="singleListingMap" data-latitude="51.507717" data-longitude="-0.131095" data-map-icon="im im-icon-Hamburger"></div>
            <a href="#" id="streetView">Street View</a>
          </div>
        </div>
  
  
        <div class="clearfix"></div>
        
        <!-- Freelancers Bidding -->
        <div class="boxed-list margin-bottom-60">
          <div class="boxed-list-headline">
            <h3><i class="icon-material-outline-group"></i>  Pledged Donors</h3>
          </div>
          <ul class="boxed-list-ul">
            @foreach ($applied_users as $applied_user)
            <li>
              <div class="bid">
                <!-- Avatar -->
                <div class="bids-avatar">
                  <div class="freelancer-avatar">
                    <div class="verified-badge"></div>
                    <a href="/donor/donor_profile">
                      {{ ImgUploader::print_image("user_images/$applied_user->image",0, 0, '' ,'image', 'profile-pic') }}
                    </a>
                  </div>
                </div>
                
                <!-- Content -->
                <div class="bids-content">
                  <!-- Name -->
                  <div class="freelancer-name">
                  <h4><a href="/donor/donor_profile">{{ $applied_user->name }}<img class="flag" src="/assets/images/flags/gb.svg" alt="" title="United Kingdom" data-tippy-placement="top"></a></h4>
                    <div class="star-rating" data-rating="4.9"></div>
                  </div>
                </div>
                
                <!-- Bid -->
                <div class="bids-bid">
                  <div class="bid-rate">
                  <div class="rate">${{ $applied_user->current_salary }}</div>
                    <span>{{ $applied_user->time }}</span>
                  </div>
                </div>
              </div>
            </li> 
            @endforeach
            
          </ul>
        </div>

        <div class="single-page-section">
          <h3 class="margin-bottom-25">Similar Campaigns</h3>
  
          <!-- Listings Container -->
          <div class="listings-container grid-layout">
  
              <!-- Job Listing -->
              <a href="#" class="job-listing">
  
                <!-- Job Listing Details -->
                <div class="job-listing-details">
                  <!-- Logo -->
                  <div class="job-listing-company-logo">
                    <img src="/assets/images/company-logo-02.png" alt="">
                  </div>
  
                  <!-- Details -->
                  <div class="job-listing-description">
                    <h4 class="job-listing-company">Coffee</h4>
                    <h3 class="job-listing-title">Barista and Cashier</h3>
                  </div>
                </div>
  
                <!-- Job Listing Footer -->
                <div class="job-listing-footer">
                  <ul>
                    <li><i class="icon-material-outline-location-on"></i> San Francisco</li>
                    <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                    <li><i class="icon-material-outline-account-balance-wallet"></i> $35000-$38000</li>
                    <li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
                  </ul>
                </div>
              </a>
  
              <!-- Job Listing -->
              <a href="#" class="job-listing">
  
                <!-- Job Listing Details -->
                <div class="job-listing-details">
                  <!-- Logo -->
                  <div class="job-listing-company-logo">
                    <img src="/assets/images/company-logo-03.png" alt="">
                  </div>
  
                  <!-- Details -->
                  <div class="job-listing-description">
                    <h4 class="job-listing-company">King <span class="verified-badge" title="Verified Employer" data-tippy-placement="top"></span></h4>
                    <h3 class="job-listing-title">Restaurant Manager</h3>
                  </div>
                </div>
  
                <!-- Job Listing Footer -->
                <div class="job-listing-footer">
                  <ul>
                    <li><i class="icon-material-outline-location-on"></i> San Francisco</li>
                    <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                    <li><i class="icon-material-outline-account-balance-wallet"></i> $35000-$38000</li>
                    <li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
                  </ul>
                </div>
              </a>
            </div>
            <!-- Listings Container / End -->
  
          </div>
      </div>
      
  
      <!-- Sidebar -->
      <div class="col-xl-4 col-lg-4">
        <div class="sidebar-container">
  
          <a href="#small-dialog" class="apply-now-button popup-with-zoom-anim">Submit Pledge
    <i class="icon-material-outline-arrow-right-alt"></i></a>
            
          <!-- Sidebar Widget -->
          <div class="sidebar-widget">
            <div class="job-overview">
              <div class="job-overview-headline">Campaign Summary</div>
              <div class="job-overview-inner">
                <ul>
                  <li>
                    <i class="icon-material-outline-location-on"></i>
                    <span>Location</span>
                    <h5>{{$campaign->getLocation()}}</h5>
                  </li>
                  <li>
                    <i class="icon-material-outline-business-center"></i>
                    <span>Campaign Type</span>
                    <h5>{{$campaign->getJobType('job_type')}}</h5>
                  </li>
                  <li>
                    <i class="icon-material-outline-local-atm"></i>
                    <span>Salary</span>
                    <h5>${{$campaign->salary_from}} - ${{$campaign->salary_to}}</h5>
                  </li>
                  <li>
                    <i class="icon-material-outline-access-time"></i>
                    <span>Date Posted</span>
                    <h5>2 days ago</h5>
                  </li>
                </ul>
              </div>
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
  
  
  <!-- Footer
  ================================================== -->
  <div id="footer">
    
    <!-- Footer Top Section -->
    <div class="footer-top-section">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
  
            <!-- Footer Rows Container -->
            <div class="footer-rows-container">
              
              <!-- Left Side -->
              <div class="footer-rows-left">
                <div class="footer-row">
                  <div class="footer-row-inner footer-logo">
                    <img src="/assets/images/logo2.png" alt="">
                  </div>
                </div>
              </div>
              
              <!-- Right Side -->
              <div class="footer-rows-right">
  
                <!-- Social Icons -->
                <div class="footer-row">
                  <div class="footer-row-inner">
                    <ul class="footer-social-links">
                      <li>
                        <a href="#" title="Facebook" data-tippy-placement="bottom" data-tippy-theme="light">
                          <i class="icon-brand-facebook-f"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#" title="Twitter" data-tippy-placement="bottom" data-tippy-theme="light">
                          <i class="icon-brand-twitter"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#" title="Google Plus" data-tippy-placement="bottom" data-tippy-theme="light">
                          <i class="icon-brand-google-plus-g"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#" title="LinkedIn" data-tippy-placement="bottom" data-tippy-theme="light">
                          <i class="icon-brand-linkedin-in"></i>
                        </a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                </div>
                
                <!-- Language Switcher -->
                <div class="footer-row">
                  <div class="footer-row-inner">
                    <select class="selectpicker language-switcher" data-selected-text-format="count" data-size="5">
                      <option selected>English</option>
                      <option>Français</option>
                      <option>Español</option>
                      <option>Deutsch</option>
                    </select>
                  </div>
                </div>
              </div>
  
            </div>
            <!-- Footer Rows Container / End -->
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Top Section / End -->
  
    <!-- Footer Middle Section -->
    <div class="footer-middle-section">
      <div class="container">
        <div class="row">
  
          <!-- Links -->
          <div class="col-xl-2 col-lg-2 col-md-3">
            <div class="footer-links">
              <h3>For Candidates</h3>
              <ul>
                <li><a href="#"><span>Browse Jobs</span></a></li>
                <li><a href="#"><span>Add Resume</span></a></li>
                <li><a href="#"><span>Job Alerts</span></a></li>
                <li><a href="#"><span>My Bookmarks</span></a></li>
              </ul>
            </div>
          </div>
  
          <!-- Links -->
          <div class="col-xl-2 col-lg-2 col-md-3">
            <div class="footer-links">
              <h3>For Employers</h3>
              <ul>
                <li><a href="#"><span>Browse Candidates</span></a></li>
                <li><a href="#"><span>Post a Job</span></a></li>
                <li><a href="#"><span>Post a Task</span></a></li>
                <li><a href="#"><span>Plans & Pricing</span></a></li>
              </ul>
            </div>
          </div>
  
          <!-- Links -->
          <div class="col-xl-2 col-lg-2 col-md-3">
            <div class="footer-links">
              <h3>Helpful Links</h3>
              <ul>
                <li><a href="#"><span>Contact</span></a></li>
                <li><a href="#"><span>Privacy Policy</span></a></li>
                <li><a href="#"><span>Terms of Use</span></a></li>
              </ul>
            </div>
          </div>
  
          <!-- Links -->
          <div class="col-xl-2 col-lg-2 col-md-3">
            <div class="footer-links">
              <h3>Account</h3>
              <ul>
                <li><a href="#"><span>Log In</span></a></li>
                <li><a href="#"><span>My Account</span></a></li>
              </ul>
            </div>
          </div>
  
          <!-- Newsletter -->
          <div class="col-xl-4 col-lg-4 col-md-12">
            <h3><i class="icon-feather-mail"></i> Sign Up For a Newsletter</h3>
            <p>Weekly breaking news, analysis and cutting edge advices on job searching.</p>
            <form action="#" method="get" class="newsletter">
              <input type="text" name="fname" placeholder="Enter your email address">
              <button type="submit"><i class="icon-feather-arrow-right"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Middle Section / End -->
    
    @include('includes.donor_footer') 
  
  </div>
  <!-- Footer / End -->
  
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
          <form method="post" action="{{route('post.pledge.campaign',$campaign->slug)}}" id="apply-now-form">
            {!! Form::token() !!}
            <div class="col-xl-12">
              <div class="submit-field">
                <h5>Description</h5>
                <textarea cols="30" rows="5" name="description" class="with-border"></textarea>
              </div>
  
              <div class="input-with-icon-left">
                <i class="icon-material-attach-money">$</i>
                <input type="number" class="input-text with-border" name="current_salary" id="current_salary" placeholder="" required/>
              </div>
            </div>
  
            <!-- Button -->
            <button type="submit" class="button margin-top-35 full-width button-sliding-icon ripple-effect" form="apply-now-form">Submit <i class="icon-material-outline-arrow-right-alt"></i></button>          
  
          </form>
  
        </div>
  
      </div>
    </div>
  </div>
  <!-- Apply for a job popup / End -->

  @endsection