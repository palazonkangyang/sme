<?php

namespace SME\Http\Models;

use SME\Http\Models\BaseModel;

class Faq extends BaseModel
{
    protected $table = "faqs";
    protected $fillable = [
        "question",
        "description",
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