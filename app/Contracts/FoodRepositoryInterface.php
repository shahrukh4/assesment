<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface FoodRepositoryInterface {

    /**
     * Get all the available food
     * @return Collection
     */
    public function all(): Collection;
}
