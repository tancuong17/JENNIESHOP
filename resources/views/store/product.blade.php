<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$product['name']}}</title>
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
    <div id="main_product_page">
        <ul class="navigation">
            <li>Trang chủ</li>
            <li>Áo khoác</li>
            <li>Áo khoác UNISEX</li>
            <li>Áo Khoác Dù Unisex</li>
        </ul>
        <div id="product_info_container">
            <div id="image_product_container">
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        @foreach($images as $image)
                            <div class="swiper-slide" data-src="{{$image['url']}}">
                                <img src="http://localhost/shop/storage/app/{{$image['url']}}" />
                            </div>
                        @endforeach
                        @foreach($colors as $color)
                            <div class="swiper-slide" data-src="{{$color['url']}}">
                                <img src="http://localhost/shop/storage/app/{{$color['url']}}"/>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($images as $image)
                            <div class="swiper-slide">
                                <img src="http://localhost/shop/storage/app/{{$image['url']}}" />
                            </div>
                        @endforeach
                        @foreach($colors as $color)
                            <div class="swiper-slide" data-src="{{$color['url']}}">
                                <img src="http://localhost/shop/storage/app/{{$color['url']}}"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="product_info_right_container">
                <h1>{{$product['name']}}</h1>
                <div id="sku_container">
                    <p>SKU: {{$product['sku_code']}}</p>
                    <p>Còn hàng</p>
                </div>
                <div id="price_info_product_container">
                    <div id="price_info_product">
                        @foreach($prices as $price)
                            @if ($price['type_price'] == 0 && Carbon\Carbon::parse($price['created_at']) <= Carbon\Carbon::today() && Carbon\Carbon::parse($price['updated_at']) >= Carbon\Carbon::today())
                                <p>{{number_format($price['price'])}}đ</p>
                            @endif
                        @endforeach
                        @foreach($prices as $price)
                            @if ($price['type_price'] == 1)
                                <p>{{number_format($price['price'])}}đ</p>
                            @endif
                        @endforeach
                    </div>
                    @foreach($prices as $price)
                        @if ($price['type_price'] == 0 && Carbon\Carbon::parse($price['created_at']) <= Carbon\Carbon::today() && Carbon\Carbon::parse($price['updated_at']) >= Carbon\Carbon::today())
                            <p>Thời gian khuyến mãi: từ ngày {{date('d-m-Y', strtotime($price['created_at']))}} đến ngày {{date('d-m-Y', strtotime($price['updated_at']))}}</p>
                        @endif
                    @endforeach
                </div>
                <div>
                    <p>Màu sắc</p>
                    <div id="color_container">
                        @foreach($colors as $color)
                            <img data-id={{$color['id']}} @if($loop->index == 0) class="color-choosed" @endif src="http://localhost/shop/storage/app/{{$color['url']}}" data-src="{{$color['url']}}" data-name="{{$color['name']}}"/>
                        @endforeach
                    </div>
                </div>
                <div>
                    <p>Kích thước</p>
                    <div id="size_container">
                        @foreach($sizes as $size)
                            @if ($size['id_color'] == $colors[0]['id'])
                                <p class="size size-choosed" onclick="ChooseSize(this)" data-name="{{$size['name']}}">{{$size['name']}}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div>
                    <p>Số lượng</p>
                    <div id="quantity_container">
                        <?xml version="1.0" encoding="UTF-8"?><svg id="plus_quantity" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#212504"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        <input type="number" id="quantity_add_to_cart" value="1">
                        <?xml version="1.0" encoding="UTF-8"?><svg id="minus_quantity" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#212504"><path d="M6 12H18" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </div>
                </div>
                <div id="product_info_right_button_container">
                    <div>
                        <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#212504"><path d="M8 14L16 14" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8 10L10 10" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8 18L12 18" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10 3H6C4.89543 3 4 3.89543 4 5V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V5C20 3.89543 19.1046 3 18 3H14.5M10 3V1M10 3V5" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        <p>Mua ngay</p>
                    </div>
                    <div onclick="AddToCart({{$product['id']}}, '{{$product['name']}}', {{$prices[0]['price']}})">
                        <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#212504"><path d="M3 6H22L19 16H6L3 6ZM3 6L2.25 3.5" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9.99219 11H11.9922M13.9922 11H11.9922M11.9922 11V9M11.9922 11V13" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M11 19.5C11 20.3284 10.3284 21 9.5 21C8.67157 21 8 20.3284 8 19.5" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17 19.5C17 20.3284 16.3284 21 15.5 21C14.6716 21 14 20.3284 14 19.5" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        <p>Thêm vào giỏ hàng</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="bottom_main_product_page">
            <div id="tab_container">
                <p data-tab="0">Chi tiết</p>
                <p data-tab="1">Đánh giá</p>
            </div>
        </div>
        <div id="tab_content_container">
            <div class="tab_content">
                {!! $product['detail'] !!}
            </div>
            <div class="tab_content">
                <p>B</p>
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