<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Validate extends FormRequest
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
            'name' =>'required',
            'price'=>'required|numeric',
            'description'=>'required',
            'active'=>'required',

        ];
    }
    function messages()
    {
        $messege = [
            'name.required'=>'vui long nhap  vao truong nay',
            'price.required'=>'vui long nhap  vao truong nay',
            'prcice.numeric'=>'vui long nhap so',
            'active.required'=>'vui long nhap  vao truong nay',
        ];
        return $messege;
    }
}
