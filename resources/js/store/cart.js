$.ajax({
    type: "get",
    url: "https://vapi.vnappmob.com/api/province",
    dataType: "json",
    success: function (response) {
        response.results.forEach(element => {
            $("#province").append(`
                <option value="`+ element.province_id +`">`+ element.province_name +`</option>
            `);
        });
    }
});

function ChangeProvince(e) {
    $.ajax({
        type: "get",
        url: "https://vapi.vnappmob.com/api/province/district/" + $(e).val(),
        dataType: "json",
        success: function (response) {
            $("#district option").not(':first').remove();
            $("#ward option").not(':first').remove();
            response.results.forEach(element => {
                $("#district").append(`
                    <option value="`+ element.district_id +`">`+ element.district_name +`</option>
                `);
            });
        }
    });
}

function ChangeDistrict(e) {
    $.ajax({
        type: "get",
        url: "https://vapi.vnappmob.com/api/province/ward/" + $(e).val(),
        dataType: "json",
        success: function (response) {
            $("#ward option").not(':first').remove();
            response.results.forEach(element => {
                $("#ward").append(`
                    <option value="`+ element.ward_id +`">`+ element.ward_name +`</option>
                `);
            });
        }
    });
}

let cart = (localStorage.getItem("cart")) ? JSON.parse(localStorage.getItem("cart")) : new Array();
let totalMoney = 0;
cart.forEach(element => {
    totalMoney += (element.priceProduct * element.quantity);
    $("#product-in-cart").append(`
        <div style="height: 5rem; background: whitesmoke; display: flex; justify-content: space-between; align-items: center; padding: 0 0.5rem">
            <div style="display: flex; justify-content: center; flex-direction: column;">
                <p>`+ element.nameProduct + ` - ` + element.color + ` - ` + element.size + `</p>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <p>`+ element.priceProduct.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + `</p>
                    <p>|</p>
                    <p>Xoá</p>
                </div>
            </div>
            <div style=" display: flex; gap: 1rem; margin-top: 0.5rem; align-items: center;">
                <?xml version="1.0" encoding="UTF-8"?><svg id="plus_quantity" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#212504"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                <input style="width: 2rem; height: 2rem; text-align: center; outline: none; border: 1px solid lightgray;" type="number" id="quantity_add_to_cart" value="`+ element.quantity +`">
                <?xml version="1.0" encoding="UTF-8"?><svg id="minus_quantity" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#212504"><path d="M6 12H18" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </div>
        </div>
    `);
});
$("#total-money").text("Tổng tiền: " + totalMoney.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

function AddOrder() {
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/addorder",
        data:   {
                "customer": $("#customer").val(),
                "phonenumber": $("#phonenumber").val(),
                "email": $("#email").val(),
                "note": $("#note").val(),
                "province": $("#province").val(),
                "district": $("#district").val(),
                "ward": $("#ward").val(),
                "address": $("#address").val() + ", " + $("#ward option:selected").text() + ", " + $("#district option:selected").text() + ", " + $("#province option:selected").text(),
                "cart": localStorage.getItem("cart"),
                "status": 0,
                "payment": 0
            },
        dataType: "json",
        success: function (response) {
          alert(response);
          localStorage.removeItem("cart");
          localStorage.removeItem("quantityInCart");
          window.location.href = "http://localhost/shop";
       }
    });
}