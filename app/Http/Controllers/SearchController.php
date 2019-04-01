<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * @param Search $search
     * @param $term
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Search $search, $term = null)
    {
        $gifs = $search->search($term);
        if (count($gifs['data'])> 0) {
            return response()->json($gifs);
        }
        abort(404);
    }

    /**
     * @param Search $search
     * @return \Illuminate\Http\JsonResponse
     */
    public function random(Search $search)
    {
        return response()->json($search->random());
    }
}
