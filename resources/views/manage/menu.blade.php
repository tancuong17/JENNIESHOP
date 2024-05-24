<div id="menu-container">
    <div id="menu-logo-container">
        <img id="logo_image" src="{{URL::asset('storage/app/images/logo.jpg')}}" alt="image">
    </div>
    <div id="menu_button_container">
        <a href="http://localhost/shop/manage/listorder/2?page=1" class="menu_button @if (str_contains(Request::path(), 'manage/listorder') || str_contains(Request::path(), 'manage/detailorder')) menu_button_active @endif">   
            <div>
                <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#212504"><path d="M8 14L16 14" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8 10L10 10" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8 18L12 18" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10 3H6C4.89543 3 4 3.89543 4 5V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V5C20 3.89543 19.1046 3 18 3H14.5M10 3V1M10 3V5" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                <p>Đơn hàng</p>
            </div>
        </a>
        <a  href="http://localhost/shop/manage/listcustomer/2?page=1" class="menu_button @if (str_contains(Request::path(), 'manage/listcustomer')) menu_button_active @endif">
            <div>
                <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M1 20V19C1 15.134 4.13401 12 8 12V12C11.866 12 15 15.134 15 19V20" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path><path d="M13 14V14C13 11.2386 15.2386 9 18 9V9C20.7614 9 23 11.2386 23 14V14.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path><path d="M8 12C10.2091 12 12 10.2091 12 8C12 5.79086 10.2091 4 8 4C5.79086 4 4 5.79086 4 8C4 10.2091 5.79086 12 8 12Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18 9C19.6569 9 21 7.65685 21 6C21 4.34315 19.6569 3 18 3C16.3431 3 15 4.34315 15 6C15 7.65685 16.3431 9 18 9Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                <p>Khách hàng</p>
            </div>
        </a>
        <div>
            <div class="menu_button" onclick="OpenSubMenu(this)">
                <div>
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M13.8476 13.317L9.50515 18.2798C8.70833 19.1905 7.29167 19.1905 6.49485 18.2798L2.15238 13.317C1.49259 12.563 1.49259 11.437 2.15238 10.683L6.49485 5.72018C7.29167 4.80952 8.70833 4.80952 9.50515 5.72017L13.8476 10.683C14.5074 11.437 14.5074 12.563 13.8476 13.317Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M13 19L17.8844 13.3016C18.5263 12.5526 18.5263 11.4474 17.8844 10.6984L13 5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17 19L21.8844 13.3016C22.5263 12.5526 22.5263 11.4474 21.8844 10.6984L17 5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Loại sản phẩm</p>
                </div>
                <?xml version="1.0" encoding="UTF-8"?><svg class="chervon @if (Request::path() == 'manage/addtypeproduct' || str_contains(Request::path(), 'manage/listtypeproduct') || str_contains(Request::path(), 'manage/detailtypeproduct')) chervon_active @endif" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 15L12 9L18 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </div>
            <div class="sub_menu_container @if (Request::path() == 'manage/addtypeproduct' || str_contains(Request::path(), 'manage/listtypeproduct') || str_contains(Request::path(), 'manage/detailtypeproduct')) sub_menu_active @endif">
                <a href="http://localhost/shop/manage/addtypeproduct" class="sub_menu_button @if (Request::path() == 'manage/addtypeproduct') menu_button_active @endif">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Thêm</p>
                </a>
                <a href="http://localhost/shop/manage/listtypeproduct/{{ $quantity }}?page=1" class="sub_menu_button @if (str_contains(Request::path(), 'manage/listtypeproduct') || str_contains(Request::path(), 'manage/detailtypeproduct')) menu_button_active @endif">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M3 12H7.5H12H16.5H21M3 12V16.5M3 12V7.5M21 12V16.5M21 12V7.5M3 16.5V20.4C3 20.7314 3.26863 21 3.6 21H7.5H12H16.5H20.4C20.7314 21 21 20.7314 21 20.4V16.5M3 16.5H7.5H12H16.5H21M21 7.5V3.6C21 3.26863 20.7314 3 20.4 3H16.5H12H7.5H3.6C3.26863 3 3 3.26863 3 3.6V7.5M21 7.5H16.5H12H7.5H3" stroke="#000000" stroke-width="1.5"></path></svg>
                    <p>Danh sách</p>
                </a>
            </div>
        </div>
        <div>
            <div class="menu_button" onclick="OpenSubMenu(this)">
                <div>
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 4H9C9 4 9 7 12 7C15 7 15 4 15 4H18M18 11V19.4C18 19.7314 17.7314 20 17.4 20H6.6C6.26863 20 6 19.7314 6 19.4L6 11" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18 4L22.4429 5.77717C22.7506 5.90023 22.9002 6.24942 22.7772 6.55709L21.1509 10.6228C21.0597 10.8506 20.8391 11 20.5938 11H18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M5.99993 4L1.55701 5.77717C1.24934 5.90023 1.09969 6.24942 1.22276 6.55709L2.84906 10.6228C2.94018 10.8506 3.1608 11 3.40615 11H5.99993" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Sản phẩm</p>
                </div>
                <?xml version="1.0" encoding="UTF-8"?><svg class="chervon @if (Request::path() == 'manage/addproduct' || str_contains(Request::path(), 'manage/listproduct')) chervon_active @endif" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 15L12 9L18 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </div>
            <div class="sub_menu_container @if (Request::path() == 'manage/addproduct' || str_contains(Request::path(), 'manage/listproduct') || str_contains(Request::path(), 'manage/detailproduct')) sub_menu_active @endif">
                <a href="http://localhost/shop/manage/addproduct" class="sub_menu_button @if (Request::path() == 'manage/addproduct') menu_button_active @endif">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Thêm</p>
                </a>
                <a href="http://localhost/shop/manage/listproduct/{{ $quantity }}?page=1" class="sub_menu_button @if (str_contains(Request::path(), 'manage/listproduct') || str_contains(Request::path(), 'manage/detailproduct')) menu_button_active @endif">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M3 12H7.5H12H16.5H21M3 12V16.5M3 12V7.5M21 12V16.5M21 12V7.5M3 16.5V20.4C3 20.7314 3.26863 21 3.6 21H7.5H12H16.5H20.4C20.7314 21 21 20.7314 21 20.4V16.5M3 16.5H7.5H12H16.5H21M21 7.5V3.6C21 3.26863 20.7314 3 20.4 3H16.5H12H7.5H3.6C3.26863 3 3 3.26863 3 3.6V7.5M21 7.5H16.5H12H7.5H3" stroke="#000000" stroke-width="1.5"></path></svg>
                    <p>Danh sách</p>
                </a>
            </div>
        </div>
        <div>
            <div class="menu_button" onclick="OpenSubMenu(this)">
                <div>
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M17 19C15.8954 19 15 18.1046 15 17C15 15.8954 15.8954 15 17 15C18.1046 15 19 15.8954 19 17C19 18.1046 18.1046 19 17 19Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M7 9C5.89543 9 5 8.10457 5 7C5 5.89543 5.89543 5 7 5C8.10457 5 9 5.89543 9 7C9 8.10457 8.10457 9 7 9Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M19 5L5 19" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Voucher</p>
                </div>
                <?xml version="1.0" encoding="UTF-8"?><svg class="chervon" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 15L12 9L18 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </div>
            <div class="sub_menu_container @if (Request::path() == 'manage/addvoucher' || str_contains(Request::path(), 'manage/listvoucher') || str_contains(Request::path(), 'manage/detailvoucher')) sub_menu_active @endif">
                <a href="http://localhost/shop/manage/addvoucher" class="sub_menu_button @if (Request::path() == 'manage/addvoucher') menu_button_active @endif">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Thêm</p>
                </a>
                <a href="http://localhost/shop/manage/listvoucher/2?page=1" class="sub_menu_button @if (str_contains(Request::path(), 'manage/listvoucher') || str_contains(Request::path(), 'manage/detailvoucher')) menu_button_active @endif">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M3 12H7.5H12H16.5H21M3 12V16.5M3 12V7.5M21 12V16.5M21 12V7.5M3 16.5V20.4C3 20.7314 3.26863 21 3.6 21H7.5H12H16.5H20.4C20.7314 21 21 20.7314 21 20.4V16.5M3 16.5H7.5H12H16.5H21M21 7.5V3.6C21 3.26863 20.7314 3 20.4 3H16.5H12H7.5H3.6C3.26863 3 3 3.26863 3 3.6V7.5M21 7.5H16.5H12H7.5H3" stroke="#000000" stroke-width="1.5"></path></svg>
                    <p>Danh sách</p>
                </a>
            </div>
        </div>
        <div>
            <div class="menu_button" onclick="OpenSubMenu(this)">
                <div>
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 6L18 6" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6 10H18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M13 14L18 14" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M13 18L18 18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M2 21.4V2.6C2 2.26863 2.26863 2 2.6 2H21.4C21.7314 2 22 2.26863 22 2.6V21.4C22 21.7314 21.7314 22 21.4 22H2.6C2.26863 22 2 21.7314 2 21.4Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6 18V14H9V18H6Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Tin tức</p>
                </div>
                <?xml version="1.0" encoding="UTF-8"?><svg class="chervon @if (Request::path() == 'manage/addnews' || str_contains(Request::path(), 'manage/listnews')) chervon_active @endif" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 15L12 9L18 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </div>
            <div class="sub_menu_container @if (Request::path() == 'manage/addnews' || str_contains(Request::path(), 'manage/listnews') || str_contains(Request::path(), 'manage/detailnews')) sub_menu_active @endif">
                <a href="http://localhost/shop/manage/addnews" class="sub_menu_button @if (Request::path() == 'manage/addnews') menu_button_active @endif">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Thêm</p>
                </a>
                <a href="http://localhost/shop/manage/listnews/2?page=1" class="sub_menu_button @if (str_contains(Request::path(), 'manage/listnews') || str_contains(Request::path(), 'manage/detailnews')) menu_button_active @endif">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M3 12H7.5H12H16.5H21M3 12V16.5M3 12V7.5M21 12V16.5M21 12V7.5M3 16.5V20.4C3 20.7314 3.26863 21 3.6 21H7.5H12H16.5H20.4C20.7314 21 21 20.7314 21 20.4V16.5M3 16.5H7.5H12H16.5H21M21 7.5V3.6C21 3.26863 20.7314 3 20.4 3H16.5H12H7.5H3.6C3.26863 3 3 3.26863 3 3.6V7.5M21 7.5H16.5H12H7.5H3" stroke="#000000" stroke-width="1.5"></path></svg>
                    <p>Danh sách</p>
                </a>
            </div>
        </div>
    </div>
</div>