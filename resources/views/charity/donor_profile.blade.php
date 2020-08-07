@extends('layouts.template')

@section('content') 

<!-- Wrapper -->
<div id="wrapper">

  @include('includes.charity_header')
  
  <!-- Titlebar
  ================================================== -->
  <div class="single-page-header freelancer-header" data-background-image="/assets/images/single-freelancer.jpg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="single-page-header-inner">
            <div class="left-side">
              <div class="header-image freelancer-avatar">
                {{$donor->printUserImage()}}
              </div>
              <div class="header-details">
                <h3>{{ $donor->name }} <span>{{$donor->getIndustry('industry')}}</span></h3>
                <ul>
                  <li>
                    {{-- <img class="flag" src="/assets/images/flags/gb.svg" alt="">  --}}
                    {{$donor->getLocation()}}
                  </li>
                </ul>
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
        
        <!-- Page Content -->
        <div class="single-page-section">
          <h3 class="margin-bottom-25">About Me</h3>
        <p>{{$donor->short_description}}</p>
  
        <p>{{$donor->description}}</p>
        </div>
  
        <!-- Boxed List -->
        <div class="boxed-list margin-bottom-60">
          <div class="boxed-list-headline">
            <h3><i class="icon-material-outline-thumb-up"></i> Work History and Feedback</h3>
          </div>
          <ul class="boxed-list-ul">
            <li>
              <div class="boxed-list-item">
                <!-- Content -->
                <div class="item-content">
                  <h4>Web, Database and API Developer <span>Rated as Freelancer</span></h4>
                  <div class="item-details margin-top-10">
                    <div class="star-rating" data-rating="5.0"></div>
                    <div class="detail-item"><i class="icon-material-outline-date-range"></i> August 2018</div>
                  </div>
                  <div class="item-description">
                    <p>Excellent programmer - fully carried out my project in a very professional manner. </p>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="boxed-list-item">
                <!-- Content -->
                <div class="item-content">
                  <h4>WordPress Theme Installation <span>Rated as Freelancer</span></h4>
                  <div class="item-details margin-top-10">
                    <div class="star-rating" data-rating="5.0"></div>
                    <div class="detail-item"><i class="icon-material-outline-date-range"></i> June 2018</div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="boxed-list-item">
                <!-- Content -->
                <div class="item-content">
                  <h4>Fix Python Selenium Code <span>Rated as Employer</span></h4>
                  <div class="item-details margin-top-10">
                    <div class="star-rating" data-rating="5.0"></div>
                    <div class="detail-item"><i class="icon-material-outline-date-range"></i> May 2018</div>
                  </div>
                  <div class="item-description">
                    <p>I was extremely impressed with the quality of work AND how quickly he got it done. He then offered to help with another side part of the project that we didn't even think about originally.</p>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="boxed-list-item">
                <!-- Content -->
                <div class="item-content">
                  <h4>PHP Core Website Fixes <span>Rated as Freelancer</span></h4>
                  <div class="item-details margin-top-10">
                    <div class="star-rating" data-rating="5.0"></div>
                    <div class="detail-item"><i class="icon-material-outline-date-range"></i> May 2018</div>
                  </div>
                  <div class="item-description">
                    <p>Awesome work, definitely will rehire. Poject was completed not only with the requirements, but on time, within our small budget.</p>
                  </div>
                </div>
              </div>
            </li>
          </ul>
  
          <!-- Pagination -->
          <div class="clearfix"></div>
          <div class="pagination-container margin-top-40 margin-bottom-10">
            <nav class="pagination">
              <ul>
                <li><a href="#" class="ripple-effect current-page">1</a></li>
                <li><a href="#" class="ripple-effect">2</a></li>
                <li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>
              </ul>
            </nav>
          </div>
          <div class="clearfix"></div>
          <!-- Pagination / End -->
  
        </div>
        <!-- Boxed List / End -->
        
        <!-- Boxed List -->
        <div class="boxed-list margin-bottom-60">
          <div class="boxed-list-headline">
            <h3><i class="icon-material-outline-business"></i> Employment History</h3>
          </div>
          <ul class="boxed-list-ul">
            <li>
              <div class="boxed-list-item">
                <!-- Avatar -->
                <div class="item-image">
                  <img src="/assets/images/browse-companies-03.png" alt="">
                </div>
                
                <!-- Content -->
                <div class="item-content">
                  <h4>Development Team Leader</h4>
                  <div class="item-details margin-top-7">
                    <div class="detail-item"><a href="#"><i class="icon-material-outline-business"></i> Acodia</a></div>
                    <div class="detail-item"><i class="icon-material-outline-date-range"></i> May 2018 - Present</div>
                  </div>
                  <div class="item-description">
                    <p>Focus the team on the tasks at hand or the internal and external customer requirements.</p>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="boxed-list-item">
                <!-- Avatar -->
                <div class="item-image">
                  <img src="/assets/images/browse-companies-04.png" alt="">
                </div>
                
                <!-- Content -->
                <div class="item-content">
                  <h4><a href="#">Lead UX/UI Designer</a></h4>
                  <div class="item-details margin-top-7">
                    <div class="detail-item"><a href="#"><i class="icon-material-outline-business"></i> Acorta</a></div>
                    <div class="detail-item"><i class="icon-material-outline-date-range"></i> April 2014 - May 2018</div>
                  </div>
                  <div class="item-description">
                    <p>I designed and implemented 10+ custom web-based CRMs, workflow systems, payment solutions and mobile apps.</p>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <!-- Boxed List / End -->
  
      </div>
      
  
      <!-- Sidebar -->
      <div class="col-xl-4 col-lg-4">
        <div class="sidebar-container">
          
          <!-- Profile Overview -->
          <div class="profile-overview">
            <div class="overview-item"><strong>$35</strong><span>Hourly Rate</span></div>
            <div class="overview-item"><strong>53</strong><span>Jobs Done</span></div>
            <div class="overview-item"><strong>22</strong><span>Rehired</span></div>
          </div>

          <!-- Freelancer Indicators -->
          <div class="sidebar-widget">
            <div class="freelancer-indicators">
  
              <!-- Indicator -->
              <div class="indicator">
                <strong>88%</strong>
                <div class="indicator-bar" data-indicator-percentage="88"><span></span></div>
                <span>Job Success</span>
              </div>
  
              <!-- Indicator -->
              <div class="indicator">
                <strong>100%</strong>
                <div class="indicator-bar" data-indicator-percentage="100"><span></span></div>
                <span>Recommendation</span>
              </div>
              
              <!-- Indicator -->
              <div class="indicator">
                <strong>90%</strong>
                <div class="indicator-bar" data-indicator-percentage="90"><span></span></div>
                <span>On Time</span>
              </div>	
                        
              <!-- Indicator -->
              <div class="indicator">
                <strong>80%</strong>
                <div class="indicator-bar" data-indicator-percentage="80"><span></span></div>
                <span>On Budget</span>
              </div>
            </div>
          </div>

          <!-- Widget -->
          <div class="sidebar-widget">
            <h3>Attachments</h3>
            <div class="attachments-container">
              <a href="#" class="attachment-box ripple-effect"><span>Cover Letter</span><i>PDF</i></a>
              <a href="#" class="attachment-box ripple-effect"><span>Contract</span><i>DOCX</i></a>
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
  
  @include('includes.footer')
  
  </div>
  <!-- Wrapper / End -->
  
  
  <!-- Leave a Review Popup
  ================================================== -->
  <div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
  
    <!--Tabs -->
    <div class="sign-in-form">
  
      <ul class="popup-tabs-nav">
        <li><a href="#tab">Leave a Review</a></li>
      </ul>
  
      <div class="popup-tabs-container">
  
        <!-- Tab -->
        <div class="popup-tab-content" id="tab">
          
          <!-- Welcome Text -->
          <div class="welcome-text">
            <h3>What is it like to work at Acodia?</h3>
            
          <!-- Form -->
          <form method="post" id="leave-company-review-form">
  
            <!-- Leave Rating -->
            <div class="clearfix"></div>
            <div class="leave-rating-container">
              <div class="leave-rating margin-bottom-5">
                <input type="radio" name="rating" id="rating-1" value="1" required>
                <label for="rating-1" class="icon-material-outline-star"></label>
                <input type="radio" name="rating" id="rating-2" value="2" required>
                <label for="rating-2" class="icon-material-outline-star"></label>
                <input type="radio" name="rating" id="rating-3" value="3" required>
                <label for="rating-3" class="icon-material-outline-star"></label>
                <input type="radio" name="rating" id="rating-4" value="4" required>
                <label for="rating-4" class="icon-material-outline-star"></label>
                <input type="radio" name="rating" id="rating-5" value="5" required>
                <label for="rating-5" class="icon-material-outline-star"></label>
              </div>
            </div>
            <div class="clearfix"></div>
            <!-- Leave Rating / End-->
  
          </div>
  
  
            <div class="row">
              <div class="col-xl-12">
                <div class="input-with-icon-left" title="Leave blank to add review anonymously" data-tippy-placement="bottom">
                  <i class="icon-material-outline-account-circle"></i>
                  <input type="text" class="input-text with-border" name="name" id="name" placeholder="First and Last Name"/>
                </div>
              </div>
  
              <div class="col-xl-12">
                <div class="input-with-icon-left">
                  <i class="icon-material-outline-rate-review"></i>
                  <input type="text" class="input-text with-border" name="reviewtitle" id="reviewtitle" placeholder="Review Title"  required/>
                </div>
              </div>
            </div>
  
            <textarea class="with-border" placeholder="Review" name="message" id="message" cols="7"  required></textarea>
  
          </form>
          
          <!-- Button -->
          <button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit" form="leave-company-review-form">Leave a Review <i class="icon-material-outline-arrow-right-alt"></i></button>
  
        </div>
  
      </div>
    </div>
  </div>
  <!-- Leave a Review Popup / End -->


@endsection
@push('styles')
<style type="text/css">
.formrow iframe {
	height: 78px;
}
</style>
@endpush
@push('scripts') 
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '#send_applicant_message', function () {
            var postData = $('#send-applicant-message-form').serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('contact.applicant.message.send') }}",
                data: postData,
                //dataType: 'json',
                success: function (data)
                {
                    response = JSON.parse(data);
                    var res = response.success;
                    if (res == 'success')
                    {
                        var errorString = '<div role="alert" class="alert alert-success">' + response.message + '</div>';
                        $('#alert_messages').html(errorString);
                        $('#send-applicant-message-form').hide('slow');
                        $(document).scrollTo('.alert', 2000);
                    } else
                    {
                        var errorString = '<div class="alert alert-danger" role="alert"><ul>';
                        response = JSON.parse(data);
                        $.each(response, function (index, value)
                        {
                            errorString += '<li>' + value + '</li>';
                        });
                        errorString += '</ul></div>';
                        $('#alert_messages').html(errorString);
                        $(document).scrollTo('.alert', 2000);
                    }
                },
            });
        });
		
		showEducation();
		showProjects();
		showExperience();
		showSkills();
		showLanguages();
		
    });
	
function showProjects()
{
	$.post("{{ route('show.applicant.profile.projects', $donor->id) }}", {user_id: {{$donor->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
	.done(function (response) {
	$('#projects_div').html(response);
	});		
}

function showExperience()
{
	$.post("{{ route('show.applicant.profile.experience', $donor->id) }}", {user_id: {{$donor->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
	.done(function (response) {
	$('#experience_div').html(response);
	});		
}

function showEducation()
{
	$.post("{{ route('show.applicant.profile.education', $donor->id) }}", {user_id: {{$donor->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
	.done(function (response) {
	$('#education_div').html(response);
	});		
}
function showLanguages()
{
	$.post("{{ route('show.applicant.profile.languages', $donor->id) }}", {user_id: {{$donor->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
	.done(function (response) {
	$('#language_div').html(response);
	});		
}
function showSkills()
{
	$.post("{{ route('show.applicant.profile.skills', $donor->id) }}", {user_id: {{$donor->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
	.done(function (response) {
	$('#skill_div').html(response);
	});		
}
</script> 
@endpush