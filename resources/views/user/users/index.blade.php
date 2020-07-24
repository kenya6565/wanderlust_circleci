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
                  <a class="text-secondary" href="{{ action('User\FollowsController@showFollowers', ['id' => $user_info->id] )}}">{{ $counts['count_followers'] }}</a>
            </h6>
            <h6 class="float-right mr20">
                  <p class="font-weight-bolder">フォロー</p>
                  <a class="text-secondary" href="{{ action('User\FollowsController@showFollowings',  ['id' => $user_info->id] )}}">{{ $counts['count_followings'] }}</a>
            </h6> 
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            @if(Auth::id() == $user_info->id)
                  <a href="{{ action('User\PagesController@edit', ['id' => $user_info->id] )}}" role="button" class="btn btn-primary">編集</a>
            @endif
          </div>
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
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card">
                  <h3 class="card-header">{{  $user_info->name }}</h3>
                  <a class="d-flex pr-3" href="#!">
                    <img src="/images/pathToYourImage.png" alt="Generic placeholder image">
                  </a>
                  <div class="card-body">
                    <p class="card-text"><h3>自己紹介文</h3></p>
                  </div>
                  <p class="font-weight-bolder">フォロー</p>
                  <a class="text-secondary" href="{{ action('User\FollowsController@showFollowings',  ['id' => $user_info->id] )}}">{{ $counts['count_followings'] }}</a>
                  <p class="font-weight-bolder">フォロワー</p>
                  <a class="text-secondary" href="{{ action('User\FollowsController@showFollowers', ['id' => $user_info->id] )}}">{{ $counts['count_followers'] }}</a>
                </div>
                @if(Auth::id() == $user_info->id)
                  <a href="{{ action('User\PagesController@edit', ['id' => $user_info->id] )}}" role="button" class="btn btn-primary">編集</a>
                @endif
            </div>
            <div class="col-9">
                @foreach($posts as $post)
                    <div class="card-columns">
                      <div class="card">
                        <div class="card-body">
                            <a href="{{ action('User\TimelineController@show',  $post->id )}}">
                                <div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
                                    <div>{{ $post->post }}</div>
                                </div>
                            </a>
                        </div>
                      </div>
                      <div class="card">
                          <div class="card-body">
                            <h3>テスト</h3>
                          </div>
                      </div>
                      <div class="card">
                        <div class="card-body">
                          <h6>テスト</h6>
                        </div>
                      </div>
                      <div class="card">
                          <div class="card-body">
                              <h6>テスト</h6>
                          </div>
                      </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
  
@endsection