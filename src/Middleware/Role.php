<?php

namespace Flysap\Users\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Role {

    /**
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     */
    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }


    /**
     * Handle request .
     *
     * @param $request
     * @param callable $next
     * @param $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role) {
        if ($this->auth->check() && $this->auth->user()->is($role)) {
            return $next($request);
        }

        return redirect()
            ->back(302);
    }
}