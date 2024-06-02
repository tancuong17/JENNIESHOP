<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
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
    <ul class="navigation" style="margin: 8rem 0 2rem 4rem">
        <li>Trang chủ</li>
        <li>Tin tức</li>
    </ul>
    <div id="news_container">
        @foreach($news as $data)
            <a class="news" href="./tin-tuc/{{$data["slug"]}}/{{$data["id"]}}">
                <img src="{{env('URL_IMAGE')}}{{$data["image"]}}" alt="news">
                <div class="news_text">
                    <p class="text-responsive">{{$data["title"]}}</p>
                </div>
            </a>
        @endforeach
    </div>
    <div class="paginator-container">
        {!! $news->links('store.paginator', ['quantity' => 2]) !!}
    </div>
    @include('store.footer')
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{URL::asset('resources/js/store/index.js')}}"></script>
<script src="{{URL::asset('resources/js/store/product.js')}}"></script>
</html>