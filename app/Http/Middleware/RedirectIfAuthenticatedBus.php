<?php

namespace SME\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class RedirectIfAuthenticatedBus
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = Auth::bus();
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
        if ($this->auth->check() && $this->auth->user()->status == 1) {
            return redirect()->route("bus.dashboard");
        }

        return $next($request);
    }
}
