var swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
});

var swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 10,
    loopAdditionalSlides: 1,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
});

const cloneSlide = $('.mySwiper2 .swiper-wrapper').html();
const arraySlide = [];

$('.mySwiper2 .swiper-slide').each(function (i, e) {
    arraySlide.push(e);
})

$('#color_container img').on('click', function () {
    let index = 0;
    let src_color_choose = $(this).attr("data-src");
    $('#color_container img').attr("style", "border: 1px solid lightgray");
    $('#color_container img').removeAttr("class", "color-choosed");
    $(this).attr("style", "border: 1px solid black");
    $(this).attr("class", "color-choosed");
    $(arraySlide).each(function (i, e) {
        if($(e).attr('data-src') == src_color_choose){
            index = i;
        }
    });
    swiper2.slideTo(index);
    $.ajax({
        type: "get",
        url: "http://localhost/shop/api/getsize/" + $(this).attr("data-id"),
        dataType: "json",
        success: function (response) {
            $("#size_container").find("p").remove();
            response.forEach((element, index) => {
                if(index == 0)
                    $("#size_container").append(`
                        <p class="size size-choosed" onclick="ChooseSize(this)" data-name="`+ element.name +`">`+ element.name +`</p>
                    `);
                else
                    $("#size_container").append(`
                        <p class="size" onclick="ChooseSize(this)" data-name="`+ element.name +`">`+ element.name +`</p>
                    `);
            });
        }
    });
});

function ChooseSize(e) {
    $('#size_container p').removeAttr("class", "size-choosed");
    $('#size_container p').attr("style", "padding: 0.5rem 2rem; border: 1px solid lightgray");
    $(e).attr("style", "border: 1px solid black");
    $(e).attr("class", "size size-choosed");
}

$('#plus_quantity').on('click', function () {
    $("#quantity_add_to_cart").val(Number($("#quantity_add_to_cart").val()) + 1);
});

$('#minus_quantity').on('click', function () {
    if(Number($("#quantity_add_to_cart").val()) > 1)
        $("#quantity_add_to_cart").val(Number($("#quantity_add_to_cart").val()) - 1);
});

$('#tab_container p').on('click', function () {
    $('#tab_container p').attr("style", "background-color: white; color: black; border: 1px solid lightgray;");
    $(this).attr("style", " background-color: black; color: white; border: 1px solid black;");
    $(".tab_content").attr("style", "display: none");
    $(".tab_content").eq($(this).attr("data-tab")).attr("style", "display: block");
});

function AddToCart(idProduct, nameProduct, priceProduct) {
    let cart = (localStorage.getItem("cart")) ? JSON.parse(localStorage.getItem("cart")) : new Array();
    let quantityInCart = (localStorage.getItem("quantityInCart")) ? Number(localStorage.getItem("quantityInCart")) : 0;
    let data = {"position": cart.length + 1,"idProduct": idProduct, "nameProduct": nameProduct, "priceProduct": priceProduct, color: $(".color-choosed").eq(0).data("name"), "size": $(".size-choosed").eq(0).data("name"), "quantity": Number($("#quantity_add_to_cart").val())};
    let check = true;
    if(cart.length != 0)
        cart.forEach(element => {
            if(element.id == data.id && element.color == data.color && element.size == data.size){
                element.quantity += Number(data.quantity);
                check = false;
            }
        });
    if (check == true || cart.length == 0) {
        cart.push(data);
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    localStorage.setItem("quantityInCart", Number(quantityInCart) + Number(data.quantity));
    $("#quantity-in-cart").text("(" + (Number(quantityInCart) + Number(data.quantity)) + ")");
    window.location.href = "http://localhost/shop/gio-hang";
}