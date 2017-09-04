<?php

namespace SME\Http\Requests\Admin\ServiceCategory;

use SME\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class UpdateRequest extends Request {

    public function authorize() {
        return true;
    }

     public function rules() {
        return [
            "service_category" => "required",
            "image" => "mimes:jpg,jpeg,png,gif",
            'status' => "required|in:1,2",
        ];
    }

}
