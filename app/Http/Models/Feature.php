<?php

namespace SME\Http\Models;

use SME\Http\Models\BaseModel;

class Feature extends BaseModel
{
    protected $table = "features";
    protected $fillable = [
        "feature",
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