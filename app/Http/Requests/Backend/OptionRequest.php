<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
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
            'logo' => 'required|image|mimes:jpeg,jpg,png,gif' , 
            'email' => 'required',
            'slides.*' =>  'image|mimes:jpeg,jpg,png,gif',
            'address' => 'required',
            'phone' => 'required',            
        ];
    }
}
