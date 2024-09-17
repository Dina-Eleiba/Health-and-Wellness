<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);
        //check if user has a review don't add another one
        $review = $request->except('_token');
        $review['user_id'] = auth()->user()->id;
        $review['product_id'] = $request->product_id;
        Review::create($review);
        return redirect()->back()->with('message', 'Review added successfully!');

    }
}
