<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategorySub;
use App\Models\Category;
use App\Http\Requests\CategorySub\AddCategorySubRequest;
use App\Http\Requests\CategorySub\UpdateCategorySubRequest;
use Illuminate\Support\Facades\DB;

class CategorySubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categorySub = CategorySub::all();
        return view('admin.categorysub.index', compact('categorySub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.categorysub.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategorySubRequest $request)
    {   
        // dd($request->all());
        $categorySub = CategorySub::create($request->all());

        if($categorySub){
            return redirect()->route('category-sub.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorySub = CategorySub::find($id);
        // $category = Category::all();
        return view('admin.categorysub.update', compact('categorySub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategorySubRequest $request, $id)
    {
        $categorySub = CategorySub::find($id);
        $update = $categorySub->update([
            'name'=> $request->name,
            'status'=> $request->status
        ]);
        if($update){
            return redirect()->route('category-sub.index');
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {           
        $deleteProduct = DB::table('products')->where('category_id', $id)->delete();

        $categorySub = CategorySub::find($id);
        $categorySub->delete();
        return redirect()->route('category-sub.index');
    }
}
