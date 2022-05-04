<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            'name' => 'required|unique:products|max:255',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1',
            'sale_price' => 'nullable|lt:price|numeric',
            'file' => 'required|mimes:jpg,jpeg,png',
            'files' => 'required',
            
        ];
    }

    public function messages(){
        return [
            'name.required'=> 'Tên không được để rỗng!',
            'name.unique' => 'Tên sản phẩm đã tồn tại !',
            'quantity.required' => 'Vui lòng nhập số lượng sản phẩm',
            'quantity.min' => 'Số lượng sản phẩm không được ít hơn 1',
            'file.mimes' => 'Định dạng hình ảnh không đúng',
            'file.required' => 'Vui lòng chọn hình ảnh sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'sale_price.lt' => 'Giá sale phải nhỏ hơn giá nhập',
            'sale_price.gt' => 'Giá sale phải lớn hơn 50% của giá nhập',
            'price.numeric' => 'Giá phải là số',
            
            'files.required' => 'Vui lòng chọn ảnh mô tả sảm phẩm sản phẩm',

        ];
    }
}
