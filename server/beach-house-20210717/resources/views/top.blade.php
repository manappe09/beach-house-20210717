<?php
  // dd($products);
?>
@inject('products', 'App\Consts\ProductsConst')

@extends('layout.app')

@section('title', 'トップページ')

@section('main')
    <h2 class="top__title">これはトップページです</h2>
    <ul>
      {{-- @foreach (APP\Consts\ProductsConst::products as $products => $product)
          <li>{{ $product }}</li>
      @endforeach --}}
      {{-- @if (APP\Consts\ProductsConst::demo as $demo => $text) 
        {{ $demo }} => {{ $text }}
      @endif --}}
      @foreach ($products::$products_list as $id => $item)
        <li>{{ $id }}の商品は{{ $item['name'] }}です</li>
      @endforeach
    </ul>
@endsection