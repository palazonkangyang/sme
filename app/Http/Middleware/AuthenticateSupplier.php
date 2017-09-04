<?php

namespace SME\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class AuthenticateSupplier
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = Auth::supplier();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest() || $this->auth->user()->status != 1) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {

                if (in_array($request->route()->getName() , ["product.collection.verification"])) {
                    die("You are not a authenticated user.");
                }
                return redirect()->route("supplier.auth.login");
            }
        }
        return $next($request);
    }
}
