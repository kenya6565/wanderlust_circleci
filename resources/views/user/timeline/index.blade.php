@extends('layouts.header')
@section('title', 'timeline')
    
@section('content')
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
                      <div class="card">
                        <div class="card-body">
                            <a href="{{ action('User\PagesController@show', $post->user->id )}}">
                                <div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
                                    <div>{{ $post->user->name }}</div>
                                </div>
                            </a>
                            <a href="{{ action('User\TimelineController@show',  $post->id )}}">
                                <div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
                                    <div>{{ $post->post }}</div>
                                </div>
                            </a>
                        </div>
                            <div class="d-flex justify-content-end flex-grow-1">
                                @if (Auth::user()->is_liking($post->id))
                                    <form action="{{ route('unlike', ['id' => $post->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
            
                                        <button type="submit" class="btn btn-danger">いいね解除</button>
                                    </form>
                                @else
                                    <form action="{{ route('like', ['id' => $post->id]) }}" method="POST">
                                        {{ csrf_field() }}
            
                                        <button type="submit" class="btn btn-primary">いいね</button>
                                    </form>
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
@endsection
