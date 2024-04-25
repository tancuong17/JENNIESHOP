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
    $(this).attr("style", "border: 1px solid black");
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
            response.forEach(element => {
                $("#size_container").append(`
                    <p onclick="ChooseSize(this)">`+ element.name +`</p>
                `);
            });
        }
    });
});

function ChooseSize(e) {
    $('#size_container p').attr("style", "border: 1px solid lightgray");
    $(e).attr("style", "border: 1px solid black");
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