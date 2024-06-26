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
    <link rel="shortcut icon" href="{{ URL::asset('storage/app/images/logo.jpg') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/css/manage/index.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/css/manage/menu.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/css/manage/header.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('resources/css/manage/list.css') }}">
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
                    <select onchange="ChangeQuantityRow(this)">
                        <option @if ($quantity == 10) selected @endif>10</option>
                        <option @if ($quantity == 20) selected @endif>20</option>
                        <option @if ($quantity == 30) selected @endif>30</option>
                    </select>
                </div>
                <div>
                    <div class="table_header_search">
                        <input type="text" placeholder="Bạn muốn tìm..." value="{{ $keyword }}" id="keyword">
                        <?xml version="1.0" encoding="UTF-8"?><svg onclick="Search()" width="24px" height="24px"
                            viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg"
                            color="#000000">
                            <path d="M17 17L21 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path
                                d="M3 11C3 15.4183 6.58172 19 11 19C13.213 19 15.2161 18.1015 16.6644 16.6493C18.1077 15.2022 19 13.2053 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="table">
                @if (count($orders) == 0)
                    <img style="position: absolute; width: 15rem; height: 15rem; top: 40%; left: 50%;"
                        src="https://schoolville.com/assets/img/empty-cart-illustration.gif" alt="icon">
                @endif
                <table>
                    <tr id="table-header">
                        <th style="width: 5%; text-align: center" id="A">STT</th>
                        <th style="width: 10%">Mã</th>
                        <th style="width: 20%">Khách hàng</th>
                        <th style="width: 50%">Địa chi</th>
                        <th style="width: 15%">Trạng thái</th>
                    </tr>
                    @foreach ($orders as $order)
                        <tr onclick="LinkOrder('{{ $order['id'] }}')">
                            <td style="text-align: center" class="stt">
                                {{ (Request::get('page') - 1) * $quantity + $loop->index + 1 }}</td>
                            <td>{{ sprintf('%08d', $order['id']) }}</td>
                            <td>
                                <p class="text-responsive">{{ $order['customer'] }}</p>
                            </td>
                            <td>
                                <p class="text-responsive">{{ $order['address'] }}</p>
                            </td>
                            <td>
                                @if ($order['status'] == 0)
                                    Chưa giao hàng
                                @elseif($order['status'] == 1)
                                    Đang giao hàng
                                @elseif($order['status'] == 2)
                                    Đã giao hàng
                                @elseif($order['status'] == 3)
                                    Đã huỷ
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
<script src="{{ URL::asset('resources/js/manage/menu.js') }}"></script>
<script src="{{ URL::asset('resources/js/manage/order.js') }}"></script>
<script src="{{ URL::asset('resources/js/manage/index.js') }}"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    function pad (str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }
    Pusher.logToConsole = true;
    var pusher = new Pusher('d9e166e2cf8b029a4997', {
      cluster: 'ap1'
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        $(`
            <tr onclick="LinkOrder('`+ data.message.id +`')">
                <td style="text-align: center" class="stt">1</td>
                <td>`+ pad(data.message.id.toString(), 8) +`</td>
                <td>
                    <p class="text-responsive">`+ data.message.customer +`</p>
                </td>
                <td>
                    <p class="text-responsive">`+ data.message.address +`</p>
                </td>
                <td>Chưa giao hàng</td>
            </tr>
        `).insertAfter("#table-header");
    });
    for (let i = 0; i < $(".stt").length; i++) {
        $(".stt").eq(i).text(i + 1);
    }
  </script>
</html>
