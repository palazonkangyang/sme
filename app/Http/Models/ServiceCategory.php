<?php

namespace SME\Http\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;

class ServiceCategory extends BaseModel implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = "service_categories";
    protected $fillable = [
        "service_category",
            "image",
            'parent_id',
            'status',
    ];

    public function getFeaturedImageURL($width = 100, $height = 100, $options = ["crop"])
    {
        if (!empty($this->image)) {
            return \Image::url("sme/public/uploads/Service_Categories/{$this->image}", $width, $height, $options);
        }
    }
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
}