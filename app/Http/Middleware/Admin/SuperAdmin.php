<?php

namespace SME\Http\Middleware\Admin;

use Closure;
use Auth;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::admin()->user()->role > 1) {
            return redirect()->route("admin.dashboard")->with("alert", [
                "success" => FALSE,
                "message" => "You are not allowed to access this page."
            ]);
        }

        return $next($request);
    }
}
