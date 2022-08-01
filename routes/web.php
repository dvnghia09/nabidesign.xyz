<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategorySubController;
use App\Http\Controllers\Admin\AttrController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\LookBookController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\CheckOutController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route Login để vào trang Admin
Route::get('login-admin', [AdminController::class,'login'])->name('login.admin');
Route::post('login-admin', [AdminController::class,'postLogin'])->name('postLogin.admin'); 
Route::get('logout-admin', [AdminController::class,'logout'])->name('logout.admin'); 

Route::middleware('checkAdmin')->prefix('admin')->group(function(){
    // Trang chủ admin
    Route::get('/', [AdminController::class,'home'])->name('admin.home');

    // -------------Phần menu cha-------------------
    // Trang danh sách menu
    Route::get('/category', [CategoryController::class,'index'])->name('category.index');
    // Trang thêm mới menu
    Route::get('/add-category', [CategoryController::class, 'add'])->name('add.category');
    Route::post('/create-category', [CategoryController::class, 'create'])->name('create.category');
    // Sửa menu
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
    Route::post('/edit-category/{id}',[CategoryController::class,'update'])->name('update.category');
    // Xóa menu
    Route::get('/delete-category/{id}',[CategoryController::class,'delete'])->name('delete-category');

    // -----------Phần menu con-----------------------
    Route::resource('category-sub', CategorySubController::class);
    
    // -----------Phần sản phẩm ---------------------
    // Danh sách sản phẩm 
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    // Giao diện thêm sản phẩm
    Route::get('/add-product',[ProductController::class,'add'])->name('add.product');
    Route::post('/add-product',[ProductController::class,'create'])->name('create.product');
    // Sửa sản phẩm
    Route::get('/edit-product/{id}',[ProductController::class,'edit'])->name('edit.product');
    Route::post('/update-product{id}', [ProductController::class,'update'])->name('update.product');
    // Xóa sản phẩm 
    Route::get('/delete-product/{id}',[ProductController::class,'delete'])->name('delete.product');

    // ---------------Phần thuộc tính sản phẩm-----------
    Route::resource('attr-product', AttrController::class);
    // ---------------Banner-----------------------------
    Route::resource('banner', BannerController::class);
    // ---------------LookBook-----------------------------
    Route::resource('look-book', LookBookController::class);

    // ---------------Danh sách đơn hàng-------------------
    Route::resource('order', OrderController::class);


});


Route::prefix('/')->group(function(){

    Route::get('/', [HomeController::class,'home'])->name('home');
    // Trang chi tiết sản phẩm
    Route::get('/product-detail/{id}', [HomeController::class,'product'])->name('product.detail');
    // Lấy sản phẩm theo danh mục
    Route::get('/product-category/{id}', [HomeController::class,'productCate'])->name('product.category');
    // Sản phẩm theo tìm kiếm
    Route::post('/product-search', [HomeController::class,'search'])->name('product.search');
    // Xem tất cả mẫu mới
    Route::get('/see-all', [HomeController::class,'seeAll'])->name('see.all');
    // Xem tất cả mẫu mới
    Route::get('/see-all-sale', [HomeController::class,'seeAllSale'])->name('see.all.sale');
    // Xem tất cả mẫu mới
    Route::get('/see-all-buy', [HomeController::class,'seeAllBuy'])->name('see.all.buy');
    


    // Trang quản lý của người dùng
    Route::middleware('checkUser')->prefix('/')->group(function () {
        
         // -------------------Đặt hàng(checkout)--------------------------
         Route::get('/user',[AccountController::class,'user'])->name('user');
         Route::get('logout-user', [AccountController::class,'logout'])->name('logout.user');
         
         Route::get('checkout', [CheckOutController::class,'index'])->name('checkout.index');
         Route::post('checkout', [CheckOutController::class,'AddOder'])->name('checkout.addOder');
         // Trang cảm ơn
         Route::get('thanks', [CheckOutController::class,'thanks'])->name('checkout.thanks');
         
  
    });
    // Giỏ hàng
    Route::get('show-cart',[CartController::class,'showCart'] )->name('showCart.user');
    // Sản phẩm vào giỏ hàng
    Route::post('add-cart', [CartController::class,'add'])->name('add.cart');
    // Update số lượng sản phẩm trong giỏ hàng
    Route::post('update-cart', [CartController::class,'update'])->name('update.cart');
    // Xóa sản phẩm trong giỏ hàng 
    Route::get('delete-cart/{id}',[CartController::class,'delete'] )->name('delete.cart');



    // ------------Đăng ký đăng nhập vào trang của người dùng -------------
    Route::get('/account', [AccountController::class,'account'])->name('account');
    // Đăng ký
    Route::post('/register', [AccountController::class,'register'])->name('account.register');
    // Đăng nhập
    Route::post('/login', [AccountController::class,'login'])->name('account.login');
});



