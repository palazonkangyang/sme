<?php

namespace SME\Http\Requests\Buyer\Profile;

use SME\Http\Requests\Request;

class UpdateRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "company_name" => "required|max:255",
            "password" => "min:5",
            "re_password" => "required_with:password|min:5|same:password",
            "old_password" => "required_with:password",
            "address" => "required:max:255",
            "brief_introduction" => "required:max:10000",
            "postal_code" => "numeric|required",
            "contact_no" => "required|max:30",
        ];
    }

    public function attributes()
    {
        return [
            "re_password" => "re-password"
        ];
    }
}
