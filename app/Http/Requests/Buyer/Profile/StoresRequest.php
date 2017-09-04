<?php

namespace SME\Http\Requests\Buyer\Profile;

use SME\Http\Requests\Request;

class StoresRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "package_id" => "required|max:255",
            
        ];
    }

   
}
