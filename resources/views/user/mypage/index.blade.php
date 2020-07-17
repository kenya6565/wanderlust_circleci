@extends('layouts.header')
@section('title', 'mypage')
    
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
              @foreach($user_info as $user_info)
                <div class="card">
                  <h3 class="card-header">{{  $user_info->name }}</h3>
                  <a class="d-flex pr-3" href="#!">
                    <img src="/images/pathToYourImage.png" alt="Generic placeholder image">
                  </a>
                  <div class="card-body">
                    <p class="card-text"><h3>自己紹介文</h3></p>
                  </div>
                  <a class="nav-link" "font-weight-bolder" href="{{ action('User\FollowsController@showFollowings', ['id' => $user_info->id] )}}">フォロー</a>
                  <a class="nav-link" "font-weight-bolder" href="{{ action('User\FollowsController@showFollowers',['id' => $user_info->id] )}}">フォロワー</a>
                </div>
                <a href="{{ action('User\PagesController@edit', ['id' => $user_info->id] )}}" role="button" class="btn btn-primary">編集</a>
              @endforeach
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