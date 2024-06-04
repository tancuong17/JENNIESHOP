<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk" rel="stylesheet">
    <link rel="shortcut icon" href="{{URL::asset('storage/app/images/logo.jpg')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/index.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/store/responsive.css')}}">
</head>
<body>
    <div id="login-container">
        <div id="logo-login">
            <img style="width: 30%; height: 5rem; object-fit: cover" src="{{URL::asset('storage/app/images/logo.jpg')}}" alt="logo">
            <p>JENNIE là THƯƠNG HIỆU THỜI TRANG phong cách FREESTYLE dành cho CÁC BẠN TRẺ chuyên để MẶC ĐI CHƠI</p>
        </div>
        <form action="{{url('/logincheck')}}" method="POST" style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; height: fit-content; background: white; border-radius: 1rem; padding: 2rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); gap: 1rem">
            {{ csrf_field() }}    
            <input type="text" value="0356221524" placeholder="Số điện thoại..." name="phonenumber" style="width: 100%; height: 3rem; padding: 0.5rem; outline: none; border: 1px solid whitesmoke;">
            <input type="password" value="123" placeholder="Mật khẩu..." name="password" style="width: 100%; height: 3rem; padding: 0.5rem; outline: none; border: 1px solid whitesmoke;">
            <button type="submit" style="width: 100%; height: 3rem; border: 1px solid black; background-color: black; padding: 0.5rem 0; outline: none; color: white;">Đăng nhập</button>
            <a href="./get-google-sign-in-url" style="width: 100%; display: flex; align-items: center; border: 1px solid lightgray; display: flex; justify-content: center; align-items: center;">
                <img style="width: 3rem; height: 3rem; object-fit: cover;" src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-512.png" alt="logo">
                <p style="font-size: 13px;">Đăng nhập bằng tài khoản Google</p>
            </a>
            <p style="font-size: 12px">Đăng kí <a href="#" style="color: blue; text-decoration: underline">tại đây</a> nếu bạn chưa có tài khoản</p>
        </form>
    </div>
</body>
<script src="{{URL::asset('resources/js/store/index.js')}}"></script>
</html>