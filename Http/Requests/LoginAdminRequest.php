<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends FormRequest
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
            
                'email' => 'required|email|exists:users',
                'password' => 'required',
            
        ];
    }

    public function messages(){
        return [
            'email.required'        => 'Vui lòng nhập email của bạn!',
            'email.exists'          => 'Email không chính xác!',
            'email.email'           => 'Vui lòng nhập email hợp lệ!',
            'password.required' => 'Vui lòng nhập mất khẩu của bạn!',
        ]; 
    }
}
