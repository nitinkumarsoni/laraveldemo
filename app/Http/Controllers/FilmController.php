<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmController extends Controller {

    public function listing()
    {
        return view('film.listing');
    }

}
