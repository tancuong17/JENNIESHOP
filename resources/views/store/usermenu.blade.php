@auth
<div id="user_menu_container">
    <div id="user_menu">
        <div style="display: flex; justify-content: space-between; align-items: center">
            <div style="display: flex; align-items: center; gap: 0.5rem">
                <img style="width: 3rem; height: 3rem; object-fit: cover; border-radius: 50%;" src="{{env('URL_IMAGE')}}{{ auth()->user()->image }}" alt="user">  
                <div>
                    <p> {{ auth()->user()->name }} </p>
                    <p style="font-size: 10px;">Khách hàng Vàng</p>
                </div>
            </div>
            <a href="http://localhost/shop/logout">
                <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M12 12H19M19 12L16 15M19 12L16 9" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M19 6V5C19 3.89543 18.1046 3 17 3H7C5.89543 3 5 3.89543 5 5V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </a> 
        </div>
    </div>
</div>
@endauth