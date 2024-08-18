<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('Store.index');
    }


    public function AboutPage() {
        return view('Store.about');
    }
}
