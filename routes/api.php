<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('movies')->group(function() {
    Route::get('/frontend-start/{channel}/', 'MovieController@frontendStart');
    Route::get('/frontend-page/{channel}/{page}', 'MovieController@frontendPage');

    Route::get('/cast/{id}', 'MovieController@cast');
    Route::get('/producers/{id}', 'MovieController@producers');
});

Route::get('/per-page/{num}', function ($num) {
    session(['pp' => parseInt($num)]);
    dd(session('pp'));
});
