<?php

namespace SME\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Setting extends Model
{
    use SoftDeletes;

    protected $table = "settings";

    protected $fillable = [
        "ticket_price",
        "ticket_unavailable",
        "enquiry_email",
        "smtp_host",
        "smtp_user",
        "smtp_pass",
        "smtp_port",
        "encryption"
    ];

    protected $hidden = [];

    protected $casts = [
        "ticket_unavailable" => "array"
    ];
}