<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationFormRequest extends FormRequest
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
            'name'=>'required|min:3|string',
            'price'=>'required|numeric',
            'stock'=>'required|numeric',
            'is_active'=>'sometimes'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'Product name should be must one',
            'name.min'=>'Atleast minium 3 character required'
        
        ];
    }
}
