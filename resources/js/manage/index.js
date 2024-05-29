var perfEntries = performance.getEntriesByType("navigation");
(function () {
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
})();

function Search() {
    if($("#keyword").val() == "")
        window.location.href = window.location.pathname + "?page=1";
    else
        window.location.href = window.location.pathname + "?page=1&keyword=" + $("#keyword").val();
}

$("#keyword").keypress(function (e) {
    if (e.which == 13) {
        Search();
    }
});

function ChangeQuantityRow(e) {
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/updatequantityrow",
        data: {"id": $("#user-name").data("user"), "tablerow":  Number($(e).val())},
        dataType: "json",
        success: function (response) {
            let pathname = window.location.pathname;
            if($("#keyword").val() == "")
                window.location.href = pathname.slice(0, pathname.lastIndexOf("/")) + "/" + $(e).val() + "?page=1";
            else
                window.location.href = pathname.slice(0, pathname.lastIndexOf("/")) + "/" + $(e).val() + "?page=1&keyword=" + $("#keyword").val();
        }
    });
}