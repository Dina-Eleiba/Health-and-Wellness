<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart()
    {
        $cart = session()->get('cart');
        return view('store.cart', compact('cart'));

    }

    public function addToCart(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        $cart = session()->get('cart', []);
        $cart[$request->product_id] = [
            'product_id' => $request->product_id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'image' => $product->image,
            'subtotal' => $product->price * $request->quantity,
        ];
        $cart_count = count($cart);
        session()->put([
            'cart' => $cart,
            'cart_count' => $cart_count
        ]);
        $total = collect($cart)->sum('subtotal');
        session()->put('total', $total);
        return redirect()->back()->with(['message' => 'Product added to cart successfully']);
    }


}
