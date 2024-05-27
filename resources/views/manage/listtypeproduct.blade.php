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
    <title>Danh sách sản phẩm</title>
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
                        <input type="text" placeholder="Bạn muốn tìm..." value="{{$keyword}}" id="keyword">
                        <?xml version="1.0" encoding="UTF-8"?><svg onclick="Search()" width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M17 17L21 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 11C3 15.4183 6.58172 19 11 19C13.213 19 15.2161 18.1015 16.6644 16.6493C18.1077 15.2022 19 13.2053 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </div>
                </div>  
            </div>
            <div class="table">
                @if(count($typeproducts) == 0)
                    <img style="position: absolute; width: 15rem; height: 15rem; top: 40%; left: 50%;" src="https://schoolville.com/assets/img/empty-cart-illustration.gif" alt="icon">
                @endif
                <table>
                    <tr>
                        <th style="width: 5%; text-align: center">STT</th>
                        <th style="width: 10%">Mã</th>
                        <th style="width: 35%">Tên</th>
                        <th style="width: 50%">Mô tả</th>
                    </tr>
                    @foreach($typeproducts as $typeproduct)
                    <tr onclick="LinkTypeProduct('{{$typeproduct['id']}}')">
                        <td style="text-align: center">{{ (Request::get('page') - 1) * $quantity + $loop->index + 1}}</td>
                        <td><p class="text-responsive">{{sprintf('%08d', $typeproduct['id'])}}<p></td>
                        <td><p class="text-responsive">{{$typeproduct['name']}}<p></td>
                        <td>
                            @if($typeproduct['detail'] != "")
                                <p class="text-responsive">{{$typeproduct['detail']}}</p>
                            @else
                                <p class="text-responsive">...</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="table_bottom">
                {!! $typeproducts->links('manage.paginator', ['quantity' => $quantity]) !!}
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{URL::asset('resources/js/manage/menu.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/listtypeproduct.js')}}"></script>
<script src="{{URL::asset('resources/js/manage/index.js')}}"></script>
</html>