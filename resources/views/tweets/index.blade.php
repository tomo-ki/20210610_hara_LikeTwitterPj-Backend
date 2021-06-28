@extends('app')

@section('title', '記事一覧')

@section('content')
@include('nav')
<div class="container">
  @foreach($tweets as $tweet)
  <div class="card mt-3">
    <div class="card-body d-flex flex-row">
      <i class="fas fa-user-circle fa-3x mr-1"></i>
      <div>
        <div class="font-weight-bold">
          {{ $tweet->account->id }}
          {{ $tweet->account->name }}
        </div>
        <div class="font-weight-lighter">
        </div>
      </div>
    </div>
    <div class="card-body pt-0 pb-2">
      <h3 class="h4 card-title">
        {{ $tweet->content }}
      </h3>
      <div class="card-text">
        {{ $tweet->like }}
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection