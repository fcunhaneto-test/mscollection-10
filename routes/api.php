<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('movies')->group(function() {
    Route::get('/titles-start/{channel}/{pp}', 'MovieController@titlesStart');
    Route::get('/titles-page/{channel}/{page}/{pp}', 'MovieController@titlesPage');

    Route::get('/cast/{id}', 'MovieController@cast');
    Route::get('/producers/{id}', 'MovieController@producers');
    Route::get('/media/{id}', 'MovieController@media');

    Route::put('/update', 'MovieController@update');
});

Route::prefix('series')->group(function() {
    Route::get('/titles-start/{channel}/{pp}', 'SeriesController@titlesStart');
    Route::get('/titles-page/{channel}/{page}/{pp}', 'SeriesController@titlesPage');

    Route::get('/cast/{id}', 'SeriesController@cast');
    Route::get('/producers/{id}', 'SeriesController@producers');
    Route::get('/media/{id}', 'SeriesController@media');
});
