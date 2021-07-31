@inject('products', 'App\Consts\ProductsConst')

@extends('layout.app')

@section('title', 'かき氷')

@section('main')
    {{-- @todo class名がiceを動的に指定 --}}
    <h2>2021年夏限定！！かき氷を食べ尽くそうキャンペーン！</h2>
    {{-- <h3>かき氷</h3>
    <hr>
    <ul class="ice__list">
        @foreach ($products::$products_list as $id => $item)
            <li class="ice__item">
                <img src="{{ url('images/miffy.jpg') }}" alt="" width="150" height="200"><br>
                <input type="checkbox" name="{{ $item['name'] }}" id="{{ $item['name'] }}">
                <label for="{{ $item['name'] }}">{{ $item['name'] }}</label>
            </li>
        @endforeach
    </ul> --}}
    {{-- 上のinputが、1つでもselectedの場合は下記コンテンツ表示 --}}
    {{-- vueへ移行。vueへデータを渡す方法を調べる --}}
    {{-- <h4>ご一緒にこちらもいかがですか？</h4>
    <hr>
    <ul class="ice__list">
        @foreach ($products::$products_list as $id => $item)
            <li class="ice__item">
                <img src="{{ url('images/miffy.jpg') }}" alt="" width="150" height="200"><br>
                <input type="checkbox" name="{{ $item['name'] }}" id="{{ $item['name'] }}">
                <label for="{{ $item['name'] }}">{{ $item['name'] }}</label>
            </li>
        @endforeach
    </ul> --}}
    <div id="app">
        {{-- <ice-upsell products='<#?php echo {!! json_encode($products::$products_list, JSON_UNESCAPED_UNICODE) !!} ?>'></ice-upsell> --}}
        <ice-upsell products=""></ice-upsell>
    </div>
    {{-- const値でjsのグローバル変数として定義 --}}
    <script>
        const products = @json($products::$products_list)
    </script>
@endsection