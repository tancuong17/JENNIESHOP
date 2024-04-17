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