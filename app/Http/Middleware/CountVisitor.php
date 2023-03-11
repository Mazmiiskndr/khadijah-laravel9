<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class CountVisitor
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengunjung telah memiliki cookie pengunjung
        $visitor_id = $request->cookie('visitor_id');
        if (!$visitor_id) {
            // Jika pengunjung belum memiliki cookie pengunjung, buat cookie baru
            $visitor_id = md5(time() . $request->ip());
            $response = $next($request)->cookie('visitor_id', $visitor_id, 60 * 24 * 30);
            $agent = new Agent();
            $user_agent = $agent->browser();
            // Simpan data pengunjung ke dalam basis data
            Visitor::create([
                'visitor_id' => $visitor_id,
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent')
            ]);

            return $response;
        }
        return $next($request);
    }
}
