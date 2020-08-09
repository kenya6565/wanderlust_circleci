@extends('layouts.app')
@section('title', 'postdetail')
    
@section('content')
    <div class="container">
        <div class="row  justify-content-center pt20" style="margin: auto;">
            @foreach($images as $image)
                @if(count($images) > 0)
                    <div class="col-3 mb20">
                        <img src="{{ asset('storage/images/' .$image->image) }}" class="img-thumbnail img-responsive d-block w-100 shadow-lg bg-white rounded" alt="...">
                    </div>
                @else
                    <div class="col-3 mb20">
                      <img class="card-img-top" src="{{ asset('images/'.'noimageavailable.png') }}">
                    </div>
                @endif
            @endforeach
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      紹介文
                    </div>
                    <div class="card-body">
                        <a href="{{ action('User\PagesController@show', ['id' => $post->user->id] )}}" class="text-secondary">{{ $post->user->name }}</a>
                          {{ $post->post }}
                    </div>
                </div>
            </div>
        </div>
            

                <div id="tabMenu" class="row mb20 pt20" style="margin: auto;">
                    <div class="col-9">
                        <div class="card">
                            <ul class="list-group list-group-horizontal">
                               <li class="col-6 list-group-item"><a href="#tabBox1"><i class="fas fa-map-marked-alt"></i>地図</a></li>
                               <li class="col-6 list-group-item"><a href="#tabBox2">{{$post->user->name}}の最近の投稿</a></li>
                            </ul>
            
                            <div class="card-body">
                                <div id="tabBoxes" >
                                  　<div id="tabBox1"><iframe id="iframe" class="col-12" src="https://maps.google.co.jp/maps?output=embed&q={{ $post->title }}"></iframe></div>
        
                                　　<div id="tabBox2">
                                　　      @foreach($recent_posts as $recent_post)
                                　　   
                                        
                                         {{$recent_post->title}}
                                       
                                           
                                            
                                          
                                            <!--@if(isset($recent_post->firstPhoto()->image))-->
                                            <!--    <img class="card-img-top" src="{{  asset('storage/images/' .$recent_post->firstPhoto()->image) }}">-->
                                            <!--@else-->
                                            <!--    <img class="card-img-top" src="{{ asset('images/'.'noimageavailable.png') }}">-->
                                            <!--@endif-->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group-vertical col-3" role="group" aria-label="Basic example">

                   
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
                       
                            <a href="{{ action('User\TimelineController@edit', ['id' => $post->id] )}}" class="nav-link mt20"><i class="fas fa-comments"></i>編集する</a>
                            
                            
                            <form action="{{ route('delete',['id' => $post->id]) }}" method="post">
                                {{ csrf_field() }}
                                <input type="submit" value="削除する" class="mt20 ml10 btn btn-danger" onclick='return confirm("投稿を削除しますか？");'>
                            </form>
                        @endif
                    </div>
                   
                    
                    
                    
                    
                </div>
               
               
              
                
           
                
                
               
             

        
          <!--<div class="row justify-content-center container" style="margin: auto;">-->
          <!--  <div class="col-4">-->
             
            <!--</div>-->
               
               
               
               
            
         
                            
                            
       
       
        
        <button type="button" id="comment" class="justify-content-center col-12 btn-block btn btn-primary">コメントを表示</button>
       
                
                 
                    <div class="row justify-content-center" id="comment_content" style="margin: auto;">
                    @foreach($post->comments as $comment)
                    
                    <div class="media">
                      <!--<img class="d-flex mr-3" data-src="holder.js/64x64?theme=sky" alt="Generic placeholder image">-->
                      <div class="media-body">
                        <h5 class="mt-0"><a href="{{ action('User\PagesController@show', ['id' => $comment->user->id] )}}" class="text-secondary">{{ $comment->user->name }}</a></h5>
                        {{ $comment->comment }}
                      </div>
                    </div>
                    @endforeach
          </div>
             
           
      
    <!--</div>-->
    </div>
@endsection
