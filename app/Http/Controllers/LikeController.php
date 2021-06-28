<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Account;
use App\Models\Tweet;

class LikeController extends Controller
{
    public function index(){

    }
    public function store(Request $request){
        $like = Like::create($request->all());
        return response()->json([
            'data' => $like,
        ], 201);
    }
    public function show($accountId){
        $tweets = Tweet::all();
        foreach ($tweets as $tweet) {
            $account =  Account::where('id', $tweet->account_id)->first();
            $tweet->name = $account->name;
            $like = Like::where('tweet_id', $tweet->id)->count();
            $tweet->like = $like;
            $isLike = Like::where('tweet_id', $tweet->id)->where('account_id', $accountId)->count();
            if ($isLike == 0) {
                $tweet->isLike = false;
            } else {
                $tweet->isLike = true;
            }
        }
        return response()->json([
            'data' => $tweets
        ], 200);
    }
    public function destroy(Request $request, $tweetId){
        $item = Like::where('tweet_id', $tweetId)->where('account_id', $request->account_id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
