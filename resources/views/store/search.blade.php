<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
    <link rel="shortcut icon" href="{{URL::asset('storage/app/images/logo.jpg')}}">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/header.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/footer.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/index.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/responsive.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/menu_mobile.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/usermenu.css')}}">
</head>
<body>
    @include('store.header')
    @include('store.menu')
    @include('store.usermenu')
    <div class="text_title_left" style="margin-top: 8rem">
        <ul class="navigation">
            <li>Trang chủ</li>
            <li>Tìm kiếm</li>
        </ul>
    </div>
    <div class="product_container" @if(count($products) == 0) style="display: block;" @endif>
        @if(count($products) == 0)
            <div id="cart-empty" style="display: flex; justify-content: center; align-items: center; width: 100%; height: 26rem;">
                <img style="width: 15rem; height: 15rem;" src="https://schoolville.com/assets/img/empty-cart-illustration.gif" alt="icon">
            </div>
        @endif
        @foreach($products as $product)
            <a class="product" href="http://localhost/shop/chi-tiet-san-pham/{{ $product['slug'] }}">
                <img class="image-product" src="{{env('URL_IMAGE')}}{{ $images[$loop->index][0]['url'] }}" alt="product">
                <h1>{{ $product['name'] }}</h1>
                <div class="product_bottom">
                    <div class="price">
                        @foreach($prices[$loop->index] as $price)
                            @if ($price['type_price'] == 0 && Carbon\Carbon::parse($price['created_at']) <= Carbon\Carbon::today() && Carbon\Carbon::parse($price['updated_at']) >= Carbon\Carbon::today())
                                <p>{{number_format($price['price'])}}đ</p>
                            @endif
                        @endforeach
                        @foreach($prices[$loop->index] as $price)
                            @if ($price['type_price'] == 1)
                                <p>{{number_format($price['price'])}}đ</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="paginator-container">
        {!! $products->links('store.paginator', ['quantity' => 2]) !!}
    </div>
    @include('store.footer')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{URL::asset('resources/js/store/index.js')}}"></script>
</html>