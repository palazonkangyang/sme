<?php

namespace SME\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class BaseModel extends Model
{
    use SoftDeletes;

    public function getCreatedAtFormatted($format = "F jS, Y h:i A")
    {
        return $this->created_at->format($format);
    }

    public function getUpdatedAtFormatted($format = "F jS, Y h:i A")
    {
        return $this->updated_at->format($format);
    }

    public function scopeActive($query)
    {
        return $query->where("status", 1);
    }
}
