<?php

namespace SME\Http\Requests\Buyer\Post;

use SME\Http\Requests\Request;

class StoreRequest extends Request {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
             "title" => "required|max:500",
        "description" => "required|max:50000",
        
        
        ];
    }
}
