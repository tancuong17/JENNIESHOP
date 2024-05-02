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
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/responsive.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/menu_mobile.css')}}">
</head>
<body>
    @include('store.header')
    @include('store.menu')
    <div class="image-banner">
        <img src="https://static.vecteezy.com/system/resources/previews/002/006/605/non_2x/paper-art-shopping-online-on-smartphone-and-new-buy-sale-promotion-pink-backgroud-for-banner-market-ecommerce-free-vector.jpg" alt="banner">
    </div>
    <div class="text_title_left">
        <ul class="navigation">
            <li>Trang chủ</li>
            <li>Giỏ hàng</li>
        </ul>
    </div>
    <div style="height: 22rem; display: grid; height: fit-content; grid-template-columns: 2fr 1fr; margin: 0 4rem 3rem; gap: 0.5rem;">
        <div>
            <div style="overflow-y: auto; height: 18rem; display: grid; grid-auto-rows: min-content; gap: 0.5rem">
                <div style="height: 5rem; background: whitesmoke; display: flex; justify-content: space-between; align-items: center; padding: 0 0.5rem">
                    <div style="display: flex; justify-content: center; flex-direction: column;">
                        <p>ÁO SƠ MI NỮ - TOTODAY - 02303</p>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <p>250,000đ</p>
                            <p>|</p>
                            <p>Xoá</p>
                        </div>
                    </div>
                    <div style=" display: flex; gap: 1rem; margin-top: 0.5rem; align-items: center;">
                        <?xml version="1.0" encoding="UTF-8"?><svg id="plus_quantity" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#212504"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        <input style="width: 2rem; height: 2rem; text-align: center; outline: none; border: 1px solid lightgray;" type="number" id="quantity_add_to_cart" value="1">
                        <?xml version="1.0" encoding="UTF-8"?><svg id="minus_quantity" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#212504"><path d="M6 12H18" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </div>
                </div>
                <div style="height: 5rem; background: whitesmoke; display: flex; justify-content: space-between; align-items: center; padding: 0 0.5rem">
                    <div style="display: flex; justify-content: center; flex-direction: column;">
                        <p>ÁO SƠ MI NỮ - TOTODAY - 02303</p>
                        <div style="display: flex; align-items: center; gap: 0.5rem;">
                            <p>250,000đ</p>
                            <p>|</p>
                            <p>Xoá</p>
                        </div>
                    </div>
                    <div style=" display: flex; gap: 1rem; margin-top: 0.5rem; align-items: center;">
                        <?xml version="1.0" encoding="UTF-8"?><svg id="plus_quantity" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#212504"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        <input style="width: 2rem; height: 2rem; text-align: center; outline: none; border: 1px solid lightgray;" type="number" id="quantity_add_to_cart" value="1">
                        <?xml version="1.0" encoding="UTF-8"?><svg id="minus_quantity" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#212504"><path d="M6 12H18" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </div>
                </div>
            </div>
            <div style="height: 3.5rem; display: flex; align-items: center; margin-top: 0.5rem; background: lightgray; padding: 0 0.5rem">
                <p>Tổng tiền: 350,000đ</p>
            </div>
        </div>
        <div style="display: flex; flex-direction: column; gap: 0.5rem; height: 100%; justify-content: space-between">
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <p>Họ và tên</p>
                <input type="text" class="input_info" placeholder="...">
                <p>Số điện thoại</p>
                <input type="text" class="input_info" placeholder="...">
                <p>Email</p>
                <input type="text" class="input_info" placeholder="...">
                <p>Địa chỉ giao hàng</p>
                <input type="text" class="input_info" placeholder="...">
            </div>
            <button class="button-w100">Đặt hàng</button>
        </div>
    </div>
    @include('store.footer')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{URL::asset('resources/js/store/index.js')}}"></script>
</html>