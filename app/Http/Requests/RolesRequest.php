<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
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
            'RoleName' => 'bail|required|max:1000',
        ];
    }
    public function messages(){
        return [
            'RoleName.required' => 'Tên Roles không được để trống',
            'RoleName.max' => 'Tên Roles không được quá 1000 kí tự',
        ];
    }
}
