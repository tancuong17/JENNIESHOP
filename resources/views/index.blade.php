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
</head>
<body>
    @include('store.header')
    @include('store.menu')
    <div class="swiper" id="banner_slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="{{env('URL_IMAGE')}}/images/slider_1.jpeg" alt="slider">
          </div>
          <div class="swiper-slide">
            <img src="{{env('URL_IMAGE')}}/images/slider_2.jpg" alt="slider">
          </div>
        </div>
        <div class="swiper-scrollbar"></div>
    </div>
    <div class="title_text line text_title_center">
        <p>BẠN ĐANG TÌM KIẾM?</p>
    </div>
    <div id="catelory_container">
        <div>
            <img class="catelory_image" src="{{env('URL_IMAGE')}}/images/ao_khoac.png" alt="catelory">
            <p>ÁO KHOÁC</p>
            <p>Áo khoác thời trang nam/nữ</p>
        </div>
        <div>
            <img class="catelory_image" src="{{env('URL_IMAGE')}}/images/do_nam.png" alt="catelory">
            <p>ĐỒ NAM</p>
            <p>Áo thun, sơ mi, quần dài, sort,...</p>
        </div>
        <div>
            <img class="catelory_image" src="{{env('URL_IMAGE')}}/images/do_nu.png" alt="catelory">
            <p>ĐỒ NỮ</p>
            <p>Áo quần, chân váy, đầm, yếm,...</p>
        </div>
        <div>
            <img class="catelory_image" src="{{env('URL_IMAGE')}}/images/do_unisex.png" alt="catelory">
            <p>ĐỒ UNISEX</p>
            <p>Áo thun, sơ mi, áo khoác UNISEX</p>
        </div>
        <div>
            <img class="catelory_image" src="{{env('URL_IMAGE')}}/images/phu_kien.png" alt="catelory">
            <p>PHỤ KIỆN</p>
            <p>Balo, túi xách, nón, thắt lưng, ví,..</p>
        </div>
        <div>
            <img class="catelory_image" src="{{env('URL_IMAGE')}}/images/top.png" alt="catelory">
            <p>#JENNIE</p>
            <p>Sản phẩm được JENNIE đề xuất</p>
        </div>
    </div>
    <div class="title_text text_title_left">
        <p>SẢN PHẨM NỔI BẬT</p>
    </div>
    <div class="product_container">
        @foreach($products as $product)
            <a class="product" href="./product/{{ $product['slug'] }}">
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
    <div class="title_text text_title_left">
        <p>BỘ SƯU TẬP</p>
    </div>
    <div id="collection_container">
        <div class="collection">
            <img src="{{env('URL_IMAGE')}}/images/bo_suu_tap.jpeg" alt="collection">
            <div class="collection_text">
                <p>ENOUGHIMS - "BIẾT ĐỦ"</p>
            </div>
        </div>
        <div class="collection">
            <img src="{{env('URL_IMAGE')}}/images/bo_suu_tam_2.jpg" alt="collection">
            <div class="collection_text">
                <p>DOPAMINE - "MÀU SẮC CHỮA LÀNH"</p>
            </div>
        </div>
        <div class="collection">
            <img src="{{env('URL_IMAGE')}}/images/bo_suu_tam_3.jpg" alt="collection">
            <div class="collection_text">
                <p>RETRO DENIM IS FUTURE</p>
            </div>
        </div>
    </div>
    @include('store.footer')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{URL::asset('resources/js/store/index.js')}}"></script>
<script src="{{URL::asset('resources/js/store/product.js')}}"></script>
</html>