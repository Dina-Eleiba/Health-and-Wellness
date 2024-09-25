<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\User;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $address = $user->addresses->last();
        return view('store.checkout', compact('user', 'address'));
    }


    public function saveOrder(StoreOrderRequest $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $user->addresses()->updateOrCreate(
            [
                'user_id' => $user->id,
                'address' => $request->address,
                'floor' => $request->floor,
                'apartment' => $request->apartment,
                'region' => $request->region,
            ]
        );

        $order['user_id'] = $user_id;
        $order['notes'] = $request->notes;
        $order['payment_method'] = $request->payment_method;
        $totalPrice = 0;
        $cart = session()->get('cart', []);
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        $order['total_price'] = $totalPrice;
        $ordered = Order::create($order);
        $orderId = $ordered->id;


        foreach ($cart as $item) {
            Order_item::create([
                'order_id' => $orderId,
                'product_id' => $item['product_id'],
                'item_type' => 'product',
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'discount' => $item['discount'] ?? 0,
            ]);
        }
        session()->forget(['cart', 'cart_count', 'total']);
        return redirect()->back()->with('message', 'order has been placed successfully');


    }
}
