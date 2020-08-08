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
            </div>
        </div>
            
                
                <div id="tabMenu" class="row justify-content-center" style="margin: auto;">
                
                    <div class="col-4">
                      <li><a href="#tabBox1">地図</a></li>
                    </div>
                    <div class="col-4">
                      <li><a href="#tabBox2">{{$post->user->name}}の最近の投稿</a></li>
                    </div>
                  
                  
                </div>
                <div id="tabMenu" class="row justify-content-center" style="margin: auto;">
                <div class="col-8">
                    <div id="tabBoxes">
                      　<div id="tabBox1"><iframe id="iframe" src="https://maps.google.co.jp/maps?output=embed&q={{ $post->title }}"></iframe></div>
                    　　<div id="tabBox2">
                    　　　 @foreach($recent_posts as $recent_post)
                                {{$recent_post->post}}
                          @endforeach
                        </div>
                    </div>
                </div>
                </div>
           


          <div class="row justify-content-center container" style="margin: auto;">
            <div class="col-4">
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
            </div>
                @if(Auth::id() == $post->user->id)
                <div class="col-4">
                  <a href="{{ action('User\TimelineController@edit', ['id' => $post->id] )}}" role="button" class="btn btn-primary">編集</a>
                </div>
                <div class="col-4">
                  <form action="/timeline/detail/{{$post->id}}" method="post">
                    {{ csrf_field() }}
                    <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("投稿を削除しますか？");'>
              　  </form>
                </div>
                @endif
            
          </div>
                            
                            
        </div>
        @if(isset($comments))
        <button type="button" id="comment" class="btn btn-dark col-8">コメントを表示</button>
       
            <div class="row justify-content-center container" id="comment_content" style="margin: auto;">
                <div class="col-8">
                    


                    @foreach($post->comments as $comment)
                        <div class="media" >
                            <img class="d-flex mr-3" data-src="holder.js/64x64?theme=sky" alt="user_image">
                            <div class="media-body">
                                <a href="{{ action('User\PagesController@show', ['id' => $comment->user->id] )}}" class="text-secondary">{{ $comment->user->name }}</a>
                            <h5 class="mt-0">{{ $comment->comment }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
