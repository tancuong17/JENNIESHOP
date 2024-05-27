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
    <title>Thêm tin tức</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk" rel="stylesheet">
    <link rel="shortcut icon" href="{{URL::asset('storage/app/images/logo.jpg')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/index.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/menu.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/header.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/news.css')}}">
</head>
<body>
    @include('manage.menu')
    <div id="main-container">
        @include('manage.header')
        <div id="add_news_container">
            <p class="title">Chọn làm Banner</p>
            <select class="input_info" id="isBanner">
                <option value="0">Không</option>
                <option value="1">Có</option>
            </select>
            <p class="title">Tiêu đề</p>
            <input type="text" class="input_info" placeholder="..." id="title">
            <p class="title">Ảnh đại diện</p>
            <label id="image-news-container" for="image-news">
                <input onchange="UploadImage(event)" type="file" id="image-news" accept="image/png, image/gif, image/jpeg">
                <div class="svg-container">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M13 21H3.6C3.26863 21 3 20.7314 3 20.4V3.6C3 3.26863 3.26863 3 3.6 3H20.4C20.7314 3 21 3.26863 21 3.6V13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 16L10 13L15.5 15.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 10C14.8954 10 14 9.10457 14 8C14 6.89543 14.8954 6 16 6C17.1046 6 18 6.89543 18 8C18 9.10457 17.1046 10 16 10Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 19H19M22 19H19M19 19V16M19 19V22" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </div>
            </label>
            <p class="title">Nội dung</p>
            <textarea id="content"></textarea>
            <button id="add_news_btn" onclick="AddNews()">Hoàn tất</button>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{URL::asset('public/assets/vendor/ckeditor4/ckeditor.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/menu.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/news.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/index.js')}}"></script>
</html>