<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isPembimbing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Admin (1) dan Admin Bidang (2) boleh akses
        if(Auth::user()->role == 'Pembimbing'){
            return $next($request);
        }else{
            return redirect()->route('dashboard')->with('error', 'Anda Tidak Punya Akses');
        }
    }
}
