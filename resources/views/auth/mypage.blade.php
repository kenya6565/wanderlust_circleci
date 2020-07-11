@extends('layouts.header')
@section('title', 'mypage')
    
@section('content')
    <div class="container">
          <div class="row justify-content-end">
            <div class="col-9">
                   {{  Auth::user()->name }}
                   @foreach($posts as $post)
                       <div class="card-columns">
                              <div class="card">
                                <div class="card-body">
                                    <a href="{{ action('Auth\TimelineController@postDetail',  $post->id )}}">
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
                   <button type="submit" class="btn btn-secondary">編集</button>
                
    </div>
        </div>
            </div>
  
@endsection