<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class CheckAdmin
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
        if(Auth::check()){
            if(Auth::user()->role == 1){
                return $next($request);
            }else{
                return redirect()->route('login.admin')->with('err','Tài khoản đăng nhập không đúng!')->withInput();
            }
            // Kiểm tra user có role = 1
        }else{
            return redirect()->route('login.admin');
        }
        // return $next($request);

    }
}
