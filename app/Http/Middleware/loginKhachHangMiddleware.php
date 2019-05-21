<?php

namespace App\Http\Middleware;

use App\Nguoidung;
use Closure;
use Illuminate\Support\Facades\Auth;

class loginKhachHangMiddleware
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
        if (Auth::check()) {
            $user=Auth::user();
            if ($user->Quyen == Nguoidung::KHACHHANG) {
                return $next($request);
            }else{
                return redirect()->route('trangchu')->with('error', 'Incorrect information!!!');
            }

        }else{
            return redirect()->route('login');
        }
    }
}
