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
    data.append("slug", toSlug($("#name").val()));
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
            window.location.href = "http://localhost/shop/manage/listtypeproduct/2?page=1";
        }
    });
}

function UpdateTypeProduct(idTypeProduct) {
    let data = new FormData();
    data.append("idTypeProduct", idTypeProduct);
    data.append("name", $("#name").val());
    data.append("slug", toSlug($("#name").val()));
    data.append("detail", $("#detail").val());
    data.append("typeProductParent", $("#type-product-choose").val());
    if($("#image-banner-type-product").val() != "")
        data.append("image", $("#image-banner-type-product")[0].files[0]);
    if($("#image-type-product").val() != "")
        data.append("icon", $("#image-type-product")[0].files[0]);
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/updatetypeproduct",
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

function DeleteTypeProduct(idTypeProduct) {
    if (confirm("Bạn có thực sự muốn xoá") == true) {
        $.ajax({
            type: "post",
            url: "http://localhost/shop/api/deletetypeproduct",
            data: {"idTypeProduct": idTypeProduct},
            dataType: "json",
            success: function (response) {
                alert(response);
                window.location.href = "http://localhost/shop/manage/listtypeproduct/2?page=1";
            }
        });
    }
}