<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::check()) {
            $userId = auth()->id();
            $existingCartItem = Cart::where('user_id', $userId)
                ->where('product_id', $request->product_id)
                ->first();
            if ($existingCartItem) {
                $existingCartItem->quantity = $request->quantity;
                $existingCartItem->save();
            } else {
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $request->product_id,
                    'price' => $product->price,
                    'quantity' => $request->quantity,
                ]);
            }
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
            $total = collect($cart)->sum('subtotal');
            session()->put([
                'cart' => $cart,
                'cart_count' => $cart_count,
                'total' => $total,
            ]);
            session()->put('total', $total);
        }

        return redirect()->back()->with(['message' => 'Product added to cart successfully']);
    }


    public function removeFromCart($id)
    {
        if (Auth::check()) {
            $userId = auth()->id();

            // Remove the product from the database
            $cartItem = Cart::where('user_id', $userId)
                ->where('product_id', $id)
                ->first();

            if ($cartItem) {
                $cartItem->delete();
            }
        }
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
                ]
            );
            return redirect()->back()->with(['message' => 'Product deleted from cart successfully']);
        }
        return redirect()->back()->with(['message' => 'Product not found in cart']);
    }
}
