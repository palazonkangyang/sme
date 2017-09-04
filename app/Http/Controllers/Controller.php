<?php

namespace SME\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use SME\Http\Models\Setting;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $data = [
        "meta_keywords" => "",
        "meta_description" => "",
        "meta_title" => ""
    ];

    protected $settings;

    public function __construct()
    {
        $this->settings = $this->data["setting"] = Setting::first();

        config([
            "mail.driver" => "smtp",
            'mail.host' => $this->data["setting"]->smtp_host,
            'mail.port' => $this->data["setting"]->smtp_port,
            'mail.encryption' => $this->data["setting"]->encryption,
            'mail.username' => $this->data["setting"]->smtp_user,
            'mail.password' => $this->data["setting"]->smtp_pass
        ]);
    }

    protected function addMetaTitle($title, $separator = "|")
    {
        $title = strip_tags($title);

        if (!empty($this->data["meta_title"])) {
            $this->data["meta_title"] = $title . " {$separator} " . ($this->data["meta_title"]);
        } else {
            $this->data["meta_title"] = $title;
        }


    }

    public function view($route)
    {
        return View($route, $this->data);
    }

    public function addData(array $data)
    {
        return $this->data = array_merge($this->data, $data);
    }
}
