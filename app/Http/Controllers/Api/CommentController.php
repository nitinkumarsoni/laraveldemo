<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\AddCommentRequest;
use App\Http\Controllers\ApiController;
use App\Film;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends ApiController {

    public function addComent(AddCommentRequest $request)
    {
        try
        {
            $film = Film::where('guid', $request->film_guid)->first();
            $comment = new Comment();
            $comment->film_id = $film->id;
            $comment->guid = \Ramsey\Uuid\Uuid::uuid4();
            $comment->name = $film->name;
            $comment->description = $film->description;
            $comment->user_id = Auth::user()->id;
            $comment->save();
            $this->apiResponse['message'] = 'Comment saved successfully.';
            $data = [
                'guid'=> $comment->guid,
                'name'=> $comment->name,
                'description'=> $comment->description,
            ];
            $this->apiResponse['data'] = $data;
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
