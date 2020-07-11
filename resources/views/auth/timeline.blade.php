@extends('layouts.header')
@section('title', 'timeline')
    
@section('content')
    <div class="wrapper" style="margin: 0 auto; width: 50%; height: 100%; background-color: white;">
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
            <a href="{{ action('Auth\TimelineController@postDetail',  $post->id )}}">
            <div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
                <div>{{ $post->post }}</div>
            </div>
            </a>
            @endforeach
        </div>
    </div>
@endsection
