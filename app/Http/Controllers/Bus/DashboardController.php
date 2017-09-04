<?php

namespace SME\Http\Controllers\Bus;

use SME\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return $this->view("bus.index");
    }

    public function updateLocation()
    {
        \Auth::bus()->user()->update([
            "lat" => \Input::get("latitude"),
            "long" => \Input::get("longitude")
        ]);

        return response()->json([
            "success" => true
        ]);
    }
}