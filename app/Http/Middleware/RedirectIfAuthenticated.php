<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // If User is Admin redirect to Admin dashboard
                if (auth()->user() != null && auth()->user()->role_id != null && auth()->user()->role_id == 1)
                    return redirect(RouteServiceProvider::ADMIN);
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
