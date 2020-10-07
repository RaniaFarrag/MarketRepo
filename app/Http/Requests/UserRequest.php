<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;

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
        if (request()->role == 'Sales Representative'){
            return [
                'name' => 'required',
                'email' => 'required | email | max:255 | unique:users',
                //'password' => 'required | min:8 | confirmed',
                'role' => 'required',
                'parent_id' => 'required',
            ];

        }
        elseif(request()->role == 'Sales Manager'){
           return [
               'name' => 'required',
               'email' => 'required | email | max:255 | unique:users',
               //'password' => 'required | min:8 | confirmed',
               'role' => 'required',
               'sector_ids' => 'required',
            ];
        }
        else{
            return [
                'name' => 'required',
                'email' => 'required | email | max:255 | unique:users',
                //'password' => 'required | min:8 | confirmed',
                'role' => 'required',
            ];
        }

    }
}
