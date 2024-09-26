<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);
        $userId = auth()->user()->id;
        $hasPurchased = Order::where('user_id', $userId)
            ->whereHas('orderItems', function ($query) use ($request) {
                $query->where('product_id', $request->product_id);
            })->exists();

        if (!$hasPurchased) {
            // If the user hasn't purchased the product, deny review submission
            return redirect()->back()->with('fail', 'You can only review products you have purchased.');
        }
        $existingReview = Review::where('user_id', $userId)
            ->where('product_id', $request->product_id)->first();
        if (!$existingReview) {
            $review = $request->except('_token');
            $review['user_id'] = $userId;
            $review['product_id'] = $request->product_id;
            Review::create($review);
            return redirect()->back()->with('message', 'Review added successfully!');
        }
        return redirect()->back()->with('fail', 'You have already reviewed this product!');
    }
}
