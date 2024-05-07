<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="shortcut icon" href="{{URL::asset('storage/app/images/logo.jpg')}}">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/header.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/footer.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/index.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/cart.css')}}">
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
    <div id="cart-container">
        <div>
            <div id="product-in-cart" style="overflow-y: auto; height: 26rem; display: grid; grid-auto-rows: min-content; gap: 0.5rem">
                <div id="cart-empty" style="display: flex; justify-content: center; align-items: center; width: 100%; height: 26rem;">
                    <img style="width: 15rem; height: 15rem;" src="https://schoolville.com/assets/img/empty-cart-illustration.gif" alt="icon">
                </div>
            </div>
            <div style="height: 3.5rem; display: flex; align-items: center; margin-top: 0.5rem; background: lightgray; padding: 0 0.5rem">
                <p id="total-money">Tổng tiền: 0đ</p>
            </div>
        </div>
        <div style="display: flex; flex-direction: column; gap: 0.5rem; height: 100%; justify-content: space-between">
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <p>Họ và tên</p>
                <input type="text" class="input_info" placeholder="..." id="customer">
                <p>Số điện thoại</p>
                <input type="text" class="input_info" placeholder="..." id="phonenumber">
                <p>Email</p>
                <input type="text" class="input_info" placeholder="..." id="email">
                <p>Ghi chú</p>
                <textarea placeholder="..." id="note" style="resize: none" class="input_info"></textarea>
                <p>Địa chỉ giao hàng</p>
                <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.5rem; align-items: center">
                        <select class="input_info" id="province" onchange="ChangeProvince(this)">
                            <option value="0">Tỉnh/Thành phố</option>
                        </select>
                        <select class="input_info" id="district" onchange="ChangeDistrict(this)">
                            <option value="0">Quận/Huyện</option>
                        </select>
                        <select class="input_info" id="ward">
                            <option value="0">Xã/Phường</option>
                        </select>
                    </div>
                    <input id="address" type="text" class="input_info" placeholder="Số nhà và tên đường">
                </div>
            </div>
            <button class="button-w100" onclick="AddOrder()">Đặt hàng</button>
        </div>
    </div>
    @include('store.footer')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{URL::asset('resources/js/store/index.js')}}"></script>
<script src="{{URL::asset('resources/js/store/cart.js')}}"></script>
</html>