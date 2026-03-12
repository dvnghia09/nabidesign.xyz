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
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index() {
        
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    public function add() {
        $attributes = AttrProduct::all()->groupBy('name');
        $categorysub = CategorySub::all();
        return view('admin.product.add',compact('categorysub','attributes'));
    }

    public function create(AddProductRequest $req) { 
        if($req->hasFile('file')) {
            $imgFile = $req->file('file')->getClientOriginalName();
            $imageName = time().'_'.uniqid().'_'.$imgFile;
            $req->file->move(public_path('images'), $imageName);
        }
        
        $data = $req->all();
        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['name']);
        $data['image'] = $imageName ?? '';
        $data['price'] = $data['price'] ?? 0;
        $data['sale_price'] = $data['sale_price'] ?? 0;
        $product = Product::create($data);

        $files = [];
        if ($req->hasFile('files')) {
            foreach($req->file('files') as $key => $file)
            {   
                $fileName = time().'_'.uniqid().'_'.$file->getClientOriginalName();  
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

        // Xử lý thuộc tính động (Checkbox IDs)
        $attr = $req->attr;
        if(!empty($attr)) {
            foreach($attr as $value) {
                ProductAttr::create([
                    'id_attr' => $value,
                    'id_product' => $product->id,
                ]);
            }
        }

        // Xử lý thuộc tính nhập tay (Names & Values)
        $attr_values = $req->attr_values;
        if(!empty($attr_values)) {
            foreach ($attr_values as $name => $valString) {
                if (!$valString) continue;
                $vals = explode(',', $valString);
                foreach ($vals as $v) {
                    $v = trim($v);
                    if ($v) {
                        $attrObj = AttrProduct::firstOrCreate(['name' => $name, 'value' => $v]);
                        ProductAttr::firstOrCreate([
                            'id_attr' => $attrObj->id,
                            'id_product' => $product->id,
                        ]);
                    }
                }
            }
        }

        if($product) {
            return redirect()->route('product.index')->with('message','Thêm mới sản phẩm "'.$req->name.'" thành công');
        }
    }

    public function edit($id) {
        $attrIds = ProductAttr::where('id_product', $id)->pluck('id_attr')->toArray();
        $attributes = AttrProduct::all()->groupBy('name');
        
        // Group selected attribute values for display in text inputs
        $selectedAttrs = AttrProduct::whereIn('id', $attrIds)->get()->mapToGroups(function ($item, $key) {
            return [$item->name => $item->value];
        })->map(function ($item) {
            return $item->implode(', ');
        })->toArray();

        $product = Product::find($id);
        $imageProduct = ImageProduct::where('product_id',$id)->pluck('images')->toArray();
        $categorysub = CategorySub::all();
        return view('admin.product.update', compact('categorysub','product','imageProduct','attributes','attrIds', 'selectedAttrs'));
    }

    public function update(UpdateProductRequest $request ,$id) {
        ProductAttr::where('id_product', $id)->delete();   
        
        // Xử lý thuộc tính động (Checkbox IDs)
        $attrIDs = $request->attr;
        if(!empty($attrIDs)) {
            foreach($attrIDs as $id_attr) {
                ProductAttr::create([
                    'id_attr' => $id_attr,
                    'id_product' => $id,
                ]);
            }
        }

        // Xử lý thuộc tính nhập tay (Names & Values)
        $attr_values = $request->attr_values;
        if(!empty($attr_values)) {
            foreach ($attr_values as $name => $valString) {
                if (!$valString) continue;
                $vals = explode(',', $valString);
                foreach ($vals as $v) {
                    $v = trim($v);
                    if ($v) {
                        $attrObj = AttrProduct::firstOrCreate(['name' => $name, 'value' => $v]);
                        ProductAttr::firstOrCreate([
                            'id_attr' => $attrObj->id,
                            'id_product' => $id,
                        ]);
                    }
                }
            }
        }

        $product = Product::find($id);
        if($request->hasFile('file')) {
            File::delete(public_path('images/'.$product->image)); 
            $imageName = time().'_'.uniqid().'_'.$request->file('file')->getClientOriginalName();
            $request->file->move(public_path('images'),$imageName);
        } else {
            $imageName = $product->image;
        }

        $files = [];
        if ($request->hasFile('files')) {
            $imageOld = ImageProduct::where('product_id',$id)->get();
            foreach($imageOld as $value) {
                File::delete(public_path('images/'.$value->images));
            }
            $deleteImages = ImageProduct::where('product_id',$id)->delete();
            
            foreach($request->file('files') as $key => $file)
            {   
                $fileName = time().'_'.uniqid().'_'.$file->getClientOriginalName();  
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
            'slug' => $request->slug ? Str::slug($request->slug) : Str::slug($request->name),
            'quantity' => $request->quantity,
            'price' => $request->price ?? 0,
            'sale_price' => $request->sale_price ?? 0,
            'category_id' => $request->category_id,
            'image' => $imageName,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('product.index')->with('message','Sửa sản phẩm thành công');
    }

    public function delete($id){
        $imageOld = ImageProduct::where('product_id',$id)->get();
        foreach($imageOld as $value){
            File::delete(public_path('images/'.$value->images));
        }
        ImageProduct::where('product_id', $id)->delete();
        $product = Product::find($id);
        if ($product) {
            File::delete(public_path('images/'.$product->image));
            $product->delete();
        }

        return redirect()->route('product.index')->with('message','Xóa thành công');
    }
}
