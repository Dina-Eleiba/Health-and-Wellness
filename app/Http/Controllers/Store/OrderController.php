<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout() {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        return view('store.checkout', compact('user'));
    }


    public function saveOrder(Request $request) {
        dd($request->all());
    }
}
