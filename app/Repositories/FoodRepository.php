<?php

namespace App\Repositories;

use App\Models\Food;
use App\Contracts\FoodRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class FoodRepository implements FoodRepositoryInterface {

    /**
     * Get all the available food
     * @return Collection
     */
    public function all(): Collection {
        return Food::all();
    }
}
