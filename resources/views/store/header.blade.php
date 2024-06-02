<header id="header_container">
    <div id="top_header">
        <p>JENNIE là THƯƠNG HIỆU THỜI TRANG phong cách FREESTYLE dành cho CÁC BẠN TRẺ chuyên để MẶC ĐI CHƠI</p>
        <ul>
            <li>1900 633 501</li>
            <li>Hệ thống cửa hàng</li>
            <li>Tra cứu đơn hàng</li>
        </ul>
    </div>
    <div id="header">
        <div id="left_header">
            <div id="bars_container_mobile">
                <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5"
                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000">
                    <path d="M3 5H21" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                    <path d="M3 12H21" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                    <path d="M3 19H21" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </div>
            <a href="http://localhost/shop">
                <img class="logo" src="{{URL::asset('storage/app/images/logo.jpg')}}" alt="logo">
            </a>
            <ul id="menu">
                <li><a href="http://localhost/shop">TRANG CHỦ</a></li>
                <li><a href="http://localhost/shop/san-pham">SẢN PHẨM</a></li>
                <li><a href="http://localhost/shop/tin-tuc">TIN TỨC</a></li>
            </ul>
        </div>
        <div id="right_header">
            <div id="search_container">
                <input placeholder="Bạn muốn tìm..." @if(str_contains(Request::path(), 'tim-kiem')) value="{{$keyword}}" @endif id="keyword"/>
                <?xml version="1.0" encoding="UTF-8"?><svg onclick="Search()" width="24px" height="24px" viewBox="0 0 24 24"
                    stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000">
                    <path d="M17 17L21 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                    <path
                        d="M3 11C3 15.4183 6.58172 19 11 19C13.213 19 15.2161 18.1015 16.6644 16.6493C18.1077 15.2022 19 13.2053 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11Z"
                        stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <a id="cart_container" href="http://localhost/shop/gio-hang">
                <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5"
                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000">
                    <path d="M3 6H22L19 16H6L3 6ZM3 6L2.25 3.5" stroke="#000000" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M11 19.5C11 20.3284 10.3284 21 9.5 21C8.67157 21 8 20.3284 8 19.5" stroke="#000000"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M17 19.5C17 20.3284 16.3284 21 15.5 21C14.6716 21 14 20.3284 14 19.5" stroke="#000000"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <p>Giỏ hàng</p>
                <span id="quantity-in-cart">(0)</span>
            </a>
            @guest
                <a id="user_container" href="http://localhost/shop/dang-nhap">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000">
                    <path d="M5 20V19C5 15.134 8.13401 12 12 12V12C15.866 12 19 15.134 19 19V20" stroke="#000000"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z"
                        stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <p>Đăng nhập</p>
                </a>
            @endguest
            @auth
                <div id="user_container" onclick="OpenMenuUser()">
                    <img style="width: 3rem; height: 3rem; object-fit: cover; border-radius: 50%;" src="{{env('URL_IMAGE')}}{{ auth()->user()->image }}" alt="user">  
                </div>
            @endauth
        </div>
    </div>
</header>
<div id="search_form_container_mobile">
    <input placeholder="Bạn muốn tìm..." @if(str_contains(Request::path(), 'tim-kiem')) value="{{$keyword}}" @endif id="keyword-mobile"/>
    <?xml version="1.0" encoding="UTF-8"?><svg onclick="SearchMobile()" width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5"
        fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000">
        <path d="M17 17L21 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        </path>
        <path
            d="M3 11C3 15.4183 6.58172 19 11 19C13.213 19 15.2161 18.1015 16.6644 16.6493C18.1077 15.2022 19 13.2053 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11Z"
            stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
    </svg>
</div>
