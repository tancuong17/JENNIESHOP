<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết loại sản phẩm</title>
    <link rel="shortcut icon" href="{{URL::asset('storage/app/images/logo.jpg')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/index.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/menu.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/header.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/addtypeproduct.css')}}">
</head>
<body>
    @include('manage.menu')
    <div id="main-container">
        @include('manage.header')
        <div id="add_type_product_container">
            <p>Loại sản phẩm cấp trên</p>
            <select id="type-product-choose">
                <option value="0">Không</option>
                @foreach($typeproducts as $typeproduct)
                    @if($typeproduct['name'] != $typeproductdetail[0]['name'])
                        <option value="{{$typeproduct['id']}}" @if($typeproduct['id'] == $typeproductdetail[0]['type_product_parent']) selected @endif>{{$typeproduct['name']}}</option>
                    @endif
                @endforeach
            </select>
            <p>Ảnh</p>
            <label id="image-banner-type-product-container" for="image-banner-type-product">
                <input onchange="UploadImageBannerTypeProduct(event)" type="file" id="image-banner-type-product" accept="image/png, image/gif, image/jpeg">
                <img class="image-banner-type-product-upload" src="{{env('URL_IMAGE')}}{{$typeproductdetail[0]['image']}}"/>
            </label>
            <p>Biểu tượng</p>
            <div id="info-type-product-container">
                <label id="image-type-product-container" for="image-type-product">
                    <input onchange="UploadImageTypeProduct(event)" type="file" id="image-type-product" accept="image/png, image/gif, image/jpeg">
                    <img class="image-banner-type-product-upload" src="{{env('URL_IMAGE')}}{{$typeproductdetail[0]['icon']}}"/>
                </label>
            </div>
            <div id="info-type-product">
                <p>Tên</p>
                <input type="text" placeholder="..." id="name" value="{{$typeproductdetail[0]['name']}}">
                <p>Mô tả</p>
                <textarea name="" id="detail" cols="30" rows="10" placeholder="...">{{$typeproductdetail[0]['detail']}}</textarea>
            </div>
            <button id="add_product_btn" onclick="UpdateTypeProduct({{$typeproductdetail[0]['id']}})">Cập nhật</button>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{URL::asset('public/assets/vendor/ckeditor4/ckeditor.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/menu.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/addtypeproduct.js')}}"></script>
</html>