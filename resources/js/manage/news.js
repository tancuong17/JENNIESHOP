CKEDITOR.replace('content', {height: 500});

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

function AddNews() {
    let data = new FormData();
    data.append("title", $("#title").val());
    data.append("slug", toSlug($("#title").val()));
    data.append("content", CKEDITOR.instances['content'].getData());
    data.append("image", $("#image-news")[0].files[0]);
    data.append("banner", Number($("#isBanner").val()));
    data.append("user", $("#user-name").data("user"));
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/addnews",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: "json",
        success: function (response) {
            alert(response);
            window.location.href = "http://localhost/shop/manage/listnews/2?page=1";
        }
    });
}

function UpdateNews(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("title", $("#title").val());
    data.append("slug", toSlug($("#title").val()));
    data.append("content", CKEDITOR.instances['content'].getData());
    data.append("banner", Number($("#isBanner").val()));
    data.append("user", $("#user-name").data("user"));
    if($("#image-news").val() != "")
        data.append("image", $("#image-news")[0].files[0]);
    $.ajax({
        type: "post",
        url: "http://localhost/shop/api/updatenews",
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

function DeleteNews(id) {
    if (confirm("Bạn có thực sự muốn xoá") == true) {
        $.ajax({
            type: "post",
            url: "http://localhost/shop/api/deletenews",
            data: {"id": id},
            dataType: "json",
            success: function (response) {
                alert(response);
                window.location.href = "http://localhost/shop/manage/listnews/2?page=1";
            }
        });
    }
}

function LinkNews(id) {
    window.location.href = "http://localhost/shop/manage/detailnews/" + id;
}