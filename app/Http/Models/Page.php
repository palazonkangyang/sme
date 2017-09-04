<?php

namespace SME\Http\Models;

class Page extends BaseModel
{
    protected $table = "pages";
    protected $fillable = [
        "name",
        "slug",
        "content",
        "template",
        "banner_title",
        "banner_sub_title",
        "banner_button_url",
        "banner_image",
        "meta_title",
        "meta_description",
        "meta_keywords",
        "status"
    ];

    public function allStatuses()
    {
        return [
            1 => "Active",
            2 => "Inactive"
        ];
    }

    public function pageTemplates()
    {
        return [
            "default" => "Default",
            "home" => "Home",
            "about" => "About",
            "contact" => "Contact",
            "food" => "Food",
            "gallery" => "Photo Gallery",
            "location" => "Location",
            "ticketing" => "Ticketing",
            "testimonial" => "Testimonial"
        ];
    }

    public function getBannerURL()
    {
        if (!empty($this->banner_image)) {
            return url("uploads/banner/{$this->banner_image}");
        }
    }
}