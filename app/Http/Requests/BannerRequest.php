<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            
                'file1'=> 'image|mimes:jpg,jpeg,png',
                'file2'=> 'image|mimes:jpg,jpeg,png',
                'file3'=> 'image|mimes:jpg,jpeg,png',
                'file4'=> 'image|mimes:jpg,jpeg,png',


        ];
    }

    public function messages(){
        return [
            'file1.mimes'  => 'Trường này phải là ảnh',
            'file2.mimes'  => 'Trường này phải là ảnh',
            'file3.mimes'  => 'Trường này phải là ảnh',
            'file4.mimes'  => 'Trường này phải là ảnh',
            'file1.image'  => 'Trường này phải là ảnh',
            'file2.image'  => 'Trường này phải là ảnh',
            'file3.image'  => 'Trường này phải là ảnh',
            'file4.image'  => 'Trường này phải là ảnh',
            
        ]; 
    }
}


