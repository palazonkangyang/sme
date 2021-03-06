<?php

namespace SME\Http\Requests\Admin\Feature;

use SME\Http\Requests\Request;

class UpdateRequest extends Request
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
             "feature" => "required|max:255",
            "status" => "required|in:1,2"
        ];
    }
}
