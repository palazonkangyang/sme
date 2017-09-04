<?php

namespace SME\Http\Controllers\Blog;

use SME\Http\Controllers\Frontend\FrontendController;
use SME\Http\Models\Blog\Category;
use SME\Http\Models\Blog\Post;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
        $this->addMetaTitle("Products");


    }

    public function index($category = NULL)
    {
//        $this->data["category"] = Category::where("slug", $category)
//            ->where("status", 1)
//            ->first();
//
//        if (!$this->data["category"]) {
//            throw new NotFoundHttpException("Category Not Found");
//        }

//        $this->addMetaTitle($this->data["category"]->name);

        $this->data["posts"] = Post::orderBy("id", "desc")
            ->where("status", 1)
            ->paginate(10);

        $this->addData([
            "page_title" => "Products",
            "page_sub_title" => "",
            "button" => NULL,
        ]);

        return View("blog.post.all", $this->data);
    }

    public function getPost($post_slug)
    {
//        $this->data["post"] = Post::where("status", 1)
//            ->where("slug", $post_slug)
//            ->whereHas("category", function ($query) use ($category_slug) {
//                $query->where("slug", $category_slug);
//            })->first();

        $this->data["post"] = Post::where("status", 1)
            ->where("slug", $post_slug)->first();

        if (!$this->data["post"]) {
            throw new NotFoundHttpException("Post Not Found");
        }

        $this->addMetaTitle($this->data["post"]->name);

        $this->addData([
            "page_title" => $this->data["post"]->name,
            "page_sub_title" => "",
            "button" => NULL,
            "meta_keywords" => $this->data["post"]->meta_keywords,
            "meta_description" => $this->data["post"]->meta_description
        ]);

        return View("blog.post.index", $this->data);
    }
}