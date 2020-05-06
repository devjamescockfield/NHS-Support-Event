<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class StaffMiddleware
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
        if ($request->is('staff')) //If user is viewing permissions
        {
            if (Auth::user()->hasPermissionTo('Staff Dashboard')) //If user has this permission
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
