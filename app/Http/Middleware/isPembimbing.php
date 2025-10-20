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
        if (in_array(Auth::user()->role, ['Admin', 'Pembimbing'])) {
            return $next($request);
        }

        return redirect()
            ->route('dashboard')
            ->with('error', 'Fitur ini khusus Admin dan Pembimbing');
    }
}
