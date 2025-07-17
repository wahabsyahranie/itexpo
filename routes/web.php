<?php

use App\Http\Controllers\ExpoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [ExpoController::class, 'show']);

Route::get('/project-likes', function () {
    return view('pages.project_likes');
});

// Route::get('/project-all', [ExpoController::class, 'all']);

Route::get('/project-all', function () {
    return view('pages.project_all');
});

