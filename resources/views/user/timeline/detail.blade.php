@extends('layouts.app')
@section('title', 'postdetail')
    
@section('content')
    <div class="container">
        @foreach($images as $image)
             <img class="card-img-top" src="{{ asset('storage/images/' .$image->image) }}">
        @endforeach
        <div class="card mb50">
          <div class="card-body">
                {{ $post->post }}
          </div>
        </div>
      
        @foreach($post->comments as $comment)
            <div class="media">
              <img class="d-flex mr-3" data-src="holder.js/64x64?theme=sky" alt="user_image">
              <div class="media-body">
                 <a href="{{ action('User\PagesController@show', ['id' => $comment->user->id] )}}" class="text-secondary">{{ $comment->user->name }}</a>
                <h5 class="mt-0">{{ $comment->comment }}</h5>
              </div>
            </div>
        @endforeach
        <iframe id="iframe" src="https://maps.google.co.jp/maps?output=embed&q={{ $post->title }}"></iframe>
        <form action="/timeline/detail" method="post">
        @csrf
        <input id="post_id" type="hidden"  name="id" value="{{$post->id}}">
        <div class="form-group">
            {{ csrf_field() }}
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment">{{ old('comment') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">コメント</button>
        </form>
        @if(Auth::id() == $post->user->id)
            <a href="{{ action('User\TimelineController@edit', ['id' => $post->id] )}}" role="button" class="btn btn-primary">編集</a>
            <form action="/timeline/detail/{{$post->id}}" method="post">
              {{ csrf_field() }}
              <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("投稿を削除しますか？");'>
        　  </form>
        @endif
    </<div>
@endsection
