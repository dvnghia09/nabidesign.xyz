<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Helper\Cart;

class CartController extends Controller
{
    public function showCart(){
        $category = Category::all()->sortByDesc("id");
        $cart = new Cart();
        $totalPrice = $cart->getTotalPrice();
        $totalQuantity = $cart->getTotalQuantity();
        return view('cart', compact('category','cart','totalPrice','totalQuantity'));
    }

    public function add(Request $req){
        
        $req->validate([
            'color'=> ['required'],
            'size'=> ['required'],
        ],[
            'size.required'=> 'Vui lòng chọn size',
            'color.required' => 'Vui lòng chọn màu'
        ]);
        $product = Product::find($req->id);
        
        $cart = new Cart();
        $cart->add($product, $req->quantity,$req->size,$req->color);

        return redirect()->route('showCart.user');
    }

    public function update(Request $req){
        $id = ($req->id);

        $cart = new Cart();
        $cart->update($id, $req->quantity);
        return redirect()->route('showCart.user');
    }

    public function delete($id){
        $cart = new Cart();
        $cart->delete($id);
        return redirect()->route('showCart.user');
    }
}
