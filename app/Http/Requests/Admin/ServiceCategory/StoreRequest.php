<?php

namespace SME\Http\Requests\Admin\ServiceCategory;

use SME\Http\Requests\Request;

class StoreRequest extends Request {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "service_category" => "required",
            "image" => "mimes:jpg,jpeg,png,gif:max:10000",
            'status' => "required|in:1,2",
        ];
    }

}
