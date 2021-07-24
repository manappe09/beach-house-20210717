<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') | エンジニアのための海の家</title>

        <link rel="stylesheet" href="{{ url('style.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
      <nav>
        <ul>
            <li>
                <a href="{{ route("top") }}">トップへ</a>
                <a href="{{ route("ice") }}">かき氷ページへ</a>
                <a href="{{ route("menu") }}">メニュー</a>
                <a href="{{ route("about") }}">このサイトについて</a>
            </li>
        </ul>
      </nav>
      <aside>
        @section('sidenav')
            @component('components.sidenav')
            @endcomponent
        @show
      </aside>
      <main class="main">
        @section('main')
            
        @show
      </main>
      <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
