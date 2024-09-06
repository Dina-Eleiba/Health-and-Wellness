<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Store.index', compact('categories'));
    }


    public function AboutPage()
    {
        return view('Store.about');
    }


    public function Categories($slug) {
        $category = Category::where('slug', $slug)->first();
        $subcategories = $category->descendants()->paginate(6);
        return view('Store.shop', compact('category', 'subcategories'));
    }

    
}
