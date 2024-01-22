<?php

namespace App\Http\Requests\Mimo;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'name'=> 'required',
            'username'=> 'required|unique:users',
            'phone'=> 'required',
            'email'=> 'required|unique:users|email',
            'password'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'name'=> 'Name is required',
            'username'=> 'username is required',
            'phone'=> 'Phone Number is required',
            'email'=> 'Email is required',
            'password'=> 'Password is required',
        ];
    }
}
