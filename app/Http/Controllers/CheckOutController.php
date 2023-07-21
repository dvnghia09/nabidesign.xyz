<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Http\Requests\AddOderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use Session;
use Mail;
use App\Mail\NewOrder;
use App\Jobs\NewJob;

class CheckOutController extends Controller
{
    public function index() {
        $cart = new Cart();
        $totalPrice = $cart->getTotalPrice();
        $totalQuantity = $cart->getTotalQuantity();
        return view('checkout', compact('cart','totalPrice','totalQuantity'));
    }

    public function AddOder(AddOderRequest $request) {
        $cart = new Cart();
        $totalPrice = $cart->getTotalPrice();
        $totalQuantity = $cart->getTotalQuantity();

        $order = Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'addrest' => $request->address,
            'quantity' => $totalQuantity,
            'total_price' => $totalPrice,
            'note' => $request->note,
            'id_user' => $request->id_user,
        ]);

        foreach($cart->getItems() as $value){
            OrderDetail::create([
                'id_product' => $value['product_id'],
                'id_order' => $order->id,
                'quantity' => $value['quantity'],
                'price' => $value['price'],
                'color' => $value['color'],
                'size' => $value['size'],
            ]);
        }

        if($order){
            Mail::to('daovannghia1392001@gmail.com')->send(new NewOrder($order->id, $cart->getItems()));
            // NewJob::dispatch($order->id, $cart->getItems())->delay(now()->addSeconds(20));
            Session::forget('cart');

            return redirect()->route('checkout.thanks');
        }
    }

    public function thanks() {
        return view('thanks');
    }
}
