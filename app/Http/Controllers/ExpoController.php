<?php

namespace App\Http\Controllers;

use App\Models\XpKarya;
use App\Models\XpKategori;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ExpoController extends Controller
{

    public function show(): View
    {
        $categories = XpKategori::get();
        $recentCreations = XpKarya::where('dipublikasi', 1)->orderBy('created_at', 'desc')->limit(8)->get();

        return view('home', compact('categories', 'recentCreations'));
    }
}
