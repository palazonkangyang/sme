<?php

namespace SME\Http\Controllers\Buyer;

use Auth;
use Illuminate\Http\Request;
use SME\Http\Models\SubscriptionPackage;
use SME\Http\Models\Feature;
use SME\Http\Models\ServiceCategory;
use SME\Http\Models\Post;
use SME\Http\Models\Blog;
use SME\Http\Models\PostAdv;
use SME\Http\Models\PostAdvImages;
use SME\Http\Models\WishLists;
use SME\Http\Models\Districts;
use SME\Http\Models\Buyer;
use Carbon\Carbon;
use Input;
use SME\Http\Models\Faq;
use SME\Http\Requests\Buyer\Post\StoreRequest;
use SME\Http\Requests\Buyer\Post\UpdateRequest;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DashboardController extends BuyerController
{
    public function __construct()
    {
        parent::__construct();
        $this->addMetaTitle("Dashboard");
    }

    public function index()
    {
        $this->data["buyer"] = Auth::buyer()->user();
        $this->data["supplier"] = Buyer::where('package_id','!=','4')->get()->all();
        $this->data["supplier_count"] = Buyer::where('package_id','!=','4')->count();
        $this->data["member_count"] = Buyer::where('status','=','1')->count();
        $this->data["posts_count"] = Post::count();
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

        foreach($this->data["category"]  as $sserv_cate)
        {
            $sum = PostAdv::where("category_id", $sserv_cate->id)->count();
            $sserv_cate->count =$sum;
        } 

        foreach($this->data["supplier"]  as $supp)
        {
            $sum_1 =Post::where("buyer_id", $supp->id)->count();
            $supp->count = $sum_1;
        }

        // get latest blog
        $this->data["latest_blogs"] = Blog::select("id", "blog_title", "blog_description", "category_id", "blog_image")
                                        ->orderBy('id', 'desc')->take(3)->get();

        foreach($this->data["latest_blogs"] as $blog)
        {
            $cat_name = ServiceCategory::where("id", $blog->category_id)->pluck('service_category');
            $blog->category_name = $cat_name;
        }

        // get districts
        $this->data["districts"] = Districts::all();

        foreach($this->data["districts"] as $district)
        {
            $sum = PostAdv::where("location", $district->id)->count();
            $district->count = $sum;
        }

        $this->data["posts"] = Post::orderby('created_at','desc')->take(3)->get();
        $this->data["categories"] = ServiceCategory::where("status", 1)->orderBy("service_category")
            ->lists("service_category", "id")
            ->prepend("Select a Category", "")
            ->toArray();
            
        return $this->view("index");
    }

    public function postSearchCategories()
    {
        $post_adv = new PostAdv;
        $this->data["postadv"] = $post_adv->searchPostAds(Input::except('_token'))->paginate(10);

        $result = $this->data["postadv"]->toArray();

        dd($result);

        $category_id = $result["data"][0]->category_id;

        $this->data["buyer"] = Auth::buyer()->user();
        
        $this->data["districts"] = Districts::orderBy('id', 'asc')->take(7)->get();
        $this->data["all_ads"] = PostAdv::where('category_id', '=', $category_id)->count();
        $this->data["category_name"] = ServiceCategory::where("id", "=", $category_id)->pluck('service_category');

        // get categories
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

        foreach($this->data["category"] as $sserv_cate)
        {
            $sum = PostAdv::where("category_id", $sserv_cate->id)->count();
            $sserv_cate->count =$sum;
        }

        // Get recent ads
        $this->data["recent_ads"] = PostAdv::orderBy('id', 'desc')->take(5)->get();

        return $this->view("adslist");

    }

     public function category($id)
    {
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["posts"] = Post::where('category_id','=',$id)->get()->all();

        return $this->view("category");
    }

     public function suppliers($id)
    {
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["posts"] = Post::where('buyer_id','=',$id)->get()->all();

        return $this->view("suppliers");
    }

    public function supplierpage()
    {
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["supplier"] = Buyer::where('package_id','!=','4')->get()->all();

        foreach($this->data["supplier"]  as $supp)
        {
            $sum_1 =Post::where("buyer_id", $supp->id)->count();
            $supp->count =$sum_1;
        }

        return $this->view("supplierpage");
    }

    public function categories()
    {
        $this->data["buyer"] = Auth::buyer()->user();
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        foreach($this->data["category"]  as $sserv_cate)
        {
            $sum = PostAdv::where("category_id", $sserv_cate->id)->count();
            $sserv_cate->count =$sum;
        }

        return $this->view("categories");
    }
    
     public function supp_categories()
    {
        $this->data["buyer"] = Auth::buyer()->user();
        $this->data["category"] = ServiceCategory::where("status", 1)->get();

        foreach($this->data["category"]  as $sserv_cate)
        {
            $sum = Buyer::where("category_id", $sserv_cate->id)->count();
            $sserv_cate->count = $sum;
        }

        return $this->view("supp_categories");
    }

    public function supp_adpage($id)
    {
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

        $this->data["posts"] = Post::where('posts.id','=',$id)->join("service_categories as pt", "category_id", "=", "pt.id")->select('posts.*','pt.service_category')->first();

        $this->data["buyer"] = Buyer::where('id','=',$this->data["posts"]->buyer_id)->first();

        return $this->view("supp_adpage");
    }

    public function adpage($id)
    {
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

        $this->data["posts"] = Post::where('posts.id','=',$id)->join("service_categories as pt", "category_id", "=", "pt.id")->select('posts.*','pt.service_category')->first();

        $this->data["buyer"] = Buyer::where('id','=',$this->data["posts"]->buyer_id)->first();

        return $this->view("adpage");
    }

    public function contact()
    {  
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["buyer"] = Auth::buyer()->user();

        return $this->view("contact");
    }

    public function faqs()
    {
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["buyer"] = Auth::buyer()->user();
        $this->data["faqs"] = Faq::where('status','=','1')->get()->all();

        return $this->view("faqs");
    }
    
    public function supplierlist($id)
    {
        $this->data["buyer"] = Auth::buyer()->user();
        $this->data["districts"] = Districts::orderBy('id', 'asc')->take(7)->get();
        $this->data["all_ads"] = Buyer::where('category_id', '=', $id)->count();
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["suppliers"] = Buyer::where('category_id', '=', $id)->paginate(10);
        $this->data["category_name"] = ServiceCategory::where("id", "=", $id)->pluck('service_category');

        foreach($this->data["suppliers"]  as $supplier)
        {
            $cat_name = ServiceCategory::where("id", "=", $id)->pluck('service_category');
            $supplier->category_name = $cat_name;
        }

        $this->data["recent_suppliers"] = Buyer::orderBy('id', 'desc')
                                            ->where('package_id', '!=', 0)
                                            ->take(5)->get();

        foreach($this->data["category"]  as $sserv_cate)
        {
            $sum = PostAdv::where("category_id", $sserv_cate->id)->count();
            $sserv_cate->count =$sum;
        } 

        return $this->view("supplierlist");
    }
    
    public function bloglist()
    {
        $this->data["buyer"] = Auth::buyer()->user();

        // Service Categories
        $this->data["category"] = ServiceCategory::select("id", "service_category")
                                        ->where("status", 1)->get();

        foreach($this->data["category"]  as $sserv_cate)
        {
            $sum = Blog::where("category_id", $sserv_cate->id)->count();
            $sserv_cate->count = $sum;
        }

        // get latest blog
        $this->data["latest_blogs"] = Blog::select("id", "blog_title", "category_id", "blog_image")
                                        ->orderBy('id', 'desc')->take(5)->get();

        foreach($this->data["latest_blogs"] as $blog)
        {
            $cat_name = ServiceCategory::where("id", $blog->category_id)->pluck('service_category');
            $blog->category_name = $cat_name;
        }

        // All Blog Lists
        $this->data["blogs"] = Blog::orderBy('id', 'desc')->paginate(10);


        // get blog lists by month & year
        $archive_blogs = Blog::latest();

        if($month = request('month'))
        {
           $archive_blogs->whereMonth('created_at', Carbon::parse($month)->month, null);

        }

        if($year = request('year'))
        {
            $archive_blogs->whereYear('created_at', $year, null);
        }
        
        // Archives
        $this->data["archives"] = PostAdv::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                                    ->groupBy('year', 'month')
                                    ->orderByRaw('min(created_at) desc')
                                    ->take(3)
                                    ->get();

        return $this->view("bloglist");
    }


    public function bloglistbyCategory($id)
    {
        // Service Categories
        $this->data["category"] = ServiceCategory::select("id", "service_category")
                                        ->where("status", 1)->get();

        foreach($this->data["category"]  as $sserv_cate)
        {
            $sum = Blog::where("category_id", $sserv_cate->id)->count();
            $sserv_cate->count = $sum;
        }

        // get blog by category
        $this->data["blogs"] = Blog::where('category_id', '=', $id)->paginate(10);

        // get blog name by category
        $this->data["category_name"] = ServiceCategory::where("id", "=", $id)->pluck('service_category');

        // get latest blog
        $this->data["latest_blogs"] = Blog::select("id", "blog_title", "category_id", "blog_image")
                                        ->orderBy('id', 'desc')->take(5)->get();

        foreach($this->data["latest_blogs"] as $blog)
        {
            $cat_name = ServiceCategory::where("id", $blog->category_id)->pluck('service_category');
            $blog->category_name = $cat_name;
        }        

        return $this->view("bloglistbycategory");
    }

    public function blogdetail($id)
    {
        $this->data["buyer"] = Auth::buyer()->user();
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["blog_title"] = Blog::where("id", "=", $id)->pluck('blog_title');

        // get latest blog
        $this->data["latest_blogs"] = Blog::select("id", "blog_title", "category_id", "blog_image")
                                        ->orderBy('id', 'desc')->take(5)->get();

        foreach($this->data["latest_blogs"] as $blog)
        {
            $cat_name = ServiceCategory::where("id", $blog->category_id)->pluck('service_category');
            $blog->category_name = $cat_name;
        }

        // Blog detail by id
        $this->data["blog"] = Blog::findOrFail($id);

        $category_id = $this->data["blog"]["id"];
        $cat_name = ServiceCategory::where("id", $category_id)->pluck('service_category');
        $this->data["blog"]["category_name"] = $cat_name;

        // Service Categories
        $this->data["category"] = ServiceCategory::select("id", "service_category")
                                        ->where("status", 1)->get();

        foreach($this->data["category"]  as $sserv_cate)
        {
            $sum = Blog::where("category_id", $sserv_cate->id)->count();
            $sserv_cate->count = $sum;
        }


        // Archives
        $this->data["archives"] = PostAdv::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                                    ->groupBy('year', 'month')
                                    ->orderByRaw('min(created_at) desc')
                                    ->take(3)
                                    ->get();

        return $this->view("blogdetail");
    }    
    
    public function adslist($id)
    {   
        $this->data["buyer"] = Auth::buyer()->user();
        
        $this->data["districts"] = Districts::orderBy('id', 'asc')->take(7)->get();
        $this->data["all_ads"] = PostAdv::where('category_id', '=', $id)->count();    
        $this->data["category_name"] = ServiceCategory::where("id", "=", $id)->pluck('service_category');

        // Get recent ads
        $this->data["recent_ads"] = PostAdv::orderBy('id', 'desc')->take(5)->get();

        foreach ($this->data["recent_ads"] as $recent_ad) 
        {
            $district_name = Districts::where("id", $recent_ad->location)->pluck('district_name');
            $recent_ad->district_name = $district_name;    
        }

        // get categories
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

        foreach($this->data["category"] as $sserv_cate)
        {
            $sum = PostAdv::where("category_id", $sserv_cate->id)->count();
            $sserv_cate->count =$sum;
        }

        // get post advs
        $this->data["postadv"] = PostAdv::where('category_id', '=', $id)->paginate(10);

        foreach($this->data["postadv"] as $post)
        {
            $cat_name = ServiceCategory::where("id", $post->category_id)->pluck('service_category');
            $post->category_name =$cat_name;
            $district_name = Districts::where("id", $post->location)->pluck('district_name');
            $post->district_name = $district_name;
            $post->published_date = $post["created_at"];
        }

        return $this->view("adslist");
    }
    
    
    public function adsdetail($id)
    {   
        // Post Adv
        $this->data["postadv"] = PostAdv::findOrFail($id);

        $category_id = $this->data["postadv"]["category_id"];

        $cat_name = ServiceCategory::where("id", $category_id)->pluck('service_category');
        $this->data["postadv"]["category_name"] = $cat_name;

        $location_id = $this->data["postadv"]->location;
        $this->data["postadv"]["district_name"] = Districts::where("id", $location_id)->pluck('district_name');
        
        $buyer_id = $this->data["postadv"]->buyer_id;
        $this->data["buyer"] = Buyer::where("id", "=", $buyer_id)->get()->first();               

        // Recent Ads
        $this->data["recent_ads"] = PostAdv::orderBy('id', 'desc')->take(5)->get();

        // Related Ads
        $related_category_id = $this->data["postadv"]["category_id"];

        $this->data["related_ads"] = PostAdv::where('id', '!=', $id)
                                            ->where('Category_id', '=', $related_category_id)
                                            ->orderBy('id', 'desc')->take(5)->get();

        foreach($this->data["related_ads"] as $ads)
        {
            $cat_name = ServiceCategory::where("id", $ads->related_category_id)->pluck('service_category');
            $ads->category_name =$cat_name;
            $ads->published_date = $ads["created_at"]->diffForHumans();
        }


        // Service Category 
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

        foreach($this->data["category"] as $sserv_cate)
        {
            $sum = Post::where("category_id", $sserv_cate->id)->count();
            $sserv_cate->count = $sum;
        }

        $this->data["post_title"] = PostAdv::where("id", "=", $id)->pluck('title');
        $this->data["post_adv_images"] = PostAdvImages::where("post_adv_id", "=", $id)->get()->all();

        $cat_id = $this->data["buyer"]["category_id"];

        $sum = PostAdv::where("buyer_id", "=", $this->data["buyer"]["id"])->count('buyer_id');
        $this->data["buyer"]["count"] = $sum;
        $this->data["buyer"]["category_name"] = ServiceCategory::where("id", "=", $cat_id)->pluck('service_category');

        return $this->view("adsdetail");
    }

    public function addwishlist($id)
    {
        $buyer = Auth::buyer()->user();

        $data = [
            "post_adv_id" => $id,
            "buyer_id" => $buyer->id
        ];

        WishLists::create($data);

        return redirect()->back()->with("alert", [
            "success" => TRUE,
            "message" => "This post has been successfully created as wishlist."
        ]);
    }
    
    public function supplierdetail()
    {
           
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
      
        return $this->view("supplierdetail");
    }
    

    public function posting()
    {
        
        $this->data["buyer"] = Auth::buyer()->user();
        $currentMonth = date('m');

        $this->data["posting"] = Post::where("buyer_id", $this->data["buyer"]->id)->whereRaw('MONTH(created_at) = ?',[$currentMonth])->count();
        $this->data["category"] = ServiceCategory::where("status", 1)->orderBy("service_category")
            ->lists("service_category", "id")
            ->prepend("Select a Category", "")
            ->toArray();

        return $this->view("posting");
    }

    public function postingsave(StoreRequest $request)
    {
        $values = $request->all();

        if ($request->hasFile("image")) {
           
            $file = $request->file("image");
            $destination_file = (md5(microtime()) . "." . $file->getClientOriginalExtension());
            $file->move(public_path("uploads/Posts/"), $destination_file);
            $values["image"] = $destination_file;
        }

        $post = Post::create($values);
        $this->data["post"] = $post;
        
        return redirect()->route("buyer.editposting", [$post->id])->with("alert", [
            "success" => TRUE,
            "message" => "Post has been successfully created."
        ]);
        
    }

     public function editposting($id)
    {
        $this->data["buyer"] = Auth::buyer()->user();
        $this->data["post"] = Post::findOrFail($id);

        $this->data["category"] = ServiceCategory::where("status", 1)->orderBy("service_category")
            ->lists("service_category", "id")
            ->prepend("Select a Category", "")
            ->toArray();
        
        return $this->view("editposting");
    }

    public function updateposting(UpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $values = $request->all();

        if ($request->hasFile("image")) {

            if (!empty($service_category->image)) {
                @unlink(public_path("uploads/Posts/{$post->image}"));
            }

            $file = $request->file("image");
            $destination_file = (md5(microtime()) . "." . $file->getClientOriginalExtension());
            $file->move(public_path("uploads/Posts/"), $destination_file);
            $values["image"] = $destination_file;
        }

        $post->update($values);

        return redirect()->route("buyer.editposting", [$post->id])->with("alert", [
            "success" => TRUE,
            "message" => "Post has been successfully updated."
        ]);
    }

    public function about()
    {  
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["buyer"] = Auth::buyer()->user();

        $this->data["items"] = SubscriptionPackage::where('status','=','1')->where('subscription_price','!=','0.00')->orderby('subscription_price','asc')->get()->all();

        $this->data["supplier_count"] = Buyer::where('package_id','!=','4')->count();
        $this->data["member_count"] = Buyer::where('status','=','1')->count();
        $this->data["posts_count"] = Post::count();

        foreach($this->data["items"] as  $item)
          {
            $item->options = explode(",",$item->options);
            $array_options =[];
            
                foreach($item->options as $key => $option)
                {
                    $feature= Feature::where('id','=',$option)->first();

                    $array_options = array_add($array_options,$key,$feature->feature);
                }
                $options =implode(', ', $array_options);

                $item->options = $array_options;
           
              
          }
          
        return $this->view("about");
    }
}