<div id="header_container">
    <ul class="navigation">
        @if (Request::path() == 'manage/addproduct')
            <li>Sản phẩm</li>
            <li>Thêm mới</li>
        @elseif(str_contains(Request::path(), 'manage/listproduct'))
            <li>Sản phẩm</li>
            <li>Danh sách</li>
        @elseif(str_contains(Request::path(), 'manage/detailproduct'))
            <li>Sản phẩm</li>
            <li>Chi tiết</li>
        @elseif(str_contains(Request::path(), 'manage/addtypeproduct'))
            <li>Loại sản phẩm</li>
            <li>Thêm mới</li>
        @elseif(str_contains(Request::path(), 'manage/listtypeproduct'))
            <li>Loại sản phẩm</li>
            <li>Danh sách</li>
        @elseif(str_contains(Request::path(), 'manage/detailtypeproduct'))
            <li>Loại sản phẩm</li>
            <li>Chi tiết</li>
        @elseif(str_contains(Request::path(), 'manage/listorder'))
            <li>Đơn hàng</li>
            <li>Danh sách</li>
        @elseif(str_contains(Request::path(), 'manage/detailorder'))
            <li>Đơn hàng</li>
            <li>Chi tiết</li>
        @elseif(str_contains(Request::path(), 'manage/addnews'))
            <li>Tin tức</li>
            <li>Thêm</li>
        @elseif(str_contains(Request::path(), 'manage/listnews'))
            <li>Tin tức</li>
            <li>Danh sách</li>
        @elseif(str_contains(Request::path(), 'manage/detailnews'))
            <li>Tin tức</li>
            <li>Chi tiết</li>
        @elseif(str_contains(Request::path(), 'manage/listcustomer'))
            <li>Khách hàng</li>
            <li>Danh sách</li>
        @elseif(str_contains(Request::path(), 'manage/addvoucher'))
            <li>Voucher</li>
            <li>Thêm</li>
        @elseif(str_contains(Request::path(), 'manage/listvoucher'))
            <li>Voucher</li>
            <li>Danh sách</li>
        @elseif(str_contains(Request::path(), 'manage/detailvoucher'))
            <li>Voucher</li>
            <li>Chi tiết</li>
        @endif
    </ul>
    <div id="user_container">
        <div>
            <p id="user-name" data-user="@auth{{ auth()->user()->id }}@endauth">@auth{{ auth()->user()->name }}@endauth</p>
            <p>Nhân viên</p>
        </div>
        <img id="user_logo" src="{{env('URL_IMAGE')}}@auth{{ auth()->user()->image }}@endauth" alt="image">
    </div>
</div>