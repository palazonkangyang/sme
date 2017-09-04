<?php

namespace SME\Http\Helpers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;

class ListView
{
    public static function sortColumn($label, $field)
    {
        $param["orderBy"] = $field;
        $param["order"] = Input::get("order") == "DESC" ? "ASC" : "DESC";

        if (Input::get("page")) {
            $param["page"] = Input::get("page");
        }

        if (Input::get("q")) {
            $param["q"] = Input::get("q");
        }

        $paramStr = "?" . http_build_query($param);



        $order = $field == Input::get("orderBy") ? $param["order"] : ($param["order"] == "ASC" ? "DESC" : "ASC");

        $url = Route(Route::currentRouteName()) . $paramStr;

        return "<a href='{$url}' ><i class='fa fa-sort-" . strtolower($order) . "'></i> {$label}</a>";
    }

    public static function getParamFields()
    {

        $output = "";

        if (Input::get("order")) {
            $output .= "<input type='hidden' value='" . Input::get("order") . "' name='order' />" . PHP_EOL;
        }

        if (Input::get("orderBy")) {
            $output .= "<input type='hidden' value='" . Input::get("orderBy") . "' name='orderBy' />" . PHP_EOL;
        }

        if (Input::get("page")) {
            $output .= "<input type='hidden' value='" . Input::get("page") . "' name='page' /'>" . PHP_EOL;
        }

        if (Input::get("q")) {
            $output .= "<input type='hidden' value='" . Input::get("q") . "' name='q' />" . PHP_EOL;
        }

        return $output;
    }
}