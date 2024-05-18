<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        // if user melakukan login sebagai ADMIN maka akan di lanjutkan ke halaman ADMIN
        if (Auth::user() && Auth::user()->roles == 'ADMIN') {
            return $next($request);
        }

        // jika user melakukan login selain dari ADMIN maka akan di arahkan ke halaman Utama
        return redirect('/');
    }
}
