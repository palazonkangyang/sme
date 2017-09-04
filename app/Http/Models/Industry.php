<?php

namespace SME\Http\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;

class Industry extends BaseModel implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = "industries";
    protected $fillable = [
        "industry",
            "image",
            "status",
            
    ];

    public function getFeaturedImageURL($width = 100, $height = 100, $options = ["crop"])
    {
        if (!empty($this->image)) {
            return \Image::url("sme/public/uploads/Industries/{$this->image}", $width, $height, $options);
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