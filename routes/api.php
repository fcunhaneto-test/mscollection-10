<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('movies')->group(function() {
    Route::get('/frontend-start/{channel}/{pp}', 'MovieController@frontendStart');
    Route::get('/frontend-page/{channel}/{page}/{pp}', 'MovieController@frontendPage');

    Route::get('/cast/{id}', 'MovieController@cast');
    Route::get('/producers/{id}', 'MovieController@producers');
});

Route::prefix('series')->group(function() {
    Route::get('/frontend-start/{channel}/{pp}', 'SeriesController@frontendStart');
    Route::get('/frontend-page/{channel}/{page}/{pp}', 'SeriesController@frontendPage');

    Route::get('/cast/{id}', 'SeriesController@cast');
    Route::get('/producers/{id}', 'SeriesController@producers');
});
