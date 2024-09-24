<?php

namespace App\Http\Controllers\Store;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        return view('store.checkout', compact('user'));
    }


    public function saveOrder(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'floor' => 'required',
            'apartment' => 'required',
            'region' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $user->addresses->updateOrCreate(

            [
                'user_id' => $user->id,
                'address' => $request->address,
                'floor' => $request->floor,
                'apartment' => $request->apartment,
                'region' => $request->region,
            ]
        );

        $order['user_id'] = $user_id;
        $totalPrice = 0;

        Order::create($order);
        


    }
}
