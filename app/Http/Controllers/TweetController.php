<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Account;
use App\Models\Like;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index(){
    }

    public function store(Request $request)
    {
        $tweet = Tweet::create($request->all());
        return response()->json([
            'data' => $tweet
        ], 201);
    }

    public function show(){
    }
    public function update(){
    }

    public function destroy(Tweet $tweet)
    {
        $item = Tweet::where('id', $tweet->id)->delete();
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
