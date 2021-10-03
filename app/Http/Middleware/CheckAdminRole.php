<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Semak role user yang tengah login
        if (!$request->user()->isAdmin())
        {
            Auth::logout();
            abort(403);
            // return redirect()->route('login')
            // ->withErrors('Anda tidak mempunyai akses ke halaman tadi.');
        }
        // Kalau ok semua, bawa beliau ke halaman yang dipohon
        return $next($request);
    }
}
