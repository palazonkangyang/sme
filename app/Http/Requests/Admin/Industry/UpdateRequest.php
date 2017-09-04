<?php

namespace SME\Http\Requests\Admin\Industry;

use SME\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class UpdateRequest extends Request {

    public function authorize() {
        return true;
    }

     public function rules() {
        return [
            "industry" => "required",
            "image" => "mimes:jpg,jpeg,png,gif",
            "status" =>"required",
        ];
    }

}
