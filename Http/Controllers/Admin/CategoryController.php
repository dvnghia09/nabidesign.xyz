<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategorySub;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        
        return view('admin.category.index', compact('category'));
    }

    // view trang thêm mới category cha
    public function add(){ 
        return view('admin.category.add');
    }

    // Phương thức thực hiện thêm mới sản phẩm
    public function create(Request $req){
        $req->validate([
            'name'=> ['required','unique:categories'],
            'status'=> ['required'],
        ],[
            'name.required'=> 'Tên không được để rỗng!',
            'name.unique' => 'Tên danh mục "'.$req->name.'" đã tồn tại !'
        ]);
        
        $category = Category::create($req->all());

        if($category){
            return redirect()->route('category.index')->with('message','Danh mục '.$category->name.' được thêm mới thành công');
        }
    }

    // Trang sửa danh mục
    public function edit($id){
        $cate = Category::find($id);
        
        return view('admin.category.update',compact('cate'));
    }

    // Phương thức sửa danh mục
    public function update(Request $req,$id){
        // validate
        $req->validate([
            'name'=> 'required|unique:categories,name,'.$id,
            'status'=> ['required'],
        ],[
            'name.required'=> 'Tên không được để rỗng!',
            'name.unique' => 'Tên danh mục "'.$req->name.'" đã tồn tại !'
        ]);
        $c = Category::find($id);
        $nameOld = $c->name;
        $category = $c->update($req->all());
        
        if($category){
            return redirect()->route('category.index')->with('message','Danh mục "'.$nameOld.'" được sửa thành "'.$req->name.'"');
        };

    }

    // Phương thức xóa danh mục sản phẩm
    public function delete($id){
        
        // Lấy ra id tất cả sản phẩm thuộc danh mục con
        $idCate = DB::table('category_subs')->where('category_id', $id)->pluck('id')->toArray();
        
        // Xóa tất cả sản phẩm thuộc danh mục con của danh mục cha
        $delete = DB::table('products')->whereIn('category_id', $idCate)->delete();
        
        // Xóa tất cả danh mục con
        $categorySub = DB::table('category_subs')->where('category_id', $id)->delete();
        
        // Xóa danh mục cha
        $cate = Category::find($id);
        $cate->delete();
              
        return redirect()->route('category.index');
        
    }
}
