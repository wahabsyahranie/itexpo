<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function index()
    {
        $likes = Auth()->user()
            ->xpSukaKarya()
            ->with('xpKarya.xpKategori')
            ->get();

        return view('pages.project_likes', compact('likes'));
    }
}
