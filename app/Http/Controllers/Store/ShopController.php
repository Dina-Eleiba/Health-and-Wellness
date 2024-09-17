<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $subcategories = $category->descendants()->paginate(6);
        return view('Store.shop.shop-category', compact('category', 'subcategories'));
    }

    public function shopByCategory($category, $subcategory)
    {
        $category = Category::where('slug', $category)->first();
        $subcategory = Category::where('slug', $subcategory)->first();
        $products = $subcategory->products()->paginate(9);
        return view('Store.shop.shop', compact('category', 'subcategory', 'products'));
    }


    public function ProductDetails($category, $subcategory, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $category = $product->Category;
        $reviews = $product->Reviews;
        $relatedProducts = Product::where('category_id', $category->id)
            ->where('id', '!=', $product->id)->paginate(4);
        return view('Store.shop.product-details', compact('product', 'category', 'relatedProducts', 'reviews'));
    }
}
