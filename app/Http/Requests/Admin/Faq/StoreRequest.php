<?php

namespace SME\Http\Requests\Admin\Faq;

use SME\Http\Requests\Request;

class StoreRequest extends Request {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "question" => "required|max:500",
            "description" => "required|max:50000",
           'status' => "required|in:1,2",
        ];
    }
}
