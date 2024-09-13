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
        //still has things to add if user is login
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


    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            $cart_count = count($cart);
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            session()->put(
                [
                    'cart' => $cart,
                    'cart_count' => $cart_count,
                    'total' => $total,
                ]);
            return redirect()->back()->with(['message' => 'Product deleted from cart successfully']);
        }
        return redirect()->back()->with(['message' => 'Product not found in cart']);
    }
}
