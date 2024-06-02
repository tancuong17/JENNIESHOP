<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="shortcut icon" href="{{URL::asset('storage/app/images/logo.jpg')}}">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/header.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/footer.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/index.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/product.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/responsive.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/menu_mobile.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/usermenu.css')}}">
</head>
<body>
    @include('store.header')
    @include('store.menu')
    @include('store.usermenu')
    @if(count($news) != 0)
        <div class="swiper" id="banner_slider">
            <div class="swiper-wrapper">
                @foreach($news as $data)
                    @if($data["banner"] == 1)
                        <a href="./tin-tuc/{{$data["slug"]}}/{{$data["id"]}}" class="swiper-slide">
                            <img src="{{env('URL_IMAGE')}}{{$data->image}}" alt="slider">
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="swiper-scrollbar"></div>
        </div>
    @endif
    <div class="title_text line text_title_center" @if(count($news) == 0) style="margin-top: 8rem" @endif>
        <p>BẠN ĐANG TÌM KIẾM?</p>
    </div>
    <div id="catelory_container">
        @foreach($typeproducts as $typeproduct)
            <a href="./loai-san-pham/{{ $typeproduct['slug'] }}/{{ $typeproduct['id'] }}?page=1">
                <img class="catelory_image" src="{{env('URL_IMAGE')}}{{$typeproduct['icon']}}" alt="catelory">
                <p>{{$typeproduct['name']}}</p>
                <p class="text-responsive">{{$typeproduct['detail']}}</p>
            </a>       
        @endforeach
    </div>
    <div class="title_text text_title_left">
        <p>SẢN PHẨM MỚI</p>
    </div>
    <div class="product_container">
        @foreach($products as $product)
            <div class="product">
                <a href="./chi-tiet-san-pham/{{ $product['slug'] }}">
                    <img class="image-product" src="{{env('URL_IMAGE')}}{{ $images[$loop->index][0]['url'] }}" alt="product">
                    <h1>{{ $product['name'] }}</h1>
                </a>
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
            </div>
        @endforeach
    </div>
    @if(count($news) != 0)
        <div class="title_text text_title_left">
            <p>TIN TỨC</p>
        </div>
    @endif
    <div id="news_container">
        @foreach($news as $data)
            <a class="news" href="./tin-tuc/{{$data["slug"]}}/{{$data["id"]}}">
                <img src="{{env('URL_IMAGE')}}{{$data["image"]}}" alt="news">
                <div class="news_text">
                    <p class="text-responsive">{{$data["title"]}}</p>
                </div>
            </a>
        @endforeach
    </div>
    @include('store.footer')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{URL::asset('resources/js/store/index.js')}}"></script>
<script src="{{URL::asset('resources/js/store/product.js')}}"></script>
</html>