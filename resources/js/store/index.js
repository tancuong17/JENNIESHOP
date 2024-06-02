var swiper = new Swiper("#banner_slider", {
    loop: true,
    scrollbar: {
        el: ".swiper-scrollbar",
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
});

$("#bars_container_mobile").click(function (e) {
    $("#menu_container_mobile").css("display", "flex");
});

$("#close_menu_mobile").click(function (e) {
    $("#menu_container_mobile").css("display", "none");
});

function OpenMenuUser() {
    $("#user_menu_container").css("display", "flex");
}

$("#close_user_menu").click(function (e) {
    $("#user_menu_container").css("display", "none");
});

$(document).on("click", function(event){
    var menuButton = document.getElementById("bars_container_mobile");
    var menu = document.getElementById("menu_mobile");
    var userContainer = document.getElementById("user_container");
    var userMenu = document.getElementById("user_menu");
    if (!menu.contains(event.target) && !menuButton.contains(event.target)) {
        $("#menu_container_mobile").css("display", "none");
    }
    if (!userMenu.contains(event.target) && !userContainer.contains(event.target)) {
        $("#user_menu_container").css("display", "none");
    }
});

$(window).resize(function () { 
    if($(window).width() > 1200)
        $("#menu_container_mobile").css("display", "none");
});

let quantityInCart = (localStorage.getItem("quantityInCart")) ? Number(localStorage.getItem("quantityInCart")) : 0;
$("#quantity-in-cart").text("(" + quantityInCart + ")");

var perfEntries = performance.getEntriesByType("navigation");

(function () {
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
})();

function Search() {
    window.location.href = "http://localhost/shop/tim-kiem/" + $("#keyword").val() + "?page=1";
}

function SearchMobile() {
    window.location.href = "http://localhost/shop/tim-kiem/" + $("#keyword-mobile").val() + "?page=1";
}

$("#keyword").keypress(function (e) {
    if (e.which == 13) {
        Search();
    }
});

$("#keyword-mobile").keypress(function (e) {
    if (e.which == 13) {
        SearchMobile();
    }
});