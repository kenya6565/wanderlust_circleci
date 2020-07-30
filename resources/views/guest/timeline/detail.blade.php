@extends('layouts.app')
@section('title', 'postdetail')
    
@section('content')
    
    <div class="container">
        <div class="row justify-content-center container" style="margin: auto;">
            <div class="col-4 mb50">
                @foreach($images as $image)
                  <img src="{{ asset('storage/images/' .$image->image) }}" class="d-block w-100" alt="...">
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center container" style="margin: auto;">
            <div class="col-8 mb50">
                <div class="card mb50">
                  <div class="card-body">
                      <a href="{{ action('Guest\PagesController@show', ['id' => $post->user->id] )}}" class="text-secondary">{{ $post->user->name }}</a>
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
                <form action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    {{ csrf_field() }}
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment">{{ old('comment') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">コメント</button>
                </form>
            </div>
        </div>
    </div>
@endsection
