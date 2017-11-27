<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Film;

class FilmController extends ApiController {

    protected $films;

    public function __construct(Film $film)
    {
        $this->films = $film;
    }

    public function listing(Request $request)
    {
        $films = $this->films->latest('created_at')->paginate(5);
        $result = [];
        foreach ($films as $film)
        {
            $result[] = [
                'name' => $film->name,
                'release_date' => $film->release_date,
                'rating' => $film->rating,
                'ticket_price' => $film->ticket_price,
                'country' => $film->country,
                'url' => route('film_details', ['slug' => $film->url_slug])
            ];
        }
        $this->apiResponse['data'] = ($result);
        return $this->sendResponse();
    }

}
