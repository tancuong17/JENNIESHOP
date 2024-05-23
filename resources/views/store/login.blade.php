<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk" rel="stylesheet">
    <link rel="shortcut icon" href="{{URL::asset('storage/app/images/logo.jpg')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/index.css')}}">
</head>
<body>
    <div style="width: 100vw; height: 100vh; display: grid; justify-content: center; align-items: center; grid-template-columns: 2fr 1fr; padding: 5rem; gap: 5rem">
        <div>
            <img style="width: 30%; height: 5rem; object-fit: cover" src="{{URL::asset('storage/app/images/logo.jpg')}}" alt="logo">
            <p>JENNIE là THƯƠNG HIỆU THỜI TRANG phong cách FREESTYLE dành cho CÁC BẠN TRẺ chuyên để MẶC ĐI CHƠI</p>
        </div>
        <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; height: fit-content; background: white; border-radius: 1rem; padding: 1.5rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); gap: 1rem">
                <input type="text" placeholder="Số điện thoại..." style="width: 100%; height: 3rem; padding: 0.5rem; outline: none; border: 1px solid whitesmoke;">
                <input type="password" placeholder="Mật khẩu..." style="width: 100%; height: 3rem; padding: 0.5rem; outline: none; border: 1px solid whitesmoke;">
                <button style="width: 100%; height: 3rem; border: 1px solid black; background-color: black; padding: 0.5rem 0; outline: none; color: white;">Đăng nhập</button>
                <p style="font-size: 0.8rem">Đăng ký <a href="#" style="color: blue; text-decoration: underline">tại đây</a> nếu chưa có tài khoản</p>
            </div>
        </div>
    </div>
</body>
</html>