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
    <title>Chi tiết tin tức</title>
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
                <option value="0" @if($news[0]['banner'] == 0) selected @endif>Không</option>
                <option value="1" @if($news[0]['banner'] == 1) selected @endif>Có</option>
            </select>
            <p class="title">Tiêu đề</p>
            <input type="text" class="input_info" placeholder="..." id="title" value="{{$news[0]['title']}}">
            <p class="title">Ảnh đại diện</p>
            <label id="image-news-container" for="image-news">
                <input onchange="UploadImage(event)" type="file" id="image-news" accept="image/png, image/gif, image/jpeg">
                <img class="image-news-upload" src="{{env('URL_IMAGE')}}{{$news[0]['image']}}"/>
            </label>
            <p class="title">Nội dung</p>
            <textarea id="content">{!! $news[0]['content'] !!}</textarea>
            <button id="add_news_btn" onclick="UpdateNews({{$news[0]['id']}})">Cập nhật</button>
            <div class="button-container">
                <button id="remove_product_btn" onclick="DeleteNews({{$news[0]['id']}})">Xoá</button>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{URL::asset('public/assets/vendor/ckeditor4/ckeditor.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/menu.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/news.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/index.js')}}"></script>
</html>