<?php

namespace SME\Http\Models;

use SME\Http\Models\BaseModel;

class Post extends BaseModel
{
    protected $table = "posts";
    protected $fillable = [
        "title",
        "description",
        "image",
        "link",
        "category_id",
        "tags",
        "buyer_id",
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