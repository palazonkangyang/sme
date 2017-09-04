<?php

namespace SME\Http\Requests\Frontend\Testimonial;

use SME\Http\Requests\Request;

class CreateRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "author" => "required|max:255",
            "content" => "required",
            "author_image" => "mimes:jpg,jpeg,png,gif|max:10000",
            "rating" => "required|numeric|in:1,2,3,4,5",
            "country_id" => "required|exists:master_countries,id"
        ];
    }

    public function attributes()
    {
        return [
            "country_id" => "country"
        ];
    }
}
