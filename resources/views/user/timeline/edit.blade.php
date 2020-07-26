@extends('layouts.app')
@section('title','edit')
    
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-white">
                <h2>投稿編集</h2>
                <!--submit押された後の処理-->
                <form action="{{ action('User\TimelineController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group">
                        <label for="title-name" class="col-form-label">名所の名前:</label>
                        <input type="text" name="title" class="form-control" id="title-name" value="{{ $edit_post->title }}" placeholder="名所の名前" autofocus>
                    </div>
                    <div class="form-group row">
                        <label for="message-text" class="col-form-label">紹介文:</label>
                        <textarea class="form-control" style=" height:220px; resize: none;" name="post" id="message-text" placeholder="紹介文"> {{ $edit_post->post }}</textarea>
                     </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                @if(isset($edit_post->image))
                                     {{ $edit_post->image }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                        </label>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                           <input type="hidden" name="id" value="{{ $edit_post->id }}">
                           <!--これでコントローラのfindでとった特定のidを呼び出している-->
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    


@endsection