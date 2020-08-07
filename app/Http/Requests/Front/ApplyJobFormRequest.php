<?php

namespace App\Http\Requests\Front;

use App\Http\Requests\Request;

class ApplyJobFormRequest extends Request
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
                        "description" => "required",
						"current_salary" => "required|max:11",
						"period" => "required|max:3",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'description.required' => __('Please type description'),
			'current_salary.required' => __('Please enter budget'),
            'period.required' => __('Please enter expected period'),
        ];
    }

}
