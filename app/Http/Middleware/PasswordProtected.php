<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PasswordProtected
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->get('authenticated')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
