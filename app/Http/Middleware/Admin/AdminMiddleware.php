<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if ($request->is('staff')) //If user is viewing the staff dashboard
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

        return abort('401');
    }
}