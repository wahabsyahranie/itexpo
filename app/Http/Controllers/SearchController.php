<?php

namespace App\Http\Controllers;

use App\Models\XpKarya;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchArticle(Request $request)
    {
        $query = $request->input('query');

        $results = XpKarya::search($query)->get();
        $results->load('xpKategori');

        return view('pages.project_search', compact('results'));
    }
}
