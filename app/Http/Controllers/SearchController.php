<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function showAllGifs(Search $search)
    {
        $gifs = $search->all();
        return response()->json($gifs);
    }

    public function showBestMatch(Search $search, $term)
    {
        $gifs = $search->search($term);
        if ($gifs) {
            return response()->json($gifs);
        }
        abort(404);
    }

    public function random(Search $search)
    {
        return response()->json($search->random());
    }
}
