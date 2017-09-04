<?php

namespace SME\Http\Controllers\Supplier;
use Auth;
class DashboardController extends SupplierController
{
    public function __construct()
    {
        parent::__construct();
        $this->addMetaTitle("Dashboard");
        
    }

    public function index()
    {
        $this->data["supplier"] = Auth::supplier()->user();
        return $this->view("dashboard");
    }
}