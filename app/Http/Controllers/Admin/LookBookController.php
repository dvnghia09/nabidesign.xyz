<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LookBook;
use App\Http\Requests\LookBookRequest;
use Illuminate\Support\Facades\File;

class LookBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lookBook = LookBook::all();
        return view('admin.look-book.index',compact('lookBook'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lookBook = LookBook::find($id);
        return view('admin.look-book.update',compact('lookBook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LookBookRequest $request, $id)
    {
        $lookBook = LookBook::find($id);
        
        // Update  ảnh
            if($request->hasFile('file')){
            // Xóa ảnh cũ
            File::delete('images/'.$lookBook->image); 

            $imageName = time().'_'.$request->file('file')->getClientOriginalName();
            $request->file->move(public_path('images'),$imageName);
        }else{
            $imageName = $lookBook->image;
        }

        $lookBook->update([
            'name' => $request->name,
            'link' => $request->link,
            'image' => $imageName,
        ]);

        return redirect()->route('look-book.index')->with('message','Sửa look book thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
