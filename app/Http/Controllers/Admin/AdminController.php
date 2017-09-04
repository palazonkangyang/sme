<?php

namespace SME\Http\Controllers\Admin;

use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;

use SME\Http\Controllers\Controller;
use SME\Http\Helpers\Config;

abstract class AdminController extends Controller
{
    const ROLE_SUPER_ADMIN = 1;
    const ROLE_BUS_STUFF = 3;
    const ROLE_CONTENT_EDITOR = 2;
    const ROLE_PARTNERS = 4;

    public function __construct()
    {
        parent::__construct();

        $this->addMetaTitle(Config::SITE_NAME);
        $this->addMetaTitle("Administrator");

        $this->data["page_title"] = "";
        $this->data["page_sub_title"] = "";

        $this->data["paginationAppends"] = [];

        @session_start();
        if (Auth::admin()->check() && !isset($_SESSION["username"])) {
            $_SESSION["username"] = true;
        }
    }

    public function View($route)
    {
        if (Input::get("order") && in_array(Input::get("order"), ["ASC", "DESC"])) {
            $this->data["paginationAppends"]["order"] = Input::get("order");
        }

        if (Input::get("orderBy")) {
            $this->data["paginationAppends"]["orderBy"] = Input::get("orderBy");
        }

        if (Input::get("q")) {
            $this->data["paginationAppends"]["q"] = Input::get("q");
        }

        $this->data["startPageNo"] = Input::get("page") ?: 1;

        if (Auth::admin()->check()) {
            $this->data["navigation_html"] = $this->getNavigationHtml($this->getNavigation());
        }

        return parent::View("admin." . $route);
    }

    protected function getNavigation()
    {
        return [
            [
                "label" => "Dashboard",
                "icon" => "dashboard",
                "route" => "admin.dashboard",
                "role" => self::ROLE_SUPER_ADMIN
            ],
            [
                "label" => "Members",
                "icon" => "users",
                "role" => self::ROLE_SUPER_ADMIN,
                "child" => [
                    
                    [
                        "label" => "View all Members",
                        "icon" => "",
                        "route" => "admin.buyer.all"
                    ]
                ]
            ],
            
            [
                "label" => "Users",
                "icon" => "users",
                "route" => "",
                "role" => self::ROLE_SUPER_ADMIN,
                "child" => [
                    [
                        "label" => "Add User",
                        "icon" => "",
                        "route" => "admin.account.add",
                        "icon" => "admin."
                    ],
                    [
                        "label" => "All Users",
                        "icon" => "",
                        "route" => "admin.account.all",
                        "icon" => ""
                    ]
                ],
            ],
            [
                "label" => "Service Categories",
                "icon" => "book",
                "route" => "",
                "role" => self::ROLE_SUPER_ADMIN,
                "child" => [
                    [
                        "label" => "Add Category",
                        "icon" => "",
                        "role" => self::ROLE_SUPER_ADMIN,
                        "route" => "admin.service_category.add",
                    ],
                    [
                        "label" => "All Categories",
                        "icon" => "",
                        "route" => "admin.service_category.all",
                    ]
                ]
            ],
            [
                "label" => "Industries",
                "icon" => "industry",
                "route" => "",
                "role" => self::ROLE_SUPER_ADMIN,
                "child" => [
                    [
                        "label" => "Add Industry",
                        "icon" => "",
                        "role" => self::ROLE_SUPER_ADMIN,
                        "route" => "admin.industry.add",
                    ],
                    [
                        "label" => "All Industries",
                        "icon" => "",
                        "route" => "admin.industry.all",
                    ]
                ]
            ],
            [
                "label" => "Zones",
                "icon" => "map",
                "role" => self::ROLE_SUPER_ADMIN,
                "child" => [
                    [
                        "label" => "Add Zone",
                        "icon" => "",
                        "route" => "admin.zone.add"
                    ],
                    [
                        "label" => "View all Zones",
                        "icon" => "",
                        "route" => "admin.zone.all"
                    ]
                ]
            ],
            [
                "label" => "Countries",
                "icon" => "map",
                "role" => self::ROLE_SUPER_ADMIN,
                "child" => [
                    [
                        "label" => "Add Country",
                        "icon" => "",
                        "route" => "admin.country.add"
                    ],
                    [
                        "label" => "View all Countries",
                        "icon" => "",
                        "route" => "admin.country.all"
                    ]
                ]
            ],
            [
                "label" => "Subscription Features",
                "icon" => "book",
                "role" => self::ROLE_SUPER_ADMIN,
                "child" => [
                    [
                        "label" => "Add Subscription Feature",
                        "icon" => "",
                        "route" => "admin.feature.add"
                    ],
                    [
                        "label" => "View all Subscription Features",
                        "icon" => "",
                        "route" => "admin.feature.all"
                    ]
                ]
            ],
            [
                "label" => "Subscription Packages",
                "icon" => "book",
                "role" => self::ROLE_SUPER_ADMIN,
                "child" => [
                    [
                        "label" => "Add Subscription Package",
                        "icon" => "",
                        "route" => "admin.subscription_package.add"
                    ],
                    [
                        "label" => "View all Subscription Packages",
                        "icon" => "",
                        "route" => "admin.subscription_package.all"
                    ]
                ]
            ],
            [
                "label" => "Advertisement Features",
                "icon" => "book",
                "role" => self::ROLE_SUPER_ADMIN,
                "child" => [
                    [
                        "label" => "Add Advertisement Feature",
                        "icon" => "",
                        "route" => "admin.adv_feature.add"
                    ],
                    [
                        "label" => "View all Advertisement Features",
                        "icon" => "",
                        "route" => "admin.adv_feature.all"
                    ]
                ]
            ],
            [
                "label" => "Advertisement Packages",
                "icon" => "book",
                "role" => self::ROLE_SUPER_ADMIN,
                "child" => [
                    [
                        "label" => "Add Advertisement Package",
                        "icon" => "",
                        "route" => "admin.advertisement_package.add"
                    ],
                    [
                        "label" => "View all Advertisement Packages",
                        "icon" => "",
                        "route" => "admin.advertisement_package.all"
                    ]
                ]
            ],
            [
                "label" => "Advertising Banners",
                "icon" => "book",
                "role" => self::ROLE_SUPER_ADMIN,
                "child" => [
                    [
                        "label" => "Add Advertising Banner",
                        "icon" => "",
                        "route" => "admin.banner.add"
                    ],
                    [
                        "label" => "View all Advertising Banner",
                        "icon" => "",
                        "route" => "admin.banner.all"
                    ]
                ]
            ],
            [
                "label" => "FAQ's",
                "icon" => "book",
                "role" => self::ROLE_SUPER_ADMIN,
                "child" => [
                    [
                        "label" => "Add FAQ",
                        "icon" => "",
                        "route" => "admin.faq.add"
                    ],
                    [
                        "label" => "View all FAQ's",
                        "icon" => "",
                        "route" => "admin.faq.all"
                    ]
                ]
            ],
             


        ];
    }

    protected function getNavigationHtml($modules, $level = 1)
    {
        $output = $level == 1 ? "" : "<ul class=\"treeview-menu\">\n";

        foreach ($modules as $module) {

            if (Auth::admin()->user()->role > 1 && (empty($module["role"]) || $module["role"] < Auth::admin()->user()->role)) {
                continue;
            }

            $li_class = !empty($module["route"]) && $module["route"] == Route::currentRouteName() ? " active" : "";

            $output .= "<li class='" . ($level == 1 ? "treeview" : "") . $li_class . "'>";
            $output .= "<a href=\"" . (!empty($module["route"]) ? Route($module["route"]) : "#") . "\"><i class=\"fa fa-{$module["icon"]}\"></i> <span>{$module["label"]}</span></a>";

            if (isset($module["child"])) {
                $output .= $this->getNavigationHtml($module["child"], $level + 1);
            }
            $output .= "</li>\n";
        }

        $output .= $level == 1 ? "" : "</ul>\n";
        return $output;
    }

    protected function setPageTitle($text)
    {
        $this->data["page_title"] = $text;
    }

    protected function setPageSubTitle($text)
    {
        $this->data["page_sub_title"] = $text;
    }

    protected function validateCSRF()
    {
        $token = Input::get("_token");

        if ($token === Session::get("_token")) {
            return true;
        } else {
            abort(500, "Invalid token");
        }
    }
}

