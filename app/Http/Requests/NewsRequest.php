<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
           
                'Title'=>'required|max:1000',
                'Description'=>'required|max:1000',
                'Author'=> 'required|max:200',
                'Picture'=> 'required|max:1000',
                'KeyWord'=> 'required|max:1000',
        ];
    }
    public function messages(){
        return [
            'Title.required' => 'Tiêu đề không được để trống',
            'Title.max' => 'Tiêu đề không được quá 1000 kí tự',
            'Description.required' => 'Mô tả không được để trống',
            'Description.max' => 'Mô tả không được quá 1000 kí tự',
            'Author.required' => 'Tác giả không được để trống',
            'Author.max' => 'Tác giả không được quá 1000 kí tự',
            'Picture.required' => 'Ảnh không được để trống',
            'Picture.max' => 'Tên ảnh không được quá 1000 kí tự',
            'KeyWord.required' => 'Từ khóa không được để trống',
            'KeyWord.max' => 'Từ khóa không được quá 1000 kí tự',
        ];
    }
}
