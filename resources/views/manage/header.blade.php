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
        @endif
    </ul>
    <div id="user_container">
        <div>
            <p>Nguyễn Thị Lan</p>
            <p>Nhân viên</p>
        </div>
        <img id="user_logo" src="{{URL::asset('storage/app/images/user.jpg')}}" alt="image">
    </div>
</div>