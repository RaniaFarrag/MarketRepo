<?php

namespace App\Http\Requests;

use http\Env\Request;
//use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        if (request()->role == 'Sales Manager' || request()->role == 'Coordinator'){

            return [
                'name' => 'required',
                'name_en' => 'required',
//                'email' => 'required|email|max:255|unique:users,email,'.Auth::user()->id,
                'email' => 'required|email|max:255|unique:users,email,'.$this->user->id,
                //'email' =>  Rule::unique('users')->ignore(request()->id),
                //'password' => 'required | min:8 | confirmed',
                'role' => 'required',
                'sector_ids' => 'required',

            ];

        }
        elseif(request()->role == 'Sales Representative'){
           return [
               'name' => 'required',
               'name_en' => 'required',
               'email' => 'required | email | max:255|unique:users,email,'.$this->user->id,

               'role' => 'required',
               'parent_id' => 'required',
            ];
        }
        else{
            return [
                'name' => 'required',
                'name_en' => 'required',
                'email' => 'required | email | max:255|unique:users,email,'.$this->user->id,
                'role' => 'required',
            ];
        }
    }
}
