<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Chi tiết Voucher</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk" rel="stylesheet">
    <link rel="shortcut icon" href="{{URL::asset('storage/app/images/logo.jpg')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/index.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/menu.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/header.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/voucher.css')}}">
</head>
<body>
    @include('manage.menu')
    <div id="main-container">
        @include('manage.header')
        <div id="add_voucher_container">
            <div style="height: calc(100vh - 5.5rem); display: flex; flex-direction: column; justify-content: space-between">
                <div>
                    <p class="title">Loại</p>
                    <select class="input_info" id="type">
                        <option value="0" @if($voucher[0]["type"] == 0) selected @endif>Voucher giảm tiền</option>
                        <option value="1" @if($voucher[0]["type"] == 1) selected @endif>Voucher phần trăm</option>
                    </select>
                    <p class="title">Tên</p>
                    <input type="text" value="{{$voucher[0]["name"]}}" class="input_info" placeholder="..." id="name">
                    <p class="title">Mã</p>
                    <input type="text" value="{{$voucher[0]["code"]}}" class="input_info" placeholder="..." id="code">
                    <p class="title">Giá trị</p>
                    <input type="text" value="{{number_format($voucher[0]["value"])}}" onkeyup="FormatMoney(this, event)" class="input_info" placeholder="..." id="value">
                    <p class="title">Số lượng</p>
                    <input type="number" value="{{$voucher[0]["quantity"]}}" class="input_info" placeholder="..." id="quantity">
                    <p class="title">Thời gian áp dụng</p>
                    <div style=" display: flex; justify-content: space-between; gap: 0.5rem; align-items: center;">
                        <input type="date" value="{{date('Y-m-d', strtotime($voucher[0]["start_date"]))}}" class="input_info" placeholder="..." id="start_date">
                        <span>-</span>
                        <input type="date" value="{{date('Y-m-d', strtotime($voucher[0]["end_date"]))}}" class="input_info" placeholder="..." id="end_date">
                    </div>
                </div>
                <button id="add_voucher_btn" onclick="UpdateVoucher({{$voucher[0]['id']}})">Cập nhật</button>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{URL::asset('public/assets/vendor/ckeditor4/ckeditor.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/menu.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/voucher.js')}}"></script>
</html>