function UploadImageBannerTypeProduct(e){
    if ($(e.target).parent().find('img').length == 0){
        $(e.target).parent().append(`
            <img class="image-banner-type-product-upload" src="`+ URL.createObjectURL(e.target.files[0]) +`"/>
        `);
        $(e.target).parent().find("svg").css("display", "none");
    }
    else{
        $(e.target).parent().find("img").attr("src", URL.createObjectURL(e.target.files[0]));
    }
}

function UploadImageTypeProduct(e){
    if ($(e.target).parent().find('img').length == 0){
        $(e.target).parent().append(`
            <img class="image-banner-type-product-upload" src="`+ URL.createObjectURL(e.target.files[0]) +`"/>
        `);
        $(e.target).parent().find("svg").css("display", "none");
    }
    else{
        $(e.target).parent().find("img").attr("src", URL.createObjectURL(e.target.files[0]));
    }
}

function AddTypeProduct() {
    let data = new FormData();
    data.append("name", $("#name").val());
    data.append("detail", $("#detail").val());
    data.append("typeProductParent", $("#type-product-choose").val());
    data.append("image", $("#image-banner-type-product")[0].files[0]);
    data.append("icon", $("#image-type-product")[0].files[0]);
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/addtypeproduct",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: "json",
        success: function (response) {
            alert(response);
        }
    });
}