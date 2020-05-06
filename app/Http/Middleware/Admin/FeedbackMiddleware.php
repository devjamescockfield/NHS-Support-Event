<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class FeedbackMiddleware
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
        if ($request->is('PATCH')) //If user is updating a support ticket
        {
            if (!Auth::user()->hasPermissionTo('Update Feedback Ticket')) {
                return $next($request);
            }
            else
            {
                abort('401');
            }
        }

        if ($request->is('feedback-tickets') || $request->is('feedback-tickets/*') || $request->is('feedback-tickets/create')) //If user is viewing feedback tickets
        {
            if (Auth::user()->hasPermissionTo('View Feedback Tickets')) //If user has this permission
            {
                return $next($request);
            }
            else
            {
                return abort('401');
            }
        }

        if ($request->is('feedback-messages') || $request->is('feedback-messages/*')) //If user is viewing feedback tickets
        {
            if (Auth::user()->hasPermissionTo('Feedback Area')) //If user has this permission
            {
                return $next($request);
            }
            else
            {
                return abort('401');
            }
        }

        if ($request->is('feedback-statuses') || $request->is('feedback-statuses/create' ) || $request->is('feedback-statuses/*/edit') || $request->is('feedback-statuses/*') || $request->is('feedback-departments') || $request->is('feedback-departments/create' ) || $request->is('feedback-departments/*/edit') || $request->is('feedback-departments/*')) //If user is viewing permissions
        {
            if (Auth::user()->hasPermissionTo('Manage Feedback')) //If user has this permission
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
