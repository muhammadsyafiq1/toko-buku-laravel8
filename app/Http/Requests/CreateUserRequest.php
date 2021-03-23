<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'password' => 'required|confirmed',
            'avatar' => 'required|image',
            'phone' => 'digits_between:10,12',
            'address' => 'required',
            'roles' => 'required',
            'username' => 'required|unique:users',
            'password_confirmation' => 'required'
        ];
    }
}
