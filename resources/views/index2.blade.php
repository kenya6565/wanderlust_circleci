@extends('layouts.header')
@section('css')
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ asset('css/utility.css') }}" rel="stylesheet">
@endsection
@section('title', '')
    
@section('content')
        <div class="row justify-content-center container">
            @foreach($all_posts as $post)
            <div class="col-4 mb50">
                <div class="card">
                  <img class="card-img-top" src="/images/pathToYourImage.png" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">
                          <div>{{ $post->post }}</div>
                    </p>
                    <a href="#!" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
            </div>
            @endforeach
        </div>
@endsection



<div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card">
                  <h3 class="card-header">{{  Auth::user()->name }}</h3>
                  <a class="d-flex pr-3" href="#!">
                    <img src="/images/pathToYourImage.png" alt="Generic placeholder image">
                  </a>
                  <div class="card-body">
                    <p class="card-text"><h3>自己紹介文</h3></p>
                  </div>
                  <p class="font-weight-bolder">フォロー</p>
                  <a class="text-secondary" href="{{ action('User\FollowsController@showFollowings', Auth::id() )}}">{{ $counts['count_followings'] }}</a>
                  <p class="font-weight-bolder">フォロワー</p>
                  <a class="text-secondary" href="{{ action('User\FollowsController@showFollowers', Auth::id() )}}">{{ $counts['count_followers'] }}</a>
                </div>
                <form action="/timeline" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                  投稿
                </button>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">思い出の場所を共有しよう</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <input type="file" class="form-control-file" name="image">
                            <input type="text" name="post" class="modal-body" placeholder="今どうしてる？">
                            <button type="submit" class="btn btn-primary">ツイート</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                  </div>
                </div>
                @if($errors->first('post'))
                    <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">※{{$errors->first('post')}}</p>
                @endif
                </form>
            </div>
            <div class="col-9" "justify-content-end">
                <div class="post-wrapper">
                    @foreach($all_posts as $post)
                    <div class="card-columns">
                      <div class="post_card" id="post_{{ $post->id }}">
                        <div class="card-body">
                            <a href="{{ action('User\PagesController@show', $post->user->id )}}">
                                <div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
                                    <div>{{ $post->user->name }}</div>
                                </div>
                            </a>
                            <a href="{{ action('User\TimelineController@show',  $post->id )}}">
                                <div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
                                    <div>{{ $post->id }}</div>
                                    <div>{{ $post->post }}</div>
                                </div>
                            </a>
                        </div>
                            <div class="d-flex justify-content-end flex-grow-1">
                                @if (Auth::user()->is_liking($post->id))
                                    <button type="button" class="unfav" data-name="{{$post->id}}">
                                        <i class="fas fa-heart"></i>
                                        <span id="unlike" data-name="{{$post->id}}"></span>
                                        <!--フォロー解除-->
                                    </button>
                                    <div class="text-right mb-2">
                                         <span class="badge badge-pill badge-success">{{ $data['count_liking_users'] }}</span>
                                    </div>
                                @else
                                    <button type="button" class="fav" data-name="{{$post->id}}">
                                        <i class="far fa-heart"></i>
                                        <span id="like" data-name="{{$post->id}}"></span>
                                    </button>
                                @endif
                            </div>
                      </div>
                      <div class="card">
                          <div class="card-body">
                            <img class="far fa-heart like-btn" src="{{ asset('storage/images/' .$post->image) }}">
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
    </div>