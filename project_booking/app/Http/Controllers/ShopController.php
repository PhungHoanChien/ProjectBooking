<?php

namespace App\Http\Controllers;

use App\Models\Product;
use DB;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('feature', 1)->limit(8)->get();
        $products = Product::paginate(12);

        return view('shop.index', compact('featuredProducts', 'products'));
    }

    public function show($id)
    {
        $product = DB::table('products')->find($id);
        return view('shop.show', compact('product'));
    }
}
