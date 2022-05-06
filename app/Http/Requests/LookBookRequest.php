<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LookBookRequest extends FormRequest
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
            'name' => 'required|max:1000',
            'link' => 'required|max:1000',
            'file' => 'mimes:jpg,jpeg,png',
            
        ];
    }

    public function messages(){
        return [
            'name.required'=> 'Tên không được để rỗng!',
            'link.required'=> 'Link không được để rỗng!',
            'file.mimes' => 'Định dạng hình ảnh không đúng',
        ];
    }
}
