<?php

namespace SME\Http\Models;

use SME\Http\Models\BaseModel;

class Banner extends BaseModel
{
    protected $table = "advertising_banners";
    protected $fillable = [
        "period",
        "image",
        "status",
        "banner_name"
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

    public function getFeaturedImageURL($width = 100, $height = 100, $options = ["crop"])
    {
        if (!empty($this->image)) {
            return \Image::url("sme/public/uploads/Advertising_Banners/{$this->image}", $width, $height, $options);
        }
    }

}