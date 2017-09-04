<?php

namespace SME\Http\Controllers\Frontend;

use Input;
use SME\Http\Models\BusStop;
use SME\Http\Models\FoodStore;
use SME\Http\Models\Page;
use SME\Http\Models\Food;
use SME\Http\Models\FoodType;
use SME\Http\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

use SME\Http\Models\PhotoGallery;
use SME\Http\Models\Product;
use SME\Http\Models\Masters\Bundle;
use SME\Http\Models\Masters\Country;
use SME\Http\Models\Testimonial;

class PageController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getHome()
    {
        return $this->View("template.index");
    }

    public function getLoadPage(Request $request)
    {
        $slug = $request->route()->parameter("slug") ?: "/";

        $this->data["page"] = Page::where([
            "status" => 1,
            "slug" => $slug
        ])->firstOrFail();

        $this->addData([
            "page_title" => $this->data["page"]->banner_title,
            "page_sub_title" => $this->data["page"]->banner_sub_title,
            "button" => $this->data["page"]->banner_button_url,
            "bannerUrl" => $this->data["page"]->getBannerURL(),
            "page_content" => $this->compileContent($this->data["page"]->content),
            "meta_keywords" => $this->data["page"]->meta_keywords,
            "meta_description" => $this->data["page"]->meta_description
        ]);

        $this->addMetaTitle($this->data["page"]->meta_title);

        if (method_exists($this, "dependency" . ucfirst($this->data["page"]->template))) {
            call_user_func_array([$this, "dependency" . ucfirst($this->data["page"]->template)], []);
        }

        return $this->view("template." . $this->data["page"]->template);
    }

    private function compileContent($content)
    {
        $generated = Blade::compileString($content);

        ob_start();
        try {
            eval('?>' . $generated);
        } catch (\Exception $e) {
            ob_get_clean();
            throw $e;
        }

        $content = ob_get_clean();
        return $content;
    }

    private function dependencyLocation()
    {
        $this->data["bus_stops"] = BusStop::active()->get();
        $this->data["food_stores"] = FoodStore::active()->get();

    }

    private function dependencyTicketing()
    {
        $this->data["products"] = Product::where("status", 1)->orderBy("name")
            ->lists("name", "id")
            ->prepend("Select Product", "")
            ->toArray();

        $this->data["countries"] = Country::where("status", 1)
            ->orderBy("name")
            ->lists("name", "id")
            ->prepend("Select Country", "")
            ->toArray();

        /* Load all Bundles - Added for Bundles*/
        $this->data["bundles"] = Bundle::where("status", 1)->orderBy("name")
            ->lists("name", "id")
            ->prepend("Select Bundle", "")
            ->toArray();
            /*Added for Bundles*/
    }

    public function dependencyGallery()
    {
        $this->data["gallery_images"] = PhotoGallery::orderBy("id", "desc")->where("status", 1)->get();

        $url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=3290424021.2b1974f.042c428ffade4791a7fafa6be9948bb6&count=8";
        //$url = "https://api.instagram.com/v1/tags/cats/media/recent?access_token=3290424021.2b1974f.042c428ffade4791a7fafa6be9948bb6&max_tag_id=123";

        $json = file_get_contents($url);
        $this->data["instagram_feeds"] = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);
    }

    public function dependencyAbout()
    {
        $this->data["locations"] = Location::where("status", 1)->get();
    }


    public function dependencyTestimonial()
    {
        $this->data["countries"] = Country::where("status", 1)
            ->orderBy("name")
            ->lists("name", "id")
            ->prepend("Select Country", "")
            ->toArray();

        $this->data["testimonials"] = Testimonial::where("status", 1)->orderBy("rating", "desc")->get();
    }

    public function dependencyFood()
    {
        $this->data["food_types"] = FoodType::where("status", 1)
            ->orderBy("name")
            ->lists("name", "id")
            ->prepend("Food Type", "")
            ->toArray();

        $this->data["locations"] = Location::where("status", 1)
            ->orderBy("title")
            ->lists("title", "id")
            ->prepend("Location", "")
            ->toArray();

        $this->data["foods"] = Food::where(function ($query) {

            $query->where("status", 1);

            if (!empty(Input::get("location"))) {
                $query->whereHas("locations", function ($query) {
                    $query->where("location_id", Input::get("location"));
                });
            }

            if (!empty(Input::get("food_type"))) {
                $query->where("food_type", Input::get("food_type"));
            }
        })->where(function ($query) {

            $q = Input::get("q");

            if (Input::get("q")) {
                $query->where("name", "LIKE", "%$q%");
                $query->orWhere("description", "LIKE", "%$q%");
            }
        })
            ->orderBy("id", "desc")
            ->paginate(12);
    }

    public function dependencyHome()
    {
        $this->data["foods"] = Food::where("status", 1)
            ->orderBy("id", "desc")->get();
    }
}
