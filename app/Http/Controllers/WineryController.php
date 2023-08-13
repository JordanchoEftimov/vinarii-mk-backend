<?php

namespace App\Http\Controllers;

use App\Models\Winery;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WineryController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $wineries = Winery::query()
            ->where('legal_name', 'LIKE', '%'.$query.'%')
            ->paginate(10);

        return JsonResource::collection($wineries);
    }
}
