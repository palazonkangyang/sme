<?php

namespace SME\Http\Requests\Supplier\ProductCollection;

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
            "location_id" => "required|exists:Supplier_locations,location_id",
            "remark" => "max:5000"
        ];
    }
}
