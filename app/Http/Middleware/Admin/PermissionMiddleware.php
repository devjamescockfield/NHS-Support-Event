<?php


namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->is('permissions') || $request->is('permissions/create' ) || $request->is('permissions/*/edit') || $request->is('permissions/*')) //If user is viewing permissions
        {
            if (Auth::user()->hasPermissionTo('Administer Permissions')) //If user has this permission
            {
                return $next($request);
            }
            else
            {
                return abort('401');
            }
        }

        if ($request->isMethod("PUT")) //If user is updating a permission
        {
            if (Auth::user()->hasPermissionTo('Administer Permissions')) {
                return $next($request);
            }
            else
            {
                return abort('401');
            }
        }

        return abort('401');
    }
}
