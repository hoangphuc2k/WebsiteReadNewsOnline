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
            //
            'BannerName' => 'bail|required|max:1000',
            'ImgUrl' => 'bail|required|max:1000'
        ];
    }

    public function messages (){
        return [
            'BannerName.required' => 'Tên Banner không được để trống',
            'BannerName.max' => 'Tên Banner không được quá 1000 kí tự',
            'ImgUrl.required' => 'Đường dẫn không được để trống',
            'BannerName.max' => 'Độ dài đường dẫn không được quá 1000 kí tự'
        ];
    }
}
