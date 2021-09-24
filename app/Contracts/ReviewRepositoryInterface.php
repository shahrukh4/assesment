<?php

namespace App\Contracts;

interface ReviewRepositoryInterface {

    /**
     * Add rating to food order
     * @param array $params
     * @return void
     */
    public function addRating(array $params);
}
