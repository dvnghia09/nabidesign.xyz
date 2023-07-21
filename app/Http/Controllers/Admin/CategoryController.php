<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategorySub;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::all();
        
        return view('admin.category.index', compact('category'));
    }

    public function add() { 
        return view('admin.category.add');
    }

    public function create(Request $req) {
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

    public function edit($id) {
        $cate = Category::find($id);
        
        return view('admin.category.update',compact('cate'));
    }

    public function update(Request $req,$id) {
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

    public function delete($id) {
        $idCate = DB::table('category_subs')->where('category_id', $id)->pluck('id')->toArray();
        $delete = DB::table('products')->whereIn('category_id', $idCate)->delete();
        $categorySub = DB::table('category_subs')->where('category_id', $id)->delete();
        $cate = Category::find($id);
        $cate->delete();
              
        return redirect()->route('category.index');
    }
}
