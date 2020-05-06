<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class UsersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->hasPermissionTo('Administer Users')) //If user has this //permission
        {
            return $next($request);
        }


        if ($request->is('users')->hasPermissionTo('Edit User Permissions')) //If user has this //permission
        {
            return $next($request);
        }

        return abort('401');
    }
}
