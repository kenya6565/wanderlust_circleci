@extends('layouts.app')
@section('title', 'users')
    
@section('content')
<div class="container">
    <div class="row justify-content-center mb50">
      <div class="col-12">
        <div class="card">
          <h3 class="card-header">{{  $user_info->name }}</h3>
          <div class="card-body">
            <h6 class="float-right">
              <p class="font-weight-bolder">フォロワー</p>
              <a class="text-secondary" href="{{ action('Guest\FollowsController@showFollowers', ['id' => $user_info->id] )}}">{{ $counts['count_followers'] }}</a>
            </h6>
            <h6 class="float-right mr20">
              <p class="font-weight-bolder">フォロー</p>
              <a class="text-secondary" href="{{ action('Guest\FollowsController@showFollowings',  ['id' => $user_info->id] )}}">{{ $counts['count_followings'] }}</a>
            </h6> 
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center container">
        @foreach($posts as $post)
        <div class="col-4 mb50">
            <div class="card">
              <img class="far fa-heart card-img-top" src="{{ asset('storage/images/' .$post->image) }}">
              <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">
                  <div>{{ $post->id }}</div>
                  <div>{{ $post->post }}</div>
                </p>
                <a href="{{ action('User\TimelineController@show',  $post->id )}}" class="btn btn-primary">詳細</a>
              </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="d-flex justify-content-center mt40">
  {{ $posts->links() }}
</div>
@endsection