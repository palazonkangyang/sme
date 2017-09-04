<?php

namespace SME\Http\Requests\Admin\Supplier;

use SME\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

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
            "contact_person" => "required|max:255",
            "email" => "required|email|unique:suppliers,id," . $this->route()->parameter("id"),
            "password" => "min:5",
            "re_password" => "min:5|same:password",
            "address" => "required:max:255",
            "postal_code" => "required|max:15",
            "contact_no" => "required|max:30",
            "spe_ticket_price" => "required|numeric",
            'featured' => "required|in:1,2",
            'status' => "required|in:1,2",
        ];
    }

    public function attributes()
    {
        return [
            "re_password" => "re-password"
        ];
    }
}
