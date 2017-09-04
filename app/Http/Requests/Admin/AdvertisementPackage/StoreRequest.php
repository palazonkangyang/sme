<?php

namespace SME\Http\Requests\Admin\AdvertisementPackage;

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
            "advertisement_package" => "required|max:255",
        "advertisement_price"  => "required|numeric",
        "options" =>"required",
        "status" => "required|in:1,2"
            
        ];
    }
}
