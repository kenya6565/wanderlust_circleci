@extends('layouts.header')
@section('title', 'editmypage')
    
@section('content')
     <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ユーザ編集</h2>
                <!--submit押された後の処理-->
                <form action="{{ action('PagesController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $login_user->name }}" autofocus>
                        </div>   
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">E-mail</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="email" value="{{ $login_user->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">現在のパスワード</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" name="current-password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">新しいパスワード</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" name="new-password" required>
                             @if ($errors->has('new-password'))
                              <span class="help-block">
                                <strong>{{ $errors->first('new-password') }}</strong>
                              </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">新しいパスワード（確認用）</label>
                        <div class="col-md-10">
                            <input type="password" class="form-control" name="new-password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                @if($login_user->user_icon_image !== null)
                                     {{ $login_user->user_icon_image }}
                                 @else
                                   
                                @endif
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                           <input type="hidden" name="id" value="{{ $login_user->id }}">
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