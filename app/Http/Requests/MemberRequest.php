<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'Usemember' => 'bail|required|max:200',
            'Password' => 'bail|required|min:7',
            'Email' => 'bail|required| max:200',
            'FullName' => 'bail|required|max:100'
        ];
    }

    public function messages(){
    return[
            'UseName.required' => 'UseMember không được để trống',
            'UseName.max' => 'UseMemberkhông được quá 200 kí tự',

            'Password.required' => 'Password không được để trống',
            'Password.max' => 'Độ dài Password tối thiểu là 7 ký tự',

            'Email.required' => 'Email không được để trống',
            'Email.max' => 'Độ dài Email tối đa là 200 ký tự',
            
            'FullName.required' => 'FullName không được để trống',
            'FullName.max' => 'Độ dài FullName đa là 100 ký tự'
    ];
    }
}
