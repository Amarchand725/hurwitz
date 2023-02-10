<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty($request->bearerToken())) {
            $user = User::where('remember_token', $request->bearerToken())->first();
            if (empty($user)) {
                return apiResponse(false , "Un-authorize Access, Please login to continue", null ,500);
            }
            return $next($request);
        }
        return apiResponse(false , "Un-authorize Access, Please login to continue", null ,500);
    }
}
