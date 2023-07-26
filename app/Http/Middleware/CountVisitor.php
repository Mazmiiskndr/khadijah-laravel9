<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class CountVisitor
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the visitor already has a visitor cookie
        $visitor_id = $request->cookie('visitor_id');

        // If the visitor doesn't have a visitor cookie
        if (!$visitor_id) {
            // Create a new visitor cookie by taking the md5 hash of the current time and the client's IP address
            $visitor_id = md5(time() . $request->ip());

            // Pass the request to the next middleware and add the visitor_id cookie to the response
            $response = $next($request)->cookie('visitor_id', $visitor_id, 60 * 24 * 30);

            // Instantiate the Agent class to get information about the client's browser
            $agent = new Agent();
            $user_agent = $agent->browser();

            // Store visitor data in the database
            Visitor::firstOrCreate(
                ['visitor_id' => $visitor_id],
                [
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->header('User-Agent')
                ]
            );

            // Return the response with the added visitor_id cookie
            return $response;
        }

        // If the visitor already has a visitor cookie, simply pass the request to the next middleware
        return $next($request);
    }
}
