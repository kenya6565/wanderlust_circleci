@extends('layouts.app')
@section('title', 'postdetail')
    
@section('content')
    <div class="container">
        <div class="row justify-content-center container pt20" style="margin: auto;">
            @foreach($images as $image)
                @if(count($images) > 0)
                    <div class="col-3 mb50">
                        <img src="{{ asset('storage/images/' .$image->image) }}" class="d-block w-100" alt="...">
                    </div>
                @endif
            @endforeach
        </div>
        <div class="row justify-content-center container" style="margin: auto;">
            <div class="col-8">
       
                <div class="card">
                  <div class="card-body">
                      <a href="{{ action('User\PagesController@show', ['id' => $post->user->id] )}}" class="text-secondary">{{ $post->user->name }}</a>
                     
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
            </div>
            <div class="row justify-content-center container" style="margin: auto;">
            <div class="col-4">
                <iframe id="iframe" src="https://maps.google.co.jp/maps?output=embed&q={{ $post->title }}"></iframe>
            </div>
            <div class="col-4">
                
                <!-- <form action="/timeline/detail" method="post">-->
                <!--@csrf-->
                <!--<input id="post_id" type="hidden"  name="id" value="{{$post->id}}">-->
                <!--<div class="form-group">-->
                <!--    {{ csrf_field() }}-->
                <!--    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment">{{ old('comment') }}</textarea>-->
                <!--</div>-->
                <!--<button type="submit" class="btn btn-primary btn-lg btn-block">コメント</button>-->
                <!--</form>  -->
               
                
                <form action="{{ route('comment') }}" method="POST" class="form-inline my-2 my-md-0" enctype="multipart/form-data">
                     @csrf
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal3"><i class="fas fa-comments"></i>コメントする</a>
                    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                       <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">コメント</h5>
                            </div>
                            <div class="modal-body">
                                <form>
                                  <input id="post_id" type="hidden"  name="post_id" value="{{$post->id}}">
                                  <div class="form-group">
                                    {{ csrf_field() }}
                                    <textarea class="form-control" style="width: 100%; resize: none;" id="exampleFormControlTextarea1" rows="3" name="comment" placeholder="コメントする"></textarea>
                                    <!--<input type="text" name="keyword" style="width:100%;" class="form-control" id="title-name"  placeholder="名所の名前を入力してください">-->
                                  </div>
                                 
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                <button type="submit" class="btn btn-primary">コメント</button>
                            </div>
                        </div>
                      </div>
                    </div>
                </form>
                @if(Auth::id() == $post->user->id)
                    <a href="{{ action('User\TimelineController@edit', ['id' => $post->id] )}}" role="button" class="btn btn-primary">編集</a>
                    <form action="/timeline/detail/{{$post->id}}" method="post">
                      {{ csrf_field() }}
                      <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("投稿を削除しますか？");'>
                　  </form>
                @endif
            </div>
                            
                            
        </div>
    </div>
@endsection
