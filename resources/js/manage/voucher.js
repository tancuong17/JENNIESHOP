function UploadImage(e){
    if ($(e.target).parent().find('img').length == 0){
        $(e.target).parent().append(`
            <img class="image-news-upload" src="`+ URL.createObjectURL(e.target.files[0]) +`"/>
        `);
        $(e.target).parent().find("svg").css("display", "none");
    }
    else{
        $(e.target).parent().find("img").attr("src", URL.createObjectURL(e.target.files[0]));
    }
}

function FormatMoney(element, event) {
    if (event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode >= 96 && event.keyCode <= 105) {
        let money = $(element).val().toString().replaceAll(",", "");
        $(element).val(money.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }
    else{
        $(element).val("");
    }
}

function AddVoucher() {
    let data = new FormData();
    data.append("type", Number($("#type").val()));
    data.append("name", $("#name").val());
    data.append("code", $("#code").val());
    data.append("value", Number($("#value").val().replaceAll(",", "")));
    data.append("quantity", $("#quantity").val());
    data.append("start_date", $("#start_date").val());
    data.append("end_date", $("#end_date").val());
    data.append("user", $("#user-name").data("user"));
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/addvoucher",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: "json",
        success: function (response) {
            alert(response);
            window.location.href = "http://localhost/shop/manage/listvoucher/2?page=1";
        }
    });
}

function UpdateVoucher(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("type", Number($("#type").val()));
    data.append("name", $("#name").val());
    data.append("code", $("#code").val());
    data.append("value", Number($("#value").val().replaceAll(",", "")));
    data.append("quantity", $("#quantity").val());
    data.append("start_date", $("#start_date").val());
    data.append("end_date", $("#end_date").val());
    data.append("user", $("#user-name").data("user"));
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/updatevoucher",
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

function LinkVoucher(id) {
    window.location.href = "http://localhost/shop/manage/detailvoucher/" + id;
}