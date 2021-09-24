<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function submitRating (Request $request) {
        Review::create([
            'user_id' => $request->userId,
            'order_id' => $request->orderId,
            'rating' => $request->food,
            'type' => 'FOOD',
        ]);
        Review::create([
            'user_id' => $request->userId,
            'order_id' => $request->orderId,
            'rating' => $request->service,
            'type' => 'SERVICE',
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Review placed successfully.'
        ], 201);
    }
}
