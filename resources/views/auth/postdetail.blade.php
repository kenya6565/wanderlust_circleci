@extends('layouts.header')
@section('title', 'postdetail')
    
@section('content')
    <div class="container">
        {{ $post->post }}
        @foreach($post->comments as $comment)
            <div class="media">
              <img class="d-flex mr-3" data-src="holder.js/64x64?theme=sky" alt="user_image">
              <div class="media-body">
                <h5 class="mt-0">{{ $comment->user->name }}</h5>
                <h5 class="mt-0">{{ $comment->comment }}</h5>
              </div>
            </div>
        @endforeach
        <form action="/timeline/detail" method="post">
        @csrf
        <input id="post_id" type="hidden"  name="id" value="{{$post->id}}">
        <div class="form-group">
            {{ csrf_field() }}
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment">{{ old('comment') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">コメント</button>
        </form>
    </<div>
@endsection
