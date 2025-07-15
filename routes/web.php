<?php

use App\Http\Controllers\ExpoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ExpoController::class, 'show']);

Route::get('/project-likes', function () {
    return view('pages.project_likes');
});

Route::get('/project-my', function () {
    return view('pages.project_my');
});

use App\Http\Controllers\UserController;

