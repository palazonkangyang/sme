<?php

namespace SME\Http\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;
use DB;

class PostAdv extends BaseModel implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = "post_adv";
    protected $fillable = [
        "title",
        'description',
        'image',
        'category_id',
        'buyer_id',
        'location',
        'email',
        'phone',
        'published_on',
        'views'
    ];

    // search wish lists
    // public function searchPostAds($input)
    // {
    //     $postadv = DB::table('post_adv');
    //     $postadv->select(
    //         'post_adv.id',
    //         'post_adv.title',
    //         'post_adv.description',
    //         'post_adv.image',
    //         'post_adv.category_id',
    //         'post_adv.published_on',
    //         'service_categories.service_category'
    //     );
    //     $postadv->join('service_categories', 'post_adv.category_id', '=', 'service_categories.id');

    //     if (\Input::get("search_postadv")) {
    //         $postadv->where('title', 'like', '%' . \Input::get('search_postadv') . '%');
    //     }

    //     return $postadv;
    // }

    public function searchPostAds($input)
    {
        $postadv = DB::table('post_adv');
        $postadv->select(
            'post_adv.id',
            'post_adv.title',
            'post_adv.description',
            'post_adv.image',
            'post_adv.category_id',
            'post_adv.published_on',
            'post_adv.location',
            'post_adv.created_at as published_date',
            'districts.district_name',
            'service_categories.service_category as category_name'
        );

        $postadv->join('service_categories', 'post_adv.category_id', '=', 'service_categories.id');
        $postadv->join('districts', 'post_adv.location', '=', 'districts.id');

        if (\Input::get("search")) {
            $postadv->where('title', 'like', '%' . \Input::get('search') . '%');
        }

        if (\Input::get("category_id") && \Input::get("category_id") != "all") {
            $postadv->where('post_adv.category_id', $input['category_id']);
        }

        return $postadv;

    }
    
}