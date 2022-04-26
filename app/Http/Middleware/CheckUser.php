<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class CheckUser
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
            if(Auth::user()->role == 0){
                return $next($request);
            }else{
                return redirect()->route('account')->with('err','Tài khoản đăng nhập không đúng!')->withInput();
            }
            // Kiểm tra user có role = 1
        }else{
            return redirect()->route('account');
        }
    }
}
