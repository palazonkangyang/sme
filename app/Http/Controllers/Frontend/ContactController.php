<?php

namespace SME\Http\Controllers\Frontend;

use SME\Http\Helpers\Config;
use SME\Http\Requests\Frontend\Contact\ContactRequest;
use SME\Http\Requests\Frontend\Contact\GetInTouchRequest;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContactController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getContact()
    {
        $this->addData([
            "page_title" => "Contact us",
            "page_sub_title" => "",
            "button" => FALSE
        ]);

        return $this->view("template.contact");
    }

    public function postContact(ContactRequest $request)
    {
        $values = $request->all();
        $values["client_message"] = $values["message"];

        Mail::send("email.frontend.contact.contact", $values, function ($message) use ($request) {
            $message->from($request->input("email"), ucwords($request->input("first_name") . " " . $request->input("last_name")))
                ->subject("Contact Enquiry - " . strip_tags(Config::SITE_NAME))
                ->to($this->settings->enquiry_email);
        });

        return JsonResponse::create([
            "success" => true,
            "message" => "Your enquiry has been successfully sent. Thank you!",
            "resetFields" => true
        ]);
    }

    public function postGetInTouch(GetInTouchRequest $request)
    {
        $values = $request->all();
        $values["client_message"] = $values["message"];

        Mail::send("email.frontend.contact.getintouch", $values, function ($message) use ($request) {
            $message->from($request->input("email"), ucwords($request->input("name")))
                ->subject("Get in Touch - " . strip_tags(Config::SITE_NAME))
                ->to($this->settings->enquiry_email);
        });

        return JsonResponse::create([
            "success" => true,
            "message" => "Your enquiry has been successfully sent. Thank you!",
            "resetFields" => true
        ]);
    }
}