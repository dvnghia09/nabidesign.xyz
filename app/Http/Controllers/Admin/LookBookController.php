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
     * Danh sách thương hiệu
     */
    public function index()
    {
        $lookBook = LookBook::all();
        return view('admin.look-book.index', compact('lookBook'));
    }

    /**
     * Form thêm mới thương hiệu
     */
    public function create()
    {
        return view('admin.look-book.create');
    }

    /**
     * Lưu thương hiệu mới
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:1000',
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
        ]);

        $imageName = time() . '_' . uniqid() . '_' . $request->file('file')->getClientOriginalName();
        $request->file->move(public_path('images'), $imageName);

        LookBook::create([
            'name'  => $request->name,
            'link'  => $request->link,
            'image' => $imageName,
        ]);

        return redirect()->route('look-book.index')->with('message', 'Thêm thương hiệu thành công');
    }

    /**
     * Form sửa thương hiệu
     */
    public function edit($id)
    {
        $lookBook = LookBook::find($id);
        return view('admin.look-book.update', compact('lookBook'));
    }

    /**
     * Cập nhật thương hiệu
     */
    public function update(LookBookRequest $request, $id)
    {
        $lookBook = LookBook::find($id);
        if ($request->hasFile('file')) {
            File::delete('images/' . $lookBook->image);
            $imageName = time() . '_' . uniqid() . '_' . $request->file('file')->getClientOriginalName();
            $request->file->move(public_path('images'), $imageName);
        } else {
            $imageName = $lookBook->image;
        }

        $lookBook->update([
            'name'  => $request->name,
            'link'  => $request->link,
            'image' => $imageName,
        ]);

        return redirect()->route('look-book.index')->with('message', 'Sửa thương hiệu thành công');
    }

    /**
     * Xóa thương hiệu
     */
    public function destroy($id)
    {
        $lookBook = LookBook::find($id);
        if ($lookBook) {
            File::delete('images/' . $lookBook->image);
            $lookBook->delete();
        }
        return redirect()->route('look-book.index')->with('message', 'Xóa thương hiệu thành công');
    }

    public function show($id)
    {
        //
    }
}
