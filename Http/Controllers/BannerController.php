<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use File;
use App\Http\Requests\BannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $banner = Banner::all();
        return view('admin.banner.index',compact('banner'));
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
        $banner = Banner::find($id);
        return view('admin.banner.update', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {       
        
        
        $banner = Banner::find($id);
        // Update 1 ảnh
        if($request->hasFile('file1')){
            // Xóa ảnh cũ
            if(file_exists('images/'.$banner->banner1)){
                File::delete('images/'.$banner->banner1); 
            }

            $imageName = time().'_'.$request->file('file1')->getClientOriginalName();
            $request->file1->move(public_path('images'),$imageName);

            $banner->update([
                'banner1' => $imageName,
            ]);
        }

        if($request->hasFile('file2')){
            // Xóa ảnh cũ
            if(file_exists('images/'.$banner->banner2)){
                File::delete('images/'.$banner->banner2); 
            }

            $imageName = time().'_'.$request->file('file2')->getClientOriginalName();
            $request->file2->move(public_path('images'),$imageName);

            $banner->update([
                'banner2' => $imageName,
            ]);
        }

        if($request->hasFile('file3')){
            // Xóa ảnh cũ
            if(file_exists('images/'.$banner->banner3)){
                File::delete('images/'.$banner->banner3); 
            } 

            $imageName = time().'_'.$request->file('file3')->getClientOriginalName();
            $request->file3->move(public_path('images'),$imageName);

            $banner->update([
                'banner3' => $imageName,
            ]);
        }

        if($request->hasFile('file4')){
            // Xóa ảnh cũ
            if(file_exists('images/'.$banner->banner4)){
                File::delete('images/'.$banner->banner4); 
            } 

            $imageName = time().'_'.$request->file('file4')->getClientOriginalName();
            $request->file4->move(public_path('images'),$imageName);

            $banner->update([
                'banner4' => $imageName,
            ]);
        }

        return redirect()->route('banner.index');
       
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
