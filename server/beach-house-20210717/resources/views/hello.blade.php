<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
      </head>
      <body>
        <div class="flex-center position-ref full-height">
          <span>これはHelloコンポーネント表示用ルートです</span>
          <div id="app">
            <hello></hello>
          </div>
        </div>
        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
