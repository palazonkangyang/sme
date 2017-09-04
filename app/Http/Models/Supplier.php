<?php

namespace SME\Http\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;

class Supplier extends BaseModel implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = "suppliers";
    protected $fillable = [
        "company_name",
        "contact_person",
        "email",
        "password",
        "address",
        "postal_code",
        "contact_no",
        'featured',
        'status',
        "spe_ticket_price",
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
    public function allFeatures()
    {
        return [
            1 => "Not Featured",
            2 => "Featured"
        ];
    }
    public function allLocations()
    {
        return $this->locations()
            ->join("product_collection_locations as l", "l.id", "=", "supplier_locations.location_id")
            ->select(["supplier_locations.*", "l.name"]);
    }
}