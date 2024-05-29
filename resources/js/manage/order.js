function LinkOrder(id) {
    window.location.href = "http://localhost/shop/manage/detailorder/" + id;
}

function UpdateOrder(id, status) {
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/updateorder",
        data: {"id": id, "status": status, "user": $("#user-name").data("user")},
        dataType: "json",
        success: function (response) {
            alert(response);
            window.location.reload();
        }
    });
}