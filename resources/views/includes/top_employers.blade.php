<div class="section greybg">
  <div class="container"> 
    <!-- title start -->
    <div class="titleTop">
      <div class="subtitle">{{__('Here You Can See')}}</div>
      <h3>{{__('Top')}} <span>{{__('Employers')}}</span></h3>
    </div>
    <!-- title end -->
    
    <ul class="employerList">
      <!--employer-->
      @if(isset($topCompanyIds) && count($topCompanyIds))
      @foreach($topCompanyIds as $company_id_num_jobs)
      <?php
      $company = App\Charity::where('id','=',$company_id_num_jobs->charity_id)->active()->first();
	  if(null !== $company){
	  ?>
      <li data-toggle="tooltip" data-placement="top" title="{{$company->name}}" data-original-title="{{$company->name}}"><a href="{{route('charity.detail', $company->slug)}}" title="{{$company->name}}">{{$company->printCharityImage()}}</a></li>
      <?php
	  }
	  ?>
      @endforeach
      @endif
    </ul>
    
  </div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">{!! $siteSetting->index_page_below_top_employes_ad !!}</div>
    <div class="col-md-3"></div>
</div>
</div>