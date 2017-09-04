<?php

namespace SME\Http\Controllers\Frontend;

use SME\Http\Controllers\Controller;
use SME\Http\Helpers\Config;


abstract class FrontendController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->addMetaTitle(Config::SITE_NAME);

        $this->data["page_title"] = "";
        $this->data["page_sub_title"] = "";
    }

    public function View($route)
    {
        return parent::View("frontend." . $route);
    }
}