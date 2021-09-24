<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Http\JsonResponse;
use App\Contracts\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository implements OrderRepositoryInterface {

    /**
     * Get all the available orders
     * @return Collection
     */
    public function all(): Collection {
        return Order::with(['food', 'reviews'])->get();
    }

    /**
     * Place order for any food
     * @param array $params
     * @return void
     */
    public function placeOrder(array $params) {
        Order::create([
            'user_id' => $params['userId'],
            'food_id' => $params['foodId'],
            'quantity' => $params['quantity'],
        ]);
    }
}
