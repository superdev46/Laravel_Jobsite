<?php

namespace App\Traits;

use Auth;
use DB;
use Input;
use Redirect;
use Carbon\Carbon;
use App\Job;
use App\User;
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
use App\Http\Requests\Front\JobFrontFormRequest;
use App\Http\Controllers\Controller;
use App\Traits\Skills;
use App\Events\JobPosted;


trait JobTrait
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
	
	private function updateFullTextSearch($job)
	{
		$str = '';
		$str .=   $job->getDonor('name');
		$str .= ' '.$job->getCountry('country');
		$str .= ' '.$job->getState('state');
		$str .= ' '.$job->getCity('city');
		$str .= ' '.$job->title;
		$str .= ' '.$job->short_description;
		$str .= ' '.$job->description;
		$str .= $job->getJobSkillsStr();
		$str .= ' '.$job->salary_from.' '.$job->salary_to;
		$str .= ' '.$job->getFunctionalArea('functional_area');
		$str .= ' '.$job->getJobType('job_type');
		
		$job->search = $str;
		$job->update();
	
	}
	
	private function assignJobValues($job, $request)
	{
		$job->title = $request->input('title');
		$job->description = $request->input('description');
		$job->short_description = $request->input('short_description');
        $job->country_id = $request->input('country_id');
        $job->state_id = $request->input('state_id');
        $job->city_id = $request->input('city_id');
        $job->salary_from = (int)$request->input('salary_from');
        $job->salary_to = (int)$request->input('salary_to');
        $job->functional_area_id = $request->input('functional_area_id');
        $job->job_type_id = $request->input('job_type_id');
        $job->expiry_date = $request->input('expiry_date');
        return $job;
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
	
	public function createFrontProject()
    {

		$donor = Auth::guard('donor')->user();
		
		// if(
		// 	($donor->package_end_date === null) || 
		// 	($donor->package_end_date->lt(Carbon::now())) ||
		// 	($donor->jobs_quota <= $donor->availed_jobs_quota)
		// 	)
		// {
		// 	flash(__('Please subscribe to package first'))->error();
		// 	return \Redirect::route('charity.home');
		// 	exit;
		// }

        $countries = DataArrayHelper::langCountriesArray();
        $currencies = DataArrayHelper::currenciesArray();
		$functionalAreas = DataArrayHelper::langFunctionalAreasArray();
		$jobTypes = DataArrayHelper::langJobTypesArray();
		$jobSkills = DataArrayHelper::langJobSkillsArray();
		$salaryPeriods = DataArrayHelper::langSalaryPeriodsArray();
		
		$jobSkillIds = array();

        return view('job.create_project')
			->with('countries', $countries)
			->with('currencies', array_unique($currencies))
			->with('functionalAreas', $functionalAreas)
			->with('jobTypes', $jobTypes)
			->with('jobSkills', $jobSkills)
			->with('jobSkillIds', $jobSkillIds)
			->with('salaryPeriods', $salaryPeriods);
    }

    public function storeFrontProject(JobFrontFormRequest $request)
    {

		// if(Auth::guard('web')->check())
        // {
		// 	dd("web") ;
		// }
    	// elseif(Auth::guard('user')->check())
        // {
		// 	return "user";
		// }
    	// elseif(Auth::guard('client')->check())
        // {
		// 	return "client";
		// }

		$donor = Auth::guard('donor')->user();
        $job = new Job();
        $job->id = $request->input('id');
        $job->donor_id = $donor->id;
        $job = $this->assignJobValues($job, $request);
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
		
		/**********************************/
		$donor->availed_jobs_quota = $donor->availed_jobs_quota + 1;
		$donor->update();
		/**********************************/
		// event(new JobPosted($job));
        flash('Job has been added!')->success();
        return \Redirect::route('edit.front.project', array($job->id));
    }

	public function editFrontProject($id)
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
		
		$job = Job::findOrFail($id);

		$jobSkillIds = $job->getJobSkillsArray();
        return view('job.edit_project')
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


    public function updateFrontJob($id, JobFrontFormRequest $request)
    {
        $job = Job::findOrFail($id);
        $job->id = $request->input('id');
        $job = $this->assignJobValues($job, $request);
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
        return \Redirect::route('edit.front.project', array($job->id));
    }
	
	public static function countNumJobs($field = 'title', $value = '')
	{
		if(!empty($value))
		{
			if($field == 'title')
			{
				return DB::table('jobs')->where('title','like',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'company_id')
			{
				return DB::table('jobs')->where('company_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'industry_id')
			{
				$donor_ids = User::where('industry_id','=',$value)->where('is_active','=',1)->pluck('id')->toArray();
				return DB::table('jobs')->whereIn('donor_id', $donor_ids)->where('is_active','=',1)->count('id');
			}
			if($field == 'job_skill_id')
			{
				$job_ids = JobSkillManager::where('job_skill_id','=',$value)->pluck('job_id')->toArray();
				return DB::table('jobs')->whereIn('id', array_unique($job_ids))->where('is_active','=',1)->count('id');
			}
			if($field == 'functional_area_id')
			{
				return DB::table('jobs')->where('functional_area_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'careel_level_id')
			{
				return DB::table('jobs')->where('careel_level_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'job_type_id')
			{
				return DB::table('jobs')->where('job_type_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'job_shift_id')
			{
				return DB::table('jobs')->where('job_shift_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'gender_id')
			{
				return DB::table('jobs')->where('gender_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'degree_level_id')
			{
				return DB::table('jobs')->where('degree_level_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'job_experience_id')
			{
				return DB::table('jobs')->where('job_experience_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'country_id')
			{
				return DB::table('jobs')->where('country_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'state_id')
			{
				return DB::table('jobs')->where('state_id','=',$value)->where('is_active','=',1)->count('id');
			}
			if($field == 'city_id')
			{
				return DB::table('jobs')->where('city_id','=',$value)->where('is_active','=',1)->count('id');
			}
		}
	}
	
	public function scopeNotExpire($query)
    {
        return $query->whereDate('expiry_date', '>', Carbon::now());//where('expiry_date', '>=', date('Y-m-d'));
    }
}
