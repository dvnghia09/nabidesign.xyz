<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\CategorySub;
use Illuminate\Support\Facades\DB;

class SitemapController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'updated_at')->orderByDesc('id')->get();
        $categories = Category::select('id', 'updated_at')->get();
        $categorySubs = CategorySub::select('id', 'updated_at')->get();

        $staticPages = [
            ['url' => route('home'),             'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => route('contact.index'),    'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => route('warranty.index'),   'priority' => '0.5', 'changefreq' => 'monthly'],
            ['url' => route('see.all'),          'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => route('see.all.sale'),     'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => route('see.all.buy'),      'priority' => '0.8', 'changefreq' => 'weekly'],
        ];

        return response()->view('sitemap', compact('products', 'categories', 'categorySubs', 'staticPages'))
            ->header('Content-Type', 'application/xml');
    }
}
