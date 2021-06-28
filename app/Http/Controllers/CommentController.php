<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Account;
use App\Models\Tweet;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){

    }
    public function store(Request $request)
    {
        $comment = Comment::create($request->all());
        return response()->json([
            'data' => $comment
        ], 201);
    }
    public function show($tweetId)
    {
        $comments = Comment::where('tweet_id', $tweetId)->get();
        foreach ($comments as $comment) {
            $account =  Account::where('id', $comment->account_id)->first();
            $comment->name = $account->name;
        }
        return response()->json([
            'data' => $comments
        ], 200);
    }
}
