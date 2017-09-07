<?php

namespace SME\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Mail\Message;
use SME\Http\Models\Buyer;
use SME\Http\Models\Faq;
use SME\Http\Models\Post;
use SME\Http\Models\Blog;
use SME\Http\Models\PostAdv;
use SME\Http\Models\PostAdvImages;
use SME\Http\Models\WishLists;
use SME\Http\Models\Feature;
use SME\Http\Controllers\Buyer\BuyerController;
use SME\Http\Models\SubscriptionPackage;
use SME\Http\Models\ServiceCategory;
use SME\Http\Models\BuyerPackage;
use SME\Http\Models\Districts;
use SME\Http\Requests\Buyer\Auth\ChangePasswordRequest;
use SME\Http\Requests\Buyer\Auth\StoreRequest;
use SME\Http\Requests\Buyer\Profile\UpdateRequest;
use SME\Http\Requests\Buyer\Profile\StoresRequest;
use SME\Http\Requests\Buyer\Post\CreateRequest;
use Password;
use Mail;
use File;
use Input;
use Carbon\Carbon;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AuthController extends BuyerController
{
    public function __construct()
    {
        parent::__construct();
        $this->addMetaTitle("Auth");
    }

    public function getLogin()
    {
         $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->addMetaTitle("Login");
        return parent::View("login");
    }

    public function index()
    {
        $this->data["supplier"] = Buyer::where('package_id','!=','4')->get()->all();
        $this->data["supplier_count"] = Buyer::where('package_id','!=','4')->count();
        $this->data["member_count"] = Buyer::where('status','=','1')->count();
        $this->data["posts_count"] = Post::count();
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

        foreach($this->data["category"]  as $sserv_cate)
        {
            $sum =Post::where("category_id", $sserv_cate->id)->count();
            $sserv_cate->count =$sum;
        }
        foreach($this->data["supplier"]  as $supp)
        {
            $sum_1 =Post::where("buyer_id", $supp->id)->count();
            $supp->count =$sum_1;
        }

        $this->data["posts"] = Post::orderby('created_at','desc')->take(3)->get();
        $this->data["categories"] = ServiceCategory::where("status", 1)->orderBy("service_category")
            ->lists("service_category", "id")
            ->prepend("Select a Category", "")
            ->toArray();
        return $this->view("auth.index");
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required|min:6"
        ]);
        $values = Buyer::where("email","=",$request->email)->first();
        if (Auth::buyer()->attempt(array_merge($request->only(["email", "password"], ["status" => 1])), $request->input("remember_token"))) {


                return redirect()->route("buyer.index");

        } else {
            return redirect()->route("buyer.login")
                ->with("loginError", "Invalid login credentials. Please try again")
                ->withInput($request->all());
        }
    }

    public function register()
    {
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->addMetaTitle("Login");
        return parent::View("register");

    }

    public function register_action(StoreRequest $request)
    {

        $values = $request->only([
            "name",
            "password",
            "email",

        ]);

        $values["password"] = bcrypt($values["password"]);
        $values["status"] = '1';
        $buyer = Buyer::create($values);
        $this->data["buyer"] = $buyer;


        Mail::send("email.admin.buyer.credentials", $this->data, function ($message) use ($buyer) {
            $message->from("info@SME.com", "SME Consultant Hub")->subject("Account credentials for Buyer")->to($buyer->email);
        });

        return redirect()->route("buyer.login")->with("alert", [
            "success" => TRUE,
            "message" => "Buyer has been successfully created."
        ]);

    }
    public function getForgetPassword()
    {
         $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        return parent::View("auth.password.forget");
    }

    public function postForgetPassword(Request $request)
    {
        $response = Password::buyer()->sendResetLink($request->only('email'), function (Message $message) {
            $message->subject("Change Password");
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect()->back()->with('status', trans($response));
            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }

    public function getResetPassword(Request $request, $type, $token)
    {
         $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["token"] = $token;
        return parent::View("auth.password.reset");
    }

    public function postResetPassword(Request $request, $type, $token)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:5',
            "password_confirmation" => "required"
        ]);

        $credentials = $request->only(
            'email', 'password', 'password_confirmation'
        );

        $credentials["token"] = $token;

        $response = Password::buyer()->reset($credentials, function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();

            Auth::buyer()->login($user);
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                return redirect()->route("index")->with('status', trans($response));
            default:
                return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
        }
    }


    public function getLogout()
    {
        Auth::buyer()->logout();
        return redirect()->route("buyer.login");
    }


    public function getProfile()
    {
        $this->setPageTitle("My Profile");
        $this->setPageSubTitle("");
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["buyer"] = Auth::buyer()->user();
        return $this->view("auth.profile.index");
    }

    public function getSupplierProfile($id)
    {
        $this->data["buyer"] = Auth::buyer()->user();

        $this->data["supplier"] = Buyer::findOrFail($id);

        $category_id = $this->data["supplier"]["category_id"];
        $cat_name = ServiceCategory::where("id", $category_id)->pluck('service_category');
        $this->data["supplier"]["category_name"] = $cat_name;

        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

        return $this->view("supplierprofile");
    }


    public function getPackage()
    {

        $this->setPageTitle("My Packages");
        $this->setPageSubTitle("");
         $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["buyer"] = SubscriptionPackage::all();

        return $this->view("auth.package.edit");
    }

    public function getEditProfile()
    {
        $buyer = Auth::buyer()->user();

        // Lists of Count
        $this->data['my_ads'] = PostAdv::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_wishlists'] = WishLists::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_archives'] = PostAdv::onlyTrashed()->where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_blog'] = Blog::where('user_id', $buyer->id)->count('user_id');

        $this->setPageTitle("Edit Profile");
        $this->setPageSubTitle("My Profile");

        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["buyer"] = Auth::buyer()->user();

        $package_id = $this->data["buyer"]["package_id"];

        $this->data["packages"] = SubscriptionPackage::where('status','=','1')
                    ->where('subscription_price','!=','0.00')
                    ->where('id', '!=', $package_id)
                    ->orderby('subscription_price','asc')->get()->all();

        $this->data["buyerpackages"] = BuyerPackage::orderby('updated_at','desc')->first();

        $this->data['current_plan'] = SubscriptionPackage::where('id', '=', $package_id)->get()->all();


        return $this->view("auth.profile.edit");
    }


    public function getActiveProfile()
    {
        $this->data["buyer"] = Auth::buyer()->user();

        $buyer = Auth::buyer()->user();

        // Lists of Count
        $this->data['my_ads'] = PostAdv::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_wishlists'] = WishLists::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_archives'] = PostAdv::onlyTrashed()->where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_blog'] = Blog::where('user_id', $buyer->id)->count('user_id');

        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["postad"] = PostAdv::where('buyer_id', '=', $buyer->id)->paginate(10);

        foreach($this->data["postad"] as $post)
        {
            $cat_name = ServiceCategory::where("id", $post->category_id)->pluck('service_category');
            $post->category_name = $cat_name;
            $post->districts = Districts::where('id',$post->location)->pluck('district_name');
            $post->published_date = $post["created_at"]->diffForHumans();
        }


        return $this->view('auth.profile.active');
    }

    public function getWishlistProfile()
    {
        $postadv = new PostAdv;
        $results = $postadv->searchPostAds(Input::except('_token'))->paginate(10);

        // dd($results->toArray());

        $this->data["buyer"] = Auth::buyer()->user();

        $buyer = Auth::buyer()->user();

        // Lists of Count
        $this->data['my_ads'] = PostAdv::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_wishlists'] = WishLists::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_archives'] = PostAdv::onlyTrashed()->where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_blog'] = Blog::where('user_id', $buyer->id)->count('user_id');

        $this->setPageTitle("Wish List Ads");
        $this->setPageSubTitle("Wish Listing");

        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

        $this->data["wishlists"] = WishLists::select("post_adv.*", "wishlists.id as wishlist_id")
        ->leftJoin("post_adv", "post_adv.id", "=", "wishlists.post_adv_id")
        ->where("wishlists.buyer_id", "=", $buyer->id)
        ->paginate(7);

        foreach($this->data["wishlists"] as $wishlist)
        {
            $cat_name = ServiceCategory::where("id", $wishlist->category_id)->pluck('service_category');
            $wishlist->category_name = $cat_name;
            $wishlist->published_date = $wishlist["created_at"]->diffForHumans();
        }

        return $this->view("auth.profile.wishlist");
    }


    public function deleteWishlist($id)
    {
        $wishlist = WishLists::findOrFail($id);

        $wishlist->delete();

        return redirect()->back()->with("alert", [
            "success" => TRUE,
            "message" => "Wish List has been successfully deleted."
        ]);
    }


    public function getArchieveProfile()
    {
        $this->data["buyer"] = Auth::buyer()->user();

        $buyer = Auth::buyer()->user();

        // Lists of Count
        $this->data['my_ads'] = PostAdv::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_wishlists'] = WishLists::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_archives'] = PostAdv::onlyTrashed()->where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_blog'] = Blog::where('user_id', $buyer->id)->count('user_id');

        $this->setPageTitle("Archieve Ads");
        $this->setPageSubTitle("Archieve Ads Listing");

        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

        $this->data["archives"] = PostAdv::onlyTrashed()
                                    ->where("buyer_id", "=", $buyer->id)
                                    ->get();

        foreach($this->data["archives"] as $archive)
        {
            $cat_name = ServiceCategory::where("id", $archive->category_id)->pluck('service_category');
            $archive->category_name = $cat_name;
            $archive->published_date = $archive["created_at"]->diffForHumans();
        }

        return $this->view("auth.profile.archieve");
    }

    public function getBlog()
    {
        $this->data["buyer"] = Auth::buyer()->user();

        $buyer = Auth::buyer()->user();

        // Lists of Count
        $this->data['my_ads'] = PostAdv::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_wishlists'] = WishLists::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_archives'] = PostAdv::onlyTrashed()->where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_blog'] = Blog::where('user_id', $buyer->id)->count('user_id');

        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

        $this->data["blogs"] = Blog::where("user_id", "=", $buyer->id)
                                    ->orderby('created_at','desc')
                                    ->paginate(7);

        foreach($this->data["blogs"] as $blog)
        {
            $cat_name = ServiceCategory::where("id", $blog->category_id)->pluck('service_category');
            $blog->category_name = $cat_name;
            $blog->published_date = $blog["created_at"]->diffForHumans();
        }

        return $this->view("auth.profile.blog");
    }

    public function getAddBlog()
    {
        $buyer = Auth::buyer()->user();

        // Lists of Count
        $this->data['my_ads'] = PostAdv::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_wishlists'] = WishLists::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_archives'] = PostAdv::onlyTrashed()->where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_blog'] = Blog::where('user_id', $buyer->id)->count('user_id');

        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

        return $this->view("auth.profile.addblog");
    }

    public function postBlog(Request $request)
    {
        $blog_image_name = "";
        $buyer = Auth::buyer()->user();

        $values = $request->all();

        if (isset($values['blog_image']) && $values['blog_image']) {

            $blog_image_name = $request->blog_image->getClientOriginalName();

            //moving the file to its designated path
            $request->blog_image->move(public_path("uploads/blog"), $blog_image_name);
        }

        $data = [
            "blog_title" => $values['blog_title'],
            "category_id" => $values['category_id'],
            "user_id" => $buyer->id,
            "blog_description" => $values['blog_description'],
            "blog_image" => $blog_image_name,
        ];

        Blog::create($data);

        return redirect()->back()->with("alert", [
            "success" => TRUE,
            "message" => "Blog has been successfully created."
        ]);

    }


    public function reactiveArchieve($id)
    {

        $postadv = PostAdv::onlyTrashed()
                        ->findOrFail($id);

        $postadv->restore();

        return redirect()->back()->with("alert", [
            "success" => TRUE,
            "message" => "Post Adv has been successfully reactived."
        ]);
    }


    public function deleteArchieve($id)
    {
        $postadv = PostAdv::onlyTrashed()
                        ->findOrFail($id);

        $postadv->forceDelete();

        return redirect()->back()->with("alert", [
            "success" => TRUE,
            "message" => "Post Adv has been successfully deleted."
        ]);
    }

    public function getAddPostAd()
    {
        $this->data["buyer"] = Auth::buyer()->user();

        $buyer = Auth::buyer()->user();

        // Lists of Count
        $this->data['my_ads'] = PostAdv::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_wishlists'] = WishLists::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_archives'] = WishLists::onlyTrashed()->where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_blog'] = Blog::where('user_id', $buyer->id)->count('user_id');

        $this->setPageTitle("Post Ads");
        $this->setPageSubTitle("Archieve Ads Listing");
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["location"] = Districts::get()->all();

        return $this->view("auth.profile.postad");
    }


    public function postPostAd(Request $request)
    {
        $this->validate($request, [
            "title" => "required|max:255",
            "category_id" => "required",
            "email" => "email",
            "location_id" => "required",
            "image" => "required",
        ]);

        $image_name = "";
        $buyer = Auth::buyer()->user();

        $values = $request->all();

        if (isset($values['image']) && $values['image']) {

            $image_name = $request->image->getClientOriginalName();


            //moving the file to its designated path
            $request->image->move(public_path("uploads/postadv"), $image_name);
        }

        $data = [
            "title" => $values['title'],
            "description" => $values['description'],
            "category_id" => $values['category_id'],
            "buyer_id" => $buyer->id,
            "location" => $values['location_id'],
            "email" => $values['email'],
            "phone" => $values['phone'],
            "image" => $image_name,
            "published_on" => Carbon::today()->format('Y-m-d')
        ];

        $post_adv = PostAdv::create($data);

        $post_adv_id = $post_adv->id;

        if($post_adv)
        {
            if(!empty($values['fileurl']))
            {
                foreach ($values['fileurl'] as $key => $file) {

                    //move the file to final folder
                    $old_path = 'uploads/tmp/' . $file;
                    $new_path = 'uploads/final/' . $file;

                    $upload_success = File::move($old_path, $new_path);

                    if($upload_success) {
                        $input = [
                            'image_type' => $values['mimetype'][$key],
                            'image_name' => $values['filename'][$key],
                            'file_url' => $file,
                            'post_adv_id' => $post_adv_id
                        ];

                        PostAdvImages::create($input);
                    }
                }
            }
        }

        return redirect()->back()->with("alert", [
            "success" => TRUE,
            "message" => "Post Adv has been successfully created."
        ]);
    }


    public function getEditPostAd($id)
    {
        $this->data["buyer"] = Auth::buyer()->user();

        $buyer = Auth::buyer()->user();

        // Lists of Count
        $this->data['my_ads'] = PostAdv::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_wishlists'] = WishLists::where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_archives'] = PostAdv::onlyTrashed()->where('buyer_id', '=', $buyer->id)->count('buyer_id');
        $this->data['my_blog'] = Blog::where('user_id', $buyer->id)->count('user_id');

        $this->setPageTitle("Post Ads");
        $this->setPageSubTitle("Archieve Ads Listing");
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["location"] = Districts::get()->all();

        $this->data["postadv"] = PostAdv::findOrFail($id)->toArray();

        return $this->view("auth.profile.editpostadv");
    }


    public function postEditPostAd(Request $request, $id)
    {
        $this->validate($request, [
            "title" => "required|max:255",
            "category_id" => "required",
            "email" => "email",
            "location" => "required",
        ]);

        $image_name = "";
        $post = PostAdv::findOrFail($id);
        $buyer = Auth::buyer()->user();

        $values = $request->all();

        if (isset($values['image']) && $values['image']) {

            $image_name = $request->image->getClientOriginalName();

            //moving the file to its designated path
            $request->image->move(public_path("uploads/postadv"), $image_name);
        }

        $data = [
            "title" => $values['title'],
            "description" => $values['description'],
            "category_id" => $values['category_id'],
            "buyer_id" => $buyer->id,
            "location" => $values['location'],
            "email" => $values['email'],
            "phone" => $values['phone'],
            "image" => ( $image_name == "" ? $post['image'] : $image_name ),
            "published_on" => Carbon::today()->format('Y-m-d')
        ];

        $post->update($data);

        $post_adv_images = PostAdvImages::where("post_adv_id", "=", $id);

        if(isset($post_adv_images))
        {
            $result = $post_adv_images->delete();

            if(!empty($values['fileurl']))
            {
                foreach ($values['fileurl'] as $key => $file) {

                    //move the file to final folder
                    $old_path = 'uploads/tmp/' . $file;
                    $new_path = 'uploads/final/' . $file;

                    $upload_success = File::move($old_path, $new_path);

                    if($upload_success) {
                        $input = [
                            'image_type' => $values['mimetype'][$key],
                            'image_name' => $values['filename'][$key],
                            'file_url' => $file,
                            'post_adv_id' => $id
                        ];

                        PostAdvImages::create($input);
                    }
                }
            }
        }

        else
        {
            if(!empty($values['fileurl']))
            {
                foreach ($values['fileurl'] as $key => $file) {

                    //move the file to final folder
                    $old_path = 'uploads/tmp/' . $file;
                    $new_path = 'uploads/final/' . $file;

                    $upload_success = File::move($old_path, $new_path);

                    if($upload_success) {
                        $input = [
                            'image_type' => $values['mimetype'][$key],
                            'image_name' => $values['filename'][$key],
                            'file_url' => $file,
                            'post_adv_id' => $post_adv_id
                        ];

                        PostAdvImages::create($input);
                    }
                }
            }
        }

        return redirect()->back()->with("alert", [
            "success" => TRUE,
            "message" => "Post Adv has been successfully updated."
        ]);
    }


    public function deletePostAd($id)
    {
        $postadv = PostAdv::findOrFail($id);

        $postadv->delete();

        return redirect()->back()->with("alert", [
            "success" => TRUE,
            "message" => "Post Adv has been successfully deleted."
        ]);
    }


     public function postSaveProfile(StoresRequest $request)
    {

        $buyer = Auth::buyer()->user();

        $values = $request->all();

        $data = [
            "package_id" => $values['package_id'],
            "plan_expiration" => Carbon::now()->addYear(1)->format('Y-m-d')
        ];

        $buyer->update($data);

         return redirect()->route("buyer.auth.payment.process", [
            $values['package_id'],
            $buyer->id,
        ]);

    }

    public function postEditProfile(UpdateRequest $request)
    {
        $user_photo = "";
        $buyer = Auth::buyer()->user();
        $values = $request->all();

        if (isset($values['image']) && $values['image']) {

            $user_photo = $request->image->getClientOriginalName();

            //moving the file to its designated path
            $request->image->move(public_path("uploads/user_photos"), $user_photo);
        }

        /* Remove email */
        unset($values["email"]);

        if (empty($values["password"])) {
            unset($values["password"]);
        } else {

            /* Validate old password */
            $values["password"] = bcrypt($values["password"]);

            if (!password_verify($values["old_password"], Auth::buyer()->user()->password)) {
                return redirect()
                    ->route("buyer.auth.profile.edit")
                    ->with("alert", [
                        "success" => FALSE,
                        "message" => "Old password was not valid. Please try again!"
                    ])
                    ->withInput();
            }

        }

        $buyer->update($values);

        $buyer->user_photo = $user_photo;
        $buyer->save();

        return redirect()
            ->route("buyer.auth.profile.edit")
            ->with("alert", [
                "success" => TRUE,
                "message" => "Your profile has been successfully updated!"
            ]);
    }

    public function postChangePassword(ChangePasswordRequest $request)
    {
        $user = Auth::buyer()->user();
        $user->password = bcrypt($request->input("password"));
        $user->first_login_attempt = 2;

        $user->save();

        \Session::flash('alert', [
            "success" => TRUE,
            "message" => "Your password has been changed!"
        ]);

        return response()->json([
            "success" => TRUE,
            "message" => "Your password has been changed!"
        ]);
    }

    public function postChangeAttempt()
    {
        $user = Auth::buyer()->user();
        $user->first_login_attempt = 2;
        $user->save();

        return response()->json([
            "success" => TRUE,
            "message" => "Attempt status has changed!"
        ]);
    }

     public function faqs()
    {
         $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

        $this->data["faqs"] = Faq::where('status','=','1')->get()->all();
        return $this->view("auth.faqs");
    }

    public function districts()
    {
        $this->data["buyer"] = Auth::buyer()->user();
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();
        $this->data["districts"] = Districts::all();

        foreach($this->data["districts"] as $district)
        {
            $sum = PostAdv::where("location", $district->id)->count();
            $district->count = $sum;
        }

        return $this->view("districts");
    }

    public function getdistrictsById($id)
    {
        $this->data["buyer"] = Auth::buyer()->user();
        $this->data["districts"] = Districts::orderBy('id', 'asc')->take(7)->get();
        $this->data["all_ads"] = PostAdv::where('location', '=', $id)->count();
        $this->data["district_name"] = Districts::where("id", "=", $id)->pluck('district_name');

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
        $this->data["postadv"] = PostAdv::where('location', '=', $id)->paginate(10);

        foreach($this->data["postadv"] as $post)
        {
            $cat_name = ServiceCategory::where("id", $post->category_id)->pluck('service_category');
            $post->category_name =$cat_name;
            $district_name = Districts::where("id", $post->location)->pluck('district_name');
            $post->district_name = $district_name;
            $post->published_date = $post["created_at"]->diffForHumans();
        }

        return $this->view("districtsbyid");
    }

    public function howitworks()
    {
        $this->data["buyer"] = Auth::buyer()->user();
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

        return $this->view("howitworks");
    }

    public function about()
    {
        $this->data["category"] = ServiceCategory::where("status", 1)->get()->all();

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

        return $this->view("auth.about");
    }
}
