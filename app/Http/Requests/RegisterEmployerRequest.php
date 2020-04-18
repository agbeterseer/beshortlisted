<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterEmployerRequest extends FormRequest
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
            'account_type' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'phone' => 'required',
            'firstname' => 'required',
            'comany_name' => 'required',
            'industry' => 'required',
        ];

    }
}
