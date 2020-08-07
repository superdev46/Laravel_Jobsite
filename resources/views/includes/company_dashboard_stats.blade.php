<ul class="row profilestat">
  <li class="col-md-2 col-sm-4 col-xs-6">
    <div class="inbox"> <i class="fa fa-clock-o" aria-hidden="true"></i>
      {{-- <h6><a href="{{route('posted.jobs')}}">{{Auth::guard('charity')->user()->countOpenJobs()}}</a></h6> --}}
      <strong>{{__('Open Jobs')}}</strong> </div>
  </li>
  <li class="col-md-2 col-sm-4 col-xs-6">
    <div class="inbox"> <i class="fa fa-user-o" aria-hidden="true"></i>
      <h6><a href="{{route('charity.followers')}}">{{Auth::guard('charity')->user()->countFollowers()}}</a></h6>
      <strong>{{__('Followers')}}</strong> </div>
  </li>
  <li class="col-md-2 col-sm-4 col-xs-6">
    <div class="inbox"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
      {{-- <h6><a href="{{route('charity.messages')}}">{{Auth::guard('charity')->user()->countCompanyMessages()}}</a></h6> --}}
      <strong>{{__('Messages')}}</strong> </div>
  </li>
</ul>