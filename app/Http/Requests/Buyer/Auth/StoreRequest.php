<?php

namespace SME\Http\Requests\Buyer\Auth;

use SME\Http\Requests\Request;

class StoreRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name" => "required|max:255",
            "email" => "required|max:255",
            "password" => "required|min:5",
            "c_password" => "required_with:password|min:5|same:password",
        ];
    }

    public function attributes()
    {
        return [
            "c_password" => "Confirm Password"
        ];
    }
}