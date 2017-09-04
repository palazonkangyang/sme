<?php

namespace SME\Http\Controllers\Admin;

use SME\Http\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->setPageSubTitle("Settings");
    }

    public function getTicket()
    {
        $this->setPageTitle("Ticket");
        return $this->view("setting.ticket");
    }

    public function postTicket(Request $request)
    {
        $this->validate($request, [
            "ticket_price" => "required|numeric|min:0",
            "ticket_unavailable" => ""
        ]);

        $setting = Setting::first();
        $values = $request->all();

        $values["ticket_unavailable"] = explode(",", $values["ticket_unavailable"]);

        $setting->update($values);

        return redirect()->route("admin.setting.ticket")->with("alert", [
            "success" => TRUE,
            "message" => "Ticket Setting has been successfully updated."
        ]);
    }

    public function getEmail()
    {
        $this->setPageTitle("Email");
        return $this->view("setting.email");
    }

    public function postEmail(Request $request)
    {
        $this->validate($request, [
            "enquiry_email" => "required|email",
            "smtp_host" => "required|max:255",
            "smtp_user" => "required|max:100",
            "smtp_pass" => "required|max:100",
            "smtp_port" => "required|max:30",
        ]);

        $setting = Setting::first();
        $values = $request->all();

        $setting->update($values);

        return redirect()->route("admin.setting.email")->with("alert", [
            "success" => TRUE,
            "message" => "Email Setting has been successfully updated."
        ]);
    }
}
