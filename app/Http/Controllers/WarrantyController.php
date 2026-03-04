<?php

namespace App\Http\Controllers;

use App\Models\WarrantyPolicy;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    public function index()
    {
        $policy = WarrantyPolicy::first();
        return view('warranty-policy', compact('policy'));
    }
}
