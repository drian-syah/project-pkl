<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isSekolah
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role=='sekolah'){
            return $next($request);
        }else{
            return redirect()->route('dashboard')->with('error', 'Anda Tidak Punya Akses');
        }
    }
}
