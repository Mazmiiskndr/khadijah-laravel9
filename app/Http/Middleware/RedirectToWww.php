<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectToWww
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (env('APP_ENV') !== 'local') {
            // Check if the host starts with 'www.'
            if (substr($request->header('Host'), 0, 4) !== 'www.') {
                $request->headers->set('Host', 'www.' . $request->header('Host'));

                return redirect($request->fullUrl());
            }
            // Check if the request is secure (HTTPS)
            if (!$request->secure()) {
                // Redirect to the HTTPS version of the requested URL
                return redirect()->secure($request->getRequestUri());
            }
        }

        return $next($request);
    }
}
