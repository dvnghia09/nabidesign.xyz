<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ImageProduct;
use App\Models\ProductAttr;
use App\Models\AttrProduct;
use App\Helper\Cart;

class HomeController extends Controller
{
    public function home(){
        $category = Category::all()->sortByDesc("id");
        $product = Product::all();

        $cart = new Cart();
        $totalQuantity = $cart->getTotalQuantity();
        return view('home', compact('product','category','totalQuantity'));
    }


    // Trang product detail
    public function product($id){
        
        $category = Category::all()->sortByDesc("id");
        $product = Product::find($id);
        $images = ImageProduct::where('product_id', $id)->pluck('images')->toArray();

        $attr = ProductAttr::where('id_product', $id)->pluck('id_attr')->toArray();
        $attrColor = AttrProduct::where('name','color')->pluck('id')->toArray();
        $attrSize = AttrProduct::where('name','size')->pluck('id')->toArray();

            // Lấy ra danh sách các màu
            $colorArr = [];
            foreach($attr as $key => $value){
                if(in_array($value,$attrColor)){
                    $colorArr[$key] = $value;   
                }
            }
            $color = AttrProduct::whereIn('id',$colorArr)->pluck('value')->toArray();

            // Lấy ra danh sách các size
            $sizeArr = [];
            foreach($attr as $key => $value){
                if(in_array($value,$attrSize)){
                    $sizeArr[$key] = $value;   
                }
            }
            $size = AttrProduct::whereIn('id',$sizeArr)->pluck('value')->toArray();
            

        return view('product-detail',compact('category','product','images','color','size'));
    }

    


}
