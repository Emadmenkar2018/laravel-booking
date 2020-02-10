<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateAdmin extends Middleware
{
    protected $guards;

    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = 'admin';
        return parent::handle($request, $next, $this->guards);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route(ADMIN_SLUG);
        }
    }
}
