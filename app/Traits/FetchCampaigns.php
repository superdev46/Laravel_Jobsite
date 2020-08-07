<?php

namespace App\Traits;

use DB;
use App\Campaign;
use App\Charity;
use App\JobSkill;
use App\JobSkillManager;
use App\Country;
use App\State;
use App\City;
use App\CareerLevel;
use App\FunctionalArea;
use App\JobType;
use App\JobShift;
use App\Gender;
use App\JobExperience;
use App\DegreeLevel;
use App\Traits\CampaignTrait;

trait FetchCampaigns
{
	use CampaignTrait;
    private $fields = array(
		'campaigns.id',
		'campaigns.charity_id',
		'campaigns.title',
		'campaigns.job_type_id',
		'campaigns.functional_area_id',
		'campaigns.country_id',
		'campaigns.state_id',
		'campaigns.city_id',
		'campaigns.location',
		'campaigns.salary_from',
		'campaigns.salary_to',
		'campaigns.expiry_date',
		'campaigns.description',
		'campaigns.short_description',
		'campaigns.hide_salary',
		'campaigns.slug',
		'campaigns.created_at',
		'campaigns.updated_at'
    );

    public function fetchCampaigns($search = '', $job_titles = array(), $company_ids = array(), $industry_ids = array(), $job_skill_ids = array(),$functional_area_ids = array(), $country_ids = array(), $state_ids = array(), $city_ids = array(), $is_freelance = -1, $career_level_ids = array(), $job_type_ids = array(), $job_shift_ids = array(), $gender_ids = array(), $degree_level_ids = array(), $job_experience_ids = array(), $salary_from = 0, $salary_to = 0, $salary_currency = '',$is_featured = -1, $orderBy = 'id', $limit = 10)
    {
        $asc_desc = 'DESC';

        $query = Campaign::select($this->fields);
        $query = $this->createQuery($query, $search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured);
		
        $query->orderBy('campaigns.is_featured', 'DESC');
		$query->orderBy('campaigns.id', 'DESC');
        //echo $query->toSql();exit;
        return $query->paginate($limit);
    }
	
	public function fetchIdsArray($search = '', $job_titles = array(), $company_ids = array(), $industry_ids = array(), $job_skill_ids = array(),$functional_area_ids = array(), $country_ids = array(), $state_ids = array(), $city_ids = array(), $is_freelance = -1, $career_level_ids = array(), $job_type_ids = array(), $job_shift_ids = array(), $gender_ids = array(), $degree_level_ids = array(), $job_experience_ids = array(), $salary_from = 0, $salary_to = 0, $salary_currency = '', $is_featured = -1, $field = 'campaigns.id')
    {
        $query = Campaign::select($field);
        $query = $this->createQuery($query, $search, $job_titles, $company_ids, $industry_ids, $job_skill_ids,$functional_area_ids, $country_ids, $state_ids, $city_ids, $is_freelance, $career_level_ids, $job_type_ids, $job_shift_ids, $gender_ids, $degree_level_ids, $job_experience_ids, $salary_from, $salary_to, $salary_currency, $is_featured);
		
        $array = $query->pluck($field)->toArray();
		return array_unique($array);
    }
	
	public function createQuery($query, $search = '', $job_titles = array(), $company_ids = array(), $industry_ids = array(), $job_skill_ids = array(),$functional_area_ids = array(), $country_ids = array(), $state_ids = array(), $city_ids = array(), $is_freelance = -1, $career_level_ids = array(), $job_type_ids = array(), $job_shift_ids = array(), $gender_ids = array(), $degree_level_ids = array(), $job_experience_ids = array(), $salary_from = 0, $salary_to = 0, $salary_currency = '', $is_featured = -1)
	{
		$query->where('campaigns.is_active', 1);
        if ($search != '') {
			$query = $query->whereRaw("MATCH (`search`) AGAINST ('$search*' IN BOOLEAN MODE)");
        }
		if (isset($job_titles[0])) {
			$query = $query->where('title', 'like', $job_titles[0]);
        }
        if (isset($company_ids[0])) {
            $query->whereIn('campaigns.company_id', $company_ids);
        }
		if (isset($industry_ids[0])) {
			$company_ids_array = Company::whereIn('industry_id',$industry_ids)->pluck('id')->toArray();
            $query->whereIn('campaigns.company_id', $company_ids_array);
        }
		if (isset($job_skill_ids[0])) {
			$query->whereHas('jobSkills', function($query) use ($job_skill_ids){
				$query->whereIn('job_skill_id',$job_skill_ids);	
			});
			//$job_ids = JobSkillManager::whereIn('job_skill_id',$job_skill_ids)->pluck('job_id')->toArray();
            //$query->whereIn('campaigns.id', $job_ids);
        }
		if (isset($functional_area_ids[0])) {
            $query->whereIn('campaigns.functional_area_id', $functional_area_ids);
        }
		if (isset($country_ids[0])) {
            $query->whereIn('campaigns.country_id', $country_ids);
        }
		if (isset($state_ids[0])) {
            $query->whereIn('campaigns.state_id', $state_ids);
        }
		if (isset($city_ids[0])) {
            $query->whereIn('campaigns.city_id', $city_ids);
        }
		if ($is_freelance == 1) {
            $query->where('campaigns.is_freelance', $is_freelance);
        }
		if (isset($career_level_ids[0])) {
            $query->whereIn('campaigns.career_level_id', $career_level_ids);
        }
		if (isset($job_type_ids[0])) {
            $query->whereIn('campaigns.job_type_id', $job_type_ids);
        }
        if (isset($job_shift_ids[0])) {
            $query->whereIn('campaigns.job_shift_id', $job_shift_ids);
        }
		if (isset($gender_ids[0])) {
            $query->whereIn('campaigns.gender_id', $gender_ids);
        }
		if (isset($degree_level_ids[0])) {
            $query->whereIn('campaigns.degree_level_id', $degree_level_ids);
        }
		if (isset($job_experience_ids[0])) {
            $query->whereIn('campaigns.job_experience_id', $job_experience_ids);
        }
		if ((int)$salary_from > 0) {
            $query->where('campaigns.salary_from', '>=', $salary_from);
        }
		if ((int)$salary_to > 0) {
			$query = $query->whereRaw("(`jobs`.`salary_to` - $salary_to) >= 0");
            //$query->where('campaigns.salary_to', '<=', $salary_to);
        }
		if (!empty(trim($salary_currency))) {
            $query->where('campaigns.salary_currency', 'like', $salary_currency);
        }
		if ($is_featured == 1) {
            $query->where('campaigns.is_featured', '=', $is_featured);
        }
		$query->notExpire();
		return $query;
	
	}
	
	public function fetchSkillIdsArray($jobIdsArray = array())
    {
        $query = JobSkillManager::select('job_skill_id');
        $query->whereIn('job_id', $jobIdsArray);
		
        $array = $query->pluck('job_skill_id')->toArray();
		return array_unique($array);
    }
	
	public function fetchIndustryIdsArray($companyIdsArray = array())
    {
        $query = Charity::select('industry_id');
        $query->whereIn('id', $companyIdsArray);
		
        $array = $query->pluck('industry_id')->toArray();
		return array_unique($array);
    }
	
	private function getSEO($functional_area_ids = array(), $country_ids = array(), $state_ids = array(), $city_ids = array(), $career_level_ids = array(), $job_type_ids = array(), $job_shift_ids = array(), $gender_ids = array(), $degree_level_ids = array(), $job_experience_ids = array())
	{
		$description = 'Jobs ';
		$keywords = '';
		if(isset($functional_area_ids[0])){
			foreach($functional_area_ids as $functional_area_id){
				$functional_area = FunctionalArea::where('functional_area_id', $functional_area_id)->lang()->first();
				if(null !== $functional_area){
					$description .= ' '.$functional_area->functional_area;
					$keywords .= $functional_area->functional_area.',';
				}
			}
		}
		if(isset($country_ids[0])){
			foreach($country_ids as $country_id){
				$country = Country::where('country_id', $country_id)->lang()->first();
				if(null !== $country){
					$description .= ' '.$country->country;
					$keywords .= $country->country.',';
				}
			}
		}
		if(isset($state_ids[0])){
			foreach($state_ids as $state_id){
				$state = State::where('state_id', $state_id)->lang()->first();
				if(null !== $state){
					$description .= ' '.$state->state;
					$keywords .= $state->state.',';
				}
			}
		}
		if(isset($city_ids[0])){
			foreach($city_ids as $city_id){
				$city = City::where('city_id', $city_id)->lang()->first();
				if(null !== $city){
					$description .= ' '.$city->city;
					$keywords .= $city->city.',';
				}
			}
		}
		if(isset($career_level_ids[0])){
			foreach($career_level_ids as $career_level_id){
				$career_level = CareerLevel::where('career_level_id', $career_level_id)->lang()->first();
				if(null !== $career_level){
					$description .= ' '.$career_level->career_level;
					$keywords .= $career_level->career_level.',';
				}
			}
		}
		if(isset($job_type_ids[0])){
			foreach($job_type_ids as $job_type_id){
				$job_type = JobType::where('job_type_id', $job_type_id)->lang()->first();
				if(null !== $job_type){
					$description .= ' '.$job_type->job_type;
					$keywords .= $job_type->job_type.',';
				}
			}
		}
		if(isset($job_shift_ids[0])){
			foreach($job_shift_ids as $job_shift_id){
				$job_shift = JobShift::where('job_shift_id', $job_shift_id)->lang()->first();
				if(null !== $job_shift){
					$description .= ' '.$job_shift->job_shift;
					$keywords .= $job_shift->job_shift.',';
				}
			}
		}
		if(isset($gender_ids[0])){
			foreach($gender_ids as $gender_id){
				$gender = Gender::where('gender_id', $gender_id)->lang()->first();
				if(null !== $gender){
					$description .= ' '.$gender->gender;
					$keywords .= $gender->gender.',';
				}
			}
		}
		if(isset($degree_level_ids[0])){
			foreach($degree_level_ids as $degree_level_id){
				$degree_level = DegreeLevel::where('degree_level_id', $degree_level_id)->lang()->first();
				if(null !== $degree_level){
					$description .= ' '.$degree_level->degree_level;
					$keywords .= $degree_level->degree_level.',';
				}
			}
		}
		if(isset($job_experience_ids[0])){
			foreach($job_experience_ids as $job_experience_id){
				$job_experience = JobExperience::where('job_experience_id', $job_experience_id)->lang()->first();
				if(null !== $job_experience){
					$description .= ' '.$job_experience->job_experience;
					$keywords .= $job_experience->job_experience.',';
				}
			}
		}
		return ['keywords'=>$keywords, 'description'=>$description];
		
	}


}
