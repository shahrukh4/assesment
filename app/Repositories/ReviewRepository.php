<?php

namespace App\Repositories;

use App\Models\Review;
use App\Contracts\ReviewRepositoryInterface;

class ReviewRepository implements ReviewRepositoryInterface {

    /**
     * Add rating to food order
     * @param array $params
     * @return void
     */
    public function addRating(array $params) {
        Review::create([
            'user_id' => $params['userId'],
            'order_id' => $params['orderId'],
            'rating' => $params['rating'],
            'type' => $params['type'],
        ]);
    }
}
