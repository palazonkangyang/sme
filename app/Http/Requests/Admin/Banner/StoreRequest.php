<?php

namespace SME\Http\Requests\Admin\Banner;

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
            "banner_name" => "required|max:250",
            "period" => "required|max:255|numeric",
        "status" => "required|in:1,2"
            
        ];
    }
}
