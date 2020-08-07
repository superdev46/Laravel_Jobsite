<?php

namespace App\Traits;

use Auth;
use DB;
use Input;
use Redirect;
use Carbon\Carbon;
use App\Campaign;
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
use App\SalaryPeriod;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\JobFormRequest;
use App\Http\Requests\Front\CampaignFrontFormRequest;
use App\Http\Controllers\Controller;
use App\Traits\Skills;
use App\Events\CampaignPosted;


trait CampaignTrait
{
	use Skills;

    public function deleteJob(Request $request)
    {
        $id = $request->input('id');
        try {
            $job = Job::findOrFail($id);
			JobSkillManager::where('job_id', '=', $id)->delete();
            $job->delete();

            return 'ok';
        } catch (ModelNotFoundException $e) {
            return 'notok';
        }
    }
	
	private function updateFullTextSearch($campaign)
	{
		$str = '';
		$str .= $campaign->getCharity('name');
		$str .= ' '.$campaign->getCountry('country');
		$str .= ' '.$campaign->getState('state');
		$str .= ' '.$campaign->getCity('city');
		$str .= ' '.$campaign->title;
		$str .= ' '.$campaign->short_description;
		$str .= ' '.$campaign->description;
		$str .= ' '.$campaign->getJobSkillsStr();
		$str .= ' '.$campaign->salary_from.' '.$campaign->salary_to;
		$str .= ' '.$campaign->getFunctionalArea('functional_area');
		$str .= ' '.$campaign->getJobType('job_type');
		$str .= ' '.$campaign->getJobShift('job_shift');

		$campaign->search = $str;
		$campaign->update();

	}
	
	private function assignCampaignValues($campaign, $request)
	{
		$campaign->title = $request->input('title');
		$campaign->job_type_id = $request->input('job_type_id');
		$campaign->functional_area_id = $request->input('functional_area_id');
		$campaign->country_id = $request->input('country_id');
		$campaign->state_id = $request->input('state_id');
		$campaign->city_id = $request->input('city_id');
        $campaign->location = $request->input('location');
        $campaign->salary_from = (int)$request->input('salary_from');
		$campaign->salary_to = (int)$request->input('salary_to');
		$campaign->expiry_date = $request->input('expiry_date');
        $campaign->short_description = $request->input('short_description');
		$campaign->description = $request->input('description');
        return $campaign;
	}
	public function createJob()
    {

        $companies = DataArrayHelper::companiesArray();
        $countries = DataArrayHelper::defaultCountriesArray();
        $currencies = DataArrayHelper::currenciesArray();
		$careerLevels = DataArrayHelper::defaultCareerLevelsArray();
		$functionalAreas = DataArrayHelper::defaultFunctionalAreasArray();
		$jobTypes = DataArrayHelper::defaultJobTypesArray();
		$jobShifts = DataArrayHelper::defaultJobShiftsArray();
        $genders = DataArrayHelper::defaultGendersArray();
        $jobExperiences = DataArrayHelper::defaultJobExperiencesArray();
		$jobSkills = DataArrayHelper::defaultJobSkillsArray();
        $degreeLevels = DataArrayHelper::defaultDegreeLevelsArray();
		$salaryPeriods = DataArrayHelper::defaultSalaryPeriodsArray();
		$jobSkillIds = array();

        return view('admin.job.add')
                        ->with('companies', $companies)
                        ->with('countries', $countries)
						->with('currencies', array_unique($currencies))
                        ->with('careerLevels', $careerLevels)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('jobTypes', $jobTypes)
                        ->with('jobShifts', $jobShifts)
                        ->with('genders', $genders)
                        ->with('jobExperiences', $jobExperiences)
                        ->with('jobSkills', $jobSkills)
						->with('jobSkillIds', $jobSkillIds)
						->with('degreeLevels', $degreeLevels)
						->with('salaryPeriods', $salaryPeriods);
    }

    public function storeJob(JobFormRequest $request)
    {
        $job = new Job();
        $job->id = $request->input('id');
        $job->company_id = $request->input('company_id');
        $job = $this->assignJobValues($job, $request);
		$job->is_active = $request->input('is_active');
        $job->is_featured = $request->input('is_featured');
        $job->save();
		/**********************************/
		$job->slug = str_slug($job->title, '-').'-'.$job->id;
		/**********************************/
		$job->update();
        /*         * ************************************ */
		/*         * ************************************ */
        $this->storeJobSkills($request, $job->id);
		/*         * ************************************ */
		$this->updateFullTextSearch($job);
		/*         * ************************************ */

        flash('Job has been added!')->success();
        return \Redirect::route('edit.job', array($job->id));
    }
	
	

    public function editJob($id)
    {
        $companies = DataArrayHelper::companiesArray();
        $countries = DataArrayHelper::defaultCountriesArray();
        $currencies = DataArrayHelper::currenciesArray();
		$careerLevels = DataArrayHelper::defaultCareerLevelsArray();
		$functionalAreas = DataArrayHelper::defaultFunctionalAreasArray();
		$jobTypes = DataArrayHelper::defaultJobTypesArray();
		$jobShifts = DataArrayHelper::defaultJobShiftsArray();
        $genders = DataArrayHelper::defaultGendersArray();
        $jobExperiences = DataArrayHelper::defaultJobExperiencesArray();
		$jobSkills = DataArrayHelper::defaultJobSkillsArray();
        $degreeLevels = DataArrayHelper::defaultDegreeLevelsArray();
		$salaryPeriods = DataArrayHelper::defaultSalaryPeriodsArray();
		
        $job = Job::findOrFail($id);
		$jobSkillIds = $job->getJobSkillsArray();
        return view('admin.job.edit')
                        ->with('companies', $companies)
                        ->with('countries', $countries)
						->with('currencies', array_unique($currencies))
                        ->with('careerLevels', $careerLevels)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('jobTypes', $jobTypes)
                        ->with('jobShifts', $jobShifts)
                        ->with('genders', $genders)
                        ->with('jobExperiences', $jobExperiences)
						->with('jobSkills', $jobSkills)
                        ->with('jobSkillIds', $jobSkillIds)
						->with('degreeLevels', $degreeLevels)
						->with('salaryPeriods', $salaryPeriods)
                        ->with('job', $job);
    }

    public function updateJob($id, JobFormRequest $request)
    {
        $job = Job::findOrFail($id);
        $job->id = $request->input('id');
        $job->company_id = $request->input('company_id');
        $job = $this->assignJobValues($job, $request);
		$job->is_active = $request->input('is_active');
        $job->is_featured = $request->input('is_featured');
        
		/**********************************/
		$job->slug = str_slug($job->title, '-').'-'.$job->id;
		/**********************************/
		
		/*         * ************************************ */
        $job->update();
		/*         * ************************************ */
        $this->storeJobSkills($request, $job->id);
		/*         * ************************************ */
		$this->updateFullTextSearch($job);
		/*         * ************************************ */

        flash('Job has been updated!')->success();
        return \Redirect::route('edit.job', array($job->id));
    }
	
	/******************************************/
	/******************************************/
	
	public function createFrontCampaign()
    {
		$charity = Auth::guard('charity')->user();
	
		// if(
		// 	($charity->package_end_date === null) || 
		// 	($charity->package_end_date->lt(Carbon::now())) ||
		// 	($charity->jobs_quota <= $charity->availed_jobs_quota)
		// 	)
		// {
		// 	flash(__('Please subscribe to package first'))->error();
		// 	return \Redirect::route('charity.home');
		// 	exit;
		// }

        $countries = DataArrayHelper::langCountriesArray();
        $currencies = DataArrayHelper::currenciesArray();
		$careerLevels = DataArrayHelper::langCareerLevelsArray();
		$functionalAreas = DataArrayHelper::langFunctionalAreasArray();
		$jobTypes = DataArrayHelper::langJobTypesArray();
		$jobShifts = DataArrayHelper::langJobShiftsArray();
        $genders = DataArrayHelper::langGendersArray();
        $jobExperiences = DataArrayHelper::langJobExperiencesArray();
		$jobSkills = DataArrayHelper::langJobSkillsArray();
        $degreeLevels = DataArrayHelper::langDegreeLevelsArray();
		$salaryPeriods = DataArrayHelper::langSalaryPeriodsArray();
		
		$jobSkillIds = array();

        return view('campaign.add_campaign')
                        ->with('countries', $countries)
						->with('currencies', array_unique($currencies))
                        ->with('careerLevels', $careerLevels)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('jobTypes', $jobTypes)
                        ->with('jobShifts', $jobShifts)
                        ->with('genders', $genders)
                        ->with('jobExperiences', $jobExperiences)
                        ->with('jobSkills', $jobSkills)
						->with('jobSkillIds', $jobSkillIds)
						->with('degreeLevels', $degreeLevels)
						->with('salaryPeriods', $salaryPeriods);
    }

    public function storeFrontCampaign(CampaignFrontFormRequest $request)
    {
		$charity = Auth::guard('charity')->user();
		
        $campaign = new Campaign();
        $campaign->id = $request->input('id');
        $campaign->charity_id = $charity->id;
        $campaign = $this->assignCampaignValues($campaign, $request);
		$campaign->save();
		/**********************************/
		$campaign->slug = str_slug($campaign->title, '-').'-'.$campaign->id;
		/**********************************/
		$campaign->update();
        /*         * ************************************ */
		/*         * ************************************ */
        $this->storeJobSkills($request, $campaign->id);
		/*         * ************************************ */
		$this->updateFullTextSearch($campaign);
		/*         * ************************************ */
		
		/**********************************/
		$charity->availed_jobs_quota = $charity->availed_jobs_quota + 1;
		$charity->update();
		/**********************************/
		
		event(new CampaignPosted($campaign));

        flash('Campaign has been added!')->success();
        return \Redirect::route('edit.front.campaign', array($campaign->id));
    }
	
	

    public function editFrontCampaign($id)
    {
        $countries = DataArrayHelper::langCountriesArray();
        $currencies = DataArrayHelper::currenciesArray();
		$careerLevels = DataArrayHelper::langCareerLevelsArray();
		$functionalAreas = DataArrayHelper::langFunctionalAreasArray();
		$jobTypes = DataArrayHelper::langJobTypesArray();
		$jobShifts = DataArrayHelper::langJobShiftsArray();
        $genders = DataArrayHelper::langGendersArray();
        $jobExperiences = DataArrayHelper::langJobExperiencesArray();
		$jobSkills = DataArrayHelper::langJobSkillsArray();
        $degreeLevels = DataArrayHelper::langDegreeLevelsArray();
		$salaryPeriods = DataArrayHelper::langSalaryPeriodsArray();
		
        $campaign = Campaign::findOrFail($id);
		$jobSkillIds = $campaign->getJobSkillsArray();
        return view('campaign.edit_campaign')
                        ->with('countries', $countries)
						->with('currencies', array_unique($currencies))
                        ->with('careerLevels', $careerLevels)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('jobTypes', $jobTypes)
                        ->with('jobShifts', $jobShifts)
                        ->with('genders', $genders)
                        ->with('jobExperiences', $jobExperiences)
						->with('jobSkills', $jobSkills)
                        ->with('jobSkillIds', $jobSkillIds)
						->with('degreeLevels', $degreeLevels)
						->with('salaryPeriods', $salaryPeriods)
                        ->with('campaign', $campaign);
    }

    public function updateFrontCampaign($id, CampaignFrontFormRequest $request)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->id = $request->input('id');
        $campaign = $this->assignCampaignValues($campaign, $request);
		/**********************************/
		$campaign->slug = str_slug($campaign->title, '-').'-'.$campaign->id;
		/**********************************/
		
		/*         * ************************************ */
        $campaign->update();
		/*         * ************************************ */
        $this->storeJobSkills($request, $campaign->id);
		/*         * ************************************ */
		$this->updateFullTextSearch($campaign);
		/*         * ************************************ */

        flash('Job has been updated!')->success();
        return \Redirect::route('edit.front.campaign', array($campaign->id));
    }
	
	public static function countNumCampaigns($field = 'title', $value = '')
	{
		if(!empty($value))
		{
			if($field == 'title')
			{
				return DB::table('campaigns')->where('title','like',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'charity_id')
			{
				return DB::table('campaigns')->where('charity_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'industry_id')
			{
				$company_ids = Charity::where('industry_id','=',$value)->where('is_active','=',1)->pluck('id')->toArray();
				return DB::table('jobs')->whereIn('company_id', $company_ids)->where('is_active','=',1)->count('id');
			}
			if($field == 'job_skill_id')
			{
				$job_ids = JobSkillManager::where('job_skill_id','=',$value)->pluck('job_id')->toArray();
				return DB::table('campaigns')->whereIn('id', array_unique($job_ids))->where('is_active','=',1)->count('id');
			}
			if($field == 'functional_area_id')
			{
				return DB::table('campaigns')->where('functional_area_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'careel_level_id')
			{
				return DB::table('campaigns')->where('careel_level_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'job_type_id')
			{
				return DB::table('campaigns')->where('job_type_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'job_shift_id')
			{
				return DB::table('campaigns')->where('job_shift_id','=',$value)->where('is_active','=',1)->count('id');
			}
			
			if($field == 'country_id')
			{
				return DB::table('campaigns')->where('country_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'state_id')
			{
				return DB::table('campaigns')->where('state_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'city_id')
			{
				return DB::table('campaigns')->where('city_id','=',$value)->where('is_active','=',1)->count('id');
			}
		}
	}
	
	public function scopeNotExpire($query)
    {
        return $query->whereDate('expiry_date', '>', Carbon::now());//where('expiry_date', '>=', date('Y-m-d'));
    }
}
