<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOderRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:12',
            'address' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required'=> 'Tên không được để rỗng!',
            'phone.required'=> 'Số điện thoại không được để rỗng!',
            'phone.regex'=> 'Số điện thoại không đúng!',
            'phone.min'=> 'Số điện thoại không đúng!',
            'phone.max'=> 'Số điện thoại không đúng!',
            'address.required'=> 'Tên không được để rỗng!',

        ];
    }
}
