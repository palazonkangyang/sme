<?php

namespace SME\Http\Requests\Admin\Zone;

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
             "zone" => "required|max:255",
             'status' => "required|in:1,2",
        ];
    }
}
