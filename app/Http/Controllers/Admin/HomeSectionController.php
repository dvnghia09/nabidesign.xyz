<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSection;
use App\Models\CategorySub;

class HomeSectionController extends Controller
{
    public function index()
    {
        $categorySubs = CategorySub::with('Category')->orderBy('category_id')->get();
        $sections = HomeSection::orderBy('id')->get();
        return view('admin.home-section.index', compact('categorySubs', 'sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type'            => 'required|string|max:50',
            'title'           => 'required|string|max:255',
            'subtitle'        => 'nullable|string|max:255',
            'category_sub_id' => 'nullable|exists:category_subs,id',
            'limit'           => 'required|integer|min:1|max:20',
        ]);

        HomeSection::create([
            'type'            => $request->type,
            'title'           => $request->title,
            'subtitle'        => $request->subtitle,
            'category_sub_id' => $request->category_sub_id ?: null,
            'limit'           => $request->limit,
        ]);

        return redirect()->back()->with('message', 'Thêm phần mới thành công!');
    }

    public function update(Request $request, $id)
    {
        $section = HomeSection::findOrFail($id);
        
        $request->validate([
            'type'            => 'required|string|max:50',
            'title'           => 'required|string|max:255',
            'subtitle'        => 'nullable|string|max:255',
            'category_sub_id' => 'nullable|exists:category_subs,id',
            'limit'           => 'required|integer|min:1|max:20',
        ]);

        $section->update([
            'type'            => $request->type,
            'title'           => $request->title,
            'subtitle'        => $request->subtitle,
            'category_sub_id' => $request->category_sub_id ?: null,
            'limit'           => $request->limit,
        ]);

        return redirect()->back()->with('message', 'Cập nhật phần thành công!');
    }

    public function destroy($id)
    {
        HomeSection::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Xóa thành công!');
    }
}
