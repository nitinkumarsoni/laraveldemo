<?php

namespace App\Http\Controllers;

use App\Film;

class FilmController extends Controller {

    /**
     * 
     * @return type
     */
    public function listing()
    {
        return view('film.listing');
    }

    /**
     * 
     * @return type
     */
    public function create()
    {
        return view('film.create');
    }

    /**
     * 
     * @param type $slug
     * @return type
     */
    public function details($slug)
    {
        $film = Film::where('url_slug', $slug)->first();
        
        return view('film.details', ['film' => $film]);
    }

}
