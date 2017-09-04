<?php

namespace SME\Http\Middleware\Admin;

use Closure;
use Auth;

class BusStuff
{
    public function handle($request, Closure $next)
    {
        if (Auth::admin()->role != 3) {
            return redirect()->route("admin.dashboard")->with("alert", [
                "success" => FALSE,
                "message" => "You are not allowed to access this page."
            ]);
        }

        return $next($request);
    }
}
