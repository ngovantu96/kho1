<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomer extends FormRequest
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
            'name'=> 'required|min:2|max:30',
            'image'=>  'mimes:jpeg,jpg,png,gif|required|max:10000',
            'email'=>  'required|unique:customer,email',
            'dob'=> 'required|date_format:d-m-Y|after:16 years',

        ];
    }
    public function messages()
    {
        $messages = [
            'name.required'=> 'ban khong duoc de trong',
            'name.min'=> 'ten cua ban phai co it nhat 2 ki tu',
            'name.max'=> 'ten cua ban co do dai nhieu nha 30 ki tu',
            'image.mimes'=> 'ban khong duoc de trong',
            'email.required'=> 'ban khong duoc de trong',
            'dob.required'=> 'tuoi cua ban phai lon hon 16'
        ];

        return $messages;
    }
}
