<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Middlewhere untuk ngecek apakah user admin atau tidak
        // Ada garis merah tapi code nya jalan, mungkin karena isadmin function dari model user
        // yang dibuat sendiri jadi mungkin tidak di recognize dari sistem nya
        if(Auth::check() && Auth::user()->isAdmin()){ // isAdmin() memanggil function yang ada di model User
            return $next($request);
        }
        return redirect('/rangkitpc/builder');
    }
}
