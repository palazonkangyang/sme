<?php

namespace SME\Http\Models;

use SME\Http\Models\BaseModel;

class BuyerPackage extends BaseModel
{
    protected $table = "buyer_packages";
    protected $fillable = [
        "buyer_id",
        "package_id",
        
    ];

   
}