<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name'=>'required|min:3',
            'prize'=>'required|numeric',
            'qty'=>'required|min:1'
        ];
    }
    public function messages()
    {
        return[
            
                'name.required'=>'Product name should be must one',
                'name.min'=>'Atleast minium 3 character required'            
           
        ];
    }
    
}
