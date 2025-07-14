<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/project-likes', function () {
    return view('pages.project_likes');
});

Route::get('/project-my', function () {
    return view('pages.project_my');
});