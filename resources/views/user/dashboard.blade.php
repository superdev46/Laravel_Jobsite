@extends('layouts.template')

@section('content') 

<!-- Wrapper -->
<div id="wrapper">

  @include('includes.donor_header')
  
  <!-- Dashboard Container -->
  <div class="dashboard-container">
  
    @include('includes.donor_dashboard_menu')
  
  
    <!-- Dashboard Content
    ================================================== -->
    <div class="dashboard-content-container" data-simplebar>
      <div class="dashboard-content-inner" >
        
        <!-- Dashboard Headline -->
        <div class="dashboard-headline">
          <div class="row">
            <div class="col-xl-12">
            <a class="button ripple-effect big margin-top-30" href="{{route('post.project')}}"><i class="icon-feather-plus"></i>Post a Project</a>
            </div>
            
          </div>
        </div>
  
        
  
    
        <!-- Fun Facts Container -->
        <div class="fun-facts-container">
          <div class="fun-fact" data-fun-fact-color="#36bd78">
            <div class="fun-fact-text">
              <h4>22</h4>
              <span>Projects</span>
              <span>Completed</span>
              
            </div>
            <div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
          </div>
          <div class="fun-fact" data-fun-fact-color="#b81b7f">
            <div class="fun-fact-text">
              <h4>124</h4>
              <span>Hours Billed</span>
            </div>
            <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
          </div>
          <div class="fun-fact" data-fun-fact-color="#efa80f">
            <div class="fun-fact-text">
              <h4>28,435</h4>
              <span>USD Earned</span>
              
            </div>
            <div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
          </div>
  
          <!-- Last one has to be hidden below 1600px, sorry :( -->
          <div class="fun-fact" data-fun-fact-color="#2a41e6">
            <div class="fun-fact-text">
              <span>This Month Views</span>
              <h4>987</h4>
            </div>
            <div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
          </div>
        </div>
        
        <!-- Row -->
        <div class="row">
  
          <div class="col-xl-8">
            <!-- Dashboard Box -->
            <div class="dashboard-box main-box-in-row">
              <div class="headline">
                <h3><i class="icon-feather-bar-chart-2"></i> Your Profile Views</h3>
                <div class="sort-by">
                  <select class="selectpicker hide-tick">
                    <option>Last 6 Months</option>
                    <option>This Year</option>
                    <option>This Month</option>
                  </select>
                </div>
              </div>
              <div class="content">
                <!-- Chart -->
                <div class="chart">
                  <canvas id="chart" width="100" height="45"></canvas>
                </div>
              </div>
            </div>
            <!-- Dashboard Box / End -->
          </div>
          <div class="col-xl-4">
  
            <!-- Dashboard Box -->
            <!-- If you want adjust height of two boxes 
               add to the lower box 'main-box-in-row' 
               and 'child-box-in-row' to the higher box -->
            <div class="dashboard-box child-box-in-row"> 
              <div class="headline">
                <h3><i class="icon-material-outline-note-add"></i> Notes</h3>
              </div>	
  
              <div class="content with-padding">
                <!-- Note -->
                <div class="dashboard-note">
                  <p>Meeting with candidate at 3pm who applied for Bilingual Event Support Specialist</p>
                  <div class="note-footer">
                    <span class="note-priority high">High Priority</span>
                    <div class="note-buttons">
                      <a href="#" title="Edit" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
                      <a href="#" title="Remove" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
                    </div>
                  </div>
                </div>
                <!-- Note -->
                <div class="dashboard-note">
                  <p>Extend premium plan for next month</p>
                  <div class="note-footer">
                    <span class="note-priority low">Low Priority</span>
                    <div class="note-buttons">
                      <a href="#" title="Edit" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
                      <a href="#" title="Remove" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
                    </div>
                  </div>
                </div>
                <!-- Note -->
                <div class="dashboard-note">
                  <p>Send payment to David Peterson</p>
                  <div class="note-footer">
                    <span class="note-priority medium">Medium Priority</span>
                    <div class="note-buttons">
                      <a href="#" title="Edit" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
                      <a href="#" title="Remove" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
                    </div>
                  </div>
                </div>
              </div>
                <div class="add-note-button">
                  <a href="#small-dialog" class="popup-with-zoom-anim button full-width button-sliding-icon">Add Note <i class="icon-material-outline-arrow-right-alt"></i></a>
                </div>
            </div>
            <!-- Dashboard Box / End -->
          </div>
        </div>
        <!-- Row / End -->
  
        <!-- Row -->
        <div class="row">
  
          <!-- Dashboard Box -->
          <div class="col-xl-6">
            <div class="dashboard-box">
              <div class="headline">
                <h3><i class="icon-material-baseline-notifications-none"></i> Notifications</h3>
                <button class="mark-as-read ripple-effect-dark" data-tippy-placement="left" title="Mark all as read">
                    <i class="icon-feather-check-square"></i>
                </button>
              </div>
              <div class="content">
                <ul class="dashboard-box-list">
                  <li>
                    <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                    <span class="notification-text">
                      <strong>Michael Shannah</strong> applied for a job <a href="#">Full Stack Software Engineer</a>
                    </span>
                    <!-- Buttons -->
                    <div class="buttons-to-right">
                      <a href="#" class="button ripple-effect ico" title="Mark as read" data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                    </div>
                  </li>
                  <li>
                    <span class="notification-icon"><i class=" icon-material-outline-gavel"></i></span>
                    <span class="notification-text">
                      <strong>Gilber Allanis</strong> placed a bid on your <a href="#">iOS App Development</a> project
                    </span>
                    <!-- Buttons -->
                    <div class="buttons-to-right">
                      <a href="#" class="button ripple-effect ico" title="Mark as read" data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                    </div>
                  </li>
                  <li>
                    <span class="notification-icon"><i class="icon-material-outline-autorenew"></i></span>
                    <span class="notification-text">
                      Your job listing <a href="#">Full Stack Software Engineer</a> is expiring
                    </span>
                    <!-- Buttons -->
                    <div class="buttons-to-right">
                      <a href="#" class="button ripple-effect ico" title="Mark as read" data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                    </div>
                  </li>
                  <li>
                    <span class="notification-icon"><i class="icon-material-outline-group"></i></span>
                    <span class="notification-text">
                      <strong>Sindy Forrest</strong> applied for a job <a href="#">Full Stack Software Engineer</a>
                    </span>
                    <!-- Buttons -->
                    <div class="buttons-to-right">
                      <a href="#" class="button ripple-effect ico" title="Mark as read" data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                    </div>
                  </li>
                  <li>
                    <span class="notification-icon"><i class="icon-material-outline-rate-review"></i></span>
                    <span class="notification-text">
                      <strong>David Peterson</strong> left you a <span class="star-rating no-stars" data-rating="5.0"></span> rating after finishing <a href="#">Logo Design</a> task
                    </span>
                    <!-- Buttons -->
                    <div class="buttons-to-right">
                      <a href="#" class="button ripple-effect ico" title="Mark as read" data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
  
          <!-- Dashboard Box -->
          <div class="col-xl-6">
            <div class="dashboard-box">
              <div class="headline">
                <h3><i class="icon-material-outline-assignment"></i> Orders</h3>
              </div>
              <div class="content">
                <ul class="dashboard-box-list">
                  <li>
                    <div class="invoice-list-item">
                    <strong>Professional Plan</strong>
                      <ul>
                        <li><span class="unpaid">Unpaid</span></li>
                        <li>Order: #326</li>
                        <li>Date: 12/08/2018</li>
                      </ul>
                    </div>
                    <!-- Buttons -->
                    <div class="buttons-to-right">
                      <a href="pages-checkout-page.php" class="button">Finish Payment</a>
                    </div>
                  </li>
                  <li>
                    <div class="invoice-list-item">
                    <strong>Professional Plan</strong>
                      <ul>
                        <li><span class="paid">Paid</span></li>
                        <li>Order: #264</li>
                        <li>Date: 10/07/2018</li>
                      </ul>
                    </div>
                    <!-- Buttons -->
                    <div class="buttons-to-right">
                      <a href="pages-invoice-template.php" class="button gray">View Invoice</a>
                    </div>
                  </li>
                  <li>
                    <div class="invoice-list-item">
                    <strong>Professional Plan</strong>
                      <ul>
                        <li><span class="paid">Paid</span></li>
                        <li>Order: #211</li>
                        <li>Date: 12/06/2018</li>
                      </ul>
                    </div>
                    <!-- Buttons -->
                    <div class="buttons-to-right">
                      <a href="pages-invoice-template.php" class="button gray">View Invoice</a>
                    </div>
                  </li>
                  <li>
                    <div class="invoice-list-item">
                    <strong>Professional Plan</strong>
                      <ul>
                        <li><span class="paid">Paid</span></li>
                        <li>Order: #179</li>
                        <li>Date: 06/05/2018</li>
                      </ul>
                    </div>
                    <!-- Buttons -->
                    <div class="buttons-to-right">
                      <a href="pages-invoice-template.php" class="button gray">View Invoice</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
  
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
  
  
  <!-- Apply for a job popup
  ================================================== -->
  <div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
  
    <!--Tabs -->
    <div class="sign-in-form">
  
      <ul class="popup-tabs-nav">
        <li><a href="#tab">Add Note</a></li>
      </ul>
  
      <div class="popup-tabs-container">
  
        <!-- Tab -->
        <div class="popup-tab-content" id="tab">
          
          <!-- Welcome Text -->
          <div class="welcome-text">
            <h3>Do Not Forget 😎</h3>
          </div>
            
          <!-- Form -->
          <form method="post" id="add-note">
  
            <select class="selectpicker with-border default margin-bottom-20" data-size="7" title="Priority">
              <option>Low Priority</option>
              <option>Medium Priority</option>
              <option>High Priority</option>
            </select>
  
            <textarea name="textarea" cols="10" placeholder="Note" class="with-border"></textarea>
  
          </form>
          
          <!-- Button -->
          <button class="button full-width button-sliding-icon ripple-effect" type="submit" form="add-note">Add Note <i class="icon-material-outline-arrow-right-alt"></i></button>
  
        </div>
  
      </div>
    </div>
  </div>
  <!-- Apply for a job popup / End -->

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