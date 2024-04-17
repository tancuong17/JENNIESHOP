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
    <title>Thêm sản phẩm</title>
    <link rel="shortcut icon" href="{{URL::asset('storage/app/images/logo.jpg')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/index.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/menu.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/header.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/addproduct.css')}}">
</head>
<body>
    @include('manage.menu')
    <div id="main-container">
        @include('manage.header')
        <div id="add_product_container">
            <p>Ảnh sản phẩm</p>
            <div id="images_container">
                <label class="image-product-upload-file-conatainer" id="images" for="image-upload-0">
                    <input class="image-product-upload-file" onchange="UploadImageProduct(event)" type="file" id="image-upload-0" accept="image/png, image/gif, image/jpeg">
                    <?xml version="1.0" encoding="UTF-8"?><svg class="add-image-icon" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M13 21H3.6C3.26863 21 3 20.7314 3 20.4V3.6C3 3.26863 3.26863 3 3.6 3H20.4C20.7314 3 21 3.26863 21 3.6V13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 16L10 13L15.5 15.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 10C14.8954 10 14 9.10457 14 8C14 6.89543 14.8954 6 16 6C17.1046 6 18 6.89543 18 8C18 9.10457 17.1046 10 16 10Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 19H19M22 19H19M19 19V16M19 19V22" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </label>
            </div>
            <p>Mã SKU</p>
            <input type="text" class="input_info" placeholder="..." id="sku">
            <p>Tên</p>
            <input type="text" class="input_info" placeholder="..." id="name">
            <p>Giá</p>
            <input type="text" class="input_info" placeholder="..." id="price">
            <p>Màu sắc</p>
            <div id="color_container">
                <div class="color">
                    <label class="color_image" for="image-color-upload-0">
                        <input type="text" placeholder="Tên màu sắc..." class="input_info name-color">
                        <input onchange="UploadImageColor(event)" class="image-color-upload-file" type="file" id="image-color-upload-0" accept="image/png, image/gif, image/jpeg">
                        <div class="svg-container">
                            <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M13 21H3.6C3.26863 21 3 20.7314 3 20.4V3.6C3 3.26863 3.26863 3 3.6 3H20.4C20.7314 3 21 3.26863 21 3.6V13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 16L10 13L15.5 15.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 10C14.8954 10 14 9.10457 14 8C14 6.89543 14.8954 6 16 6C17.1046 6 18 6.89543 18 8C18 9.10457 17.1046 10 16 10Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 19H19M22 19H19M19 19V16M19 19V22" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                    </label>
                    <div class="color_input_container">
                        <div class="color_input">
                            <p>Kích thước</p>
                            <input type="text" placeholder="..." class="name_size">
                            <p>Số lượng</p>
                            <input type="text" placeholder="..." class="quantity_size">
                        </div>
                        <div id="add_color_input" onclick="AddColorInput(this)">
                            <?xml version="1.0" encoding="UTF-8"?><svg width="36px" height="36px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        </div>
                    </div>
                </div>
                <div id="add_color" onclick="AddColor()">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="36px" height="36px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </div>
            </div>
            <p>Chi tiết</p>
            <textarea id="detail"></textarea>
            <button id="add_product_btn" onclick="AddProduct()">Hoàn tất</button>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{URL::asset('public/assets/vendor/ckeditor4/ckeditor.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/menu.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/addproduct.js')}}"></script>
</html>