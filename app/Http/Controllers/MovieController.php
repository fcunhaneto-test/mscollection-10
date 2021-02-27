<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\Movie;
use App\Traits\TitlesController;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    use TitlesController;

    protected $table;

    public function __construct()
    {
        $this->table = new Movie();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        // TODO Editar filmes e séries mais ou menos, por enquanto deixar assim.
        $validated = $request->validate([
            'id' => 'required|integer',
            'title' => 'required|max:191',
            'year' => 'required|digits:4',
        ]);

        $movie = Movie::findOrFail($request->id);
        $movie->title = $request->title;
        $movie->original_title = $request->original_title;
        $movie->year = $request->year;
        $movie->time = $request->time;
        $movie->rating = $request->rating;
        $movie->category_1 = $request->category_1;
        $movie->category_2 = $request->category_2;
        $movie->keyword = $request->keyword ? $request->keyword : null;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;
        $movie->save();
        return response()->json('', 200);
    }

}
