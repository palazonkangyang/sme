<?php

/* Admin Panel Routes */

Route::group(['as' => 'admin.', "prefix" => "plz-admin", "namespace" => "Admin"], function () {

    /* Guest User */
    Route::group(["middleware" => "guest"], function () {

        /* Admin Account */
        Route::group(["as" => "account.", "prefix" => "account"], function () {

            Route::get("login", [
                "uses" => "AccountController@getLogin",
                "as" => "login"
            ]);

            Route::post("login", [
                "uses" => "AccountController@postLogin",
            ]);

            Route::get("forget-password", [
                "uses" => "AccountController@getForgetPassword",
                "as" => "password.forget"
            ]);

            Route::post("forget-password", [
                "uses" => "AccountController@postForgetPassword",
            ]);

            Route::get("password/reset/{type}/{token}", [
                "uses" => "AccountController@getResetPassword",
                "as" => "password.reset"
            ]);

            Route::post("password/reset/{type}/{token}", [
                "uses" => "AccountController@postResetPassword",
            ]);
        });
    });

    /* Authenticated User */
    Route::group(["middleware" => "auth"], function () {

        /* Admin Account */
        Route::group(["as" => "account.", "prefix" => "account"], function () {

            Route::get("logout", [
                "uses" => "AccountController@getLogout",
                "as" => "logout"
            ]);

            Route::group(["middleware" => "admin.role.superadmin"], function () {

                Route::get("profile/{id?}", [
                    "uses" => "AccountController@getProfile",
                    "as" => "profile"
                ])->where('id', '[0-9]+');

                Route::get("profile/edit/{id}", [
                    "uses" => "AccountController@getEditProfile",
                    "as" => "profile.edit"
                ])->where('id', '[0-9]+');
                
                

                Route::post("profile/edit/{id}", [
                    "uses" => "AccountController@postEditProfile",
                ])->where('id', '[0-9]+');

                Route::get("create", [
                    "uses" => "AccountController@getCreate",
                    "as" => "add"
                ]);

                Route::post("create", [
                    "uses" => "AccountController@postCreate",
                ]);

                Route::get("/", [
                    "uses" => "AccountController@getAll",
                    "as" => "all"
                ]);

                Route::get("delete/{id}", [
                    "uses" => "AccountController@getDelete",
                    "as" => "delete"
                ])->where('id', '[0-9]+');
            });
        });

        Route::get("dashboard", [
            "uses" => "DashboardController@getIndex",
            "as" => "dashboard"
        ]);

        
        Route::group(["middleware" => "admin.role.superadmin"], function () {

            /* Buyers */

            Route::group(["as" => "buyer.", "prefix" => "buyer"], function () {

                Route::get("/", [
                    "uses" => "BuyerController@index",
                    "as" => "all"
                ]);

                Route::get("add", [
                    "uses" => "BuyerController@create",
                    "as" => "add"
                ]);

                Route::post("store", [
                    "uses" => "BuyerController@store",
                    "as" => "store"
                ]);

                Route::get("edit/{id}", [
                    "uses" => "BuyerController@edit",
                    "as" => "edit"
                ])->where("id", "[0-9]+");

                Route::post("update/{id}", [
                    "uses" => "BuyerController@update",
                    "as" => "update"
                ])->where("id", "[0-9]+");

                Route::get("delete/{id}", [
                    "uses" => "BuyerController@destroy",
                    "as" => "delete"
                ])->where("id", "[0-9]+");
            });

            /* Suppliers */

            Route::group(["as" => "supplier.", "prefix" => "supplier"], function () {

                Route::get("/", [
                    "uses" => "SupplierController@index",
                    "as" => "all"
                ]);

                Route::get("add", [
                    "uses" => "SupplierController@create",
                    "as" => "add"
                ]);

                Route::post("store", [
                    "uses" => "SupplierController@store",
                    "as" => "store"
                ]);

                Route::get("edit/{id}", [
                    "uses" => "SupplierController@edit",
                    "as" => "edit"
                ])->where("id", "[0-9]+");

                Route::post("update/{id}", [
                    "uses" => "SupplierController@update",
                    "as" => "update"
                ])->where("id", "[0-9]+");

                Route::get("delete/{id}", [
                    "uses" => "SupplierController@destroy",
                    "as" => "delete"
                ])->where("id", "[0-9]+");
            });

            /* Service Categories */

            Route::group(["as" => "service_category.", "prefix" => "service_category"], function () {

                Route::get("/", [
                    "uses" => "ServiceCategoryController@index",
                    "as" => "all"
                ]);

                Route::get("add", [
                    "uses" => "ServiceCategoryController@create",
                    "as" => "add"
                ]);

                Route::post("store", [
                    "uses" => "ServiceCategoryController@store",
                    "as" => "store"
                ]);

                Route::get("edit/{id}", [
                    "uses" => "ServiceCategoryController@edit",
                    "as" => "edit"
                ])->where("id", "[0-9]+");

                Route::post("update/{id}", [
                    "uses" => "ServiceCategoryController@update",
                    "as" => "update"
                ])->where("id", "[0-9]+");

                Route::get("delete/{id}", [
                    "uses" => "ServiceCategoryController@destroy",
                    "as" => "delete"
                ])->where("id", "[0-9]+");
            });

            /* Industries */

            Route::group(["as" => "industry.", "prefix" => "industry"], function () {

                Route::get("/", [
                    "uses" => "IndustryController@index",
                    "as" => "all"
                ]);

                Route::get("add", [
                    "uses" => "IndustryController@create",
                    "as" => "add"
                ]);

                Route::post("store", [
                    "uses" => "IndustryController@store",
                    "as" => "store"
                ]);

                Route::get("edit/{id}", [
                    "uses" => "IndustryController@edit",
                    "as" => "edit"
                ])->where("id", "[0-9]+");

                Route::post("update/{id}", [
                    "uses" => "IndustryController@update",
                    "as" => "update"
                ])->where("id", "[0-9]+");

                Route::get("delete/{id}", [
                    "uses" => "IndustryController@destroy",
                    "as" => "delete"
                ])->where("id", "[0-9]+");
            });

            /* Zones */

            Route::group(["as" => "zone.", "prefix" => "zone"], function () {

                Route::get("/", [
                    "uses" => "ZoneController@index",
                    "as" => "all"
                ]);

                Route::get("add", [
                    "uses" => "ZoneController@create",
                    "as" => "add"
                ]);

                Route::post("store", [
                    "uses" => "ZoneController@store",
                    "as" => "store"
                ]);

                Route::get("edit/{id}", [
                    "uses" => "ZoneController@edit",
                    "as" => "edit"
                ])->where("id", "[0-9]+");

                Route::post("update/{id}", [
                    "uses" => "ZoneController@update",
                    "as" => "update"
                ])->where("id", "[0-9]+");

                Route::get("delete/{id}", [
                    "uses" => "ZoneController@destroy",
                    "as" => "delete"
                ])->where("id", "[0-9]+");
            });

            /* FAQ's */

            Route::group(["as" => "faq.", "prefix" => "faq"], function () {

                Route::get("/", [
                    "uses" => "FaqController@index",
                    "as" => "all"
                ]);

                Route::get("add", [
                    "uses" => "FaqController@create",
                    "as" => "add"
                ]);

                Route::post("store", [
                    "uses" => "FaqController@store",
                    "as" => "store"
                ]);

                Route::get("edit/{id}", [
                    "uses" => "FaqController@edit",
                    "as" => "edit"
                ])->where("id", "[0-9]+");

                Route::post("update/{id}", [
                    "uses" => "FaqController@update",
                    "as" => "update"
                ])->where("id", "[0-9]+");

                Route::get("delete/{id}", [
                    "uses" => "FaqController@destroy",
                    "as" => "delete"
                ])->where("id", "[0-9]+");
            });

            /* Countries */

            Route::group(["as" => "country.", "prefix" => "country"], function () {

                Route::get("/", [
                    "uses" => "CountryController@index",
                    "as" => "all"
                ]);

                Route::get("add", [
                    "uses" => "CountryController@create",
                    "as" => "add"
                ]);

                Route::post("store", [
                    "uses" => "CountryController@store",
                    "as" => "store"
                ]);

                Route::get("edit/{id}", [
                    "uses" => "CountryController@edit",
                    "as" => "edit"
                ])->where("id", "[0-9]+");

                Route::post("update/{id}", [
                    "uses" => "CountryController@update",
                    "as" => "update"
                ])->where("id", "[0-9]+");

                Route::get("delete/{id}", [
                    "uses" => "CountryController@destroy",
                    "as" => "delete"
                ])->where("id", "[0-9]+");
            });

            /* Features */

            Route::group(["as" => "feature.", "prefix" => "feature"], function () {

                Route::get("/", [
                    "uses" => "FeatureController@index",
                    "as" => "all"
                ]);

                Route::get("add", [
                    "uses" => "FeatureController@create",
                    "as" => "add"
                ]);

                Route::post("store", [
                    "uses" => "FeatureController@store",
                    "as" => "store"
                ]);

                Route::get("edit/{id}", [
                    "uses" => "FeatureController@edit",
                    "as" => "edit"
                ])->where("id", "[0-9]+");

                Route::post("update/{id}", [
                    "uses" => "FeatureController@update",
                    "as" => "update"
                ])->where("id", "[0-9]+");

                Route::get("delete/{id}", [
                    "uses" => "FeatureController@destroy",
                    "as" => "delete"
                ])->where("id", "[0-9]+");
            });

            /* Subscription Packages */

            Route::group(["as" => "subscription_package.", "prefix" => "subscription_package"], function () {

                Route::get("/", [
                    "uses" => "SubscriptionPackageController@index",
                    "as" => "all"
                ]);

                Route::get("add", [
                    "uses" => "SubscriptionPackageController@create",
                    "as" => "add"
                ]);

                Route::post("store", [
                    "uses" => "SubscriptionPackageController@store",
                    "as" => "store"
                ]);

                Route::get("edit/{id}", [
                    "uses" => "SubscriptionPackageController@edit",
                    "as" => "edit"
                ])->where("id", "[0-9]+");

                Route::post("update/{id}", [
                    "uses" => "SubscriptionPackageController@update",
                    "as" => "update"
                ])->where("id", "[0-9]+");

                Route::get("delete/{id}", [
                    "uses" => "SubscriptionPackageController@destroy",
                    "as" => "delete"
                ])->where("id", "[0-9]+");
            });

            /* Advertisement Features */

            Route::group(["as" => "adv_feature.", "prefix" => "adv_feature"], function () {

                Route::get("/", [
                    "uses" => "AdvFeatureController@index",
                    "as" => "all"
                ]);

                Route::get("add", [
                    "uses" => "AdvFeatureController@create",
                    "as" => "add"
                ]);

                Route::post("store", [
                    "uses" => "AdvFeatureController@store",
                    "as" => "store"
                ]);

                Route::get("edit/{id}", [
                    "uses" => "AdvFeatureController@edit",
                    "as" => "edit"
                ])->where("id", "[0-9]+");

                Route::post("update/{id}", [
                    "uses" => "AdvFeatureController@update",
                    "as" => "update"
                ])->where("id", "[0-9]+");

                Route::get("delete/{id}", [
                    "uses" => "AdvFeatureController@destroy",
                    "as" => "delete"
                ])->where("id", "[0-9]+");
            });

            /* Advertisement Packages */

            Route::group(["as" => "advertisement_package.", "prefix" => "advertisement_package"], function () {

                Route::get("/", [
                    "uses" => "AdvertisementPackageController@index",
                    "as" => "all"
                ]);

                Route::get("add", [
                    "uses" => "AdvertisementPackageController@create",
                    "as" => "add"
                ]);

                Route::post("store", [
                    "uses" => "AdvertisementPackageController@store",
                    "as" => "store"
                ]);

                Route::get("edit/{id}", [
                    "uses" => "AdvertisementPackageController@edit",
                    "as" => "edit"
                ])->where("id", "[0-9]+");

                Route::post("update/{id}", [
                    "uses" => "AdvertisementPackageController@update",
                    "as" => "update"
                ])->where("id", "[0-9]+");

                Route::get("delete/{id}", [
                    "uses" => "AdvertisementPackageController@destroy",
                    "as" => "delete"
                ])->where("id", "[0-9]+");
            });

            /* Advertisement Packages */

            Route::group(["as" => "banner.", "prefix" => "banner"], function () {

                Route::get("/", [
                    "uses" => "BannerController@index",
                    "as" => "all"
                ]);

                Route::get("add", [
                    "uses" => "BannerController@create",
                    "as" => "add"
                ]);

                Route::post("store", [
                    "uses" => "BannerController@store",
                    "as" => "store"
                ]);

                Route::get("edit/{id}", [
                    "uses" => "BannerController@edit",
                    "as" => "edit"
                ])->where("id", "[0-9]+");

                Route::post("update/{id}", [
                    "uses" => "BannerController@update",
                    "as" => "update"
                ])->where("id", "[0-9]+");

                Route::get("delete/{id}", [
                    "uses" => "BannerController@destroy",
                    "as" => "delete"
                ])->where("id", "[0-9]+");
            });


        });
    });

    Route::get('/', function () {
        return redirect()->route("admin.dashboard");
    });
});



/* Buyer */

Route::group(["as" => "buyer.", "namespace" => "Buyer"], function () {


    Route::get("/", function () {
        return redirect()->route("buyer.index");
    });

    Route::get("buyer/account", function () {
        return redirect()->route("buyer.login");
    });

    /* Guest Buyer */
    Route::group(["middleware" => "guest.buyer"], function () {

        Route::get("login", [
            "uses" => "AuthController@getLogin",
            "as" => "login"
        ]);

         Route::get("index", [
            "uses" => "AuthController@index",
            "as" => "index"
        ]);


        Route::post("login", [
            "uses" => "AuthController@postLogin",
        ]);

        Route::get("forget-password", [
            "uses" => "AuthController@getForgetPassword",
            "as" => "password.forget"
        ]);

        Route::get("register", [
            "uses" => "AuthController@register",
            "as" => "register"
        ]);

        Route::post("register", [
            "uses" => "AuthController@register_action",
            "as" => "register"
        ]);

        Route::get("about", [
            "uses" => "AuthController@about",
            "as" => "about"
        ]);

        Route::get("districts", [
            "uses" => "AuthController@districts",
            "as" => "districts"
        ]);

        Route::get("districts/{id}", [
            "uses" => "AuthController@getdistrictsById",
            "as" => "districtsbyid"
        ]);
         
        Route::get("howitworks", [
            "uses" => "AuthController@howitworks",
            "as" => "howitworks"
        ]);
        
        Route::get("faqs", [
            "uses" => "AuthController@faqs",
            "as" => "faqs"
        ]);

         Route::get("index", [
            "uses" => "AuthController@index",
            "as" => "index"
        ]);

        Route::post("forget-password", [
            "uses" => "AuthController@postForgetPassword",
        ]);

        Route::get("password/reset/{type}/{token}", [
            "uses" => "AuthController@getResetPassword",
            "as" => "password.reset"
        ]);

        Route::post("password/reset/{type}/{token}", [
            "uses" => "AuthController@postResetPassword",
        ]);
    });

    /* Authenticated Buyer */
    Route::group(["middleware" => "auth.buyer"], function () {

        Route::get("auth/logout", [
            "uses" => "AuthController@getLogout",
            "as" => "auth.logout",
        ]);


        Route::get("index", [
            "uses" => "DashboardController@index",
            "as" => "index"
        ])->where("id", "[0-9]+");


        Route::get("adpage/{id}", [
            "uses" => "DashboardController@adpage",
            "as" => "adpage"
        ]);

        Route::get("category/{id}", [
            "uses" => "DashboardController@category",
            "as" => "category"
        ]);

        Route::get("suppliers/{id}", [
            "uses" => "DashboardController@suppliers",
            "as" => "suppliers"
        ]);

        Route::get("supplierpage", [
            "uses" => "DashboardController@supplierpage",
            "as" => "supplierpage"
        ]);

        Route::get("categories", [
            "uses" => "DashboardController@categories",
            "as" => "categories"
        ]);     
        
        Route::get("supp_categories", [
            "uses" => "DashboardController@supp_categories",
            "as" => "supp_categories"
        ]);

        Route::post("search-categories", [
            "uses" => "DashboardController@postSearchCategories",
            "as" => "search_categories"
        ]);     
        
        Route::get("supplierlist/{id}", [
            "uses" => "DashboardController@supplierlist",
            "as" => "supplierlist"
        ])->where("id", "[0-9]+");
        
        Route::get("supplierdetail", [
            "uses" => "DashboardController@supplierdetail",
            "as" => "supplierdetail"
        ]);           
           
        Route::get("bloglist", [
            "uses" => "DashboardController@bloglist",
            "as" => "bloglist"
        ]);

        Route::get("bloglist/{id}", [
            "uses" => "DashboardController@bloglistbyCategory",
            "as" => "bloglistbycategory"
        ])->where("id", "[0-9]+");
        
        Route::get("blogdetail/{id}", [
            "uses" => "DashboardController@blogdetail",
            "as" => "blogdetail"
        ])->where("id", "[0-9]+");  
         
        Route::get("adslist/{id}", [
            "uses" => "DashboardController@adslist",
            "as" => "adslist"
        ])->where("id", "[0-9]+");
        
        Route::get("adsdetail/{id}", [
            "uses" => "DashboardController@adsdetail",
            "as" => "adsdetail"
        ])->where("id", "[0-9]+");

        Route::get("addwishlist/{id}", [
            "uses" => "DashboardController@addwishlist",
            "as" => "addwishlist"
        ])->where("id", "[0-9]+");  
        
        Route::get("supp_adpage/{id}", [
            "uses" => "DashboardController@supp_adpage",
            "as" => "supp_adpage"
        ]);

        Route::get("contact", [
            "uses" => "DashboardController@contact",
            "as" => "contact"
        ]);

        Route::get("posting", [
            "uses" => "DashboardController@posting",
            "as" => "posting"
        ]);

        Route::post("posting/save", [
            "uses" => "DashboardController@postingsave",
           
        ]);

        Route::get("editposting/{id}", [
                    "uses" => "DashboardController@editposting",
                    "as" => "editposting"
                ])->where("id", "[0-9]+");

        Route::post("updateposting/{id}", [
                    "uses" => "DashboardController@updateposting",
                    "as" => "updateposting"
                ])->where("id", "[0-9]+");


        Route::get("faqs", [
            "uses" => "DashboardController@faqs",
            "as" => "faqs"
        ]);

        Route::get("about", [
            "uses" => "DashboardController@about",
            "as" => "about"
        ]);

        /* Account */
        Route::group(["prefix" => "auth", "as" => "auth."], function () {

            Route::get("profile", [
                "uses" => "AuthController@getProfile",
                "as" => "profile"
            ]);

            Route::get("package", [
                "uses" => "AuthController@getPackage",
                "as" => "package"
            ]);

            Route::get("supplier/profile/{id}", [
                "uses" => "AuthController@getSupplierProfile",
                "as" => "supplierprofile"
            ])->where("id", "[0-9]+");

            Route::get("profile/edit", [
                "uses" => "AuthController@getEditProfile",
                "as" => "profile.edit"
            ]);

            Route::post("profile/edit", [
                "uses" => "AuthController@postEditProfile",
            ]);
            
            Route::get("profile/active", [
                "uses" => "AuthController@getActiveProfile",
                "as" => "profile.active"
            ]);

            Route::get("profile/blog", [
                "uses" => "AuthController@getBlog",
                "as" => "profile.blog"
            ]);

            Route::get("profile/addblog", [
                "uses" => "AuthController@getAddBlog",
                "as" => "profile.addblog"
            ]);

            Route::post("profile/blog/save", [
                "uses" => "AuthController@postBlog",
            ]);

            Route::post('file/uploadFiles', [
                "uses" => "UploadController@uploadFiles",
            ]);

            Route::get('file/removeFiles/{name}', [
                "uses" => "UploadController@removeFiles",
            ]);
            
            Route::match(["get", "post"], "profile/wishlist", [
                "uses" => "AuthController@getWishlistProfile",
                "as" => "profile.wishlist"
            ]);
            
            Route::get("profile/archieve", [
                "uses" => "AuthController@getArchieveProfile",
                "as" => "profile.archieve"
            ]);

            Route::get("profile/archieve", [
                "uses" => "AuthController@getArchieveProfile",
                "as" => "profile.archieve"
            ]);

            Route::get("profile/archieve/reactive/{id}", [
                "uses" => "AuthController@reactiveArchieve",
                "as" => "profile.archievereactive"
            ]);

            Route::get("profile/archieve/delete/{id}", [
                "uses" => "AuthController@deleteArchieve",
                "as" => "profile.archievedelete"
            ]);

            Route::get("profile/postad", [
                "uses" => "AuthController@getAddPostAd",
                "as" => "profile.postadv"
            ]);

            Route::get("profile/postad/edit/{id}", [
                "uses" => "AuthController@getEditPostAd",
                "as" => "profile.editpostadv"
            ]);

            Route::post("profile/postad/edit/{id}", [
                "uses" => "AuthController@postEditPostAd",
                "as" => "profile.posteditpostadv"
            ]);

            Route::get("profile/wishlist/delete/{id}", [
                "uses" => "AuthController@deleteWishlist",
                "as" => "profile.deletewishlist"
            ]);

            Route::get("profile/postad/delete/{id}", [
                "uses" => "AuthController@deletePostAd",
                "as" => "profile.deletepostadv"
            ]);

            Route::post("profile/postad/save", [
                "uses" => "AuthController@postPostAd",
            ]);
            
            Route::post("profile/save", [
                "uses" => "AuthController@postSaveProfile",
            ]);

            Route::get('payment/process/{id}/{b_id}', [
                "uses" => "PayPalPaymentController@getPaymentProcess",
                "as" => "payment.process"
            ]);

            Route::get('payment/success/{booking_id}', [
                "uses" => "PayPalPaymentController@getDone",
                "as" => "payment.done"
            ])->where('booking_id', '[0-9]+');

            Route::get('payment/cancelled/{booking_id}', [
                "uses" => "PayPalPaymentController@getCancel",
                "as" => "payment.cancelled"
            ])->where('booking_id', '[0-9]+');

            Route::post("change-password", [
                "uses" => "AuthController@postChangePassword",
                "as" => "profile.change.password"
            ]);

            Route::post("change-attempt", [
                "uses" => "AuthController@postChangeAttempt",
                "as" => "profile.change.login_attempt"
            ]);
        });

    });
});

/* Supplier */

Route::group(["as" => "supplier.", "namespace" => "Supplier", "prefix" => "supplier"], function () {


    Route::get("/", function () {
        return redirect()->route("supplier.auth.login");
    });

    Route::get("supplier/account", function () {
        return redirect()->route("supplier.auth.login");
    });

    /* Guest Supplier */
    Route::group(["middleware" => "guest.supplier", "as" => "auth.", "prefix" => "auth"], function () {
        Route::get("login", [
            "uses" => "AuthController@getLogin",
            "as" => "login"
        ]);

        Route::post("login", [
            "uses" => "AuthController@postLogin",
        ]);

        Route::get("forget-password", [
            "uses" => "AuthController@getForgetPassword",
            "as" => "password.forget"
        ]);

        Route::post("forget-password", [
            "uses" => "AuthController@postForgetPassword",
        ]);

        Route::get("password/reset/{type}/{token}", [
            "uses" => "AuthController@getResetPassword",
            "as" => "password.reset"
        ]);

        Route::post("password/reset/{type}/{token}", [
            "uses" => "AuthController@postResetPassword",
        ]);
    });

    /* Authenticated Supplier */
    Route::group(["middleware" => "auth.supplier"], function () {

        Route::get("auth/logout", [
            "uses" => "AuthController@getLogout",
            "as" => "auth.logout",
        ]);

        Route::get("dashboard", [
            "uses" => "DashboardController@index",
            "as" => "dashboard"
        ]);

        /* Account */
        Route::group(["prefix" => "auth", "as" => "auth."], function () {

            Route::get("profile", [
                "uses" => "AuthController@getProfile",
                "as" => "profile"
            ]);

            Route::get("profile/edit", [
                "uses" => "AuthController@getEditProfile",
                "as" => "profile.edit"
            ]);

            Route::post("profile/edit", [
                "uses" => "AuthController@postEditProfile",
            ]);

            Route::post("change-password", [
                "uses" => "AuthController@postChangePassword",
                "as" => "profile.change.password"
            ]);

            Route::post("change-attempt", [
                "uses" => "AuthController@postChangeAttempt",
                "as" => "profile.change.login_attempt"
            ]);
        });

        /* Product Collection */
        Route::group(["as" => "collection.product.", "prefix" => "collection/product"], function () {

            Route::get("/", [
                "uses" => "ProductCollectionController@index",
                "as" => "all"
            ]);

            Route::get("/verification", [
                "uses" => "ProductCollectionController@getVerification",
                "as" => "verification"
            ]);

             Route::post("/verification/view", [
                "uses" => "ProductCollectionController@viewTickets",
                 "as" => "verification.view"
            ]);

             Route::get('verification/getTicketid', [
               "uses" => "ProductCollectionController@getTicketid",
                "as" => "verification.getTicketid"
            ]);

            Route::get("/verification/post/{id}", [
                "uses" => "ProductCollectionController@postVerification",
                 "as" => "verification.post"
            ]);

            Route::get("add/{ticket_no}/{product_no}", [
                "uses" => "ProductCollectionController@create",
                "as" => "add"
            ])->where("ticket_no", "[A-Za-z0-9]+");

            Route::post("store", [
                "uses" => "ProductCollectionController@store",
                "as" => "store"
            ]);

            Route::get("edit/{id}", [
                "uses" => "ProductCollectionController@edit",
                "as" => "edit"
            ])->where("id", "[0-9]+");

            Route::post("update/{id}", [
                "uses" => "ProductCollectionController@update",
                "as" => "update"
            ])->where("id", "[0-9]+");

            Route::get("delete/{id}", [
                "uses" => "ProductCollectionController@destroy",
                "as" => "delete"
            ])->where("id", "[0-9]+");
        });
    });
});





