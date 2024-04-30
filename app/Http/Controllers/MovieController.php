<?php

namespace App\Http\Controllers;

use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Spatie\ViewModels\ViewModel;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $popularMoives = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];
        
        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];


        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        
        $viewModel = new MoviesViewModel(
            $popularMoives, 
            $nowPlayingMovies, 
            $genres,
        );
        return view('movies.index',$viewModel);

        
        

        // return view('index',[
        //     'popularMovies' => $popularMoives,
        //     'nowPlayingMovies' => $nowPlayingMovies,
        //     'genres'  => $genres,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
            ->json();

        $viewModel =new MovieViewModel($movie);
        //dump($movie);
        return view('movies.show',$viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
