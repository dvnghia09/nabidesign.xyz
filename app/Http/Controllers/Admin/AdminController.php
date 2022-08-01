<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginAdminRequest;
use App\Models\Oder;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function home(){
        $order = Oder::all();
        $dt = 0;
        foreach ($order as $val) {
            $dt += $val->total_price;
        }
        $view = count(DB::table('views')->get());
        return view('admin.home',compact('order', 'view', 'dt'));
    }

    public function login(){
        return view('admin.login');
    }

    public function postLogin(LoginAdminRequest $request){
        // Kiểm tra đăng nhập
        if(Auth::attempt(['email' =>$request->email, 'password' =>$request->password])){
            return redirect()->route('admin.home');
        }else{
            return redirect()->back()->with('message','Mật khẩu không đúng!')->withInput();
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('admin.home');
    }

}
