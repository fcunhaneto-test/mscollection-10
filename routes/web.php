<?php

use App\Models\Qualifiers\Media;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $ms = new Media();
    $media = $ms->isStream()->first();
    return redirect('/filmes/' . $media->slug);
});

Route::get('/filmes/{channel}', function ($channel) {
    $table = 'movies';
    $title = 'Filmes';
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

Route::get('/admin', function() {
    if (Gate::allows('isAdmin')) {
        $ms = new Media();
        $media = $ms->isActive()->first();
        return redirect('/admin/filmes/' . $media->slug);
    }
    return redirect('/');
})->name('admin');

Route::get('/admin/filmes/{channel}', function($channel) {
    if (Gate::allows('isAdmin')) {
        $table = 'movies';
        $title = 'Filmes';
        $media =  Media::all();

        foreach ($media as $m) {
            if($m->slug == $channel) {
                $subtitle = $m->name;
            }
        }
        return view('admin', compact('table', 'title', 'media', 'subtitle'));
    }
    return redirect('/');
})->name('admin-movies');

Route::get('/admin/series/{channel}', function($channel) {
    if (Gate::allows('isAdmin')) {
        $table = 'series';
        $title = 'Séries';
        $media =  Media::all();

        foreach ($media as $m) {
            if($m->slug == $channel) {
                $subtitle = $m->name;
            }
        }
        return view('admin', compact('table', 'title', 'media',  'subtitle'));
    }
    return redirect('/');
})->name('admin-series');

Auth::routes();
