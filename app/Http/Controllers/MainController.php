<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

class MainController extends Controller
{
    
    public function home() {

        $movies = Movie::all();

        $data = [
            'movies' => $movies,
            'single_movie' => Movie::find(1)
        ];

        return view('pages.home', $data);
    }

    public function where() {

        $newMovie = new Movie();

        $newMovie -> title = "Nuovo titolo";
        $newMovie -> original_title = "New Title";
        $newMovie -> nationality = "GB";
        $newMovie -> date = "2023-01-01";
        $newMovie -> vote = 1;

        $newMovie -> save();

        $plutoMovie = Movie::find(10);

        $plutoMovie -> title = "PLUTO";

        $plutoMovie -> save();

        $movies = Movie
            :: where('vote', '>=', 9) 
            -> orWhere('nationality', 'american')
            -> orderBy('date', 'desc')
            -> limit(3)
            -> get();
        
        // $movie = Movie 
        //     :: where('vote', '>=', 9)   
        //     -> orderBy('date', 'desc')
        //     -> first();

        $singleMovie = Movie :: find(1);

        $data = [
            'movies' => $movies,
            'single_movie' => $singleMovie
        ];

        return view('pages.home', $data);
    }
}
