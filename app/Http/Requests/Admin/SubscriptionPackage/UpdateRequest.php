<?php

namespace SME\Http\Requests\Admin\SubscriptionPackage;

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
        "subscription_package" => "required|max:255",
        "subscription_price"  => "required|numeric",
        "options" =>"required",
        "status" => "required|in:1,2"
        ];
    }


   
}
