<?php

namespace App\Http\Requests;

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
        if(isset($this->user->id)) {
            return [
                'email' => 'sometimes|required|email|unique:users,email,'.$this->user->id,
                'name' => 'required|string|max:50',
                'password' => 'sometimes|required'
            ];
        }  else {

            return [
                'email' => 'sometimes|required|email|unique:users',
                'name' => 'required|string|max:50',
                'password' => 'sometimes|required'
            ];

        }
        
    }
}
