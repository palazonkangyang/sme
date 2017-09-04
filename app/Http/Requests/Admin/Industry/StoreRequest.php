<?php

namespace SME\Http\Requests\Admin\Industry;

use SME\Http\Requests\Request;

class StoreRequest extends Request {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "industry" => "required",
            "image" => "mimes:jpg,jpeg,png,gif:max:10000",
            "status" =>"required",
        ];
    }

}
