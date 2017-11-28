<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\AddCommentRequest;
use App\Http\Controllers\ApiController;
use App\Film;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends ApiController {

    /**
     * add a new comment
     * @param AddCommentRequest $request
     * @return type
     */
    public function addComent(AddCommentRequest $request)
    {
        try
        {
            $film = Film::where('guid', $request->film_guid)->first();
            $comment = new Comment();
            $comment->film_id = $film->id;
            $comment->guid = \Ramsey\Uuid\Uuid::uuid4();
            $comment->name = $request->name;
            $comment->description = $request->comment;
            $comment->user_id = Auth::user()->id;
            $comment->save();
            $this->apiResponse['message'] = 'Comment saved successfully.';
            $data = [
                'guid' => $comment->guid,
                'name' => $comment->name,
                'description' => $comment->description,
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

    public function listing(Request $request)
    {
        $commentModel = new Comment();
        $film = Film::where('guid', $request->input('film_guid'))->first();
        $comments = $commentModel->latest('created_at')->paginate(5);
        $result = [];
        foreach ($comments as $comment)
        {
            //print_r($comment->created_at);die;
            $result[] = [
                'name' => $comment->name,
                'description' => $comment->description,
                'guid' => $comment->guid,
                'created_at' => $comment->created_at->format('d/m/Y h:i A'),
            ];
        }
        $this->apiResponse['data'] = $result;
        $this->apiResponse['total_records'] = $comments->total();
        return $this->sendResponse();
    }

}
