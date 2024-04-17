<div id="menu-container">
    <div id="menu-logo-container">
        <img id="logo_image" src="{{URL::asset('storage/app/images/logo.jpg')}}" alt="image">
    </div>
    <div id="menu_button_container">
        <div class="menu_button">
            <div>
                <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M16 16L16 8" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 16L12 11" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8 16L8 13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 20.4V3.6C3 3.26863 3.26863 3 3.6 3H20.4C20.7314 3 21 3.26863 21 3.6V20.4C21 20.7314 20.7314 21 20.4 21H3.6C3.26863 21 3 20.7314 3 20.4Z" stroke="#000000" stroke-width="1.5"></path></svg>
                <p>Dashboard</p>
            </div>
        </div>
        <div>
            <div class="menu_button" onclick="OpenSubMenu(this)">
                <div>
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 4H9C9 4 9 7 12 7C15 7 15 4 15 4H18M18 11V19.4C18 19.7314 17.7314 20 17.4 20H6.6C6.26863 20 6 19.7314 6 19.4L6 11" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18 4L22.4429 5.77717C22.7506 5.90023 22.9002 6.24942 22.7772 6.55709L21.1509 10.6228C21.0597 10.8506 20.8391 11 20.5938 11H18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M5.99993 4L1.55701 5.77717C1.24934 5.90023 1.09969 6.24942 1.22276 6.55709L2.84906 10.6228C2.94018 10.8506 3.1608 11 3.40615 11H5.99993" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Sản phẩm</p>
                </div>
                <?xml version="1.0" encoding="UTF-8"?><svg class="chervon @if (Request::path() == 'manage/addproduct' or Request::path() == 'manage/listproduct') chervon_active @endif" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 15L12 9L18 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </div>
            <div class="sub_menu_container sub_menu_active">
                <a href="http://localhost/shop/manage/addproduct" class="sub_menu_button @if (Request::path() == 'manage/addproduct') menu_button_active @endif">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Thêm</p>
                </a>
                <a href="http://localhost/shop/manage/listproduct/{{ $quantity }}?page=1" class="sub_menu_button @if (str_contains(Request::path(), 'manage/listproduct') || str_contains(Request::path(), 'manage/detailproduct')) menu_button_active @endif">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M3 12H7.5H12H16.5H21M3 12V16.5M3 12V7.5M21 12V16.5M21 12V7.5M3 16.5V20.4C3 20.7314 3.26863 21 3.6 21H7.5H12H16.5H20.4C20.7314 21 21 20.7314 21 20.4V16.5M3 16.5H7.5H12H16.5H21M21 7.5V3.6C21 3.26863 20.7314 3 20.4 3H16.5H12H7.5H3.6C3.26863 3 3 3.26863 3 3.6V7.5M21 7.5H16.5H12H7.5H3" stroke="#000000" stroke-width="1.5"></path></svg>
                    <p>Danh sách</p>
                </a>
                <div class="sub_menu_button">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M3.03919 4.2939C3.01449 4.10866 3.0791 3.92338 3.23133 3.81499C3.9272 3.31953 6.3142 2 12 2C17.6858 2 20.0728 3.31952 20.7687 3.81499C20.9209 3.92338 20.9855 4.10866 20.9608 4.2939L19.2616 17.0378C19.0968 18.2744 18.3644 19.3632 17.2813 19.9821L16.9614 20.1649C13.8871 21.9217 10.1129 21.9217 7.03861 20.1649L6.71873 19.9821C5.6356 19.3632 4.90325 18.2744 4.73838 17.0378L3.03919 4.2939Z" stroke="#000000" stroke-width="1.5"></path><path d="M3 5C5.57143 7.66666 18.4286 7.66662 21 5" stroke="#000000" stroke-width="1.5"></path></svg>
                    <p>Thùng rác</p>
                </div>
            </div>
        </div>
        <div>   
            <div class="menu_button" onclick="OpenSubMenu(this)">
                <div>
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#212504"><path d="M8 14L16 14" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8 10L10 10" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8 18L12 18" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10 3H6C4.89543 3 4 3.89543 4 5V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V5C20 3.89543 19.1046 3 18 3H14.5M10 3V1M10 3V5" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Đơn hàng</p>
                </div>
                <?xml version="1.0" encoding="UTF-8"?><svg class="chervon" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 15L12 9L18 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </div>
            <div class="sub_menu_container">
                <div class="sub_menu_button">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Thêm</p>
                </div>
                <div class="sub_menu_button">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M3 12H7.5H12H16.5H21M3 12V16.5M3 12V7.5M21 12V16.5M21 12V7.5M3 16.5V20.4C3 20.7314 3.26863 21 3.6 21H7.5H12H16.5H20.4C20.7314 21 21 20.7314 21 20.4V16.5M3 16.5H7.5H12H16.5H21M21 7.5V3.6C21 3.26863 20.7314 3 20.4 3H16.5H12H7.5H3.6C3.26863 3 3 3.26863 3 3.6V7.5M21 7.5H16.5H12H7.5H3" stroke="#000000" stroke-width="1.5"></path></svg>
                    <p>Danh sách</p>
                </div>
                <div class="sub_menu_button">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M3.03919 4.2939C3.01449 4.10866 3.0791 3.92338 3.23133 3.81499C3.9272 3.31953 6.3142 2 12 2C17.6858 2 20.0728 3.31952 20.7687 3.81499C20.9209 3.92338 20.9855 4.10866 20.9608 4.2939L19.2616 17.0378C19.0968 18.2744 18.3644 19.3632 17.2813 19.9821L16.9614 20.1649C13.8871 21.9217 10.1129 21.9217 7.03861 20.1649L6.71873 19.9821C5.6356 19.3632 4.90325 18.2744 4.73838 17.0378L3.03919 4.2939Z" stroke="#000000" stroke-width="1.5"></path><path d="M3 5C5.57143 7.66666 18.4286 7.66662 21 5" stroke="#000000" stroke-width="1.5"></path></svg>
                    <p>Thùng rác</p>
                </div>
            </div>
        </div>
        <div>
            <div class="menu_button" onclick="OpenSubMenu(this)">
                <div>
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M17 19C15.8954 19 15 18.1046 15 17C15 15.8954 15.8954 15 17 15C18.1046 15 19 15.8954 19 17C19 18.1046 18.1046 19 17 19Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M7 9C5.89543 9 5 8.10457 5 7C5 5.89543 5.89543 5 7 5C8.10457 5 9 5.89543 9 7C9 8.10457 8.10457 9 7 9Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M19 5L5 19" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Khuyến mãi</p>
                </div>
                <?xml version="1.0" encoding="UTF-8"?><svg class="chervon" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 15L12 9L18 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </div>
            <div class="sub_menu_container">
                <div class="sub_menu_button">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Thêm</p>
                </div>
                <div class="sub_menu_button">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M3 12H7.5H12H16.5H21M3 12V16.5M3 12V7.5M21 12V16.5M21 12V7.5M3 16.5V20.4C3 20.7314 3.26863 21 3.6 21H7.5H12H16.5H20.4C20.7314 21 21 20.7314 21 20.4V16.5M3 16.5H7.5H12H16.5H21M21 7.5V3.6C21 3.26863 20.7314 3 20.4 3H16.5H12H7.5H3.6C3.26863 3 3 3.26863 3 3.6V7.5M21 7.5H16.5H12H7.5H3" stroke="#000000" stroke-width="1.5"></path></svg>
                    <p>Danh sách</p>
                </div>
                <div class="sub_menu_button">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M3.03919 4.2939C3.01449 4.10866 3.0791 3.92338 3.23133 3.81499C3.9272 3.31953 6.3142 2 12 2C17.6858 2 20.0728 3.31952 20.7687 3.81499C20.9209 3.92338 20.9855 4.10866 20.9608 4.2939L19.2616 17.0378C19.0968 18.2744 18.3644 19.3632 17.2813 19.9821L16.9614 20.1649C13.8871 21.9217 10.1129 21.9217 7.03861 20.1649L6.71873 19.9821C5.6356 19.3632 4.90325 18.2744 4.73838 17.0378L3.03919 4.2939Z" stroke="#000000" stroke-width="1.5"></path><path d="M3 5C5.57143 7.66666 18.4286 7.66662 21 5" stroke="#000000" stroke-width="1.5"></path></svg>
                    <p>Thùng rác</p>
                </div>
            </div>
        </div>
        <div>
            <div class="menu_button" onclick="OpenSubMenu(this)">
                <div>
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M1 20V19C1 15.134 4.13401 12 8 12V12C11.866 12 15 15.134 15 19V20" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path><path d="M13 14V14C13 11.2386 15.2386 9 18 9V9C20.7614 9 23 11.2386 23 14V14.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path><path d="M8 12C10.2091 12 12 10.2091 12 8C12 5.79086 10.2091 4 8 4C5.79086 4 4 5.79086 4 8C4 10.2091 5.79086 12 8 12Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18 9C19.6569 9 21 7.65685 21 6C21 4.34315 19.6569 3 18 3C16.3431 3 15 4.34315 15 6C15 7.65685 16.3431 9 18 9Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Khách hàng</p>
                </div>
                <?xml version="1.0" encoding="UTF-8"?><svg class="chervon" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 15L12 9L18 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </div>
            <div class="sub_menu_container">
                <div class="sub_menu_button">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <p>Thêm</p>
                </div>
                <div class="sub_menu_button">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M3 12H7.5H12H16.5H21M3 12V16.5M3 12V7.5M21 12V16.5M21 12V7.5M3 16.5V20.4C3 20.7314 3.26863 21 3.6 21H7.5H12H16.5H20.4C20.7314 21 21 20.7314 21 20.4V16.5M3 16.5H7.5H12H16.5H21M21 7.5V3.6C21 3.26863 20.7314 3 20.4 3H16.5H12H7.5H3.6C3.26863 3 3 3.26863 3 3.6V7.5M21 7.5H16.5H12H7.5H3" stroke="#000000" stroke-width="1.5"></path></svg>
                    <p>Danh sách</p>
                </div>
                <div class="sub_menu_button">
                    <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M3.03919 4.2939C3.01449 4.10866 3.0791 3.92338 3.23133 3.81499C3.9272 3.31953 6.3142 2 12 2C17.6858 2 20.0728 3.31952 20.7687 3.81499C20.9209 3.92338 20.9855 4.10866 20.9608 4.2939L19.2616 17.0378C19.0968 18.2744 18.3644 19.3632 17.2813 19.9821L16.9614 20.1649C13.8871 21.9217 10.1129 21.9217 7.03861 20.1649L6.71873 19.9821C5.6356 19.3632 4.90325 18.2744 4.73838 17.0378L3.03919 4.2939Z" stroke="#000000" stroke-width="1.5"></path><path d="M3 5C5.57143 7.66666 18.4286 7.66662 21 5" stroke="#000000" stroke-width="1.5"></path></svg>
                    <p>Thùng rác</p>
                </div>
            </div>
        </div>
    </div>
</div>