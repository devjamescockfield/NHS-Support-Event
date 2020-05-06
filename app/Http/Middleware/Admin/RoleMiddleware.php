<?php


namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->is('roles') || $request->is('roles/create' ) || $request->is('roles/*/edit')) //If user is viewing permissions
        {
            if (Auth::user()->hasPermissionTo('Administer Roles')) //If user has this permission
            {
                return $next($request);
            }
            else
            {
                return abort('401');
            }
        }
    }
}
