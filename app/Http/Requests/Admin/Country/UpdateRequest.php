<?php

namespace SME\Http\Requests\Admin\Country;

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
             "country_name" => "required|max:255",
            "country_code" => "required|min:2|max:2",
            "zone_id" => "required",
            'status' => "required|in:1,2",
        ];
    }
}
