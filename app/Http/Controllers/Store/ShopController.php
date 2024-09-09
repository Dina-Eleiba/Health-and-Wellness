<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index($slug) {
        $category = Category::where('slug', $slug)->first();
        $subcategories = $category->descendants()->paginate(6);
        return view('Store.shop.shop-category', compact('category', 'subcategories'));
    }

    public function shopByCategory($category, $subcategory) {
        $category = Category::where('slug', $category)->first();
        $subcategory = Category::where('slug', $subcategory)->first();
        $products = $subcategory->products()->paginate(9);
        return view('Store.shop.shop', compact('category', 'subcategory', 'products'));
   }



}
