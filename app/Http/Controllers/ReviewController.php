<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\ReviewRepository;

class ReviewController extends Controller
{
    /**
     * @var ReviewRepository
     */
    protected $reviewRepository;

    /**
     * ReviewController constructor.
     * @param ReviewRepository $reviewRepository
     */
    public function __construct(ReviewRepository $reviewRepository) {
        $this->reviewRepository = $reviewRepository;
    }

    /**
     * Submit rating to the Order
     * @return JsonResponse
     */
    public function submitRating (Request $request): JsonResponse {
        $this->reviewRepository->addRating([
            'userId' => $request->userId,
            'orderId' => $request->orderId,
            'rating' => $request->food,
            'type' => 'FOOD',
        ]);
        $this->reviewRepository->addRating([
            'userId' => $request->userId,
            'orderId' => $request->orderId,
            'rating' => $request->service,
            'type' => 'SERVICE',
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Review placed successfully.'
        ], 201);
    }
}
