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
use App\Models\HomeSection;
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

        $product = Product::where('status', 1)->orderByDesc('id')->take(8)->get();

        // --- Dynamic Home Sections ---
        $homeSections = HomeSection::orderBy('id')->get();
        $sectionsData = [];

        foreach ($homeSections as $section) {
            $limit = $section->limit ?? 8;
            $products = collect(); // Khởi tạo mảng rỗng

            if ($section->category_sub_id) {
                // Theo danh mục con
                $products = Product::where('status', 1)
                    ->where('category_id', $section->category_sub_id)
                    ->orderByDesc('id')
                    ->take($limit)
                    ->get();
            } else {
                if ($section->type == 'sale') {
                    // Sản phẩm giảm giá nhiều nhất
                    $products = Product::where('status', 1)->orderByRaw('sale_price/price ASC')->take($limit)->get();
                } elseif ($section->type == 'top_buy') {
                    // Sản phẩm bán chạy nhất
                    $ads = OrderDetail::pluck('id_product')->toArray();
                    $test = array_count_values($ads);
                    arsort($test);
                    $abc = array_keys($test);

                    if (!empty($abc)) {
                        $products = Product::where('status', 1)
                            ->whereIn('id', $abc)
                            ->orderByRaw("field(id,".implode(',',$abc).")")
                            ->take($limit)
                            ->get();
                    }
                } else {
                    // Sản phẩm mới nhất (latest)
                    $products = Product::where('status', 1)->orderByDesc('id')->take($limit)->get();
                }
            }

            // Chỉ hiển thị khối này ra trang chủ NẾU có sản phẩm
            if ($products->isNotEmpty()) {
                $sectionsData[] = [
                    'id' => $section->id,
                    'type' => $section->type,
                    'title' => $section->title,
                    'subtitle' => $section->subtitle,
                    'products' => $products,
                    'category_sub_id' => $section->category_sub_id
                ];
            }
        }

        // Album Thương hiệu (look book)
        $lookBook = LookBook::all();

        $cart = new Cart();
        $totalQuantity = $cart->getTotalQuantity();
        
        return view('home', compact(
            'product', 'category', 'totalQuantity',
            'sectionsData', 'lookBook', 'slider', 'proHot'
        ));
    }

    public function productParentCate($id) {
        $parentCate = Category::find($id);
        $subCateIds = CategorySub::where('category_id', $id)->pluck('id')->toArray();
        $product = Product::where('status', 1)->whereIn('category_id', $subCateIds)->get();
        $nameCate = $parentCate; 
        
        return view('product-cate', compact('product', 'nameCate'));
    }

    public function product($slug) {
        $category = Category::all()->sortByDesc("id");
        $product = Product::where('slug', $slug)->where('status', 1)->first();
        
        // Fallback for old IDs if slug not found
        if (!$product) {
            $product = Product::where('id', $slug)->where('status', 1)->first();
        }

        if (!$product) {
            abort(404);
        }

        $id = $product->id;
        $images = ImageProduct::where('product_id', $id)->pluck('images')->toArray();

        $cate_id = $product->category_id;
        $productSame = Product::where('status', 1)->where('category_id',$cate_id)->where('id','<>', $id)->get();

        $catePro =  CategorySub::find($cate_id);

        $attrIds = ProductAttr::where('id_product', $id)->pluck('id_attr')->toArray();
        $attributes = AttrProduct::whereIn('id', $attrIds)->get()->groupBy('name');
            
        return view('product-detail',compact('category','product','images','attributes','productSame','catePro'));
    }

    public function productCate($id) {
        $nameCate = CategorySub::find($id);
        $product = Product::where('status', 1)->where('category_id',$id)->get();
        
        return view('product-cate',compact('product','nameCate'));
    }

    public function search(Request $request) {
        $key = $request->key;
        $product = Product::where('status', 1)->where('name', 'LIKE', "%{$key}%")->get();

        return view('product-search',compact('product','key'));
    }

    public function seeAll() {
        $name = 'Mẫu mới';
        $product = Product::where('status', 1)->orderByDesc('id')->get();
        return view('see-all',compact('product','name'));
    }

    public function seeAllSale() {
        $name = 'Top sale';
        $product = Product::where('status', 1)->orderByRaw('sale_price/price ASC')->take(12)->get();
        return view('see-all',compact('product','name'));
    }

    public function seeAllBuy() {
        $name = 'Top bán chạy';
        $ads = OrderDetail::pluck('id_product')->toArray();
        $test = array_count_values($ads);
        arsort($test);
        $abc = array_keys($test);

        $product = Product::where('status', 1)
        ->whereIn('id', $abc)
        ->orderByRaw("field(id,".implode(',',$abc).")")
        ->take(8)
        ->get();
        return view('see-all',compact('product','name'));
    }
}
