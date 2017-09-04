<?php

namespace SME\Http\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;

class Admin extends BaseModel implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    protected $table = "admin_users";

    protected $fillable = [
        'first_name',
        "last_name",
        'email',
        'password',
        "status",
        "role"
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getName()
    {
        return ucwords($this->first_name . " " . $this->last_name);
    }

    public function getRole()
    {
        if ($this->role == 0) {
            return $this->getRoleTypes()[1];
        }

        return $this->getRoleTypes()[$this->role];
    }

    public function getStatuses()
    {
        return [
            1 => "Active",
            2 => "Inactive"
        ];
    }

    public function getRoleTypes()
    {
        return [
            1 => "Super Admin",
           
        ];
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
