<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyNeedRequest extends FormRequest
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
        return [
            'employment_type_id' => 'required',
            'required_position' => 'required',
            'candidates_number' => 'required',
            'country_id' => 'required',
            'gender' => 'required',
            'minimum_age' => 'required',
        ];
    }
}
