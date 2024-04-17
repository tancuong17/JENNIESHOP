function PricePromotion(idProduct) {
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/pricepromotion",
        data: {idProduct: idProduct, price: $("#price-promotion").val(), startDate: $("#start-date-price-promotion").val(), endDate: $("#end-date-price-promotion").val()},
        dataType: "json",
        success: function (response) {
            alert(response);
        }
    });
}