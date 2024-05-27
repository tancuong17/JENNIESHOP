var perfEntries = performance.getEntriesByType("navigation");
(function () {
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
})();

function Search() {
    window.location.href = window.location.pathname + "?page=1&keyword=" + $("#keyword").val();;
}

$("#keyword").keypress(function (e) {
    if (e.which == 13) {
        Search();
    }
});