<?php

namespace SME\Http\Requests\Buyer\Ticket;

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
            "date" => "required|date|after:yesterday",
            "ticket_qty" => "required|numeric|min:1",
            "payment_method" => "required|numeric|in:1,2",
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "contact_no" => "",
            "gender" => "required|in:1,2",
            "email" => "required|email|max:255",
            "address" => "max:255",
            "country" => "required|exists:master_countries,id"
        ];
    }
}
