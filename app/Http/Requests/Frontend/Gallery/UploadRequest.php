<?php

namespace SME\Http\Requests\Frontend\Gallery;

use SME\Http\Requests\Request;
use Illuminate\Support\Facades\Input;


class UploadRequest extends Request
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
        $rules = [
            "name" => "required|max:255",
            "description" => "required|max:5000",
        ];

        $rules['files'] = "upload_count:files,5";

        if (Input::hasFile("files")) {
            foreach (Input::file('files') as $key => $value) {
                $rules['files.' . $key] = "required|mimes:jpeg,jpg,png,gif|max:10000";
            }
        }
        else {
            $rules['files.*'] = "required";
        }

        return $rules;
    }

    public function messages()
    {

        $messages = [
            "files.upload_count" => "You are not allowed to upload more then 5 files."
        ];

        if (Input::hasFile("files")) {
            foreach (Input::file('files') as $key => $value) {
                $messages['files.' . $key . ".mimes"] = "Please upload a valid jpeg,jpg,png or gif file";
            }
        }

        return $messages;
    }

    public function attributes()
    {
        return [
            "files.*" => "Images"
        ];
    }
}
