<?php

namespace SME\Http\Controllers\Buyer;

use Illuminate\Support\Facades\Route;
use SME\Http\Controllers\Controller;
use SME\Http\Helpers\Config;
use Illuminate\Support\Facades\Input;
use SME\Http\Models\Setting;

abstract class BuyerController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->addMetaTitle(Config::SITE_NAME);
        $this->addMetaTitle("Buyer");

        $this->data["page_title"] = "";
        $this->data["page_sub_title"] = "";

        $this->data["setting"] = Setting::first();
        $this->data["paginationAppends"] = [];
    }

    public function View($route)
    {
        if (Input::get("order") && in_array(Input::get("order"), ["ASC", "DESC"])) {
            $this->data["paginationAppends"]["order"] = Input::get("order");
        }

        if (Input::get("orderBy")) {
            $this->data["paginationAppends"]["orderBy"] = Input::get("orderBy");
        }

        if (Input::get("q")) {
            $this->data["paginationAppends"]["q"] = Input::get("q");
        }

        $this->data["startPageNo"] = Input::get("page") ?: 1;

        $this->data["navigation_html"] = $this->getNavigationHtml($this->getNavigation());
        return parent::View("buyer." . $route);
    }

    protected function getNavigation()
    {
        return [
            [
                "label" => "Dashboard",
                "icon" => "dashboard",
                "route" => "buyer.index"
            ],
            [
                "label" => "My Profile",
                "icon" => "user",
                "route" => "buyer.auth.profile"
            ],
            [
                "label" => "Purchase Package",
                "icon" => "user",
                "route" => "buyer.auth.package"
            ],
        ];
    }

    protected function getNavigationHtml($modules, $level = 1)
    {
        $output = $level == 1 ? "" : "<ul class=\"treeview-menu\">\n";

        foreach ($modules as $module) {

            $li_class = !empty($module["route"]) && $module["route"] == Route::currentRouteName() ? " active" : "";

            $output .= "<li class='" . ($level == 1 ? "treeview" : "") . $li_class . "'>";
            $output .= "<a href=\"" . (!empty($module["route"]) ? Route($module["route"]) : "#") . "\"><i class=\"fa fa-{$module["icon"]}\"></i> <span>{$module["label"]}</span></a>";

            if (isset($module["child"])) {
                $output .= $this->getNavigationHtml($module["child"], $level + 1);
            }
            $output .= "</li>\n";
        }

        $output .= $level == 1 ? "" : "</ul>\n";
        return $output;
    }

    protected function setPageTitle($text)
    {
        $this->data["page_title"] = $text;
    }

    protected function setPageSubTitle($text)
    {
        $this->data["page_sub_title"] = $text;
    }

    protected function validateCSRF()
    {
        $token = Input::get("_token");

        if ($token === Session::get("_token")) {
            return true;
        } else {
            abort(500, "Invalid token");
        }
    }
}