<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FoodRepository;
use Illuminate\Database\Eloquent\Collection;

class FoodController extends Controller
{
    /**
     * @var FoodRepository
     */
    protected $foodRepository;

    /**
     * FoodController constructor.
     * @param FoodRepository $foodRepository
     */
    public function __construct(FoodRepository $foodRepository) {
        $this->foodRepository = $foodRepository;
    }

    /**
     * Get all the foods available
     * @return Collection
     */
    public function index(): Collection {
        return $this->foodRepository->all();
    }
}
