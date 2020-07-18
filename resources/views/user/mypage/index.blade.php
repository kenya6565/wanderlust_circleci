@extends('layouts.header')
@section('title', 'mypage')
    
@section('content')
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