<?php

namespace App\Http\Requests\CategorySub;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategorySubRequest extends FormRequest
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
        $categorySub_id = $this->request->get('categorySub_id');    
        return [
            'name' => 'required|unique:category_subs,name,'.$categorySub_id,
        ];
    }

    public function messages(){
        return[
            'name.required' => 'Trường này là bắt buộc', 
            'name.unique' => 'Tên danh mục đã tồn tại', 
        ];
    }
}
