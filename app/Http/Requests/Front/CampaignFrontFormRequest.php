<?php

namespace App\Http\Requests\Front;

use App\Http\Requests\Request;

class CampaignFrontFormRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'PUT':
            case 'POST': {

                    $id = (int) $this->input('id', 0);
					
                    return [                    	
						"title" => "required|max:180",
						"job_type_id" => "required",
						"functional_area_id" => "required",
						"country_id" => "required",
						"state_id" => "required",
						"city_id" => "required",
						"location" => "required",
						"salary_from" => "required|max:11",
						"salary_to" => "required|max:11",
						"expiry_date" => "required",
						"short_description" => "required|max:200",
						"description" => "required|max:2000",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'title.required' => __('Please enter Job title'),
			'description.required' => __('Please enter Job description'),
			'skills.required' => __('Please enter Job skills'),
			'country_id.required' => __('Please select Country'),
			'state_id.required' => __('Please select State'),
			'city_id.required' => __('Please select City'),
			'is_freelance.required' => __('Is this freelance Job?'),
			'career_level_id.required' => __('Please select Career level'),
			'salary_from.required' => __('Please select salary from'),
			'salary_to.required' => __('Please select salary to'),
			'salary_currency.required' => __('Please select salary currency'),
			'salary_period_id.required' => __('Please select salary period'),
			'hide_salary.required' => __('Is salary hidden?'),
			'functional_area_id.required' => __('Please select functional area'),
			'job_type_id.required' => __('Please select job type'),
			'job_shift_id.required' => __('Please select job shift'),
			'num_of_positions.required' => __('Please select number of positions'),
			'gender_id.required' => __('Please select gender'),
			'expiry_date.required' => __('Please enter Job expiry date'),
			'degree_level_id.required' => __('Please select degree level'),
			'job_experience_id.required' => __('Please select job experience'),
        ];
    }

}