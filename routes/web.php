<?php

use App\Models\Qualifiers\Media;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/filmes/netflix');
});

Route::get('/filmes/{channel}', function ($channel) {
    $table = 'movies';
    $title = 'Filmes';
    $subtitle = '';
    $ms = new Media();

    if (Gate::allows('isAdmin')) {
        $media =  Media::all();
    } else {
        $media = $ms->isStream();
    }

    foreach ($media as $m) {
        if($m->slug == $channel) {
            $subtitle = $m->name;
        }
    }
    return view('titles', compact('title', 'subtitle', 'media', 'table'));
})->name('movies');

Route::get('/series/{channel}', function ($channel) {
        $table = 'series';
        $title = 'Séries';
        $subtitle = '';
        $ms = new Media();

        if (Gate::allows('isAdmin')) {
            $media =  Media::all();
        } else {
            $media = $ms->isStream();
        }

        foreach ($media as $m) {
            if($m->slug == $channel) {
                $subtitle = $m->name;
            }
        }

    return view('titles', compact('title', 'subtitle', 'media', 'table'));
})->name('series');

Auth::routes();
