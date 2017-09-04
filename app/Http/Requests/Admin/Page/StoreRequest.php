<?php

namespace SME\Http\Requests\Admin\Page;

use SME\Http\Requests\Request;

class StoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|max:255",
            "slug" => "required|unique:pages|max:255",
            "banner_title" => "required|max:255",
            "banner_sub_title" => "max:255",
            "banner_button_url" => "max:255",
            "banner_image" => "mimes:jpg,jpeg,png,gif:max:10000",
            "meta_title" => "required:max:255",
            "status" => "required|in:1,2",
            "template" => "required"
        ];
    }
}
