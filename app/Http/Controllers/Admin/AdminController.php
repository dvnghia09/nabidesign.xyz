<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginAdminRequest;
use App\Models\Oder;

class AdminController extends Controller
{
    public function home(){
        $order = Oder::all();
        return view('admin.home',compact('order'));
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
