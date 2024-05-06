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
    <title>Danh sách đơn hàng</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk" rel="stylesheet">
    <link rel="shortcut icon" href="{{URL::asset('storage/app/images/logo.jpg')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/index.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/menu.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/header.css')}}">
    <link rel="stylesheet" href="{{URL::asset('resources/css/manage/list.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
    @include('manage.menu')
    <div id="main-container">
        @include('manage.header')
        <div class="table_container">
            <div class="table_header">
                <div>
                    <p>Số dòng hiển thị:</p>
                    <select>
                        <option>10</option>
                        <option>20</option>
                        <option>30</option>
                    </select>
                </div>
                <div>
                    <div class="table_header_search">
                        <input type="text" placeholder="Bạn muốn tìm...">
                        <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M17 17L21 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 11C3 15.4183 6.58172 19 11 19C13.213 19 15.2161 18.1015 16.6644 16.6493C18.1077 15.2022 19 13.2053 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </div>
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M17 20C17 21.1046 17.8954 22 19 22C20.1046 22 21 21.1046 21 20C21 18.8954 20.1046 18 19 18C17.8954 18 17 18.8954 17 20ZM17 20H15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M7 4C7 5.10457 6.10457 6 5 6C3.89543 6 3 5.10457 3 4C3 2.89543 3.89543 2 5 2C6.10457 2 7 2.89543 7 4ZM7 4L9 4" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M14 4L12 4" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 20H10" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 20C11 20 13 4 21 4" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </div>  
            </div>
            <div class="table">
                <table>
                    <tr>
                        <th style="width: 5%; text-align: center">STT</th>
                        <th style="width: 20%">Khách hàng</th>
                        <th style="width: 60%">Địa chi</th>
                        <th style="width: 15%">Trạng thái</th>
                    </tr>
                    @foreach($orders as $order)
                    <tr onclick="LinkOrder('{{$order['id']}}')">
                        <td style="text-align: center">{{ (Request::get('page') - 1) * $quantity + $loop->index + 1}}</td>
                        <td>{{$order['customer']}}</td>
                        <td>{{$order['address']}}</td>
                        <td>
                            @if($order['status'] == 0)
                                Chưa thanh toán
                            @else
                                Đã thanh toán
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="table_bottom">
                {!! $orders->links('manage.paginator', ['quantity' => $quantity]) !!}
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{URL::asset('resources/js/manage/menu.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/listorder.js')}}"></script>
</html>