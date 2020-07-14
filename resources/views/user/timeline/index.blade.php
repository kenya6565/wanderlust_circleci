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
                  <p class="font-weight-bolder">フォロワー</p>
                </div>
                <a href="#!" class="btn btn-primary">Go somewhere</a>
            </div>
            <div class="col-9">
                <form action="/timeline" method="post">
                {{ csrf_field() }}
                    <div style="background-color: #E8F4FA; text-align: center;">
                        <input type="text" name="post" style="margin: 1rem; padding: 0 1rem; width: 70%; border-radius: 6px; border: 1px solid #ccc; height: 2.3rem;" placeholder="今どうしてる？">
                        <button type="submit" style="background-color: #2695E0; color: white; border-radius: 10px; padding: 0.5rem;">ツイート</button>
                    </div>
                    @if($errors->first('post'))
                        <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">※{{$errors->first('post')}}</p>
                    @endif
                </form>
                <div class="post-wrapper"> 
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
                            <h6>テスト</h6>
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
