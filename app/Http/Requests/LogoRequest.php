<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogoRequest extends FormRequest
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
     * Declaration an attributes 
     * @var array
     */
    protected $attrs = [ 

            'logo' => 'Logo'  
        ];


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    { 

        $allowedFileTypesForLogo = config('app.allowedFileTypesForLogo');

        $maxLogoSize = config('app.maxLogoSize');
  
        return [ 
            // 'logo' =>'required|jpg,jpeg,png,gif|max:381872', 
            'logo' => 'required|mimes:'.$allowedFileTypesForLogo.'|max:'.$maxLogoSize
        ];
    }

          /**
     * @param $validator
     *
     * @return mixed
     */
    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->attrs);
    }
}
