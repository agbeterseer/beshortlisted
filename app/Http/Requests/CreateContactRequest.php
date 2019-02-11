<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'country' => 'required',
            'state' => 'required',
            'street_name' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'official_number' => 'required',
            'email' => 'required',
            'description' =>  'required',
        ];
    }
}
