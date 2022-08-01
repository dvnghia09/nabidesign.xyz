<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Http\Requests\AddOderRequest;
use App\Models\Oder;
use App\Models\OderDetail;
use Session;
use Mail;
use App\Mail\NewOrder;

class CheckOutController extends Controller
{
    public function index(){
        $cart = new Cart();
        $totalPrice = $cart->getTotalPrice();
        $totalQuantity = $cart->getTotalQuantity();
        return view('checkout', compact('cart','totalPrice','totalQuantity'));
    }


    public function AddOder(AddOderRequest $request){
        $cart = new Cart();
        $totalPrice = $cart->getTotalPrice();
        $totalQuantity = $cart->getTotalQuantity();

        $oder = Oder::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'addrest' => $request->address,
            'quantity' => $totalQuantity,
            'total_price' => $totalPrice,
            'note' => $request->note,
            'id_user' => $request->id_user,
        ]);

        foreach($cart->getItems() as $value){
            OderDetail::create([
                'id_product' => $value['product_id'],
                'product_name' => $value['product_name'],
                'image' => $value['image'],
                'oder_id' => $oder->id,
                'quantity' => $value['quantity'],
                'price' => $value['price'],
                'color' => $value['color'],
                'size' => $value['size'],
            ]);
        }


        if($oder){
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new NewOrder($oder->id, $cart->getItems()));
            Session::forget('cart');
            return redirect()->route('checkout.thanks');
        }
        
    }

    public function thanks(){

        return view('thanks');
    }
}
