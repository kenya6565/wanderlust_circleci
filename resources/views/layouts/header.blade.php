<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
          <a class="navbar-brand" href="{{ action('User\TimelineController@index' )}}">Wanderlust</a>
          <form class="form-inline my-2 my-md-0">
              <input class="form-control" type="search" placeholder="検索..." aria-label="検索...">
          </form>
          <ul class="navbar-nav ml-auto">
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
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">ホーム <span class="sr-only">(現位置)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link"  href="{{ action('User\PagesController@show',Auth::id() )}}">マイページ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">無効</a>
              </li>
            </ul>
          </div>
        </nav>
        <main>
            {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
            @yield('content')
        </main>
    </body>
</html>