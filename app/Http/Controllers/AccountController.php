<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Models\Category;

class AccountController extends Controller
{
    public function account(){
        return view('account');
    }

    public function user(){
        
        $category = Category::all()->sortByDesc("id");
    
        return view('user',compact('category'));
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
 
            return redirect()->route('user');
        }else{
            return redirect()->back()->with('message','Đăng nhập thất bại !');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('user');
    }


    
}
