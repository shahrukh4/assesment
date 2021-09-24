<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        return Order::with(['food', 'reviews'])->get();
    }

    public function placeOrder(Request $request, $foodId) {
        Order::create([
            'user_id' => $request->userId,
            'food_id' => $foodId,
            'quantity' => $request->quantity,
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Order placed successfully.'
        ], 201);
    }
}
