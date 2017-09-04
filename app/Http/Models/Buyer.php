<?php

namespace SME\Http\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;

class Buyer extends BaseModel implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = "buyers";
    protected $fillable = [
        "name",
        "company_name",
        "contact_person",
        "email",
        "password",
        "address",
        "postal_code",
        "contact_no",
        "user_photo",
        "category_id",
        'status',
        "brief_introduction",
        "package_id",
        "plan_expiration"
    ];

    protected $hidden = [
        "password",
        "remember_token"
    ];

    public function getStatus()
    {
        return $this->getStatuses()[$this->status];
    }

    public function allStatuses()
    {
        return [
            1 => "Active",
            2 => "Inactive"
        ];
    }
    public function allLocations()
    {
        return $this->locations()
            ->join("product_collection_locations as l", "l.id", "=", "buyer_locations.location_id")
            ->select(["buyer_locations.*", "l.name"]);
    }
    
}