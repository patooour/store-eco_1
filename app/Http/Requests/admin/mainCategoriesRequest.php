<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class mainCategoriesRequest extends FormRequest
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

        return[
            'name'=>'required',
            'type'=>'required|in:1,2',
            'slug'=>'required|unique:categories,slug,'.$this->id,
            'avatar'=>'required_without:id|mimes:jpg,jpeg,png',
        ];
//        foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
//        {
//            $rules += [$localeCode.'.name'  => 'required'];
//        }


    }

}
