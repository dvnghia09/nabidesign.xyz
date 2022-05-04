<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'             => 'required',                        
            'email'            => 'required|email|unique:users',     
            'password'         => 'required|min:6',
            'password_confirm' => 'required|same:password'
        ];
    }

    public function messages(){
        return [
            'name.required'        => 'Vui lòng nhập tên của bạn!',
            'email.required'        => 'Vui lòng nhập email của bạn!',
            'email.unique'          => 'Email đã đăng ký!',
            'email.email'           => 'Vui lòng nhập email hợp lệ!',
            'password.required' => 'Vui lòng nhập mất khẩu của bạn!',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự!',
            'password_confirm.same' => 'Mật khẩu xác nhận không đúng!',
            'password_confirm.required' => 'Vui lòng nhập mất khẩu xác nhận của bạn!',
        ]; 
    }
}
