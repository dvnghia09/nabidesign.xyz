<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WarrantyPolicy;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    public function edit()
    {
        $policy = WarrantyPolicy::first();
        return view('admin.warranty.edit', compact('policy'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $policy = WarrantyPolicy::first();
        if ($policy) {
            $policy->update(['content' => $request->content]);
        } else {
            WarrantyPolicy::create(['content' => $request->content]);
        }

        return redirect()->back()->with('success', 'Cập nhật chính sách thành công!');
    }
}
