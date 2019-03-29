<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showAllGifs()
    {
        $search = new Search();
        return response()->json($search->all());
    }

    public function showBestMatch($term)
    {
        $search = new Search();
        return response()->json($search->search($term));
    }
}
