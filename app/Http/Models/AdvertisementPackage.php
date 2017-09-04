<?php

namespace SME\Http\Models;

use SME\Http\Models\BaseModel;

class AdvertisementPackage extends BaseModel
{
    protected $table = "advertisement_packages";
    protected $fillable = [
        "advertisement_package",
        "advertisement_price",
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