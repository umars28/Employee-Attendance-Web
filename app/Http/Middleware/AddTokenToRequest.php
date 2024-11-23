<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Log;
use Session;
use Symfony\Component\HttpFoundation\Response;

class AddTokenToRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = Session::get('api_token');

        if (!$token) {
            return redirect()->route('login')->with('error', 'You need to login to access this page.');
        }
    
        $request->headers->set('Authorization', 'Bearer ' . $token);    
        return $next($request);
    
    }
}
