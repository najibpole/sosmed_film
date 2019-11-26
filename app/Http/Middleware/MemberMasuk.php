<?php

namespace App\Http\Middleware;

use Closure;

class MemberMasuk
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
        if(\Auth::guard('member')->check())        
            return $next($request);
        return redirect()->route('masuk');
    }
}
