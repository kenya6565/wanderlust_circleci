<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.2.1/font-awesome-animation.css" type="text/css" media="all" />


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/utility.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    
    <div id="app">
         <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ action('User\TimelineController@index' )}}">
                    <i class="fas fa-plane-departure faa-wrench animated"></i>
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @if(Auth::check())
                <div class="collapse navbar-collapse mr10" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                             <form action="/timeline" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-xl">
                                新規登録
                            </a>
                            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel">思い出の場所を共有しよう</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                          <div class="form-group">
                                            <label for="title-name" class="col-form-label text-dark">名所の名前:</label>
                                            <input type="text" name="title" class="form-control" id="title-name" placeholder="名所の名前">
                                          </div>
                                          <div class="form-group">
                                            <label for="message-text" class="col-form-label text-dark">紹介文:</label>
                                            <textarea class="form-control" style=" height:220px; resize: none;" name="post" id="message-text" placeholder="紹介文"></textarea>
                                          </div>
                                          <div class="form-group">
                                            <label for="country-name" class="col-form-label text-dark">名所の国:</label>
                                            <input type="text" name="country" class="form-control" id="country-name" placeholder="国名を入力">
                                          </div>
                                          <button type="button" id="add" class=" btn-floating btn-primary" ><i class="fas fa-plus"></i></button>
                                          <div class="form-group-file">
                                            <label for="message-text" class="col-form-label text-dark">画像(任意):</label>
                                            <input type="file" class="form-control-file text-dark"  name="image[]" id="File"  multiple="multiple">
                                          </div>
                                        </form>
                                    </div>
                                  
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                        <button type="submit" class="btn btn-primary">投稿</button>
                                    </div>
                                </div>
                              </div>
                            </div>
                            @if($errors->first('post'))
                                <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">※{{$errors->first('post')}}</p>
                            @endif
                            </form>
                        </li>
                        
                        <li class="nav-item">
                            <form action="{{ route('search') }}" method="GET" class= "form-inline my-2 my-md-0">
                            <a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg">検索</a>
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myHugeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel">検索</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                          <div class="form-group">
                                            <label for="title-name" class="col-form-label text-dark">名所:</label>
                                            <input type="text" name="title" style="width:100%;" class="form-control" id="title-name" placeholder="名所を入力">
                                          </div>
                                          <div class="form-group">
                                            <label for="country-name" class="col-form-label text-dark">名所の国:</label>
                                            <input type="text" name="country" style="width:100%;" class="form-control" id="country-name" placeholder="国名を入力">
                                          </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                        <button type="submit" class="btn btn-primary">検索</button>
                                    </div>
                                </div>
                              </div>
                            </div>
                            @if($errors->first('post'))
                                <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">※{{$errors->first('post')}}</p>
                            @endif
                            </form>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('User\PagesController@show',Auth::id() )}}">マイページ</a>
                        </li>
                @endif
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="main">
         <!-- フラッシュメッセージ -->
        @if (session('flash_message'))
            <div class="flash_message bg-success text-center py-3 my-0 mb30">
                {{ session('flash_message') }}
            </div>
        @endif
            @yield('content')
        </main>
        <footer class='footer p20'>
          <small class='copyright'>Wanderlust 2020 copyright</small>
        </footer>
    </div>
</body>
</html>
