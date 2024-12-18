<?php

namespace App\Http\Middleware;

use App\Enums\RoleType;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('api')->user();
        if ($user && $user->role === RoleType::ADMIN) {
            return $next($request);
        }

        return redirect()->back();
    }
}
