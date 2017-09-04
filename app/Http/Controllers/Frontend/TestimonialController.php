<?php

namespace SME\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use SME\Http\Models\Masters\Country;
use SME\Http\Models\Testimonial;
use SME\Http\Requests;
use SME\Http\Requests\Frontend\Testimonial\CreateRequest;


class TestimonialController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->addData([
            "page_title" => "Testimonials",
            "page_sub_title" => "",
            "button" => FALSE
        ]);

        $this->data["testimonials"] = Testimonial::where("status", 1)->orderBy("rating", "desc")->get();

        $this->data["countries"] = Country::where("status", 1)
            ->orderBy("name")
            ->lists("name", "id")
            ->prepend("Select Country", "")
            ->toArray();

        return $this->view("template.testimonial");
    }

    public function create()
    {

    }

    public function store(CreateRequest $request)
    {
        $values = $request->all();

        if ($request->hasFile("author_image")) {
            $file = $request->file("author_image");
            $destination_file = (md5(microtime()) . "." . $file->getClientOriginalExtension());
            $file->move(public_path("uploads/testimonial/"), $destination_file);
            $values["author_image"] = $destination_file;
        }

        Testimonial::create($values);
        return redirect()->route("frontend.testimonial")->with("info", "Your testimonial has been successfully submitted. Thank you!");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
