@extends('layouts.template')

@section('content') 

<!-- Wrapper -->
<div id="wrapper">

  @include('includes.charity_header')
  
  <!-- Intro Banner
  ================================================== -->
  <!-- add class "disable-gradient" to enable consistent background overlay -->
  <div class="intro-banner" data-background-image="/assets/images/home-background.jpg">
    <div class="container">
      
      <!-- Intro Headline -->
      <div class="row">
        <div class="col-md-12">
          <div class="banner-headline">
            <h3>
              <strong>Hire experts or be hired for any project, any time.</strong>
              <br>
              <span>Thousands of small businesses use <strong class="color">PhillanthropEX</strong> to turn their ideas into reality.</span>
            </h3>
          </div>
        </div>
      </div>
      
      <!-- Search Bar -->
      <div class="row">
        <div class="col-md-12">
          <div class="intro-banner-search-form margin-top-95">
  
            <!-- Search Field -->
            <div class="intro-search-field">
              <label for ="intro-keywords" class="field-title ripple-effect">What project you want?</label>
              <input id="intro-keywords" type="text" placeholder="Project Title or Keywords">
            </div>
  
            <!-- Button -->
            <div class="intro-search-button">
              <button class="button ripple-effect" onclick="window.location.href='/charity/find_project'">Search</button>
            </div>
          </div>
        </div>
      </div>
  
      <!-- Stats -->
      <div class="row">
        <div class="col-md-12">
          <ul class="intro-stats margin-top-45 hide-under-992px">
            <li>
              <strong class="counter">11,586</strong>
              <span>Projects Posted</span>
            </li>
            <li>
              <strong class="counter">3,543</strong>
              <span>Campaigns Posted</span>
            </li>
            <li>
              <strong class="counter">21,232</strong>
              <span>Charities</span>
            </li>
          </ul>
        </div>
      </div>
  
    </div>
  </div>
  
  
  <!-- Content
  ================================================== -->
  <!-- Category Boxes -->
  <div class="section gray padding-top-65">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
  
          <div class="section-headline centered margin-bottom-15">
            <h3>Popular Project Categories</h3>
          </div>
  
          <!-- Category Boxes Container -->
          <div class="categories-container">
  
            <!-- Category Box -->
            <a href="/charity/find_project" class="category-box">
              <div class="category-box-icon">
                <i class="icon-line-awesome-file-code-o"></i>
              </div>
              <div class="category-box-counter">612</div>
              <div class="category-box-content">
                <h3>Web & Software Dev</h3>
                <p>Software Engineer, Web / Mobile Developer & More</p>
              </div>
            </a>
  
            <!-- Category Box -->
            <a href="/charity/find_project" class="category-box">
              <div class="category-box-icon">
                <i class="icon-line-awesome-cloud-upload"></i>
              </div>
              <div class="category-box-counter">113</div>
              <div class="category-box-content">
                <h3>Data Science & Analitycs</h3>
                <p>Data Specialist / Scientist, Data Analyst & More</p>
              </div>
            </a>
  
            <!-- Category Box -->
            <a href="/charity/find_project" class="category-box">
              <div class="category-box-icon">
                <i class="icon-line-awesome-suitcase"></i>
              </div>
              <div class="category-box-counter">186</div>
              <div class="category-box-content">
                <h3>Accounting & Consulting</h3>
                <p>Auditor, Accountant, Fnancial Analyst & More</p>
              </div>
            </a>
  
            <!-- Category Box -->
            <a href="/charity/find_project" class="category-box">
              <div class="category-box-icon">
                <i class="icon-line-awesome-pencil"></i>
              </div>
              <div class="category-box-counter">298</div>
              <div class="category-box-content">
                <h3>Writing & Translations</h3>
                <p>Copywriter, Creative Writer, Translator & More</p>
              </div>
            </a>
  
            <!-- Category Box -->
            <a href="/charity/find_project" class="category-box">
              <div class="category-box-icon">
                <i class="icon-line-awesome-pie-chart"></i>
              </div>
              <div class="category-box-counter">549</div>						
              <div class="category-box-content">
                <h3>Sales & Marketing</h3>
                <p>Brand Manager, Marketing Coordinator & More</p>
              </div>
            </a>
  
            <!-- Category Box -->
            <a href="/charity/find_project" class="category-box">
              <div class="category-box-icon">
                <i class="icon-line-awesome-image"></i>
              </div>
              <div class="category-box-counter">873</div>
              <div class="category-box-content">
                <h3>Graphics & Design</h3>
                <p>Creative Director, Web Designer & More</p>
              </div>
            </a>
  
            <!-- Category Box -->
            <a href="/charity/find_project" class="category-box">
              <div class="category-box-icon">
                <i class="icon-line-awesome-bullhorn"></i>
              </div>
              <div class="category-box-counter">125</div>
              <div class="category-box-content">
                <h3>Digital Marketing</h3>
                <p>Darketing Analyst, Social Profile Admin & More</p>
              </div>
            </a>
  
            <!-- Category Box -->
            <a href="/charity/find_project" class="category-box">
              <div class="category-box-icon">
                <i class="icon-line-awesome-graduation-cap"></i>
              </div>
              <div class="category-box-counter">445</div>
              <div class="category-box-content">
                <h3>Education & Training</h3>
                <p>Advisor, Coach, Education Coordinator & More</p>
              </div>
            </a>
  
          </div>
  
        </div>
      </div>
    </div>
  </div>
  <!-- Category Boxes / End -->
  
  <!-- Icon Boxes -->
  <div class="section padding-top-65 padding-bottom-65">
    <div class="container">
      <div class="row">
  
        <div class="col-xl-12">
          <!-- Section Headline -->
          <div class="section-headline centered margin-top-0 margin-bottom-5">
            <h3>How It Works?</h3>
          </div>
        </div>
        
        <div class="col-xl-4 col-md-4">
          <!-- Icon Box -->
          <div class="icon-box with-line">
            <!-- Icon -->
            <div class="icon-box-circle">
              <div class="icon-box-circle-inner">
                <i class="icon-line-awesome-lock"></i>
                <div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
              </div>
            </div>
            <h3>Create an Account</h3>
            <p>Bring to the table win-win survival strategies to ensure proactive domination going forward.</p>
          </div>
        </div>
  
        <div class="col-xl-4 col-md-4">
          <!-- Icon Box -->
          <div class="icon-box with-line">
            <!-- Icon -->
            <div class="icon-box-circle">
              <div class="icon-box-circle-inner">
                <i class="icon-line-awesome-legal"></i>
                <div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
              </div>
            </div>
            <h3>Post a Project or Campaign</h3>
            <p>Efficiently unleash cross-media information without. Quickly maximize return on investment.</p>
          </div>
        </div>
  
        <div class="col-xl-4 col-md-4">
          <!-- Icon Box -->
          <div class="icon-box">
            <!-- Icon -->
            <div class="icon-box-circle">
              <div class="icon-box-circle-inner">
                <i class=" icon-line-awesome-trophy"></i>
                <div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
              </div>
            </div>
            <h3>Choose an Expert</h3>
            <p>Nanotechnology immersion along the information highway will close the loop on focusing solely.</p>
          </div>
        </div>
  
      </div>
    </div>
  </div>
  <!-- Icon Boxes / End -->
  
  <!-- Features Jobs -->
  <div class="section gray margin-top-45 padding-top-65 padding-bottom-75">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          
          <!-- Section Headline -->
          <div class="section-headline margin-top-0 margin-bottom-35">
            <h3>Featured Projects</h3>
            <a href="/charity/find_project" class="headline-link">Browse All Projects</a>
          </div>
          
          <!-- Jobs Container -->
          <div class="listings-container compact-list-layout margin-top-35">
            
            <!-- Job Listing -->
            <a href="/charity/project_detail" class="job-listing with-apply-button">
  
              <!-- Job Listing Details -->
              <div class="job-listing-details">
  
                <!-- Logo -->
                <div class="job-listing-company-logo">
                  <img src="/assets/images/user-avatar-small-01.jpg" alt="">
                </div>
  
                <!-- Details -->
                <div class="job-listing-description">
                  <h3 class="job-listing-title">Bilingual Event Support Specialist</h3>
  
                  <!-- Job Listing Footer -->
                  <div class="job-listing-footer">
                    <ul>
                      <li><i class="icon-material-outline-business"></i> Hexagon <div class="verified-badge" title="Verified Employer" data-tippy-placement="top"></div></li>
                      <li><i class="icon-material-outline-location-on"></i> San Francissco</li>
                      <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                      <li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
                    </ul>
                  </div>
                </div>
  
                <!-- Apply Button -->
                <span class="list-apply-button ripple-effect">Apply Now</span>
              </div>
            </a>	
  
  
            <!-- Job Listing -->
            <a href="/charity/project_detail" class="job-listing with-apply-button">
  
              <!-- Job Listing Details -->
              <div class="job-listing-details">
  
                <!-- Logo -->
                <div class="job-listing-company-logo">
                  <img src="/assets/images/user-avatar-small-02.jpg" alt="">
                </div>
  
                <!-- Details -->
                <div class="job-listing-description">
                  <h3 class="job-listing-title">Competition Law Officer</h3>
  
                  <!-- Job Listing Footer -->
                  <div class="job-listing-footer">
                    <ul>
                      <li><i class="icon-material-outline-business"></i> Laxo</li>
                      <li><i class="icon-material-outline-location-on"></i> San Francissco</li>
                      <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                      <li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
                    </ul>
                  </div>
                </div>
  
                <!-- Apply Button -->
                <span class="list-apply-button ripple-effect">Apply Now</span>
              </div>
            </a>
            <!-- Job Listing -->
            <a href="/charity/project_detail" class="job-listing with-apply-button">
  
              <!-- Job Listing Details -->
              <div class="job-listing-details">
  
                <!-- Logo -->
                <div class="job-listing-company-logo">
                  <img src="/assets/images/user-avatar-small-03.jpg" alt="">
                </div>
  
                <!-- Details -->
                <div class="job-listing-description">
                  <h3 class="job-listing-title">Barista and Cashier</h3>
  
                  <!-- Job Listing Footer -->
                  <div class="job-listing-footer">
                    <ul>
                      <li><i class="icon-material-outline-business"></i> Coffee</li>
                      <li><i class="icon-material-outline-location-on"></i> San Francissco</li>
                      <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                      <li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
                    </ul>
                  </div>
                </div>
  
                <!-- Apply Button -->
                <span class="list-apply-button ripple-effect">Apply Now</span>
              </div>
            </a>
            
  
            <!-- Job Listing -->
            <a href="/charity/project_detail" class="job-listing with-apply-button">
  
              <!-- Job Listing Details -->
              <div class="job-listing-details">
  
                <!-- Logo -->
                <div class="job-listing-company-logo">
                  <img src="/assets/images/user-avatar-small-01.jpg" alt="">
                </div>
  
                <!-- Details -->
                <div class="job-listing-description">
                  <h3 class="job-listing-title">Restaurant General Manager</h3>
  
                  <!-- Job Listing Footer -->
                  <div class="job-listing-footer">
                    <ul>
                      <li><i class="icon-material-outline-business"></i> King <div class="verified-badge" title="Verified Employer" data-tippy-placement="top"></div></li>
                      <li><i class="icon-material-outline-location-on"></i> San Francissco</li>
                      <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                      <li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
                    </ul>
                  </div>
                </div>
  
                <!-- Apply Button -->
                <span class="list-apply-button ripple-effect">Apply Now</span>
              </div>
            </a>
  
            <!-- Job Listing -->
            <a href="/charity/project_detail" class="job-listing with-apply-button">
  
              <!-- Job Listing Details -->
              <div class="job-listing-details">
  
                <!-- Logo -->
                <div class="job-listing-company-logo">
                  <img src="/assets/images/user-avatar-small-02.jpg" alt="">
                </div>
  
                <!-- Details -->
                <div class="job-listing-description">
                  <h3 class="job-listing-title">International Marketing Coordinator</h3>
  
                  <!-- Job Listing Footer -->
                  <div class="job-listing-footer">
                    <ul>
                      <li><i class="icon-material-outline-business"></i> Skyist</li>
                      <li><i class="icon-material-outline-location-on"></i> San Francissco</li>
                      <li><i class="icon-material-outline-business-center"></i> Full Time</li>
                      <li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
                    </ul>
                  </div>
                </div>
  
                <!-- Apply Button -->
                <span class="list-apply-button ripple-effect">Apply Now</span>
              </div>
            </a>
  
          </div>
          <!-- Jobs Container / End -->
  
        </div>
      </div>
    </div>
  </div>
  <!-- Featured Jobs / End -->
  
  
  <!-- Highest Rated Freelancers -->
  <div class="section padding-top-65 padding-bottom-70 full-width-carousel-fix">
    <div class="container">
      <div class="row">
  
        <div class="col-xl-12">
          <!-- Section Headline -->
          <div class="section-headline margin-top-0 margin-bottom-25">
            <h3>Highest Rated Donors</h3>
            <a href="/charity/browse_donors" class="headline-link">Browse All Donors</a>
          </div>
        </div>
  
        <div class="col-xl-12">
          <div class="default-slick-carousel freelancers-container freelancers-grid-layout">
  
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
                    <a href="/charity/donor_profile"><img src="/assets/images/user-avatar-big-01.jpg" alt=""></a>
                  </div>
  
                  <!-- Name -->
                  <div class="freelancer-name">
                    <h4><a href="/charity/donor_profile">Tom Smith <img class="flag" src="/assets/images/flags/gb.svg" alt="" title="United Kingdom" data-tippy-placement="top"></a></h4>
                    <span>UI/UX Designer</span>
                  </div>
  
                  <!-- Rating -->
                  <div class="freelancer-rating">
                    <div class="star-rating" data-rating="5.0"></div>
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
                <a href="/charity/donor_profile" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
              </div>
            </div>
            <!-- Freelancer / End -->
  
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
                    <a href="/charity/donor_profile"><img src="/assets/images/user-avatar-big-02.jpg" alt=""></a>
                  </div>
  
                  <!-- Name -->
                  <div class="freelancer-name">
                    <h4><a href="#">David Peterson <img class="flag" src="/assets/images/flags/de.svg" alt="" title="Germany" data-tippy-placement="top"></a></h4>
                    <span>iOS Expert + Node Dev</span>
                  </div>
  
                  <!-- Rating -->
                  <div class="freelancer-rating">
                    <div class="star-rating" data-rating="5.0"></div>
                  </div>
                </div>
              </div>
              
              <!-- Details -->
              <div class="freelancer-details">
                <div class="freelancer-details-list">
                  <ul>
                    <li>Location <strong><i class="icon-material-outline-location-on"></i> Berlin</strong></li>
                    <li>Rate <strong>$40 / hr</strong></li>
                    <li>Job Success <strong>88%</strong></li>
                  </ul>
                </div>
                <a href="/charity/donor_profile" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
              </div>
            </div>
            <!-- Freelancer / End -->
  
            <!--Freelancer -->
            <div class="freelancer">
  
              <!-- Overview -->
              <div class="freelancer-overview">
                <div class="freelancer-overview-inner">
                  <!-- Bookmark Icon -->
                  <span class="bookmark-icon"></span>
                  
                  <!-- Avatar -->
                  <div class="freelancer-avatar">
                    <a href="/charity/donor_profile"><img src="/assets/images/user-avatar-placeholder.png" alt=""></a>
                  </div>
  
                  <!-- Name -->
                  <div class="freelancer-name">
                    <h4><a href="#">Marcin Kowalski <img class="flag" src="/assets/images/flags/pl.svg" alt="" title="Poland" data-tippy-placement="top"></a></h4>
                    <span>Front-End Developer</span>
                  </div>
  
                  <!-- Rating -->
                  <div class="freelancer-rating">
                    <div class="star-rating" data-rating="4.9"></div>
                  </div>
                </div>
              </div>
              
              <!-- Details -->
              <div class="freelancer-details">
                <div class="freelancer-details-list">
                  <ul>
                    <li>Location <strong><i class="icon-material-outline-location-on"></i> Warsaw</strong></li>
                    <li>Rate <strong>$50 / hr</strong></li>
                    <li>Job Success <strong>100%</strong></li>
                  </ul>
                </div>
                <a href="/charity/donor_profile" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
              </div>
            </div>
            <!-- Freelancer / End -->
  
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
                    <a href="/charity/donor_profile"><img src="/assets/images/user-avatar-big-03.jpg" alt=""></a>
                  </div>
  
                  <!-- Name -->
                  <div class="freelancer-name">
                    <h4><a href="#">Sindy Forest <img class="flag" src="/assets/images/flags/au.svg" alt="" title="Australia" data-tippy-placement="top"></a></h4>
                    <span>Magento Certified Developer</span>
                  </div>
  
                  <!-- Rating -->
                  <div class="freelancer-rating">
                    <div class="star-rating" data-rating="5.0"></div>
                  </div>
                </div>
              </div>
              
              <!-- Details -->
              <div class="freelancer-details">
                <div class="freelancer-details-list">
                  <ul>
                    <li>Location <strong><i class="icon-material-outline-location-on"></i> Brisbane</strong></li>
                    <li>Rate <strong>$70 / hr</strong></li>
                    <li>Job Success <strong>100%</strong></li>
                  </ul>
                </div>
                <a href="/charity/donor_profile" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
              </div>
            </div>
            <!-- Freelancer / End -->
            
            <!--Freelancer -->
            <div class="freelancer">
  
              <!-- Overview -->
              <div class="freelancer-overview">
                  <div class="freelancer-overview-inner">
                  <!-- Bookmark Icon -->
                  <span class="bookmark-icon"></span>
                  
                  <!-- Avatar -->
                  <div class="freelancer-avatar">
                    <a href="/charity/donor_profile"><img src="/assets/images/user-avatar-placeholder.png" alt=""></a>
                  </div>
  
                  <!-- Name -->
                  <div class="freelancer-name">
                    <h4><a href="#">Sebastiano Piccio <img class="flag" src="/assets/images/flags/it.svg" alt="" title="Italy" data-tippy-placement="top"></a></h4>
                    <span>Laravel Dev</span>
                  </div>
  
                  <!-- Rating -->
                  <div class="freelancer-rating">
                    <div class="star-rating" data-rating="4.5"></div>
                  </div>
                </div>
              </div>
              
              <!-- Details -->
              <div class="freelancer-details">
                <div class="freelancer-details-list">
                  <ul>
                    <li>Location <strong><i class="icon-material-outline-location-on"></i> Milan</strong></li>
                    <li>Rate <strong>$80 / hr</strong></li>
                    <li>Job Success <strong>89%</strong></li>
                  </ul>
                </div>
                <a href="/charity/donor_profile" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
              </div>
            </div>
            <!-- Freelancer / End -->
                  
            <!--Freelancer -->
            <div class="freelancer">
  
              <!-- Overview -->
              <div class="freelancer-overview">
                  <div class="freelancer-overview-inner">
                  <!-- Bookmark Icon -->
                  <span class="bookmark-icon"></span>
                  
                  <!-- Avatar -->
                  <div class="freelancer-avatar">
                    <a href="/charity/donor_profile"><img src="/assets/images/user-avatar-placeholder.png" alt=""></a>
                  </div>
  
                  <!-- Name -->
                  <div class="freelancer-name">
                    <h4><a href="#">Gabriel Lagueux <img class="flag" src="/assets/images/flags/fr.svg" alt="" title="France" data-tippy-placement="top"></a></h4>
                    <span>WordPress Expert</span>
                  </div>
  
                  <!-- Rating -->
                  <div class="freelancer-rating">
                    <div class="star-rating" data-rating="5.0"></div>
                  </div>
                </div>
              </div>
              
              <!-- Details -->
              <div class="freelancer-details">
                <div class="freelancer-details-list">
                  <ul>
                    <li>Location <strong><i class="icon-material-outline-location-on"></i> Paris</strong></li>
                    <li>Rate <strong>$50 / hr</strong></li>
                    <li>Job Success <strong>100%</strong></li>
                  </ul>
                </div>
                <a href="/charity/donor_profile" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
              </div>
            </div>
            <!-- Freelancer / End -->
  
  
          </div>
        </div>
  
      </div>
    </div>
  </div>
  <!-- Highest Rated Freelancers / End-->
  
  
  <!-- Membership Plans -->
  <div class="section gray padding-top-60 padding-bottom-75">
    <div class="container">
      <div class="row">
  
        <div class="col-xl-12">
          <!-- Section Headline -->
          <div class="section-headline centered margin-top-0 margin-bottom-35">
            <h3>Membership Plans</h3>
          </div>
        </div>
  
  
        <div class="col-xl-12">
  
          <!-- Billing Cycle  -->
          <div class="billing-cycle-radios margin-bottom-70">
            <div class="radio billed-monthly-radio">
              <input id="radio-5" name="radio-payment-type" type="radio" checked>
              <label for="radio-5"><span class="radio-label"></span> Billed Monthly</label>
            </div>
  
            <div class="radio billed-yearly-radio">
              <input id="radio-6" name="radio-payment-type" type="radio">
              <label for="radio-6"><span class="radio-label"></span> Billed Yearly <span class="small-label">Save 10%</span></label>
            </div>
          </div>
  
          <!-- Pricing Plans Container -->
          <div class="pricing-plans-container">
  
            <!-- Plan -->
            <div class="pricing-plan">
              <h3>Basic Plan</h3>
              <p class="margin-top-10">One time fee for one listing or task highlighted in search results.</p>
              <div class="pricing-plan-label billed-monthly-label"><strong>$19</strong>/ monthly</div>
              <div class="pricing-plan-label billed-yearly-label"><strong>$205</strong>/ yearly</div>
              <div class="pricing-plan-features">
                <strong>Features of Basic Plan</strong>
                <ul>
                  <li>1 Listing</li>
                  <li>30 Days Visibility</li>
                  <li>Highlighted in Search Results</li>
                </ul>
              </div>
              <a href="/charity/checkout" class="button full-width margin-top-20">Buy Now</a>
            </div>
  
            <!-- Plan -->
            <div class="pricing-plan recommended">
              <div class="recommended-badge">Recommended</div>
              <h3>Standard Plan</h3>
              <p class="margin-top-10">One time fee for one listing or task highlighted in search results.</p>
              <div class="pricing-plan-label billed-monthly-label"><strong>$49</strong>/ monthly</div>
              <div class="pricing-plan-label billed-yearly-label"><strong>$529</strong>/ yearly</div>
              <div class="pricing-plan-features">
                <strong>Features of Standard Plan</strong>
                <ul>
                  <li>5 Listings</li>
                  <li>60 Days Visibility</li>
                  <li>Highlighted in Search Results</li>
                </ul>
              </div>
              <a href="/charity/checkout" class="button full-width margin-top-20">Buy Now</a>
            </div>
  
            <!-- Plan -->
            <div class="pricing-plan">
              <h3>Extended Plan</h3>
              <p class="margin-top-10">One time fee for one listing or task highlighted in search results.</p>
              <div class="pricing-plan-label billed-monthly-label"><strong>$99</strong>/ monthly</div>
              <div class="pricing-plan-label billed-yearly-label"><strong>$1069</strong>/ yearly</div>
              <div class="pricing-plan-features">
                <strong>Features of Extended Plan</strong>
                <ul>
                  <li>Unlimited Listings Listing</li>
                  <li>90 Days Visibility</li>
                  <li>Highlighted in Search Results</li>
                </ul>
              </div>
              <a href="/charity/checkout" class="button full-width margin-top-20">Buy Now</a>
            </div>
          </div>
  
        </div>
  
      </div>
    </div>
  </div>
  <!-- Membership Plans / End-->
  
  <!-- Counters -->
  <div class="section padding-top-70 padding-bottom-75">
    <div class="container">
      <div class="row">
  
        <div class="col-xl-12">
          <div class="counters-container">
            
            <!-- Counter -->
            <div class="single-counter">
              <i class="icon-line-awesome-suitcase"></i>
              <div class="counter-inner">
                <h3><span class="counter">1,586</span></h3>
                <span class="counter-title">Projects Posted</span>
              </div>
            </div>
  
            <!-- Counter -->
            <div class="single-counter">
              <i class="icon-line-awesome-legal"></i>
              <div class="counter-inner">
                <h3><span class="counter">3,543</span></h3>
                <span class="counter-title">Campaigns Posted</span>
              </div>
            </div>
  
            <!-- Counter -->
            <div class="single-counter">
              <i class="icon-line-awesome-user"></i>
              <div class="counter-inner">
                <h3><span class="counter">2,413</span></h3>
                <span class="counter-title">Active Members</span>
              </div>
            </div>
  
            <!-- Counter -->
            <div class="single-counter">
              <i class="icon-line-awesome-trophy"></i>
              <div class="counter-inner">
                <h3><span class="counter">99</span>%</h3>
                <span class="counter-title">Satisfaction Rate</span>
              </div>
            </div>
  
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Counters / End -->
  
  @include('includes.charity_footer')
  
  </div>
  <!-- Wrapper / End -->
  

@endsection
@push('scripts')
@include('includes.immediate_available_btn')
@endpush