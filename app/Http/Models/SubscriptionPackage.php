<?php

namespace SME\Http\Models;

use SME\Http\Models\BaseModel;

class SubscriptionPackage extends BaseModel
{
    protected $table = "subscription_packages";
    protected $fillable = [
        "subscription_package",
        "subscription_price",
        "options",
        "status"
    ];

    public function allStatuses()
    {
        return [
            1 => "Active",
            2 => "Inactive"
        ];
    }
     public function getStatus()
    {
        return $this->getStatuses()[$this->status];
    }

}