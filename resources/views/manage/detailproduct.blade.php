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
    <title>{{$product['name']}}</title>
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
                @foreach($images as $image)
                    <div class="image-product-upload-file-conatainer" id="images" for="image-upload-{{$image['id']}}">
                        <img class="image-product-upload" src="{{env('URL_IMAGE')}}{{$image['url']}}"/>
                        <?xml version="1.0" encoding="UTF-8"?><svg class="icon-delete" onclick="DeleteImageProduct(this, {{$image['id']}})" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000" stroke-width="1.5"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM9.70164 8.64124C9.40875 8.34835 8.93388 8.34835 8.64098 8.64124C8.34809 8.93414 8.34809 9.40901 8.64098 9.7019L10.9391 12L8.64098 14.2981C8.34809 14.591 8.34809 15.0659 8.64098 15.3588C8.93388 15.6517 9.40875 15.6517 9.70164 15.3588L11.9997 13.0607L14.2978 15.3588C14.5907 15.6517 15.0656 15.6517 15.3585 15.3588C15.6514 15.0659 15.6514 14.591 15.3585 14.2981L13.0604 12L15.3585 9.7019C15.6514 9.40901 15.6514 8.93414 15.3585 8.64124C15.0656 8.34835 14.5907 8.34835 14.2978 8.64124L11.9997 10.9393L9.70164 8.64124Z" fill="#000000"></path></svg>
                    </div>
                @endforeach
                <label class="image-product-upload-file-conatainer" id="images" for="image-upload-0">
                    <input class="image-product-upload-file" onchange="UploadImageProduct(event)" type="file" id="image-upload-0" accept="image/png, image/gif, image/jpeg">
                    <?xml version="1.0" encoding="UTF-8"?><svg class="add-image-icon" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M13 21H3.6C3.26863 21 3 20.7314 3 20.4V3.6C3 3.26863 3.26863 3 3.6 3H20.4C20.7314 3 21 3.26863 21 3.6V13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 16L10 13L15.5 15.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 10C14.8954 10 14 9.10457 14 8C14 6.89543 14.8954 6 16 6C17.1046 6 18 6.89543 18 8C18 9.10457 17.1046 10 16 10Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 19H19M22 19H19M19 19V16M19 19V22" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </label>
            </div>
            <div class="button-update-container">
                <button class="button-w100" onclick="UpdateImage({{$product['id']}})">Cập nhật</button>
            </div>
            <p>Mã SKU</p>
            <div class="input-update-container">
                <input value="{{$product['sku_code']}}" type="text" class="input_info" placeholder="..." id="sku">
                <button class="button" onclick="UpdateProduct({{$product['id']}}, 'sku_code', this)">Cập nhật</button>
            </div>
            <p>Tên</p>
            <div class="input-update-container">
                <input value="{{$product['name']}}" type="text" class="input_info" placeholder="..." id="name">
                <button class="button" onclick="UpdateProduct({{$product['id']}}, 'name', this)">Cập nhật</button>
            </div>
            <p>Giá</p>
            <div class="input-update-container">
                @foreach($prices as $price)
                    @if ($price['type_price'] == 1)
                        <input onkeyup="FormatMoney(this, event)" data-value="{{$price['price']}}" value="{{number_format($price['price'])}}" type="text" class="input_info" placeholder="..." id="price">
                    @endif 
                @endforeach
                <button class="button" onclick="UpdatePrice({{$product['id']}})">Cập nhật</button>
            </div>
            <p>Giá khuyến mãi</p>
            @foreach($prices as $price)
                @if ($price['type_price'] == 0)
                    <input onkeyup="FormatMoney(this, event)" data-value="{{$price['price']}}" value="{{number_format($price['price'])}}" type="text" class="input_info" placeholder="..." id="price-promotion">
                    <p>Thời gian khuyến mãi</p>
                    <div class="input-update-container">
                        <input value="{{date('Y-m-d', strtotime($price['created_at']))}}" type="date" class="input_info" placeholder="..." id="start-date-price-promotion">
                        <span>-</span>
                        <input value="{{date('Y-m-d', strtotime($price['updated_at']))}}" type="date" class="input_info" placeholder="..." id="end-date-price-promotion">
                    </div>
                @endif
            @endforeach
            @if (count($prices) == 1)
                <input type="text" class="input_info" placeholder="..." id="price-promotion">
                <p>Thời gian khuyến mãi</p>
                <div class="input-update-container">
                    <input type="date" class="input_info" placeholder="..." id="start-date-price-promotion">
                    <span>-</span>
                    <input type="date" class="input_info" placeholder="..." id="end-date-price-promotion">
                </div>
            @endif
            <div class="button-update-container">
                <button class="button-w100" onclick="PricePromotion({{$product['id']}})">Cập nhật</button>
            </div>
            <p>Màu sắc</p>
            <div id="color_container">
                @foreach($colors as $color)
                    <div class="color" data-id="{{$color['id']}}">
                        <label class="color_image" for="image-color-upload-{{$color['id']}}">
                            <input value="{{$color['name']}}" type="text" placeholder="Tên màu sắc..." class="input_info name-color">
                            <input onchange="UploadImageColor(event)" class="image-color-upload-file" type="file" id="image-color-upload-{{$color['id']}}" accept="image/png, image/gif, image/jpeg">
                            <img class="image-color-upload" src={{env('URL_IMAGE')}}{{$color['url']}}/>
                            <button class="button-w100" onclick="UpdateColor({{$color['id']}}, this)">Cập nhật</button>
                        </label>
                        <div class="color_input_container">
                            @foreach($sizes as $size)
                                @if ($size['id_color'] == $color['id'])
                                    <div class="color_input" data-id="{{$size['id']}}">
                                        <p>Kích thước</p>
                                        <input value="{{$size['name']}}" data-value="{{$size['name']}}" type="text" placeholder="..." class="name_size">
                                        <p>Số lượng</p>
                                        <input value="{{$size['quantity']}}" data-value="{{$size['quantity']}}" type="text" placeholder="..." class="quantity_size">
                                        <button class="button-w100" onclick="UpdateSize(this, {{$size['id']}})">Cập nhật</button>
                                        <?xml version="1.0" encoding="UTF-8"?><svg class="icon-delete" onclick="DeleteSizeProduct(this, {{$size['id']}})" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000" stroke-width="1.5"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM9.70164 8.64124C9.40875 8.34835 8.93388 8.34835 8.64098 8.64124C8.34809 8.93414 8.34809 9.40901 8.64098 9.7019L10.9391 12L8.64098 14.2981C8.34809 14.591 8.34809 15.0659 8.64098 15.3588C8.93388 15.6517 9.40875 15.6517 9.70164 15.3588L11.9997 13.0607L14.2978 15.3588C14.5907 15.6517 15.0656 15.6517 15.3585 15.3588C15.6514 15.0659 15.6514 14.591 15.3585 14.2981L13.0604 12L15.3585 9.7019C15.6514 9.40901 15.6514 8.93414 15.3585 8.64124C15.0656 8.34835 14.5907 8.34835 14.2978 8.64124L11.9997 10.9393L9.70164 8.64124Z" fill="#000000"></path></svg>
                                    </div>
                                @endif
                            @endforeach
                            <div id="add_color_input" onclick="AddColorInputUpdate(this, {{$product['id']}}, {{$color['id']}})">
                                <?xml version="1.0" encoding="UTF-8"?><svg width="36px" height="36px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </div>
                        </div>
                        <?xml version="1.0" encoding="UTF-8"?><svg class="icon-delete color-delete-button" onclick="DeleteColorProduct(this, {{$color['id']}})" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000" stroke-width="1.5"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM9.70164 8.64124C9.40875 8.34835 8.93388 8.34835 8.64098 8.64124C8.34809 8.93414 8.34809 9.40901 8.64098 9.7019L10.9391 12L8.64098 14.2981C8.34809 14.591 8.34809 15.0659 8.64098 15.3588C8.93388 15.6517 9.40875 15.6517 9.70164 15.3588L11.9997 13.0607L14.2978 15.3588C14.5907 15.6517 15.0656 15.6517 15.3585 15.3588C15.6514 15.0659 15.6514 14.591 15.3585 14.2981L13.0604 12L15.3585 9.7019C15.6514 9.40901 15.6514 8.93414 15.3585 8.64124C15.0656 8.34835 14.5907 8.34835 14.2978 8.64124L11.9997 10.9393L9.70164 8.64124Z" fill="#000000"></path></svg>
                    </div>
                @endforeach
                <div id="add_color" onclick="AddColorUpdate({{$product['id']}})">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="36px" height="36px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </div>
            </div>
            <div class="detail-update-container">
                <p>Chi tiết</p>
                <button class="button" onclick="UpdateDetailProduct({{$product['id']}})">Cập nhật</button>
            </div>
            <textarea id="detail" style="height: 500px">
                {!!$product['detail']!!}
            </textarea>
            <div class="button-container">
                <button id="remove_product_btn" onclick="DeleteProduct({{$product['id']}})">Xoá sản phẩm</button>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{URL::asset('public/assets/vendor/ckeditor4/ckeditor.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/menu.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/detailproduct.js')}}"></script>
<script>
    CKEDITOR.config.allowedContent = true;
</script>
</html>