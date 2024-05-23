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
        <div class="item-cart" style="height: 5rem; background: whitesmoke; display: flex; justify-content: space-between; align-items: center; padding: 0 0.5rem">
            <div style="display: flex; justify-content: center; flex-direction: column;">
                <p>`+ element.nameProduct + ` - ` + element.color + ` - ` + element.size + `</p>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <p>`+ element.priceProduct.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + `</p>
                    <p>|</p>
                    <p onclick="DeleteProductInCart(this, `+ element.position + `)">Xoá</p>
                </div>
            </div>
            <div style=" display: flex; gap: 1rem; margin-top: 0.5rem; align-items: center;">
                <?xml version="1.0" encoding="UTF-8"?><svg onclick="AddQuantity(this, `+ element.position + `)" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#212504"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                <input onchange="ChangeQuantity(this, `+ element.position + `)" style="width: 2rem; height: 2rem; text-align: center; outline: none; border: 1px solid lightgray;" type="number" value="`+ element.quantity +`">
                <?xml version="1.0" encoding="UTF-8"?><svg onclick="MinusQuantity(this, `+ element.position + `)" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#212504"><path d="M6 12H18" stroke="#212504" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </div>
        </div>
    `);
    localStorage.setItem("totalMoney", totalMoney);
});

if(cart.length != 0)
    $("#cart-empty").css("display", "none");

$("#total-money").text("Tổng tiền: " + totalMoney.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ");

function AddQuantity(e, position) {
    let cart = (localStorage.getItem("cart")) ? JSON.parse(localStorage.getItem("cart")) : new Array();
    let quantityInCart = (localStorage.getItem("quantityInCart")) ? Number(localStorage.getItem("quantityInCart")) : 0;
    let input = Number($(e).parent().find("input").eq(0).val());
    let totalMoney = 0;
    $(e).parent().find("input").eq(0).val(input + 1);
    cart.forEach(element => {
        if(element.position == position){
            element.quantity += 1;
        }
        totalMoney += (element.priceProduct * element.quantity);
    });
    localStorage.setItem("cart", JSON.stringify(cart));
    localStorage.setItem("quantityInCart", quantityInCart + 1);
    $("#quantity-in-cart").text("(" + Number(quantityInCart + 1) + ")");
    $("#total-money").text("Tổng tiền: " + totalMoney.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ");
    localStorage.setItem("totalMoney", totalMoney);
}

function MinusQuantity(e, position) {
    let cart = (localStorage.getItem("cart")) ? JSON.parse(localStorage.getItem("cart")) : new Array();
    let quantityInCart = (localStorage.getItem("quantityInCart")) ? Number(localStorage.getItem("quantityInCart")) : 0;
    let input = Number($(e).parent().find("input").eq(0).val());
    let totalMoney = 0;
    if(input > 1){
        $(e).parent().find("input").eq(0).val(input - 1);
        cart.forEach(element => {
            if(element.position == position){
                element.quantity -= 1;
            }
            totalMoney += (element.priceProduct * element.quantity);
        });
        localStorage.setItem("quantityInCart", quantityInCart - 1);
        localStorage.setItem("cart", JSON.stringify(cart));
        $("#quantity-in-cart").text("(" + Number(quantityInCart - 1) + ")");
        $("#total-money").text("Tổng tiền: " + totalMoney.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ");
        localStorage.setItem("totalMoney", totalMoney);
    }
}

function ChangeQuantity(e, position) {
    let cart = (localStorage.getItem("cart")) ? JSON.parse(localStorage.getItem("cart")) : new Array();
    let quantityInCart = 0;
    let totalMoney = 0;
    cart.forEach(element => {
        if(element.position == position){
            element.quantity = Number($(e).parent().find("input").eq(0).val());
        }
        totalMoney += (element.priceProduct * element.quantity);
        quantityInCart += element.quantity;
    });
    localStorage.setItem("cart", JSON.stringify(cart));
    localStorage.setItem("quantityInCart", quantityInCart);
    $("#quantity-in-cart").text("(" + Number(quantityInCart) + ")");
    $("#total-money").text("Tổng tiền: " + totalMoney.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ");
    localStorage.setItem("totalMoney", totalMoney);
}

function DeleteProductInCart(e, position) {
    $(e).parents(".item-cart").remove();
    let cart = (localStorage.getItem("cart")) ? JSON.parse(localStorage.getItem("cart")) : new Array();
    let quantityInCart = (localStorage.getItem("quantityInCart")) ? Number(localStorage.getItem("quantityInCart")) : 0;
    let totalMoney = 0;
    cart.forEach((element, index) => {
        if(element.position == position){
            cart.splice(index, 1);
            quantityInCart -= element.quantity;
        }
        else{
            totalMoney += (element.priceProduct * element.quantity);
        }
    });
    localStorage.setItem("cart", JSON.stringify(cart));
    localStorage.setItem("quantityInCart", quantityInCart);
    $("#quantity-in-cart").text("(" + Number(quantityInCart) + ")");
    $("#total-money").text("Tổng tiền: " + totalMoney.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "đ");
    localStorage.setItem("totalMoney", totalMoney);
    if (quantityInCart == 0) {
        $("#cart-empty").attr("style", "display: flex; justify-content: center; align-items: center; width: 100%; height: 26rem;");
    }
}

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
                "payment": 0,
                "totalamount": Number(localStorage.getItem("totalMoney"))
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