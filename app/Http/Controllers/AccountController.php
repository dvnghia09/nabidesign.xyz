<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\Oder;
use Session;

class AccountController extends Controller
{
    public function account(){
        
        if (strpos(url()->previous(), 'account') == false) {
            session(['ads' => url()->previous()]);
        }
        
        return view('account');
    }

    public function user(){
        
        $category = Category::all()->sortByDesc("id");
        $order = Oder::where('id_user', Auth::id())->get();
        return view('user',compact('category', 'order'));
    }

    public function register(RegisterRequest $req){
        $user = User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
        ]);

        if($user){
            return redirect()->back()->with('message','Đăng ký tài khoản thành công vui lòng đăng nhập !');
        }
    }

    public function login(Request $req){
        if (Auth::attempt(['email'=>$req->email,'password'=>$req->password])) {
            if (strpos(Session::get('ads'), 'cart') != false) {
                Session::forget('ads');
                return redirect()->route('checkout.index');
            } else {
                Session::forget('ads');
                return redirect()->route('user');
            }
        }else{
            return redirect()->back()->with('message','Đăng nhập thất bại !');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('user');
    }


    
}
