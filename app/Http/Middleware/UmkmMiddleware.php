<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UmkmMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // approved
        if (auth()->user()->role == 'admin' || auth()->user()->umkm->approved == 1) {
            return $next($request);
        }else{
            return redirect()->route('profile')->with('error','Anda belum di approve oleh admin');
        }
    }
}
