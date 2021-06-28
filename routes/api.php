<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

Route::apiResource('/account', AccountController::class);
Route::apiResource('/tweet', TweetController::class);
Route::apiResource('/comment', CommentController::class);
Route::apiResource('/like', LikeController::class);
