<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'phone' => 'required',
            'sector_id' => 'required',
            'sub_sector_id' => 'required',
            'whatsapp' => 'required',
            'website' => 'required',
            'email' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg',
            'first_business_card' => 'image|mimes:jpeg,png,jpg',
            'second_business_card' => 'image|mimes:jpeg,png,jpg',
            'third_business_card' => 'image|mimes:jpeg,png,jpg',
        ];
    }
}
