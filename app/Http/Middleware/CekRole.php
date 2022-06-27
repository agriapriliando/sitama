<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::user() && session()->get('user') == $role) {
            if (session()->get('check') == 1) {
                return $next($request);
            } else {
                return redirect('login')->with('status','Akun Anda Dinonaktifkan, Silahkan Hubungi Pengelola Beasiswa');
            }
        }
        return redirect('login')->with('status', 'Anda tidak memiliki akses, Login terlebih dahulu');
    }
}
