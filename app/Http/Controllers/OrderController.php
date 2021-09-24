<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\OrderRepository;
use Illuminate\Database\Eloquent\Collection;

class OrderController extends Controller
{
    /**
     * @var OrderRepository
     */
    protected $orderRepository;

    /**
     * OrderController constructor.
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository) {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Get all the orders available
     * @return Collection
     */
    public function index(): Collection {
        return $this->orderRepository->all();
    }

    /**
     * Place order for any food
     * @param Request $request
     * @param mixed $foodId
     * @return JsonResponse
     */
    public function placeOrder(Request $request, $foodId): JsonResponse {
        $this->orderRepository->placeOrder([
            'userId' => $request->userId,
            'foodId' => $foodId,
            'quantity' => $request->quantity,
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Order placed successfully.'
        ], 201);
    }
}
