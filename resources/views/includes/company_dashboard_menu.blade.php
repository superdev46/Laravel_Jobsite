<div class="col-md-3 col-sm-4">
        <ul class="usernavdash">
          <li class="active"><a href="{{route('charity.home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a></li>
          <li><a href="{{ route('charity.profile') }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Company Profile')}}</a></li>
          <li><a href="{{ route('charity.detail', Auth::guard('charity')->user()->slug) }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Company Public Profile')}}</a></li>
          <li><a href="{{ route('post.campaign') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Post Job')}}</a></li>
          <li><a href="{{ route('posted.jobs') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Company Jobs')}}</a></li>
          
          <li><a href="{{route('charity.messages')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('Company Messages')}}</a></li>
          <li><a href="{{route('charity.followers')}}"><i class="fa fa-user-o" aria-hidden="true"></i> {{__('Company Followers')}}</a></li>
          <li><a href="{{ route('charity.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a>
          <form id="logout-form" action="{{ route('charity.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
          </li>
        </ul>
        <div class="row">
      <div class="col-md-12">{!! $siteSetting->dashboard_page_ad !!}</div>
      </div>
      </div>