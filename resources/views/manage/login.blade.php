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
    <div style="width: 100vw; height: 100vh; display: flex; justify-content: center; align-items: center; background-image: url('https://cdn.vectorstock.com/i/500p/57/56/template-banner-for-online-store-with-shopping-vector-42935756.jpg');">
        <div style="width: 25%; height: 55%; background: white; border-radius: 1rem; padding: 0.5rem 1rem">
            <div style="display: flex; align-items: center; justify-content: space-between; gap: 0.5rem; padding: 1rem 0;">
                <img style="width: 100%; height: 5rem; object-fit: cover;" src="{{URL::asset('storage/app/images/logo.jpg')}}" alt="image">
            </div>
            <p style="margin: 0.5rem 0;">Số điện thoại</p>
            <input type="text" placeholder="..." style="width: 100%;padding: 0.5rem;outline: none; border: 1px solid whitesmoke;">
            <p style="margin: 0.5rem 0;">Mật khẩu</p>
            <input type="password" placeholder="..." style="width: 100%;padding: 0.5rem;outline: none; border: 1px solid whitesmoke;">
            <button style="margin-top: 0.5rem; width: 100%; border: 1px solid black; background-color: black; padding: 0.5rem 0; outline: none; color: white;">Đăng nhập</button>
        </div>
    </div>
</body>
</html>