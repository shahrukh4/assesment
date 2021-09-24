<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface OrderRepositoryInterface {

    /**
     * Get all the available orders
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Place order for any food
     * @param array $params
     * @return void
     */
    public function placeOrder(array $params);
}
