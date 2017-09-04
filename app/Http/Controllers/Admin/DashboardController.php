<?php

namespace SME\Http\Controllers\Admin;

use Carbon\Carbon;
use SME\Http\Models\Buyer;
use SME\Http\Models\Supplier;
use SME\Http\Models\Admin;

class DashboardController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getIndex()
    {
        $this->addMetaTitle("Dashboard");
        $this->setPageTitle("Dashboard");
        $this->setPageSubTitle("Control Panel");
        /* Total Buyers */
        $buyer = Buyer::get()->count();
        $this->data["buyer"] = $buyer;
        /* Total Suppliers */
        $supplier = Supplier::get()->count();
        $this->data["supplier"] = $supplier;
         /* Total Admin Users */
        $admin = Admin::get()->count();
        $this->data["admin"] = $admin;
        return $this->View("dashboard");
    }
}