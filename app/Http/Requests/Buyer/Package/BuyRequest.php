<?php

namespace SME\Http\Requests\Buyer\Package;

use SME\Http\Requests\Request;

class BuyRequest extends Request
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
            "package_id" => "required|numeric|exists:ticket_packages,id",
            "package_qty" => "required|numeric|min:1",
            "payment_method" => "required|in:1,2,3",
            ""
        ];
    }

    public function attributes()
    {
        return [
            "package_id" => "package"
        ];
    }
}
