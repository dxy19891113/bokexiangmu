<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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
        'uname'=>'required|unique:user|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
       
        'password'=>'required|regex:/^[\w]{6,18}$/',
        'repass'=>'required|same:password',
        'email'=>'required|email',
        'phone'=>'required|regex:/^1{1}[3-9]{1}[0-9]{9}$/',
        ];
    }

                public function messages()
                {
                return [
               'uname.required'=>'用户名必填',
                'uname.regex'=>'用户名格式不正确',
                'uname.unique'=>'用户名已存在',
                'password.required'=>'密码必填',
                'password.regex'=>'密码格式不正确',
                'repass.required'=>'密码必填',
                'repass.same'=>'两次密码不一致',
                'email.required'=>'邮箱必填',
                'email.email'=>'邮箱格式不正确',
                'phone.required'=>'电话必填',
                'phone.regex'=>'电话格式不正确',

                ];
            }
}
