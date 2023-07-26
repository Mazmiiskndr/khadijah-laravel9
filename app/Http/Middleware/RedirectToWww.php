<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectToWww
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (env('APP_ENV') !== 'local') {
            if (substr($request->header('Host'), 0, 4) !== 'www.') {
                $request->headers->set('Host', 'www.' . $request->header('Host'));

                return redirect($request->fullUrl());
            }
        }

        return $next($request);
    }
}
