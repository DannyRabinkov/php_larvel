<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Symfony\Component\HttpFoundation\Response;
// use Stevebauman\Location\Facades\Location;

class CheckIpMiddleware
{
    public $allowedCountries = ['AU', 'UK', 'GB'];


    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $location = Location::get($ip);
        $code = $location->countryCode ?? null;
        if ($code && in_array($code, $allowedCountries)) {
            return response()->json(['message' => 'You cant access this site from your current location']);
        } else {
            return $next($request);
        }
    }
}
