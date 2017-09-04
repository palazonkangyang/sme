<?php

namespace SME\Http\Requests\Buyer\Auth;

use SME\Http\Requests\Request;

class ChangePasswordRequest extends Request
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
            "password" => "required|min:5|max:100",
            "re_password" => "required|same:password"
        ];
    }

    public function attributes()
    {
        return [
            "re_password" => "re password"
        ];
    }
}
