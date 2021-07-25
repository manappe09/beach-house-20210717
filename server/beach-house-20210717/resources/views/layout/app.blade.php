<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') | エンジニアのための海の家</title>

        <link rel="stylesheet" href="{{ url('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
      <main class="main">
        <header class="header">
          <h1 class="header__title"><span>ようこそ！</span><br>エンジニアのための海の家</h1>
          <nav class="gnav">
            <ul class="gnav__list">
                <li class="gnav__item">
                    <a href="{{ route("top") }}">トップへ</a>
                </li>
                <li class="gnav__item">
                    <a href="{{ route("ice") }}">かき氷ページへ</a>
                </li>
                <li class="gnav__item">
                    <a href="{{ route("menu") }}">メニュー</a>
                </li>
                <li class="gnav__item">
                    <a href="{{ route("about") }}">このサイトについて</a>
                </li>
            </ul>
          </nav>
        </header>
        <div class="contents_area">
          <aside class="sidenav">
            @section('sidenav')
                @component('components.sidenav')
                @endcomponent
            @show
          </aside>
          <div class="contents">
            @section('main')
                
            @show
          </div>
        </div>
      </main>
      <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
