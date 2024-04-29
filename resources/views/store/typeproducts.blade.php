<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$typeProduct[0]['name']}}</title>
    <link rel="shortcut icon" href="{{URL::asset('storage/app/images/logo.jpg')}}">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/header.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/footer.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/index.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/product.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/responsive.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/menu_mobile.css')}}">
</head>
<body>
    @include('store.header')
    @include('store.menu')
    <div style="margin-top: 6rem; margin-bottom: 2rem">
        <img style="width: 100%; object-fit: cover" src="{{env('URL_IMAGE')}}{{$typeProduct[0]['image']}}" alt="banner">
    </div>
    <div class="text_title_left">
        <ul class="navigation">
            <li>Trang chủ</li>
            <li>{{$typeProduct[0]['name']}}</li>
        </ul>
    </div>
    <div class="product_container">
        @foreach($products as $product)
            <a class="product" href="http://localhost/shop/chi-tiet-san-pham/{{ $product['slug'] }}">
                <img src="{{env('URL_IMAGE')}}{{ $images[$loop->index][0]['url'] }}" alt="product">
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
                    <div class="add_to_cart">
                        <img src="{{env('URL_IMAGE')}}/images/cart.svg" alt="cart">
                        <p>Thêm</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="paginator-container">
        {!! $typeProductDetails->links('store.paginator', ['quantity' => 2]) !!}
    </div>
    @include('store.footer')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{URL::asset('resources/js/store/index.js')}}"></script>
<script src="{{URL::asset('resources/js/store/product.js')}}"></script>
</html>