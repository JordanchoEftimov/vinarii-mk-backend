<?php

namespace App\Http\Controllers;

use App\Models\Wine;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class WineController extends Controller
{
    public function getBestWines(): AnonymousResourceCollection
    {
        $bestWines = Wine::query()
            ->inRandomOrder()
            ->paginate(6);

        return JsonResource::collection($bestWines);
    }
}
