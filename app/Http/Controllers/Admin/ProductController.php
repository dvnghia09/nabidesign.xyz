<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategorySub;
use App\Models\Product;
use App\Models\ImageProduct;
use App\Models\AttrProduct;
use App\Models\ProductAttr;
use App\Http\Requests\Product\AddProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    public function add(){
        $attrColor = AttrProduct::where('name','color')->get();
        $attrSize = AttrProduct::where('name','size')->get();
        $categorysub = CategorySub::all();
        return view('admin.product.add',compact('categorysub','attrColor','attrSize'));
    }

    public function create(AddProductRequest $req){ 
        // Up 1 ảnh
        if($req->hasFile('file')){
            $imgFile = $req->file('file')->getClientOriginalName();
            $imageName = time().'_'.$imgFile;
            $req->file->move(public_path('images'), $imageName);
        }
        
        $req->merge(['image' => $imageName ]);
        $product = Product::create($req->all());

        // Up nhiều ảnh
        $files = [];
        if ($req->hasFile('files')){
            
            foreach($req->file('files') as $key => $file)
            {   
                $fileName = time().'_'.$file->getClientOriginalName();  
                $file->move(public_path('images'), $fileName);
                $files[]['images'] = $fileName;
            }
        }
  
        foreach ($files as $key => $file) {
            ImageProduct::create([
                'images'=> $file['images'],
                'product_id'=> $product->id
            ]);
        }

        $attr = $req->attr;
        if(!empty($attr)){
            foreach($attr as $value){
             
                ProductAttr::create([
                    'id_attr' => $value,
                    'id_product' => $product->id,
                ]);
            
            }
        }

        if($product){
            return redirect()->route('product.index')->with('message','Thêm mới sản phẩm "'.$req->name.'" thành công');
        }
    }

    public function edit($id){
        $attr = ProductAttr::where('id_product', $id)->pluck('id_attr')->toArray();



        $attrColor = AttrProduct::where('name','color')->get();
        $attrSize = AttrProduct::where('name','size')->get();
        $product = Product::find($id);
        $imageProduct = ImageProduct::where('product_id',$id)->pluck('images')->toArray();
        $categorysub = CategorySub::all();
        return view('admin.product.update', compact('categorysub','product','imageProduct','attrColor','attrSize','attr'));
    }

    public function update(UpdateProductRequest $request ,$id){
        
        // insert các thuộc tính vào
        $attr = $request->attr;
        if(!empty($attr)){
            // Xóa thuộc tính sản phẩm trước
            ProductAttr::where('id_product', $id)->delete();   
        foreach($attr as $value){
         
            ProductAttr::create([
                'id_attr' => $value,
                'id_product' => $id,
            ]);
        
            }
        }

        $product = Product::find($id);
        
        // Update 1 ảnh
            if($request->hasFile('file')){
            // Xóa ảnh cũ
            File::delete('images/'.$product->image); 

            $imageName = time().'_'.$request->file('file')->getClientOriginalName();
            $request->file->move(public_path('images'),$imageName);
        }else{
            $imageName = $product->image;
        }

        // Nhiều ảnh
        $files = [];
        if ($request->hasFile('files')){
            $imageOld = ImageProduct::where('product_id',$id)->get();
            foreach($imageOld as $value){
                File::delete('images/'.$value->images);
            }

            $deleteImages = ImageProduct::where('product_id',$id)->delete();
            
            foreach($request->file('files') as $key => $file)
            {   
                $fileName = time().'_'.$file->getClientOriginalName();  
                $file->move(public_path('images'), $fileName);
                $files[]['images'] = $fileName;
            }
        }
        
        foreach ($files as $key => $file) {
            ImageProduct::create([
                'images'=> $file['images'],
                'product_id'=> $product->id
            ]);
        }

        $product->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'category_id' => $request->category_id,
            'image' => $imageName,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        
        return redirect()->route('product.index')->with('message','Sửa sản phẩm thành công');
        

    }

    public function delete($id){
        // Xóa ảnh trong file khi xóa sản phẩm
        $imageOld = ImageProduct::where('product_id',$id)->get();
        foreach($imageOld as $value){
            File::delete('images/'.$value->images);
        }

        ImageProduct::where('product_id', $id)->delete();
        $product = Product::find($id);


        $product->delete();

        return redirect()->route('product.index')->with('message','Xóa thành công');
        
    }
}
