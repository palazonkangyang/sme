<?php

namespace SME\Http\Models;

use SME\Http\Models\BaseModel;

class Country extends BaseModel
{
    protected $table = "countries";
    protected $fillable = [
        "country_name",
        "country_code",
        "zone_id",
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