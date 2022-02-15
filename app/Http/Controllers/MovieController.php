<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $movies = DB::table('movies')
            ->join('genre_movie', 'movies.id', '=', 'genre_movie.movie_id')
            ->join('genres', 'genres.id', '=', 'genre_movie.genre_id')
            ->select('movies.id', 'movies.movie_name', 'movies.movie_description', 'genres.genre_name')
            ->orderBy('movies.movie_name')
            ->get();
        // $movies = Movie::all()->with('genre')->get();
        // dd($movies);
        // $movies = Movie::where('id', 1)->with('genre')->get();
        // dd($movies);

        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        //
        Movie::create([
            'movie_name' => $request->movie_name,
            'movie_description' => $request->movie_description
        ])->genre()->attach("$request->genre_id");
        // ->attach(["$request->genre_id", ""]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
        $movie->deleteOrFail();
        return redirect()->back();
    }
}