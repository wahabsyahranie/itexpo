<?php

namespace App\Http\Controllers;

use App\Models\XpKarya;
use App\Models\XpKategori;
use App\Models\XpNews;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ExpoController extends Controller
{

    public function show(): View
    {
        $categories = XpKategori::get();
        $recentCreations = XpKarya::with('xpKategori')->where('dipublikasi', 1)->orderBy('created_at', 'desc')->limit(8)->get();
        $news = XpNews::where('dipublikasi', 1)->orderBy('created_at', 'desc')->limit(1)->get();

        foreach($news as $item) {
            $news_structured[] = [
                'nama_berita' => $item['nama_berita'],
                'deskripsi_berita' => $item['deskripsi_berita'],
                'slug' => $item['slug'],
                'created_at' => $item['created_at'],
                'gambar' => $item['gambar_berita'],
            ];
        }

        return view('home', compact('categories', 'recentCreations', 'news_structured'));
    }
}
