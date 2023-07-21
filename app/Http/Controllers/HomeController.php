<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategorySub;
use App\Models\ImageProduct;
use App\Models\ProductAttr;
use App\Models\AttrProduct;
use App\Models\LookBook;
use App\Helper\Cart;
use App\Models\Banner;
use App\Models\OrderDetail;
use Session;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home() {
        if (!Session::get("view")) {
            Session::put("view", 1); 
            DB::table('views')->insert(['view' => 1]);
        }

        $slider = Banner::whereName('slide')->get();

        $proHot = Banner::whereName('product')->first();
        
        $category = Category::all()->sortByDesc("id");

        $product = Product::all()->sortByDesc("id")->take(8);

        $productSale = Product::orderByRaw('sale_price/price ASC')->take(8)->get();

        $ads = OrderDetail::pluck('id_product')->toArray();
        $test = array_count_values($ads);
        arsort($test);
        $abc = array_keys($test);

        $productTopSale = [];
        if ($abc) {
            $productTopSale = Product::whereIn('id', $abc)
            ->orderByRaw("field(id,".implode(',',$abc).")")
            ->take(4)
            ->get();
        }

        // Album look book
        $lookBook = LookBook::all();

        $cart = new Cart();
        $totalQuantity = $cart->getTotalQuantity();
        return view('home', compact('product', 'category', 'totalQuantity', 'productSale', 'productTopSale', 'lookBook', 'slider', 'proHot'));
    }

    public function product($id) {
        $category = Category::all()->sortByDesc("id");
        $product = Product::find($id);
        $images = ImageProduct::where('product_id', $id)->pluck('images')->toArray();

        $cate_id = $product->category_id;
        $productSame = Product::where('category_id',$cate_id)->where('id','<>', $id)->get();

        $catePro =  CategorySub::find($cate_id);

        $attr = ProductAttr::where('id_product', $id)->pluck('id_attr')->toArray();
        $attrColor = AttrProduct::where('name','color')->pluck('id')->toArray();
        $attrSize = AttrProduct::where('name','size')->pluck('id')->toArray();

        $colorArr = [];
        foreach($attr as $key => $value){
            if(in_array($value,$attrColor)){
                $colorArr[$key] = $value;   
            }
        }
        $color = AttrProduct::whereIn('id',$colorArr)->pluck('value')->toArray();

        $sizeArr = [];
        foreach($attr as $key => $value) {
            if(in_array($value,$attrSize)) {
                $sizeArr[$key] = $value;   
            }
        }
        $size = AttrProduct::whereIn('id',$sizeArr)->pluck('value')->toArray();
            
        return view('product-detail',compact('category','product','images','color','size','productSame','catePro'));
    }

    public function productCate($id) {
        $nameCate = CategorySub::find($id);
        $product = Product::where('category_id',$id)->get();
        
        return view('product-cate',compact('product','nameCate'));
    }

    public function search(Request $request) {
        $key = $request->key;
        $product = Product::where('name', 'LIKE', "%{$key}%")->get();

        return view('product-search',compact('product','key'));
    }

    public function seeAll() {
        $name = 'Mẫu mới';
        $product = Product::all()->sortByDesc("id");
        return view('see-all',compact('product','name'));
    }

    public function seeAllSale() {
        $name = 'Top sale';
        $product = Product::orderByRaw('sale_price/price ASC')->take(12)->get();
        return view('see-all',compact('product','name'));
    }

    public function seeAllBuy() {
        $name = 'Top bán chạy';
        $ads = OrderDetail::pluck('id_product')->toArray();
        $test = array_count_values($ads);
        arsort($test);
        $abc = array_keys($test);

        $product = Product::whereIn('id', $abc)
        ->orderByRaw("field(id,".implode(',',$abc).")")
        ->take(8)
        ->get();
        return view('see-all',compact('product','name'));
    }
}
