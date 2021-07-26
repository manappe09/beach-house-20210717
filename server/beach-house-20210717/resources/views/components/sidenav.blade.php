@inject('products', 'App\Consts\ProductsConst')

<nav>
  <div class="sidenav__ice">
    <ul>
      @foreach ($products::$products_list as $id => $item)
        <li><a href="{{ route('menu') }}?id={{ $id }}">{{ $item['name'] }}はこちら</a></li>
      @endforeach
    </ul>
  </div>
  <ul>
    <li><a href="{{ route('menu') }}">その他のメニューはこちら！</a></li>
    <li><a href="{{ route('guide') }}">初めての方へ</a></li>
  </ul>
</nav>