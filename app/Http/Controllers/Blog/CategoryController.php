<?php

namespace SME\Http\Controllers\Blog;

use SME\Http\Controllers\Frontend\FrontendController;
use SME\Http\Models\Blog\Category;

class CategoryController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
        $this->addMetaTitle("Blog");
    }

    public function index()
    {
        $this->data["categories"] = Category::where("status", 1)
            ->orderBy("id", "desc")
            ->paginate(10);

        $this->addMetaTitle("Categories");
        return View("blog.category.index", $this->data);
    }
}