<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết đơn hàng</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk" rel="stylesheet">
    <link rel="shortcut icon" href="{{URL::asset('storage/app/images/logo.jpg')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/index.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/menu.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/header.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/order.css')}}">
</head>
<body>
    @include('manage.menu')
    <div id="main-container">
        @include('manage.header')
        <div id="order_container">
            <p class="title">Khách hàng</p>
            <input disabled type="text" placeholder="..." value="{{$order[0]['customer']}}" class="input_info" id="name">
            <p class="title">Số điện thoại</p>
            <input disabled type="text" placeholder="..." value="{{$order[0]['phonenumber']}}" class="input_info" id="name">
            <p class="title">Email</p>
            <input disabled type="text" placeholder="..." value="{{$order[0]['email']}}" class="input_info" id="name">
            <p class="title">Địa chỉ giao hàng</p>
            <input disabled type="text" placeholder="..." value="{{$order[0]['address']}}" class="input_info" id="name">
            <p class="title">Ghi chú</p>
            <textarea disabled name="" id="detail" cols="30" class="input_info" style="resize: none" rows="10" placeholder="...">{{$order[0]['note']}}</textarea>
            <p class="title">Danh sách sản phẩm</p>
            <div style="display: flex; flex-direction: column; gap: 0.5rem">
                @foreach($orderdetail as $product)
                    <div style="height: 5rem; background: whitesmoke; display: flex; justify-content: space-between; align-items: center; padding: 0 0.5rem">
                        <div style="display: flex; justify-content: center; flex-direction: column;">
                            <p>{{$product["name"]}} - {{$product["color"]}} - {{$product["size"]}}</p>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <p>{{number_format($product["price"])}}đ</p>
                            </div>
                        </div>
                        <div style=" display: flex; gap: 1rem; margin-top: 0.5rem; align-items: center;">
                            <p style="font-size: 1.5rem">{{$product["quantity"]}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="title">Tổng tiền: {{number_format($order[0]['totalamount'])}}đ</p>
            <div class="button-container">
                <button class="button-w100">Đã giao hàng</button>
            </div>
            <div class="button-container">
                <button class="button-w100" style="background-color: rgb(175, 13, 13); border: 1px solid rgb(175, 13, 13)" id="remove_product_btn">Huỷ đơn hàng</button>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{URL::asset('public/assets/vendor/ckeditor4/ckeditor.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/menu.js')}}"></script>
</html>