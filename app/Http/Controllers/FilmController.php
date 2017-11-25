<?php

namespace App\Http\Controllers;

use App\Film;

class FilmController extends Controller {

    public function listing()
    {
        return view('film.listing');
    }

    public function details($slug)
    {
        $film = Film::where('url_slug', $slug)->first();
        return view('film.details', ['film' => $film]);
    }

}
