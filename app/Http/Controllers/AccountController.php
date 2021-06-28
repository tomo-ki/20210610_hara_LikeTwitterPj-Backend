<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
  public function index(){

  }
  public function store(Request $request)
  {
    $account = Account::create($request->all());
    return response()->json([
      'data' => $account
    ], 201);
  }
  public function show($firebaseUid)
  {
    $account = Account::where('firebase_uid', $firebaseUid)->get();
    return response()->json([
      'data' => $account
    ], 200);
  }
}
