<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // Redirect to Filament login page for admin routes
            if (strpos($request->path(), 'admin') === 0) {
                return route('filament.auth.login');
            }
            return route('login');
        }
    }
}
