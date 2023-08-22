<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if (Request::is(app()->getLocale() . '/customer/dashboard')) {
                return route('selection');
            }

            else {
                return route('selection');
            }
        }
        else{
            return route('selection');
        }
    }
}
