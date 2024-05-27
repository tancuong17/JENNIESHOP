CKEDITOR.replace('detail', {height: 500});

function toSlug(str) {
	str = str.toLowerCase();     
	str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
	str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
	str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
	str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
	str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
	str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
	str = str.replace(/(đ)/g, 'd');
	str = str.replace(/([^0-9a-z-\s])/g, '');
	str = str.replace(/(\s+)/g, '-');
	str = str.replace(/-+/g, '-');
	str = str.replace(/^-+/g, '');
	str = str.replace(/-+$/g, '');
	return str;
}

function DeleteImageProduct(e, idImage) {
    $(e).parent().remove();
    imagesRemoveProduct.push(idImage);
}

function DeleteColorProduct(e, idColor) {
    if (confirm("Bạn có thực sự muốn xoá") == true) {
        $.ajax({
            type: "post",
            url: "http://localhost/shop/api/deletecolor",
            data: {"idColor": idColor},
            dataType: "json",
            success: function (response) {
                alert(response);
                $(e).parent().remove();
            }
        });
    }
}

function AddColorInput(e) {
    $(e).parents(".color_input_container").prepend(`
        <div class="color_input">
            <p class="title">Kích thước</p>
            <input type="text" placeholder="..." class="name_size">
            <p class="title">Số lượng</p>
            <input type="text" placeholder="..." class="quantity_size">
            <?xml version="1.0" encoding="UTF-8"?><svg class="icon-delete" onclick="DeleteElement(this)" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000" stroke-width="1.5"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM9.70164 8.64124C9.40875 8.34835 8.93388 8.34835 8.64098 8.64124C8.34809 8.93414 8.34809 9.40901 8.64098 9.7019L10.9391 12L8.64098 14.2981C8.34809 14.591 8.34809 15.0659 8.64098 15.3588C8.93388 15.6517 9.40875 15.6517 9.70164 15.3588L11.9997 13.0607L14.2978 15.3588C14.5907 15.6517 15.0656 15.6517 15.3585 15.3588C15.6514 15.0659 15.6514 14.591 15.3585 14.2981L13.0604 12L15.3585 9.7019C15.6514 9.40901 15.6514 8.93414 15.3585 8.64124C15.0656 8.34835 14.5907 8.34835 14.2978 8.64124L11.9997 10.9393L9.70164 8.64124Z" fill="#000000"></path></svg>
        </div>
    `);
}

function DeleteSizeProduct(e, idSize) {
    if (confirm("Bạn có thực sự muốn xoá") == true) {
        $.ajax({
            type: "post",
            url: "http://localhost/shop/api/deletesize",
            data: {"idSize": idSize},
            dataType: "json",
            success: function (response) {
                alert(response);
                $(e).parent().remove();
            }
        });
    }
}

function UploadImageProduct(e) {
    if ($(e.target).parent().find('.icon-delete').length == 0) {
        $(e.target).parent().append(`
            <img class="image-product-upload" src="`+ URL.createObjectURL(e.target.files[0]) +`"/>
        `);
        $(e.target).parent().find(".add-image-icon").css("display", "none");
        $(e.target).parent().append(`
            <?xml version="1.0" encoding="UTF-8"?><svg class="icon-delete" onclick="DeleteElement(this)" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000" stroke-width="1.5"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM9.70164 8.64124C9.40875 8.34835 8.93388 8.34835 8.64098 8.64124C8.34809 8.93414 8.34809 9.40901 8.64098 9.7019L10.9391 12L8.64098 14.2981C8.34809 14.591 8.34809 15.0659 8.64098 15.3588C8.93388 15.6517 9.40875 15.6517 9.70164 15.3588L11.9997 13.0607L14.2978 15.3588C14.5907 15.6517 15.0656 15.6517 15.3585 15.3588C15.6514 15.0659 15.6514 14.591 15.3585 14.2981L13.0604 12L15.3585 9.7019C15.6514 9.40901 15.6514 8.93414 15.3585 8.64124C15.0656 8.34835 14.5907 8.34835 14.2978 8.64124L11.9997 10.9393L9.70164 8.64124Z" fill="#000000"></path></svg>
        `)
        $("#images_container").append(`
            <label class="image-product-upload-file-conatainer" id="images" for="image-upload-`+ Number($(e.target).data("number") + 1) +`">
                <input class="image-product-upload-file" data-number="`+ Number($(e.target).data("number") + 1) +`" onchange="UploadImageProduct(event)" type="file" id="image-upload-`+ Number($(e.target).data("number") + 1) +`" accept="image/png, image/gif, image/jpeg">
                <?xml version="1.0" encoding="UTF-8"?><svg class="add-image-icon" width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M13 21H3.6C3.26863 21 3 20.7314 3 20.4V3.6C3 3.26863 3.26863 3 3.6 3H20.4C20.7314 3 21 3.26863 21 3.6V13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 16L10 13L15.5 15.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 10C14.8954 10 14 9.10457 14 8C14 6.89543 14.8954 6 16 6C17.1046 6 18 6.89543 18 8C18 9.10457 17.1046 10 16 10Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 19H19M22 19H19M19 19V16M19 19V22" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </label>
        `);
    }
    else{
        $(e.target).parent().find("img").attr("src", URL.createObjectURL(e.target.files[0]));
    }
}

function AddColorUpdate(idProduct) {
    if ($(".image-color-upload-file-update").length == 0) {
        $("#color_container").append(`
            <div class="button-update-container">
                <button id="add-color-button" class="button-w100" onclick="AddColor(`+ idProduct +`, this)">Thêm</button>
            </div>
        `);
    }
    $(` <div class="color-add-update-container">
            <div class="color-add-update">
                <label class="color_image" for="image-color-upload-update-`+ Number($(".image-color-upload-file-update").length) +`">
                    <input type="text" placeholder="Tên màu sắc..." class="input_info name-color-update">
                    <input onchange="UploadImageColor(event)" class="image-color-upload-file image-color-upload-file-update" type="file" id="image-color-upload-update-`+ Number($(".image-color-upload-file-update").length) +`" accept="image/png, image/gif, image/jpeg">
                    <div class="svg-container">
                        <?xml version="1.0" encoding="UTF-8"?><svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M13 21H3.6C3.26863 21 3 20.7314 3 20.4V3.6C3 3.26863 3.26863 3 3.6 3H20.4C20.7314 3 21 3.26863 21 3.6V13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 16L10 13L15.5 15.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 10C14.8954 10 14 9.10457 14 8C14 6.89543 14.8954 6 16 6C17.1046 6 18 6.89543 18 8C18 9.10457 17.1046 10 16 10Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 19H19M22 19H19M19 19V16M19 19V22" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </div>
                </label>
                <div class="color_input_container">
                    <div class="color_input">
                        <p class="title">Kích thước</p>
                        <input type="text" placeholder="..." class="name_size">
                        <p class="title">Số lượng</p>
                        <input type="text" placeholder="..." class="quantity_size">
                    </div>
                    <div id="add_color_input" onclick="AddColorInput(this)">
                        <?xml version="1.0" encoding="UTF-8"?><svg width="36px" height="36px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M6 12H12M18 12H12M12 12V6M12 12V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </div>
                </div>
            </div>
            <?xml version="1.0" encoding="UTF-8"?><svg class="icon-delete" onclick="DeleteElement(this)" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000" stroke-width="1.5"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM9.70164 8.64124C9.40875 8.34835 8.93388 8.34835 8.64098 8.64124C8.34809 8.93414 8.34809 9.40901 8.64098 9.7019L10.9391 12L8.64098 14.2981C8.34809 14.591 8.34809 15.0659 8.64098 15.3588C8.93388 15.6517 9.40875 15.6517 9.70164 15.3588L11.9997 13.0607L14.2978 15.3588C14.5907 15.6517 15.0656 15.6517 15.3585 15.3588C15.6514 15.0659 15.6514 14.591 15.3585 14.2981L13.0604 12L15.3585 9.7019C15.6514 9.40901 15.6514 8.93414 15.3585 8.64124C15.0656 8.34835 14.5907 8.34835 14.2978 8.64124L11.9997 10.9393L9.70164 8.64124Z" fill="#000000"></path></svg>
            </div>
        `).insertBefore("#add_color");
}

function AddColor(idProduct, e) {
    let data = new FormData();
    let quantityColorPhoto = 0;
    let colors = new Array();
    let imageColorUploadFiles = document.getElementsByClassName("image-color-upload-file-update");
    let nameColorClass = document.getElementsByClassName("name-color-update");
    for (let j = 0; j < imageColorUploadFiles.length; j++) {
        let sizes = new Array();
        if(imageColorUploadFiles[j].value != ""){
            let sizeClass = $(nameColorClass[j]).parents(".color-add-update").find(".name_size");
            let quantityClass = $(nameColorClass[j]).parents(".color-add-update").find(".quantity_size");
            for (let k = 0; k < sizeClass.length; k++) {
                sizes.push({'name': $(sizeClass[k]).val(), 'quantity': Number($(quantityClass[k]).val())});
            }
            colors.push({"name": $(nameColorClass[quantityColorPhoto]).val(), "size": sizes});
            data.append("colorPhoto" + quantityColorPhoto, $("#image-color-upload-update-" + quantityColorPhoto)[0].files[0]);
            quantityColorPhoto += 1;
        }
    }
    data.append("idProduct", idProduct);
    data.append("colors", JSON.stringify(colors.reverse()));
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/addcolor",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: "json",
        success: function (response) {
            alert(response);
            window.location.reload();
        }
    });
}

function AddColorInputUpdate(e, idProduct, idColor) {
    $(e).parents(".color_input_container").prepend(`
        <div class="color_input">
            <p class="title">Kích thước</p>
            <input type="text" placeholder="..." class="name_size">
            <p class="title">Số lượng</p>
            <input type="text" placeholder="..." class="quantity_size">
            <?xml version="1.0" encoding="UTF-8"?><svg class="icon-delete" onclick="DeleteElement(this)" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000" stroke-width="1.5"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM9.70164 8.64124C9.40875 8.34835 8.93388 8.34835 8.64098 8.64124C8.34809 8.93414 8.34809 9.40901 8.64098 9.7019L10.9391 12L8.64098 14.2981C8.34809 14.591 8.34809 15.0659 8.64098 15.3588C8.93388 15.6517 9.40875 15.6517 9.70164 15.3588L11.9997 13.0607L14.2978 15.3588C14.5907 15.6517 15.0656 15.6517 15.3585 15.3588C15.6514 15.0659 15.6514 14.591 15.3585 14.2981L13.0604 12L15.3585 9.7019C15.6514 9.40901 15.6514 8.93414 15.3585 8.64124C15.0656 8.34835 14.5907 8.34835 14.2978 8.64124L11.9997 10.9393L9.70164 8.64124Z" fill="#000000"></path></svg>
            <div class="button-update-container">
                <button class="button-w100" onclick="AddSize(`+ idProduct +`,`+ idColor +`, this)">Thêm</button>
            </div>
        </div>
    `);
}

function AddSize(idProduct, idColor, e) {
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/addsize",
        data: {"idProduct": idProduct, "idColor": idColor, "name": $(e).parents(".color_input").find(".name_size").eq(0).val(), "quantity": $(e).parents(".color_input").find(".quantity_size").eq(0).val()},
        dataType: "json",
        success: function (response) {
            alert(response);
            window.location.reload();
        }
    });
}

function DeleteElement(e) {
    $(e).parent().remove();
}

function PricePromotion(idProduct) {
    let check = true;
    if($("#price-promotion").val() == ""){
        check = false;
        alert("Giá tiền khuyến mãi không được bỏ trống");
    }
    if($("#start-date-price-promotion").val() == ""){
        check = false;
        alert("Thời gian bắt đầu khuyến mãi không được bỏ trống");
    }
    if($("#end-date-price-promotion").val() == ""){
        check = false;
        alert("Thời gian kết thúc khuyến mãi không được bỏ trống");
    }
    if(new Date($("#start-date-price-promotion").val()).getTime() > new Date($("#end-date-price-promotion").val()).getTime()){
        check = false;
        alert("Thời gian bắt đầu khuyến mãi phải nhỏ hơn thời gian kết thúc khuyến mãi");
    }
    if(new Date($("#start-date-price-promotion").val()).getTime() < new Date().getTime()){
        check = false;
        alert("Thời gian bắt đầu khuyến mãi phải không được nhỏ hơn ngày hiện tại");
    }
    if(new Date($("#end-date-price-promotion").val()).getTime() < new Date().getTime()){
        check = false;
        alert("Thời gian kết thúc khuyến mãi phải không được nhỏ hơn ngày hiện tại");
    }
    if(check == true){
        $.ajax({
            type: "post",
            url: "http://localhost/shop/api/pricepromotion",
            data: {idProduct: idProduct, price: $("#price-promotion").val().replaceAll(",", ""), startDate: $("#start-date-price-promotion").val(), endDate: $("#end-date-price-promotion").val(), "user": $("#user-name").data("user")},
            dataType: "json",
            success: function (response) {
                alert(response);
                window.location.reload();
            }
        });
    }
}

function UpdatePrice(idProduct) {
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/updateprice",
        data: {idProduct: idProduct, price: $("#price").val().replaceAll(",", ""), "user": $("#user-name").data("user")},
        dataType: "json",
        success: function (response) {
            alert(response);
            window.location.reload();
        }
    });
}

let imagesRemoveProduct = new Array();

function UpdateImage(idProduct) {
    let data = new FormData();
    let imageProductUploadFiles = document.getElementsByClassName("image-product-upload-file");
    let quantityProductPhoto = 0;
    for (let i = 0; i < imageProductUploadFiles.length; i++) {
        if(imageProductUploadFiles[i].value != ""){
            data.append("productPhoto" + quantityProductPhoto, $("#image-upload-" + $(imageProductUploadFiles[i]).data("number"))[0].files[0]);
            quantityProductPhoto += 1;
        }
    }
    data.append("quantityProductPhoto", quantityProductPhoto);
    data.append("idProduct", idProduct);
    data.append("imagesRemoveProduct", JSON.stringify(imagesRemoveProduct));
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/updateimage",
        data: data,
        dataType: "json",
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
            alert(response);
            window.location.reload();
        }
    });
}

function UpdateProduct(idProduct, column, e) {
    let data = new Array();
    if(column == "name"){
        data.push({"slug": toSlug($(e).parent().find("input").eq(0).val()), "name": $(e).parent().find("input").eq(0).val()});
    }
    else{
        data.push({"sku_code": $(e).parent().find("input").eq(0).val()});
    }
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/updateproduct",
        data: {"idProduct": idProduct, "column": column, "data": JSON.stringify(data), "user": $("#user-name").data("user")},
        dataType: "json",
        success: function (response) {
            alert(response);
            window.location.reload();
        }
    });
}

function UpdateDetailProduct(idProduct) {
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/updateproduct",
        data: {"idProduct": idProduct, "column": "detail", "value": CKEDITOR.instances['detail'].getData(), "user": $("#user-name").data("user")},
        dataType: "json",
        success: function (response) {
            alert(response);
            window.location.reload();
        }
    });
}

function UploadImageColor(e){
    if ($(e.target).parent().find('img').length == 0){
        $(e.target).parent().append(`
            <img class="image-product-upload" src="`+ URL.createObjectURL(e.target.files[0]) +`"/>
        `);
        $(e.target).parent().find("svg").css("display", "none");
    }
    else{
        $(e.target).parent().find("img").attr("src", URL.createObjectURL(e.target.files[0]));
    }
}

function UpdateColor(idColor, e) {
    let data = new FormData();
    data.append("idColor", idColor);
    data.append("name", $(e).parent().find(".name-color").eq(0).val());
    if($("#image-color-upload-" + idColor).val() != "")
        data.append("imageColorUpload", $("#image-color-upload-" + idColor)[0].files[0]);
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/updatecolor",
        data: data,
        dataType: "json",
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
            alert(response);
            window.location.reload();
        }
    });
}

function UpdateSize(e, idSize) {
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/updatesize",
        data: {"idSize": idSize, "name": $(e).parent().find(".name_size").eq(0).val(), "quantity": $(e).parent().find(".quantity_size").eq(0).val()},
        dataType: "json",
        success: function (response) {
            alert(response);
            window.location.reload();
        }
    });
}

function DeleteProduct(idProduct) {
    if (confirm("Bạn có thực sự muốn xoá") == true) {
        $.ajax({
            type: "post",
            url: "http://localhost/shop/api/deleteproduct",
            data: {"idProduct": idProduct},
            dataType: "json",
            success: function (response) {
                alert(response);
                window.location.href = "http://localhost/shop/manage/listproduct/2?page=1";
            }
        });
    }
}

function FormatMoney(element, event) {
    if (event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode >= 96 && event.keyCode <= 105) {
        let money = $(element).val().toString().replaceAll(",", "");
        $(element).val(money.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }
    else{
        $(element).val($(element).data("value").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }
}

function ChooseTypeProduct(e) {
    if($(e).css("background-color") == "rgb(245, 245, 245)")
        $(e).css("background-color", "white");
    else
        $(e).css("background-color", "whitesmoke");
}

function UpdateTypeProduct(idProduct) {
    let typeProducts = new Array();
    let typeProductClass = document.getElementsByClassName("type-product");
    for (let k = 0; k < typeProductClass.length; k++) {
        if($(typeProductClass[k]).css("background-color") == "rgb(245, 245, 245)"){
           typeProducts.push($(typeProductClass[k]).data("id"));
        }
    }
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/updatetypeproductdetail",
        data: {idProduct: idProduct, typeProducts: JSON.stringify(typeProducts)},
        dataType: "json",
        success: function (response) {
            alert(response);
            window.location.reload();
        }
    });
}