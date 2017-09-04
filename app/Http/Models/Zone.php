<?php

namespace SME\Http\Models;

use SME\Http\Models\BaseModel;

class Zone extends BaseModel
{
    protected $table = "zones";
    protected $fillable = [
        "zone",
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