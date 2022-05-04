<?php

namespace App\Helper;
use Session;
Class Cart {
    // Thuộc tính 
    private $items = [];
    private $total_quantity = 0;
    private $total_price = 0;

    // phương thức khởi tạo
    public function __construct(){
        $this->items = session('cart') ? session('cart') : [];
    }

    public function add($product , $quantity,$size,$color){

        $item = [
            'product_id'=>$product->id,
            'product_name'=> $product->name,
            'size'=> $size,
            'color'=> $color,
            'image'=>$product->image,
            'price'=> $product->sale_price > 0 ? $product->sale_price : $product->price,
            'quantity'=> $quantity < 1 ? 1 : $quantity,
        ];


        if(isset($this->items[$product->id.$size.$color])){
            $this->items[$product->id.$size.$color]['quantity'] += $quantity;
        }else{
            $this->items[$product->id.$size.$color] = $item;
        }
        
        // Lưu vào session
        session(['cart'=>$this->items]);

        


        
    }

    public function getItems(){
        return $this->items;
    }

    
    
    public function getTotalQuantity(){
        $totalQuantity = 0;
        foreach($this->items as $value){
            $totalQuantity += $value['quantity'] ;
        }

        return $totalQuantity;
    }

    public function getTotalPrice(){
        $totalPrice = 0;
        foreach($this->items as $value){
            
            // dd($value['price']);
            $totalPrice += $value['quantity'] * $value['price'] ;
        }

        return $totalPrice;
    }

    public function update($id,$quantity){
        if($quantity <  1){
            $quantity = 1;
        }

        $this->items[$id]['quantity'] = $quantity;
        session(['cart'=>$this->items]);
    }
 
    public function delete($id){
        if(isset($this->items[$id])){
            unset($this->items[$id]);  
        }
        session(['cart'=>$this->items]);  
    }
}