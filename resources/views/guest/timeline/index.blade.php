@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ asset('css/utility.css') }}" rel="stylesheet">
@endsection
@section('title', 'timeline')
@section('content')
        <div class="row justify-content-center container" style="margin: auto;">
            @foreach($all_posts as $post)
            <div class="col-4 mb50">
                <div class="card">
                  @if(isset($post->firstPhoto()->image))
                      <img class="card-img-top" src="{{ asset('storage/images/' .$post->firstPhoto()->image) }}">
                  @endif
                  <div class="card-body">
                    <h4 class="card-title">{{ $post->title }}</h4>
                    <p class="card-text">
                        <div>{{ $post->id }}</div>
                        <div>{{ $post->post }}</div>
                    </p>
                    <a href="{{ action('Guest\TimelineController@show',  $post->id )}}" class="btn btn-primary">詳細</a>
                  </div>
                </div>
            </div>
            @endforeach
        </div>
         {{ $all_posts->links() }}
@endsection