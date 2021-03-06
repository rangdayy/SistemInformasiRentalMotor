<?php

namespace App\Http\Middleware;

use Closure;

class cekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('nama_user')) {
            return $next($request);
        } else {
            return redirect('/rental/login');
        }
    }
}
