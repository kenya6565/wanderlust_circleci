@extends('layouts.header')
@section('title', 'postdetail')
    
@section('content')
    <div class="container">
        {{ $post->post }}
        @foreach($post->comments as $comment)
        <tr>
            <td>{{ $comment->comment }}</td>
        </tr>
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
