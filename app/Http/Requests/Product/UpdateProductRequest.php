<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $id = $this->request->get('id');
        $price = $this->request->get('price');
        if(is_numeric($price)){
            $halfPrice = $price/4;
        }else{
            $halfPrice = 1;
        }
        

        
        return [
            'name' => 'required|max:255|unique:products,name,'.$id,
            'quantity' => 'required|numeric|min:0',
            'price' => 'required|min:0|numeric',
            'sale_price' => 'nullable|lt:price|numeric|gt:'.$halfPrice,
            'file' => 'mimes:jpg,jpeg,png',
        ];
    }

    public function messages(){
        return [
            'name.required'=> 'Tên không được để rỗng!',
            'name.unique' => 'Tên sản phẩm đã tồn tại !',
            'quantity.required' => 'Vui lòng nhập số lượng sản phẩm',
            'quantity.min' => 'Số lượng sản phẩm không được ít hơn 0',
            'file.mimes' => 'Định dạng hình ảnh không đúng',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Giá phải là số',
            'sale_price.numeric' => 'Giá phải là số',
            'sale_price.lt' => 'Giá sale phải nhỏ hơn giá nhập',
            'sale_price.gt' => 'Giá sale phải lớn hơn 25% của giá nhập',

        ];
    }
}
