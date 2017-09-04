<?php

namespace SME\Http\Models;

use SME\Http\Models\BaseModel;

class AdvFeature extends BaseModel
{
    protected $table = "adv_features";
    protected $fillable = [
        "adv_feature",
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