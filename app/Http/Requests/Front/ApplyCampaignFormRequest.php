<?php

namespace App\Http\Requests\Front;

use App\Http\Requests\Request;

class ApplyCampaignFormRequest extends Request
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
                    return [
						"current_salary" => "required|max:11",
						"description" => "required",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
			'current_salary.required' => __('Please enter current salary'),
            'description.required' => __('Please enter description'),
        ];
    }

}
