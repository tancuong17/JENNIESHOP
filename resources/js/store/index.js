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

$(document).on("click", function(event){
    var menuButton = document.getElementById("bars_container_mobile");
    var menu = document.getElementById("menu_mobile");
    if (!menu.contains(event.target) && !menuButton.contains(event.target)) {
        $("#menu_container_mobile").css("display", "none");
    }
});

$(window).resize(function () { 
    if($(window).width() > 1200)
        $("#menu_container_mobile").css("display", "none");
});

let quantityInCart = (localStorage.getItem("quantityInCart")) ? Number(localStorage.getItem("quantityInCart")) : 0;
$("#quantity-in-cart").text("(" + quantityInCart + ")");