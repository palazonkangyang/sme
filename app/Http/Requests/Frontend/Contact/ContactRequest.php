<?php

namespace SME\Http\Requests\Frontend\Contact;

use SME\Http\Requests\Request;

class ContactRequest extends Request
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
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "email" => "required|email|max:255",
            "contact_no" => "required|max:30",
            "message" => "required|max:5000",
            "g-recaptcha-response" => "required|recaptcha"
        ];
    }

    public function attributes()
    {
        return [
            "g-recaptcha-response" => "Recaptcha"
        ];
    }

    public function messages()
    {
        return [
            "g-recaptcha-response.recaptcha" => "Please prove that you are not a robot."
        ];
    }
}
