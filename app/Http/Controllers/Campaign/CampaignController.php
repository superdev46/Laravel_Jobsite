<?php

namespace App\Http\Controllers\Campaign;

use Auth;
use DB;
use Input;
use Redirect;
use Carbon\Carbon;
use App\Campaign;
use App\CampaignApply;
use App\FavouriteJob;
use App\Charity;
use App\JobSkill;
use App\JobSkillManager;
use App\Country;
use App\CountryDetail;
use App\State;
use App\City;
use App\CareerLevel;
use App\FunctionalArea;
use App\JobType;
use App\JobShift;
use App\Gender;
use App\JobExperience;
use App\DegreeLevel;
use App\ProfileCv;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;
use App\Http\Requests\JobFormRequest;
use App\Http\Requests\Front\ApplyCampaignFormRequest;
use App\Http\Controllers\Controller;
use App\Traits\FetchCampaigns;
use App\Events\CampaignApplied;
use App\User;

class CampaignController extends Controller
{
	//use Skills;
	use FetchCampaigns;
	
	private $functionalAreas = '';
    private $countries = '';
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		$this->middleware('auth', ['except' => ['jobsBySearch', 'jobDetail']]);
		
        $this->functionalAreas = DataArrayHelper::langFunctionalAreasArray();
        $this->countries = DataArrayHelper::langCountriesArray();
    }
	
    public function campaignsBySearch(Request $request)
    {

        $search = $request->query('search', '');
		$job_titles = $request->query('job_title', array());
		$company_ids = $request->query('company_id', array());
		$industry_ids = $request->query('industry_id', array());
		$job_skill_ids = $request->query('job_skill_id', array());
		$functional_area_ids = $request->query('functional_area_id', array());
		$country_ids = $request->query('country_id', array());
		$state_ids = $request->query('state_id', array());
		$city_ids = $request->query('city_id', array());
		$is_freelance = $request->query('is_freelance', array());
		$career_level_ids = $request->query('career_level_id', array());
		$job_type_ids = $request->query('job_type_id', array());
		$job_shift_ids = $request->query('job_shift_id', array());
		$gender_ids = $request->query('gender_id', array());
		$degree_level_ids = $request->query('degree_level_id', array());
		$job_experience_ids = $request->query('job_experience_id', array());
        $salary_from = $request->query('salary_from', '');
        $salary_to = $request->query('salary_to', '');
		$salary_currency = $request->query('salary_currency', '');
        $is_featured = $request->query('is_featured', 2);
        $order_by = $request->query('order_by', 'id');
		$limit = 10;

        $campaigns = $this->fetchCampaigns($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, $order_by, $limit);

		/*****************************************************/
		
		$jobTitlesArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'campaigns.title');
		
		/****************************************************/
		
		$jobIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'campaigns.id');
		
		/*****************************************************/
		
		$skillIdsArray = $this->fetchSkillIdsArray($jobIdsArray);
		
		/*****************************************************/
		
		$countryIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'campaigns.country_id');
		
		/*****************************************************/
		
		$stateIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'campaigns.state_id');
		
		/*****************************************************/
		
		$cityIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'campaigns.city_id');
		
		/*****************************************************/
		
		$companyIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'campaigns.charity_id');
		
		/*****************************************************/
		
		$industryIdsArray = $this->fetchIndustryIdsArray($companyIdsArray);
		
		/*****************************************************/
		
		
		/*****************************************************/
		
		$functionalAreaIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'campaigns.functional_area_id');
		
		/*****************************************************/
		
		$careerLevelIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'campaigns.career_level_id');
		
		/*****************************************************/
		
		$jobTypeIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'campaigns.job_type_id');
		
		/*****************************************************/
		
		$jobShiftIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'campaigns.job_shift_id');
		
		/*****************************************************/
		
		$genderIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'campaigns.gender_id');
		
		/*****************************************************/
		
		$degreeLevelIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'campaigns.degree_level_id');
		
		/*****************************************************/
		
		$jobExperienceIdsArray = $this->fetchIdsArray($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, 'campaigns.job_experience_id');
		
		/*****************************************************/
		
		$seoArray = $this->getSEO($functional_area_ids, $country_ids, $state_ids, $city_ids, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids);
		
		/*****************************************************/
        
		$currencies = DataArrayHelper::currenciesArray();
		
		/*****************************************************/
		
		$seo = (object) array(
                    'seo_title' => $seoArray['description'],
                    'seo_description' => $seoArray['description'],
                    'seo_keywords' => $seoArray['keywords'],
                    'seo_other' => ''
        );
        return view('campaign.list')
                        ->with('functionalAreas', $this->functionalAreas)
                        ->with('countries', $this->countries)
                        ->with('currencies', array_unique($currencies))
						->with('campaigns', $campaigns)
						->with('jobTitlesArray',$jobTitlesArray)
						->with('skillIdsArray',$skillIdsArray)						
						->with('countryIdsArray', $countryIdsArray)
						->with('stateIdsArray', $stateIdsArray)
						->with('cityIdsArray', $cityIdsArray)						
						->with('companyIdsArray', $companyIdsArray)
						->with('industryIdsArray', $industryIdsArray)
						->with('functionalAreaIdsArray',$functionalAreaIdsArray)
						->with('careerLevelIdsArray',$careerLevelIdsArray)
						->with('jobTypeIdsArray',$jobTypeIdsArray)
						->with('jobShiftIdsArray',$jobShiftIdsArray)
						->with('genderIdsArray',$genderIdsArray)
						->with('degreeLevelIdsArray',$degreeLevelIdsArray)
						->with('jobExperienceIdsArray',$jobExperienceIdsArray)
                        ->with('seo', $seo);
    }
	
	public function campaignDetail(Request $request, $campaign_slug)
	{		
    
	        $campaign = Campaign::where('slug', 'like', $campaign_slug)->firstOrFail();        	
			/*****************************************************/
			$search = '';
			$job_titles = array();
			$company_ids = array();
			$industry_ids = array();
			$job_skill_ids = (array)$campaign->getJobSkillsArray();
			$functional_area_ids = (array)$campaign->getFunctionalArea('functional_area_id');
			$country_ids = (array)$campaign->getCountry('country_id');
			$state_ids = (array)$campaign->getState('state_id');
			$city_ids = (array)$campaign->getCity('city_id');
			$is_freelance = $campaign->is_freelance;
			$career_level_ids = (array)$campaign->getCareerLevel('career_level_id');
			$job_type_ids = (array)$campaign->getJobType('job_type_id');
			$job_shift_ids = (array)$campaign->getJobShift('job_shift_id');
			$gender_ids = (array)$campaign->getGender('gender_id');
			$degree_level_ids = (array)$campaign->getDegreeLevel('degree_level_id');
			$job_experience_ids = (array)$campaign->getJobExperience('job_experience_id');
			$salary_from = 0;
			$salary_to = 0;
			$salary_currency = '';
			$is_featured = 2;
			$order_by = 'id';
			$limit = 5;

			$applies_ids = (array)$campaign->getAppliedIdsArray();
			$applied_users = array();
			foreach($applies_ids as $apply_id)
			{
				$apply = CampaignApply::findOrFail($apply_id);
				$user_id = $apply->user_id;
				$applied_user = User::findOrFail($user_id);
				$applied_user->current_salary = $apply->current_salary;
				$applied_user->time = $apply->updated_at;
				array_push($applied_users, $applied_user);
			}
	
			$relatedCampaigns = $this->fetchCampaigns($search, $job_titles, $company_ids, $industry_ids, $job_skill_ids, $functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured, $order_by, $limit);
			/********************************************/
		
			$seoArray = $this->getSEO((array)$campaign->functional_area_id, (array)$campaign->country_id, (array)$campaign->state_id, (array)$campaign->city_id, (array)$campaign->career_level_id, (array)$campaign->job_type_id, (array)$campaign->job_shift_id, (array)$campaign->gender_id, (array)$campaign->degree_level_id, (array)$campaign->job_experience_id);
			/*****************************************************/
			$seo = (object) array(
						'seo_title' => $seoArray['description'],
						'seo_description' => $seoArray['description'],
						'seo_keywords' => $seoArray['keywords'],
						'seo_other' => ''
			);
			return view('campaign.detail')
                        ->with('campaign', $campaign)
						->with('relatedCampaigns', $relatedCampaigns)
						->with('applied_users', $applied_users)
						->with('seo', $seo);
    
	}
	
	/*     * ************************************************** */

    public function addToFavouriteJob(Request $request, $job_slug)
    {
		$data['job_slug'] = $job_slug;
        $data['user_id'] = Auth::user()->id;
        $data_save = FavouriteJob::create($data);
		flash(__('Job has been added in favorites list'))->success();
        return \Redirect::route('job.detail', $job_slug);
    }

    public function removeFromFavouriteJob(Request $request, $job_slug)
    {	
		$user_id = Auth::user()->id;
        FavouriteJob::where('job_slug', 'like', $job_slug)->where('user_id', $user_id)->delete();
		
		flash(__('Job has been removed from favorites list'))->success();
        return \Redirect::route('job.detail', $job_slug);
    }
	
	public function applyJob(Request $request, $job_slug)
    {
		$user = Auth::user();
		$job = Campaign::where('slug', 'like', $job_slug)->first();	

		if((bool)config('jobseeker.is_jobseeker_package_active')){
			if(
				($user->jobs_quota <= $user->availed_jobs_quota) ||
				($user->package_end_date->lt(Carbon::now()))
				)
			{
				flash(__('Please subscribe to package first'))->error();
				return \Redirect::route('home');
				exit;
			}
		}

        if($user->isAppliedOnJob($job->id))
		{
			flash(__('You have already applied for this job'))->success();
			return \Redirect::route('job.detail', $job_slug);
			exit;
		}
		
		$myCvs = ProfileCv::where('user_id', '=', $user->id)->pluck('title', 'id')->toArray();
		
		return view('job.apply_job_form')
		->with('job_slug', $job_slug)
		->with('job', $job)
		->with('myCvs', $myCvs);		
    }
	
	public function postApplyCampaign(ApplyCampaignFormRequest $request, $campaign_slug)
    {
        $user = Auth::user();
		$user_id = $user->id;
		$campaign = Campaign::where('slug', 'like', $campaign_slug)->first();	
		$campaignApply = new CampaignApply();
		$campaignApply->user_id = $user_id;
		$campaignApply->campaign_id = $campaign->id;
		$campaignApply->description = $request->post('description');
		$campaignApply->current_salary = $request->post('current_salary');
		$campaignApply->save();
		
		// /**********************************/
		// if((bool)config('jobseeker.is_jobseeker_package_active')){
		// 	$user->availed_jobs_quota = $user->availed_jobs_quota + 1;
		// 	$user->update();
		// }
		// /**********************************/
		event(new CampaignApplied($campaign, $campaignApply));
		
		flash(__('You have successfully applied for this campaign'))->success();
        return \Redirect::route('campaign.detail', $campaign_slug);		
    }
	
	public function myJobApplications(Request $request)
    {
		$myAppliedJobIds = Auth::user()->getAppliedJobIdsArray();
		$jobs = Campaign::whereIn('id', $myAppliedJobIds)->paginate(10);
		return view('job.my_applied_jobs')
				->with('jobs', $jobs);
    }
	
	public function myFavouriteJobs(Request $request)
    {
		$myFavouriteJobSlugs = Auth::user()->getFavouriteJobSlugsArray();
		$jobs = Campaign::whereIn('slug', $myFavouriteJobSlugs)->paginate(10);
		return view('job.my_favourite_jobs')
				->with('jobs', $jobs);
    }

}
