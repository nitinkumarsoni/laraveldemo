<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Film;
use App\Http\Requests\AddFilmRequest;

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

    public function addFilm(AddFilmRequest $request)
    {
        try
        {
            $film = new Film();
            $film->guid = \Ramsey\Uuid\Uuid::uuid4();
            $film->name = $request->name;
            $film->url_slug = str_slug($request->name);
            $film->description = $request->description;
            $film->release_date = date('Y-m-d', strtotime($request->release_date));
            $film->rating = $request->rating;
            $film->ticket_price = $request->ticket_price;
            $film->country = $request->country;
            $film->genre = $request->genre;
            $film->photo = $request->photo;
            $film->save();
            $this->apiResponse['message'] = 'Film saved successfully.';
        } catch (Exception $e)
        {
            $this->apiResponse['message'] = 'Some error occured. Please try again later';
        } catch (\Illuminate\Database\QueryException $e)
        {
            $this->setResponseCode(212);
            $this->apiResponse['message'] = 'Some error occured. Please try again later';
        }
        return $this->sendResponse();
    }

}
