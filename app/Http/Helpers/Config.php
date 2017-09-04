<?php

namespace SME\Http\Helpers;

use Collective\Html\HtmlFacade;
use SME\Http\Models\Page;

class Config
{

    const SITE_NAME = "<b>SME</b>Consultant";
    const ADMIN_SHORT_LOGO = "<b>SME</b>C";
    const ADMIN_LONG_LOGO = "<b>SME</b>Consultant";

    const BUYER_PANEL_NAME = "Buyer";

    const SITE_EMAIL = "info@sme.com";
    const VENDOR_EMAIL = " business@sme.com";
    const SITE_PHONE = "+65 1234 5678";

    const SUPPLIER_PANEL_NAME = "Supplier";

    public static function getPageLink($page_id, $attributes = [])
    {
        $page = Page::where("status", 1)->find($page_id);
       // $active_slug = request()->route()->parameter("slug");

       // if ($page && $active_slug == $page->slug) {
       //     $attributes["class"] = !empty($attributes["class"]) ? $attributes["class"] . " " . "active" : "active";
       // }

       // if ($page) {
      //      return HtmlFacade::link($page->slug, $page->name, $attributes);
       // } else {
            return null;
       // }
    }

    public static function getPageURL($page_id)
    {

       // $page = Page::where("status", 1)->find($page_id);
        //if ($page) {
        //    return $page->slug;
       // } else {
            return null;
       // }
    }
}
