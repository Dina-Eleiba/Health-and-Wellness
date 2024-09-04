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
}
