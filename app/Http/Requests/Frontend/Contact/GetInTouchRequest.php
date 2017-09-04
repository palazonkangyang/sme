<?php

namespace SME\Http\Requests\Frontend\Contact;

use SME\Http\Requests\Request;

class GetInTouchRequest extends Request
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
            "email" => "required|email|max:255",
            "message" => "required|max:5000",
            "g-recaptcha-response" => "required|recaptcha"
        ];
    }
}
