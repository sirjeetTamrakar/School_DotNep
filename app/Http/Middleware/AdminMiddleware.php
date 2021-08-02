<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    const SUPER_ADMIN = 1 ;
    const ADMIN = 2;
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->role_id == self::ADMIN || Auth::user()->role_id == self::SUPER_ADMIN){
                return $next($request);
            }
            else{
                return redirect()->route('admin.unauthorized');
            }
        }else{
            return redirect('/');
        }
    }
}
