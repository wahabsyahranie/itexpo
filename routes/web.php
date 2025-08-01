<?php

use App\Http\Controllers\ExpoController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\XpKarya;

Route::get('/', [ExpoController::class, 'show']);

Route::get('/project-likes', [LikesController::class, 'index'])->middleware('auth');

Route::get('/project-all', function () {
    return view('pages.project_all');
});

Route::get('/project-my', function() {
    return view('pages.project_my');
});

Route::get('/project/{id}', function($id) {
    $project = XpKarya::with('xpTeam.xpAnggotaTeams.xpUserExpo')->findOrFail($id);
    return view('pages.project_detail', ['project' => $project]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);