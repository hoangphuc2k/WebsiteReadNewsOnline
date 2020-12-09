<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            //
            'CateName' => 'bail|required|max:1000',
        ];
    }
    public function messages(){
        return [
            'CateName.required' => 'Tên chuyên mục không được để trống',
            'CateName.max' => 'Tên chuyên mục không được quá 1000 kí tự',
        ];
    }
}
