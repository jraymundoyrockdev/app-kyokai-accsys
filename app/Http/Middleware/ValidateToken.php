<?php

namespace KyokaiAccSys\Http\Middleware;

use Closure;

class ValidateToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->get('userToken')) {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
